<?php
include_once "../../../db/userModel.php";
$user  = new userModel();
$user->deleteUser($_GET['id']);
header("Location: ../admin.php");
exit;
