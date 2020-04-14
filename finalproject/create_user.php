<?php
// 1. Get the form inputs
$username = $_POST['username'];
$password = $_POST['password'];
$confirm = $_POST['confirm'];
$name_usr = $_POST['name_usr'];
$ok = true;

// 2. Validate the inputs: required + matching passwords
if (empty($username)) {
    echo 'Username is required<br />';
    $ok = false;
}

if (empty($password)) {
    echo 'Password is required<br />';
    $ok = false;
}

if ($password != $confirm) {
    echo 'Passwords do not match';
    $ok = false;
}

if ($ok) {
    // 3. connect
    require_once 'db/db.php';

    // 3a. check if username already exists
    $sql = "SELECT * FROM users WHERE username = :username";
    $cmd = $db->prepare($sql);
    $cmd->bindParam(':username', $username, PDO::PARAM_STR, 60);
    $cmd->execute();
    $user = $cmd->fetch();

    // if we found a record with this username, stop execution and don't insert again
    if (!empty($user)) {
        echo 'Username already exists';
        exit(); // this stops execution of any more PHP code on this page
    }

    // 4. set up SQL INSERT to users table
    $sql = "INSERT INTO users (username, password, name_usr) VALUES (:username, :password, :name_usr)";
    $cmd = $db->prepare($sql);

    // 5. ** NEW ** hash the password before saving
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // 6. Bind parameters and execute the insert
    $cmd->bindParam(':username', $username, PDO::PARAM_STR, 60);
    $cmd->bindParam(':password', $hashedPassword, PDO::PARAM_STR, 255);
    $cmd->bindParam(':name_usr', $name_usr, PDO::PARAM_STR, 45);
    $cmd->execute();

    // 7. Disconnect & redirect to login
    $db = null;

    header('location:login.php');

}
 

?>