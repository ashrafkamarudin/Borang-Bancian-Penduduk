<?php
session_start();
require_once("../classes/admin.class.php");
$login = new admin();

if($login->is_loggedin()!="")
{
	$login->redirect('senarai');
}

if(isset($_POST['btn-login']))
{
	$uname = strip_tags($_POST['username']);
	$upass = strip_tags($_POST['password']);
		
	if($login->doLogin($uname,$upass))
	{
		$login->redirect('senarai');
	}
	else
	{
		$error = "Harap Maaf !";
	}	
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Log-in</title>

	<link rel="stylesheet" type="text/css" href="../vendor/semantic-ui/semantic.min.css">

	<script src="https://code.jquery.com/jquery-2.2.4.min.js" integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44=" crossorigin="anonymous"></script>
	<script type="text/javascript" src="../vendor/semantic-ui/semantic.min.js" ></script>
</head>
<style type="text/css">
body > .grid {
	height: 100%;
}
.image {
	margin-top: -100px;
}
.column {
	max-width: 450px;
}
</style>
<body>
<div class="ui middle aligned center aligned grid">
	<div class="column">
    	<h2 class="ui image header">
      	<div class="content">
        	Log-masuk akaun anda
      	</div>
    	</h2>
        <?php
			if(isset($error))
			{
				?>
                <div class="ui negative message">
					<i class="close icon"></i>
					<div class="header">
				    	<?php echo $error; ?>
					</div>
					<p>Nama Pengguna/Kata laluan anda salah !</p>
				</div>
                <?php
			}
		?>
    	<form id="login" class="ui large form" method="post" action="">
    	<div class="ui stacked secondary  segment">
        	<div class="field">
         		<div class="ui left icon input">
            		<i class="user icon"></i>
            		<input type="text" name="username" placeholder="Nama Pengguna">
          		</div>
        	</div>
        	<div class="field">
        		<div class="ui left icon input">
            		<i class="lock icon"></i>
            		<input type="password" name="password" placeholder="Kata laluan">
        		</div>
        	</div>
        	<button type="submit" name="btn-login" id="click" class="ui fluid large teal submit button">
        		Log-masuk
        	</button>
    	</div>

    	<div class="ui error message"></div>

    	</form>

	    <div class="ui message">
	      	Untuk kegunaan admin sahaja
	    </div>
	</div>
</div>
</body>
</html>

<script type="text/javascript">
$(document)
    .ready(function() {
    	$('.ui.form')
        	.form({
        		fields: {
            		username: {
              			identifier  : 'username',
              			rules: [
                		{
                  			type   : 'empty',
                  			prompt : 'Sila masukkan Nama Pengguna'
                		}]
		            },
		            password: {
		            	identifier  : 'password',
		            	rules: [
		                {
		                	type   : 'empty',
		                	prompt : 'Sila masukkan Kata Laluan'
		                }]
		            }
		        }
		    })
		;
		$('.message .close')
			.on('click', function() {
		    	$(this)
		      		.closest('.message')
		      		.transition('fade')
		    	;
			})
		;
    })
;
</script>