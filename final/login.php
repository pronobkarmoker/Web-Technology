<?php
session_start();

// Hardcoded admin credentials
$admin_username = 'admin';
$admin_password = '123456';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($username === $admin_username && $password === $admin_password) {
        $_SESSION['loggedin'] = true;
        header("Location: contact_list.php");
        exit;
    } else {
        echo "Invalid username or password!";
    }
}
?>