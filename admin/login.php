<?php
include_once 'php_scripts/site_data.php';
include_once 'php_scripts/creds.php';
include_once 'php_scripts/db_functions.php';
enable_dev_mode(); // turn on error reporting

session_start(); // Start the session to manage user authentication
$host_name = 'db5015078978.hosting-data.io';
$database = 'dbs12520963';
$user_name = 'dbu5509399';
$password = 'Radiokid!!0329';

$link = new mysqli($host_name, $user_name, $password, $database);

// Check connection
if ($link->connect_error) {
    die("Connection failed: " . $link->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    // Encrypt the password using SHA-256 (matching the encryption in the login form)
     // $hashedPassword = hash('sha256', $password);

    // Prepare SQL statement to check user credentials
    $stmt = $link->prepare("SELECT * FROM users WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if user exists
    if ($result->num_rows == 1) {
        // User authenticated, set session variables
        $_SESSION['username'] = $username;
        
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
?>


