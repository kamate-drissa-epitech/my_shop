<?php
    if($_GET['file']){
        $fileName = $_FILES['file']['name'];
        $tmpName = $_FILES['file']['tmp_name'];

        var_dump($_FILES);
        
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" enctype="multipart/form-data" method="post">
        <input style="padding: 30px;" type="file" name="file" value="<?= $_GET['file'] ? $_GET['file'] : '' ?>">
        <button type="submit">Envoyer</button>
    </form>
</body>
</html>