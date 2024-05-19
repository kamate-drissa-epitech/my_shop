<?php
include_once "../../../db/productModel.php";
include_once "../../../db/categorieModel.php";
$errorMessage = '';
$category = new categorieModel();
$product = new productModel();


if(isset($_GET['edit']) && isset($_GET['id'])) {
    $produtToUpdate = $product->getProductById($_GET['id']);
}

if (isset($_POST['name']) && isset($_POST['price']) && isset($_POST['description']) && isset($_FILES['picture']) && isset($_POST['category_id'])) {
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];
    $category_id = $_POST['category_id'];

    $pictureName = $_FILES['picture']['name'];
    $tempName = $_FILES['picture']['tmp_name'];
    $folder = "../../../ressources/images" . join('_', explode(' ', $pictureName));

    // Verify picture type
    $file_extension = explode('.', $pictureName);
    $file_extension = strtolower(end($file_extension));
    $accepted_formate = array('jpeg', 'jpg', 'png');
    if (!in_array($file_extension, $accepted_formate)) {
        $errorMessage =   'This image is file not allowed<br>';
    }

    if ($name === '') {
        $errorMessage .= 'Please fill name<br>';
    }
    if ($description === '') {
        $errorMessage .= 'Please fill description<br>';
    }


    if (!is_int(intval($price))) {
        $errorMessage .= "The price must be number<br>";
    }
    if (!$errorMessage) {
        if (move_uploaded_file($tempName, $folder)) {
            $product->addProduct($name, $price, $description, $folder, $category_id);
            header('Location:../admin.php?productAdd=1');
        }
    }
}

$allCategories = $category->getAllCategories();


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <link rel="stylesheet" href="../../../css/form.css">
</head>

<body>
    <form action="" class="form" method="post" enctype="multipart/form-data">
        <div class="form-container">
            <?php if ($errorMessage) : ?>
                <div class="error-message">
                    <?= $errorMessage ?>
                </div>
            <?php endif ?>
            <h3 class="form-title">Add new product</h3>
            <div class="email input-group">
                <label for="name">name</label>
                <input type="text" id="name" name="name" value="<?= $produtToUpdate['name'] ? $produtToUpdate['name'] : '' ?>">
            </div>
            <div class="password input-group">
                <label for="price">price</label>
                <input type="number" min="1" id="price" name="price" value="<?= $produtToUpdate['price'] ? $produtToUpdate['price'] : '' ?>">
            </div>
            <div class="email input-group">
                <label for="description">description</label>
                <input type="text" id="description" name="description" value="<?= $produtToUpdate['description'] ? $produtToUpdate['description'] : '' ?>">
            </div>
            <div class="email input-group">
                <label for="picture">picture</label>
                <input type="file" id="picture" name="picture" value="<?= $produtToUpdate['picture'] ? $produtToUpdate['picture'] : '' ?>">
            </div>
            <select name="category_id" id="">
                <?php foreach ($allCategories as $category) : ?>
                    <option value="<?= $category['id'] ?>"> <?= $category['name'] ?></option>
                <?php endforeach ?>
            </select>
            <button class="register-btn">Add</button>   
        </div>
    </form>
</body>

</html>