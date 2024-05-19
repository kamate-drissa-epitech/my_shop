<?php
include_once "../../../db/categorieModel.php";

if (isset($_POST['name']) && isset($_POST['parent_id'])) {
    $name = $_POST['name'];
    $parent_id = $_POST['parent_id'];
    $category = new categorieModel();
    $category->addCategory($name, $parent_id);
    header("Location: ../admin.php?categoryAdded=1");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Category</title>
    <link rel="stylesheet" href="../../../css/form.css">
</head>

<body>
    <form action="" class="form" method="post">
        <div class="form-container">
            <h3 class="form-title">Add new category</h3>
            <div class="email input-group">
                <label for="name">name</label>
                <input type="text" id="name" name="name">
            </div>
            <div class="password input-group">
                <label for="password">paren_id</label>
                <input type="number" min="1" id="parent_id" name="parent_id">
            </div>
            <button class="register-btn">Add</button>
        </div>
    </form>
</body>

</html>