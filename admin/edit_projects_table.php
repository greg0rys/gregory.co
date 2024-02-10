<?php
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

// Form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['project_title'];
    $url = $_POST['project_url'];
    $des = $_POST['description'];

    $sql = "INSERT INTO `my_projects` (ID, project_title, project_url, description, project_creation) VALUES (DEFAULT, '$name', '$url', '$des', DEFAULT)";

    if ($conn->query($sql) === TRUE) {
        // Redirect to the same page after form submission
        header("Location: {$_SERVER['PHP_SELF']}", true, 303);
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Delete record
if (isset($_GET['delete'])) {
    $delete_id = $_GET['delete'];

    $sql = "DELETE FROM my_projects WHERE ID = $delete_id";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

// Fetch records
$sql = "SELECT * FROM `my_projects`";
$result = $conn->query($sql);

$records = [];
if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $records[] = $row;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- for mobile -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <!-- for page and mobile -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">

    <title>Records Management</title>
    <style>
        *{
            color: #3a3153;

        }
        /* Basic styling */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        .container {
            display: grid;
            grid-template-columns: 1fr;
            gap: 20px;
        }
        .container > div {
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        form {
            max-width: 100%;
        }
        label {
            display: block;
            margin-bottom: 5px;
            color: #3a3153;

        }
        input[type="text"],
        input[type="url"],
        input[type="submit"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box; /* Ensure padding and border don't increase element's width */
            border: 2px solid #3a3153;
            color: #3a3153;


        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: #3a3153;
            border: none;
            cursor: pointer;
            border: 2px solid #3a3153;

        }
        input[type="submit"]:hover {
            background-color: #45a049;
            color: #3a3153;
            border: 2px solid #3a3153;

        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #fefdfd;
            padding: 8px;
            text-align: center;
            color: #3a3153;

        }
        th {
            background-color: #f2f2f2;
        }
        .delete-btn, .edit-btn {
            background-color: #f44336;
            color: #3a3153;
            border: none;
            cursor: pointer;
            padding: 6px 12px;
            margin: 2px;
        }
        .delete-btn:hover, .edit-btn:hover {
            background-color: #d32f2f;
        }

        @media only screen and (max-width: 600px) {
            /* Responsive table styling */
            table {
                font-size: 14px;
            }
            th, td {
                padding: 6px;
            }
        }
    </style>
</head>
<body class='bg-gray-200'>
<?php include 'admin_nav.php'; ?>

<div class="container">
    <div>
        <h2>Add Record</h2>
        <form method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="project_title" required>
            <label for="url">Project URL:</label>
            <input type="url" id="url" name="project_url" value="https://" required>
            <label for="description">Description:</label>
            <input type="text" id="description" name="description">
            <input type="submit" value="Submit">
        </form>
    </div>
    <div>
        <h2>All Records</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>URL</th>
                <th>Description</th>
                <th>Created On:</th>
                <th>Action</th>
            </tr>
            <?php foreach ($records as $record) : ?>
                <tr>
                    <td><?php echo $record['ID']; ?></td>
                    <td><?php echo $record['project_title']; ?></td>
                    <td><?php echo $record['project_url']; ?></td>
                    <td><?php echo $record['description']; ?></td>
                    <td><?php echo $record['project_creation']; ?></td>

                    <td>
                        <a class="edit-btn" href="edit.php?id=<?php echo $record['ID']; ?>">Edit</a>
                        <button class="delete-btn" onclick="deleteRecord(<?php echo $record['ID']; ?>)">Delete</button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>

    </div>
</div>

<script>
    function deleteRecord(id) {
        if (confirm("Are you sure you want to delete this record?")) {
            window.location.href = "<?php echo $_SERVER['PHP_SELF']; ?>?delete=" + id;
        }
    }
</script>

</body>
</html>

<?php
// Close connection
$conn->close();
?>
