<?php
session_start(); // get the user info from the session
$path = 'https://www.gregoryshenefelt.com/admin/';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page Manager | home </title>

    <style>

        @import url('https://fonts.googleapis.com/css2?family=Honk&display=swap');
		@import url('https://fonts.googleapis.com/css2?family=Roboto+Mono&display=swap');
		*{
    		font-family: "Roboto Mono", monospace; /* Use Roboto Mono font */
		}

        .monk-font{
            font-family: 'Honk', system-ui;
        }

        /* Basic styling */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        h1 {
            text-align: center;
            color: #333; /* Header color */
            margin-bottom: 20px; /* Spacing below the header */
        }
        ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); /* Adjust column width as needed */
            gap: 10px; /* Adjust the gap between list items */
        }
        li {
            background-color: #fefdfd;
            color: #3a3153;
            font-weight: 700;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 10px;
            text-align: center;
        }
        a {
            text-decoration: none;
            color: #333; /* Link color */
            display: block;
            padding: 10px;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        a:hover {
            background-color: #ddd; /* Hover background color */
        }
    </style>
</head>
<body class='bg-gray-100'>

<?php include 'admin_nav.php'; ?>

<div class='flex max-w-full mt-4 mb-5 text-center items-center justify-center'>
<h1 class='text-5xl monk-font'>Welcome back, <?php echo ucfirst($_SESSION['username']); ?></h1>

</div>

<!--make sure to add validation to ensure the user session variable is admin is set so people cannot just randomly come here when they want-->
<ul>
    <li>
        <a href="<?php echo $path; ?>edit_projects_table">Edit Projects Data</a>
    </li>
    <li>
        <a href="<?php echo $path; ?>edit_todos_table">Edit Todos Data</a>
    </li>

	<li>
	    <a href="<?php echo $path; ?>add_user">Add New User</a>
		</li>
</ul>
  
</body>
</html>
