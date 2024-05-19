<?php
include_once "../../../db/productModel.php";
$user  = new productModel();
$user->deleteProduct($_GET['id']);
header("Location: ../admin.php?productDeleted=1");
exit;