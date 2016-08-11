<?php

require_once("session.php");
	
require_once("../classes/admin.class.php");

$admin = new admin();
$admin_id = $_SESSION['admin_session'];

$admin_info = $admin->get_admin($admin_id);

?>

<!DOCTYPE html>
<html>
<head>
	<title><?php echo $pagetitle; ?></title>

	<link rel='shortcut icon' href='images/favicon.ico' type='image/x-icon'/ >
	<link rel="stylesheet" type="text/css" href="../vendor/semantic-ui/semantic.min.css">
	<link rel="stylesheet" type="text/css" href="../vendor/datatable/datatables.semanticui.min.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">

	<script type="text/javascript" src="../vendor/datatable/jquery.js"></script>
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.2/semantic.min.js"></script>
	<script type="text/javascript" src="../vendor/datatable/jquery.datatable.min.js"></script>
	<script type="text/javascript" src="../vendor/datatable/datatables.semanticui.min.js"></script>

</head>