<?
include_once './php_scripts/site_data.php';
include_once 'php_scripts/creds.php';
session_start();
?>

<?= DOCTYPE ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/contact_styles.css"/>
    <link href="<?= TAILWIND_URL ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
          integrity="sha512-K1N7E50C9F4MdSXyp9S1O+xnhlmaUzTnq+3OvVKg1Ib6AhT8YGh2kU1g5uPjXz3F0iKY+XCpAziq3PnGSUJ4Cg=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Contact <?= SITE_OWNER ?></title>
</head>

<body class="bg-gray-100 font-sans">

<!-- Navbar -->
<? include_once './includes/navbar.php'; ?>

<div class="container mx-auto p-4">

    <!-- Contact Info and Form -->
    <div class="grid-container">
        <!-- Left Column - Contact Info -->
        <div class="contact-info">
            <h2 class="text-2xl font-semibold mb-4">Contact Info</h2>
            <p>Email: <?= INFO_EMAIL ?> </p>
            <p>Website: <a href="<?=BASE_URL ?>" class="text-blue-600 hover:underline"><?= BASE_URI ?></a></p>
        </div>

        <!-- Right Column - Contact Form -->
        <div class="contact-form max-w-md">
            <h2 class="text-2xl font-semibold mb-4">Send Me a Message!</h2>
            <form action="#" method="post">
                <div class="mb-4">
                    <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                    <input type="text" id="name" name="name" class="w-full border p-2 rounded">
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                    <input type="email" id="email" name="email" class="w-full border p-2 rounded">
                </div>
                <div class="mb-4">
                    <label for="message" class="block text-gray-700 text-sm font-bold mb-2">Message</label>
                    <textarea id="message" name="message" rows="4"
                              class="w-full border p-2 rounded"></textarea>
                </div>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded">Send Message</button>
            </form>
        </div>
    </div>

</div>

<? include_once './includes/footer.php'; ?>

</body>

</html>
