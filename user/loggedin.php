<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once("../helpers/init.php");

// print "<pre>";
// print_r($_POST);
// print_r($_SESSION);

$email = "";
$password = "";
$role = ""; // Initialize role
$loggedinuser = array();

// Check if the form was submitted

// Grab values 

if (isset($_POST['email'])) {
    $email = $_POST['email'];
}
if (isset($_POST['password'])) {
    $password = $_POST['password'];
}

// Update: Get role from form if set
if (isset($_POST['role'])) {
    $role = $_POST['role'];
}

if (!empty($email) && !empty($password)) {
    // Update: Pass role to loginUser function
    $loggedinuser = loginUser($email, $password, $role);
}

if (empty($loggedinuser)) {
    echo "<div style='background-color: white; padding: 50px; border-radius: 5px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); border: 1px solid #ddd; text-align: center; max-width: 400px; width: 100%; margin: 0 auto;'>";
    echo "<h2>Oops! User does not Exist.</h2>";
    echo "<a href='../FrontendExam/users/register.html' style='display: inline-block; background-color: #F4A261; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; margin: 0 5px;'>Go to Registration Page</a>";
    echo "<a href='../FrontendExam/users/login.html' style='display: inline-block; background-color: #F4A261; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; margin: 0 5px;'>Go to Login Page</a>";
} else {
    // print_r($loggedinuser);
    $_SESSION['uHash'] = $loggedinuser['uHash'];
    $_SESSION['role'] = $loggedinuser['role'];
    if ($_SESSION['role'] == "user") {
        header("Location: ../FrontendExam/home/home.html");
    }
    if ($_SESSION['role'] == "admin") {
        header("Location: ../FrontendExam/home/homeAdmin.html");
    }
    exit;
}

?>