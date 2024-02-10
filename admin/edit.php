<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
// Database connection
$host = 'db5015067095.hosting-data.io';
$username = 'dbu942845';
$password = 'Radiokid!!0329';
$database = 'dbs12512233';

$conn = new mysqli($host, $username, $password, $database) or die("ERRRR");

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if ID is provided
if (!isset($_GET['id'])) {
    die("No ID provided");
}

$id = $_GET['id'];

// Fetch record to be edited
$sql = "SELECT * FROM `my_projects` WHERE ID = $id";
$result = $conn->query($sql);

if ($result->num_rows === 0) {
    die("Record not found");
}

$record = $result->fetch_assoc();

// Handle form submission for updating record
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $des = $_POST['description'];
    $email = $_POST['email'];

    $sql = "UPDATE my_projects SET project_title='$name', description='$des', project_url='$email' WHERE ID=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";

    } else {
        echo "Error updating record: " . $conn->error;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Record</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Basic styling */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        form {
            max-width: 400px;
            margin: 0 auto;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input[type="text"],
        input[type="url"],
        input[type="submit"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box; /* Ensure padding and border don't increase element's width */
        }
        input[type="submit"],
        .edit-btn,
        .delete-btn {
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
            padding: 8px 16px;
            border-radius: 5px;
            text-decoration: none;
            display: inline-block;
            margin-right: 5px;
        }
        input[type="submit"]:hover,
        .edit-btn:hover,
        .delete-btn:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<?php include 'admin_nav.php'; ?>

<h2>Edit Record</h2>
<form method="post">
    <label for="name">Name:</label><br>
    <input type="text" id="name" name="name" value="<?php echo $record['project_title']; ?>" required><br><br>
    <label for="description">Project Description:</label><br>
    <input type="text" id="description" name="description" value="<?php echo $record['description']; ?>" required><br><br>
    <label for="email">Email:</label><br>
    <input type="url" id="email" name="email" value="<?php echo $record['project_url']; ?>" required><br><br>
    <input type="submit" value="Update">
</form>

</body>
</html>

<?php
// Close connection
$conn->close();
?>
