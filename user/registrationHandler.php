<?php
require_once('../helpers/init.php');

$fname = "";
$lname = "";
$email = "";
$password = "";
$role = "";
$adminCode = ""; // New field
$validAdminCode = "zabir";

// Grab values 
if (isset($_POST['fname'])) {
    $fname = $_POST['fname'];
}
if (isset($_POST['lname'])) {
    $lname = $_POST['lname'];
}
if (isset($_POST['email'])) {
    $email = $_POST['email'];
}
if (isset($_POST['password'])) {
    $password = $_POST['password'];
}
if (isset($_POST['role'])) {
    $role = $_POST['role'];
}
if (isset($_POST['adminCode'])) {
    $adminCode = $_POST['adminCode'];
}

// Validate input
$errors = array();
if (empty($fname)) {
    $errors[] = "First name is required";
}
if (empty($lname)) {
    $errors[] = "Last name is required";
}
if (empty($email)) {
    $errors[] = "Email is required";
}
if (empty($password)) {
    $errors[] = "Password is required";
}
if (empty($role)) {
    $errors[] = "Role is required";
}
if ($role === 'admin' && $adminCode !== $validAdminCode) {
    $errors[] = "Invalid admin code";
}

// If there are errors, display them
if (!empty($errors)) {
    echo "<div style='background-color: white; padding: 20px; border-radius: 5px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); border: 1px solid #ddd; text-align: center; max-width: 400px; width: 100%; margin: 0 auto;'>";
    foreach ($errors as $error) {
        echo "<p>" . $error . "</p>";
    }
    echo "</div>";
} else {
    // No errors, proceed with registration
    if (registerUser($fname, $lname, $email, $password, $role)) {
        if ($role === 'admin') {
            echo "<div style='background-color: white; padding: 50px; border-radius: 5px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); border: 1px solid #ddd; text-align: center; max-width: 400px; width: 100%; margin: 0 auto;'>";
            echo "<h2>Congratulations! Your Account Has Been Created.</h2>";
            echo "<a href='../FrontendExam/users/login.html' style='display: inline-block; background-color: #F4A261; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; margin: 0 5px;'>Proceed to Login Page</a>";
            echo "</div>";
        } else {
            echo "<div style='background-color: white; padding: 50px; border-radius: 5px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); border: 1px solid #ddd; text-align: center; max-width: 400px; width: 100%; margin: 0 auto;'>";
            echo "<h2>Congratulations! Your Account Has Been Created.</h2>";
            echo "<a href='../FrontendExam/users/login.html' style='display: inline-block; background-color: #F4A261; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; margin: 0 5px;'>Proceed to Login Page</a>";
            echo "</div>";
        }
    } else {
        echo "<div style='background-color: white; padding: 50px; border-radius: 5px; box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); border: 1px solid #ddd; text-align: center; max-width: 400px; width: 100%; margin: 0 auto;'>";
        echo "<h2>Oops! User Already Exists.</h2>";
        echo "<a href='../FrontendExam/users/register.html' style='display: inline-block; background-color: #F4A261; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; margin: 0 5px;'>Go to Registration Page</a>";
        echo "<a href='../FrontendExam/users/login.html' style='display: inline-block; background-color: #F4A261; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px; margin: 0 5px;'>Go to Login Page</a>";
        echo "</div>";
    }
}
