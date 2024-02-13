<?php
session_start(); // Start the session to manage user authentication
include_once $_SERVER["DOCUMENT_ROOT"] . '/php_scripts/site_data.php';
include_once $_SERVER["DOCUMENT_ROOT"] . '/php_scripts/creds.php';
include_once $_SERVER["DOCUMENT_ROOT"] . '/php_scripts/db_functions.php';
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
static $logged_on = false;

if($logged_on):
    header("Location: dashboard");
endif;

$conn = new mysqli($users_db['host'], $users_db['user'], $users_db['password'], $users_db['db_name']);

// Check connection for any errors
in_error($conn);

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = $_POST['username'];
    $password = $_POST['password'];

    $result = get_site_user($conn, $username, $password);

    // Check if user exists
    if ($result->num_rows == 1) {
        // User authenticated, set session variables
        $_SESSION['username'] = $username;
        $_SESSION['logged_on'] = true;
        $logged_on = true;

        
        // you can leave the file extension off so it isn't put into the url
        // this looks for the file in the current directory unless you provide another path.
        // so I can just put dashboard and get to admin/dashboard.php
        header("Location: dashboard");
        exit();
    } else {
        // Invalid credentials, redirect back to login page with error message
        $_SESSION['bad_logon'] = true;
        $_SESSION['login_error'] = "Invalid username or password";

        // ensure that there isn't a username still stored in the session var if a bad logon is attempted
        // this ensures that the error message only shows when a bad login is attempted, and we are not just passing
        // around the old logged on username.
        if(isset($_SESSION['username']))
        {
            unset($_SESSION['username']);
        }

        // don't list admin / index.php
        // this Location will put as to the index.php page of the admin folder /admin means root => admin / index.php
        header("Location: /admin/");
        exit();
    }
} else {
    // If the form is not submitted, redirect back to the login page
    header("Location: /admin/");
    exit();
}



