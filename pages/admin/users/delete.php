<?php
include_once "../../../db/userModel.php";
$user  = new userModel();
$user->deleteUser($_GET['id']);
header("Location: ../admin.php?userDeleted=1");
exit;
