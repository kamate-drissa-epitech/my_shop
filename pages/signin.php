<?php
include_once "../db/userModel.php";
$errorMessage = '';
$successMessage = '';


if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $pdo = new userModel();
    $userFromDB = $pdo->getUser($email);

    if ($email === '') {
        $errorMessage .= 'Fill  email<br>';
    } elseif (!preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\\.[a-zA-Z]{2,}$/", $email)) {
        $errorMessage .= "Invalid email<br>";
    } elseif ($userFromDB['email'] !== $email) {
        $errorMessage .= "Email don't exists<br>";
    }

    if ($password === '') {
        $errorMessage .= 'Fill  password<br>';
    }elseif (password_verify($password, $userFromDB['password']) < 1) {
        $errorMessage .= 'Password incorrect<br>';
    }

    // if (password_verify($password, strval($userFromDB['password']))) {
    //     $errorMessage .= 'Password incorrect<br>';
    // }

    // Redirect depend on user Type
    if (!$errorMessage) {
        if ($userFromDB['admin'] === 1) {
            setcookie('userEmail', $userFromDB['email'], time() + 3600, '/', false);
            header("Location: ./admin/admin.php", true, 302);
            exit;
        } else {
            setcookie('userEmail', strval($userFromDB['email']), time() + 3600, '/', false);
            header("Location: ../", true, 302);
            exit;
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="stylesheet" href="../css/form.css">
</head>

<body>
    <form action="" class="form" method="post">
        <div class="form-container">
            <?php if ($errorMessage) : ?>
                <div class="error-message">
                    <?= $errorMessage ?>
                </div>
            <?php endif ?>
            <h3 class="form-title">Log In</h3>
            <div class="email input-group">
                <label for="email">email</label>
                <input type="text" id="email" name="email" value="<?= $email ? $email : '' ?>">
            </div>
            <div class="password input-group">
                <label for="password">password</label>
                <input type="password" id="password" name="password" value="<?= $password ? $password : '' ?>">
            </div>
            <button class="register-btn">Login</button>
            <div class="go-to-signup">Don't have account? <a href="./signup.php">click here</a></div>
        </div>
    </form>
</body>

</html>