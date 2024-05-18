<?php
include_once "db_connect.php";

class userModel
{
    public  $pdo;

    public function __construct()
    {
        $connect = new db_connect('localhost', 'my_shop', 3306, 'kamate', 'kamate');
        $this->pdo = $connect->connection();
    }

    public function createUser($username, $email, $password, $isAdmin = 0)
    {
        $query = $this->pdo->prepare("INSERT INTO users(username, email, password, admin) VALUES(?,?,?,?)");
        $query->execute([$username, $email, $password, $isAdmin]);
    }

    public function getUser($email)
    {
        $query = $this->pdo->prepare("SELECT * FROM users WHERE email = ?");
        $query->execute([$email]);
        $user = $query->fetch(PDO::FETCH_ASSOC);
        return $user;
    }


    function updateUser($username, $email, $password, $isAdmin = 0)
    {
        // Get all user infos from cookies and fill its input with that
        // $emailUserConnected = $_COOKIE['email'];
        $emailUserConnected = 'kone@gmail.com';
        $userFromDB = $this->getUser($emailUserConnected);
        // TO DO
        // Set user values if something on inputs
        // $username = isset($_POST['username']) ? $_POST['username'] : $userFromDB['username'];
        //
        $passwordHased = password_hash($password, PASSWORD_BCRYPT);
        // Admin can set user right
        if ($userFromDB['admin'] === 1) {
            $query = $this->pdo->prepare("UPDATE users SET username = ?, email = ?, password = ? , $isAdmin = ? WHERE email = ?");
            $query->execute([$username, $email, $passwordHased, $isAdmin,$emailUserConnected]);
            echo 'user Modified';
        } else {
            $query = $this->pdo->prepare("UPDATE users SET username = ?, email = ?, password = ? WHERE email = ?");
            $query->execute([$username, $email, $passwordHased,$emailUserConnected]);
            echo 'user Modified';
        }
    }

    function deleteUser($id)
    {
        // $emailUserConnected = $_COOKIE['email'];
            $query = $this->pdo->prepare("DELETE FROM users WHERE id = ?");
            $query->execute([$id]);
    }

    
    public function getALlUsers(){
        $query = $this->pdo->prepare("SELECT * FROM users");
        $query->execute();
        $user = $query->fetchAll(PDO::FETCH_ASSOC);
        return $user;
    }
}
