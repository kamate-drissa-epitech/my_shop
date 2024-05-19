<?php
include_once "../db/userModel.php";

$errorMessage = '';
$successMessage = '';
$pdo = new userModel();
// $pdo = new userModel();
// $pdo->createUser('kamate', 'kamate@gmail.com', password_hash('kamate', PASSWORD_BCRYPT), 1);
// exit;

// get connected user to check if admin
if (isset($_COOKIE['userEmail'])) {
    $userConnected = $pdo->getUser($_COOKIE['userEmail']);
    $isAdmin = $userConnected['admin'];
}
// Update user
if (isset($_GET['email']) && isset($_GET['edit'])) {
    $userToUpdate = $pdo->getUser($_GET['email']);
}

if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $adminField = $_POST['admin'];
    //Verify if special characters are present
    $regex = preg_match("/^[a-zA-Z0-9]+$/", $password);

    // //Email Erros
    $userFromDB = $pdo->getUser($email);
    if ($email === $userFromDB['email']) {
        $errorMessage .= "Email already exists<br>";
    } elseif (!preg_match("/^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\\.[a-zA-Z]{2,}$/", $email)) {
        $errorMessage .= "Invalid email<br>";
    } elseif ($email === "") {
        $errorMessage .= "Fill the email<br>";
    }

    // Password Erros
    if (strlen($password) < 8) {
        $errorMessage .= "Password must be higher than 8 characters<br>";
    } elseif ($password === "") {
        $errorMessage .= "Fill the password<br>";
    } elseif ($regex > 0) {
        $errorMessage .= "Password must have a special character<br>";
    }

    //Name error
    if ($username === "") {
        $errorMessage .= "Fill the name<br>";
    }


    if (!$errorMessage) {
        if (isset($isAdmin) && !isset($_GET['edit'])) {
            $pdo->createUser($username, $email, password_hash($password, PASSWORD_BCRYPT), date('Y-m-d'), $adminField);
            header("Location: ./admin/admin.php?userCreated=1", true, 302);
        } elseif (isset($isAdmin) && isset($_GET['edit'])) {
            $pdo->updateUser($username, $email, password_hash($password, PASSWORD_BCRYPT), $userToUpdate['created_at'], date('Y-m-d'), $adminField, $userToUpdate['email']);
            header("Location: ./admin/admin.php?userUpdated=1", true, 302);
        } else {
            $userFromDB = $pdo->getUser($email);
            $pdo->createUser($username, $email, password_hash($password, PASSWORD_BCRYPT), date('Y-m-d'),);
            setcookie('userEmail', $email, time() + 3600, '/', false);
            header("Location: ../", true, 302);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
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
            <?php if ($successMessage) : ?>
                <div class="success-message">
                    <?= $successMessage ?>
                </div>
            <?php endif ?>
            <h3 class="form-title">Sign Up</h3>
            <div class="name input-group">
                <label for="name">name</label>
                <input type="text" id="name" name="username" value="<?= $userToUpdate ? $userToUpdate['username'] : '' ?>">
            </div>
            <div class="email input-group">
                <label for="email">email</label>
                <input type="text" id="email" name="email" value="<?= $userToUpdate ? $userToUpdate['email'] : '' ?>">
            </div>
            <div class="password input-group">
                <label for="password">password</label>
                <input type="password" id="password" name="password">
            </div>
            <?php if ($isAdmin === 1) : ?>
                <div class="admin input-group">
                    <label for="admin">isAdmin</label>
                    <input type="number" id="admin" min="0" value="<?= $userToUpdate ? $userToUpdate['admin'] : '' ?>" max="1" name="admin" onkeydown="return false">
                </div>
            <?php endif; ?>
            <button class="register-btn">Register</button>
            <?php if ($isAdmin !== 1) : ?>
                <div class="go-to-signup">Already have account? <a href="./signin.php">click here</a></div>
            <?php endif; ?>
        </div>
    </form>
    <script type="text/javascript" defer>
        <?php include_once "../js/app.js" ?>
    </script>
</body>

</html>