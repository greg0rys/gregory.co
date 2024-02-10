<?
include_once './php_scripts/site_data.php';
?>

<html>
<nav class="bg-blue-600 p-4">
    <div class="container mx-auto flex justify-between items-center">
        <h1 class="text-white text-xl font-semibold"><?= SITE_OWNER?></h1>
        <div class="flex items-center space-x-4">
            <a id="about_page" href="<?=BASE_URL .  'about' ?>" class="text-white hover:text-gray-300">About</a>
            <a id="contact_page" href="<?=BASE_URL . 'contact' ?>" class="text-white hover:text-gray-300">Contact</a>
            <a id="homepage" href="<?= BASE_URL ?>" class="text-white hover:text-gray-300">
                <i class="fas fa-external-link-alt"></i> Visit My Portfolio
            </a>
        </div>
    </div>
</nav>
</html>


<script src="./javascript/navbar_manager.js" type="text/javascript"> </script>
