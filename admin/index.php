<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start(); //start the session to begin tracking user info
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> GREGSHUB | LOGIN </title>
    <style>
                @import url('https://fonts.googleapis.com/css2?family=Roboto+Mono&display=swap');
        * {
            font-family: "Roboto Mono", monospace; /* Use Roboto Mono font */
        }
        body, html {
            height: 100%;
            margin: 0;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100%;
        }
        .form-container {
            width: 300px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        input[type="text"], input[type="password"], input[type="submit"] {
            width: 100%;
            padding: 10px;
            margin: 8px 0;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
<? include_once __DIR__ . '/admin_nav.php'; ?>

<div class="container">

    <div class="form-container">
        <h2>Login</h2>
        <!-- check for the bad logon error flag, and make sure the user has been logged out -->
        <?php if(isset($_SESSION['bad_logon']) && !isset($_SESSION['username'])): ?>
            <p class="flex size-full max-w-full h-full text-center justify-center justify-items-center items-center text-red-400">
                <?php
                echo "<span> Invalid Login&nbsp;=>&nbsp;" . date("D M j") . "</span>";
                ?>
            </p>
        <?php endif; ?>
        <form id="loginForm" action="login.php" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required>
            <input type="submit" value="Login">
        </form>
    </div>
</div>

<script>
    // document.getElementById("loginForm").addEventListener("submit", function(event) {
    //     var passwordInput = document.getElementById("password");
    //     var hashedPassword = CryptoJS.SHA256(passwordInput.value).toString(); // Encrypting password using SHA-256
    //     passwordInput.value = hashedPassword; // Updating password field with hashed value
    // });
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/crypto-js/4.0.0/crypto-js.min.js"></script> <!-- Include CryptoJS library for password encryption -->
</body>
</html>
