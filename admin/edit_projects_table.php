<?php
include_once $_SERVER["DOCUMENT_ROOT"] . '/php_scripts/site_data.php';
include_once $_SERVER["DOCUMENT_ROOT"] . '/php_scripts/creds.php';
include_once $_SERVER["DOCUMENT_ROOT"] . '/php_scripts/db_functions.php';
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);
$conn = new mysqli($projects_db['host'], $projects_db['user'], $projects_db['password'], $projects_db['db_name']);

// check for connection errors
in_error($conn);

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

$sql = "SELECT * FROM `my_projects`";
$records= exe_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- for mobile -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <!-- for page and mobile -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <link rel="stylesheet" href="./styles/projects_edit.css">

    <title>Records Management</title>


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
