<?php

// Retrieve form data
$username = $_POST['username'];
$password = $_POST['password'];

// Hash the password
$hashedPassword = password_hash($password, PASSWORD_DEFAULT);

// Store username and hashed password in a database or file
// In a real-world scenario, you'd use a database
file_put_contents("users.txt", "$username:$hashedPassword\n", FILE_APPEND);

// Redirect user to a success page
header("Location: register_success");
exit;
?>
