<?php
include_once "../../db/userModel.php";
include_once "../../db/productModel.php";
include_once "../../db/categorieModel.php";
$user = new userModel();
$product = new productModel();
$category = new categorieModel();
$successMessage = '';

// $user->createUser('kamate', 'kamate@gmail.com', password_hash('kamate', PASSWORD_BCRYPT), date('Y-m-d'),  1);
// exit;


$allUsers = $user->getALlUsers();
$allCategories = $category->getAllCategories();

if ($_GET['categoryAdded']) {
    $successMessage = "New category added";
}
if ($_GET['userCreated']) {
    $successMessage = "User created succeffuly";
}
if ($_GET['userUpdated']) {
    $successMessage = "User updated successfuly";
}
if ($_GET['userDeleted']) {
    $successMessage = "User deleted successfuly";
}



if ($_COOKIE['userEmail']) {
    // Verify user type before geting in admin page
    $userFromCookies = $user->getUser($_COOKIE['userEmail']);
    if ($userFromCookies['admin'] !== 1) {
        header("Location: ../../", true, 302);
        exit;
    }
} else {
    header("Location: ../", true, 302);
    exit;
}




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dash</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="../../css/admin.css">
</head>


<body>
    <div class="dash-container">
        <header class="header">
            <section class="header-left">
                <div class="logo-group">
                    <img src="../../ressources/icons/Logo.png" alt="Logo">
                    <h3>Administrator</h3>
                </div>
            </section>
            <section class="midddle">
                <div class="search-group">
                    <img class="search-icon" src="../../ressources/icons/Search.png" alt="search icon">
                    <input type="text" placeholder="Rechercer...">
                </div>
            </section>
            <section class="header-right">
                <div class="notification-group">
                    <img class="icon" src="../../ressources/icons/notification.png" alt="notification icon">
                    <span class="notification-number">1</span>
                </div>
                <div class="email-group">
                    <img class="icon" src="../../ressources/icons/email.png" alt="emai icon">
                    <span class="emaiL-number">4</span>
                </div>
                <div class="profil">
                    <img class="icon" src="../../ressources/icons/user.png" alt="profil image">
                    <p>admin</p>
                    <a class="logout" href="../logout.php">Logout</a>
                </div>
            </section>
        </header>
        <main class="main">
            <aside class="main-left">
                <h2 class="dashbord-title">Dashboard</h2>
            </aside>
            <article class="main-right">
                <?php if ($_GET['categoryAdded'] || $_GET['userCreated'] || $_GET['userUpdated'] || $_GET['userDeleted']) : ?>
                    <div class="success-message">
                        <?= $successMessage ?>
                    </div>
                <?php endif ?>
                <div class="users-categories">
                    <div class="users">
                        <h3>Users</h3>
                        <a class="addBtn" href="../signup.php">Add user</a>
                        <table class="table table-striped ">
                            <thead class="table table-dark">
                                <tr py-4>
                                    <th py-4>ID</th>
                                    <th>Username</th>
                                    <th>email</th>
                                    <th>created_at</th>
                                    <th>updated_at</th>
                                    <th>admin</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($allUsers as $user) : ?>
                                    <tr>
                                        <td><?= $user['id'] ?></td>
                                        <td><?= $user['username'] ?></td>
                                        <td><?= $user['email'] ?></td>
                                        <td><?= $user['created_at'] ?></td>
                                        <td><?= $user['updated_at'] ?></td>
                                        <td><?= $user['admin'] ?></td>
                                        <td>
                                            <form class="d-inline" action="../signup.php?email=<?= $user['email'] ?>&edit=1" method="post">
                                                <button class="btn btn-secondary">Edit</button>
                                            </form>
                                            <form class="d-inline" action="users/delete.php?id=<?= $user['id'] ?>" method="post">
                                                <button onclick="return confirm('Do you want to delete this user?')" class="btn btn-danger">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="categories">
                        <h3>Categorie</h3>
                        <a class="addBtn" href="./categories/addCategory.php">Add Categorie</a>
                    </div>
                </div>

                <div class="users">
                    <h3>Produits</h3>
                    <a class="addBtn" href="../signup.php">Add Product</a>
                </div>

            </article>
        </main>
    </div>
    <script type="text/javascript" defer>
        <?php include_once "../../js/admin.js" ?>
    </script>
</body>

</html>