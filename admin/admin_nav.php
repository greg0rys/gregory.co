<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    
    <title>admin_nav</title>

    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto+Mono&display=swap');
        * {
            font-family: "Roboto Mono", monospace; /* Use Roboto Mono font */
        }

        nav > * {
            color: #fefdfd;
            
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="bg-purple-400 p-4">
        <div class="container mx-auto flex justify-between items-center flex-col md:flex-row">
            <h1 class="text-white text-xl font-semibold">GS/admin</h1>
            <div class="flex flex-col md:flex-row items-center space-y-1 md:space-y-0 md:space-x-2">
                <a href="https://gregoryshenefelt.com/admin/dashboard" class="font-semibold hover:text-blue-600">Dashboard</a>
                <a href="https://gregoryshenefelt.com/admin/add_user" class="font-semibold hover:text-blue-600">Add User</a>
                <a href="https://gregoryshenefelt.com/admin/logout.php" class="font-semibold hover:text-blue-600">Logout</a>
                <a href="https://gregoryshenefelt.com" class="font-semibold hover:text-blue-600">
                    <i class="fas fa-external-link-alt"></i> Main Site
                </a>
                <!-- Add more links here -->
            </div>
        </div>
    </nav>
</body>
</html>
