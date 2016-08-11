<?php
require_once('session.php');
require_once('../classes/admin.class.php');
$admin_logout = new admin();
	
if($admin_logout->is_loggedin()!="")
{
	$admin_logout->redirect('home.php');
}
if(isset($_GET['logout']) && $_GET['logout']=="true")
{
    $uname = $_GET['name'];

	$admin_logout->doLogout($uname);
	$admin_logout->redirect('index.php');
}
