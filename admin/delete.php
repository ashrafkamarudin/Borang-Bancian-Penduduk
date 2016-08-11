<?php
session_start();

require_once '../classes/admin.class.php';

$userid = $_GET['id'];
$admin = new admin;

$deleteUser = $admin->deleteUser($userid);

if ($deleteUser == true) {
    # code...
    unset($_SESSION['user_id']);
}

header('location:profilahli.php');