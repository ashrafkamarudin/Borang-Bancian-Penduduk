<?php

require_once('db.class.php');

/**
* 
*/
class admin
{
	private $conn;
	
	function __construct()
	{
		# code...
		$database = new database();
		$db = $database->connect();
		$this->conn = $db;
	}

	public function get_admin($id)
    {
    	# code...
    	$admin = false;
    	$stmt = $this->conn->prepare("SELECT admin_name, last_login, last_logout FROM admin WHERE admin_id=:id");
    	$stmt->bindParam(':id', $id, PDO::PARAM_STR);
    	if($stmt->execute())
    	{
       		$admin = $stmt->fetch(PDO::FETCH_ASSOC);
    	}
    	return $admin;
    }

    public function getAlluser()
    {
    	# code...
    	$stmt = $this->conn->prepare("SELECT id, name, ic, age, marital_status, gender, phone FROM user");
    	if($stmt->execute())
    	{
       		while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
       			# code...
       			$data_array[] = $row;
       		}
    	}
    	return $data_array;

    }

    public function getProfile($id)
    {
    	# code...
    	$stmt = $this->conn->prepare("SELECT * FROM user u
                                      LEFT OUTER JOIN house h on u.id = h.id 
                                      WHERE u.id = :id");
    	$stmt->bindParam(':id', $id, PDO::PARAM_STR);
    	if($stmt->execute())
    	{
       		$profile = $stmt->fetch(PDO::FETCH_ASSOC);
    	}
    	return $profile;
    }

    public function getFamily($id)
    {
        // select 
        $stmt = $this->conn->prepare("SELECT owner_id, family_member_id
                                      FROM relation
                                      WHERE owner_id = :id" );
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);
        if($stmt->execute())
        {
            $family_leader = $stmt->fetch(PDO::FETCH_ASSOC);
        }

        $stmt = $this->conn->prepare("SELECT u.id, u.name, u.ic, u.age, u.marital_status, u.gender, r.relation
                                      FROM user u 
                                      INNER JOIN relation r on u.id = r.family_member_id
                                      WHERE r.owner_id IN (:f_member_id, :f_lead_id) ORDER BY ID ASC");
        $stmt->bindParam(':f_lead_id', $family_leader['family_member_id'], PDO::PARAM_INT);
        $stmt->bindParam(':f_member_id', $family_leader['owner_id'], PDO::PARAM_INT);
        if($stmt->execute())
        {
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                # code...
                $family_array[] = $row;
            }
        }
        return $family_array;
    }

    public function updateUser()
    {
        # code...
        $stmt = $this->conn->prepare("UPDATE user 
                                      SET name              = :name,
                                          ic                = :ic,
                                          age               = :age,
                                          gender            = :gender,
                                          phone             = :phone,
                                          marital_status    = :marital_status,
                                          child_count       = :child_count,
                                          job               = :job,
                                          edu_stage         = :edu_stage,
                                          street_address    = :street_address,
                                          poscode           = :poscode,
                                          region            = :region,
                                          state             = :state
                                      WHERE id = :id");
        $stmt->execute(array(
            ':id'           => $_SESSION['user_id'],
            ':name'         => $_POST['name'],
            ':ic'           => $_POST['ic'],
            ':age'          => $_POST['age'],
            'gender'        => $_POST['gender'],
            'phone'         => $_POST['phone'],
            'marital_status'=> $_POST['marital_status'],
            'child_count'   => $_POST['child_count'],
            'job'           => $_POST['job'],
            'edu_stage'     => $_POST['edu_stage'],
            'street_address'=> $_POST['street_address'],
            'poscode'       => $_POST['poscode'],
            'region'        => $_POST['region'],
            'state'         => $_POST['state']));

        return true;
    }

    public function deleteUser($id)
    {
      // check if the user is family leader or not
      $stmt=$this->conn->prepare("SELECT f_lead FROM user WHERE id = :id");
      $stmt->bindparam(':id', $id, PDO::PARAM_STR);
      $stmt->execute();
      $rank = $stmt->fetch(PDO::FETCH_ASSOC);
      switch ($rank['f_lead']) {
        case '0': // not family leader
          # code...
        $stmt=$this->conn->prepare("DELETE FROM user WHERE id = :id");
        $stmt->bindparam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        return true;
          break;

        case '1': // family leader
          // check for family member
          $stmt=$this->conn->prepare("SELECT count(id) FROM relation WHERE owner_id = :id");
          $stmt->bindparam(':id', $id, PDO::PARAM_STR);
          $stmt->execute();
          $row = $stmt->fetchColumn();
          if ($row != 0) { // if exist cannot delete
            $_SESSION['msg'] = 'Data Ketua Keluarga tidak boleh dipadam jika masih mempunyai ahli keluarga';
            return false;
          } else {
            $stmt=$this->conn->prepare("DELETE FROM user WHERE id = :id");
            $stmt->bindparam(':id', $id, PDO::PARAM_INT);

            $stmt->execute();
            return true;
          }
          break;
      }
    }

	public function doLogin($uname,$upass)
	{
		# code...
		$stmt = $this->conn->prepare("SELECT admin_id, admin_name,  admin_pass FROM admin WHERE admin_name=:uname LIMIT 1");
		$stmt->execute(array(':uname'=>$uname));
		$adminRow=$stmt->fetch(PDO::FETCH_ASSOC);
		if($stmt->rowCount() == 1)
		{
			if(password_verify($upass, $adminRow['admin_pass']))
			{
				$_SESSION['admin_session'] = $adminRow['admin_id'];

        $stmt = $this->conn->prepare("UPDATE admin SET last_login = NOW() WHERE admin_name=:uname LIMIT 1");
        $stmt->execute(array(':uname'=>$uname));
        $stmt->execute();

				return true;
			}
			else
			{
				return false;
			}
		}
	}

	public function is_loggedin()
	{
		if(isset($_SESSION['admin_session']))
		{
			return true;
		}
	}
	
	public function redirect($url)
	{
		header("Location: $url");
	}
	
	public function doLogout($uname)
	{
    $stmt = $this->conn->prepare("UPDATE admin SET last_logout = NOW() WHERE admin_name=:uname LIMIT 1");
    $stmt->execute(array(':uname'=>$uname));
    $stmt->execute();
		session_destroy();
		unset($_SESSION['admin_session']);
		return true;
	}

  public function changeSetting($aname,$apass)
  {
    $new_password = password_hash($apass, PASSWORD_DEFAULT);
      
    $stmt = $this->conn->prepare("UPDATE admin SET admin_name=:aname,admin_pass=:apass");
                          
    $stmt->bindparam(":aname", $aname);
    $stmt->bindparam(":apass", $new_password);                      
        
    $stmt->execute();

    $_SESSION['msg'] = 'Nama Pengguna dan Kata laluan berjaya ditukar !';

    return true;       
  }
}