<?php
$title = 'Validate Login NeptunoBox';
require_once('header3.php');

$username = $_POST['username'];
$password = $_POST['password'];

require_once 'db/db.php';

$sql = "SELECT id_user, password, name_usr FROM users WHERE username = :username";

$cmd = $db->prepare($sql);
$cmd->bindParam(':username', $username, PDO::PARAM_STR, 60);
$cmd->execute();

$user = $cmd->fetch();

if (!password_verify($password, $user['password'])) {
    echo '<h1>Invalid Login</h1><br><h2><a class="myButton3" href="register.php">Register</a>User or password invalid - Please try Again</h2>';
    exit();
}
else {
    // handle valid login
    session_start(); // access the current session.  required before reading/write session variables
    $_SESSION['name_usr'] = $user['name_usr']; // store the user's id from our query in a new session variable
    //$_SESSION['username'] = $username['username'];
    //$_SESSION['id_usr'] = $user['name_usr'];
    header('location:home.php'); // redirect to musician list page
}

$db = null;

?>