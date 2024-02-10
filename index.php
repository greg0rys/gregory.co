<?php

ini_set('display_errors', 1);
include_once './php_scripts/portfolio_db.php';
include_once './php_scripts/site_data.php';
session_start();
$g = 'test';

?>

<?= DOCTYPE ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="<?= TAILWIND_URL ?>" rel="stylesheet">
    <title><?= SITE_OWNER ?>'s Portfolio</title>
</head>

<body class="bg-gray-100 font-sans">

<!-- Navbar -->
<?php include_once  './includes/navbar.php'; ?>

<!-- grid container -->
<div class="container mx-auto p-4 my-8">
    <!-- grid of portfolio items from the db -->
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-3 xl:grid-cols-3 gap-4">
        <!-- output grid items from the db using tailwind.-->
        <?php output_html_inital_grid_from_array() ?>
    </div>

</div>

<!-- footer -->
<?php include_once  './includes/footer.php'; ?>

<script src="./javascript/colors.js" type="text/javascript"></script>
</body>

</html>
