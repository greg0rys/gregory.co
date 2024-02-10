<?
session_start();
include_once './php_scripts/site_data.php';


function create_skills_list()
{
    if(!empty(SKILLS))
    {
        foreach(SKILLS as $item)
        {
            echo "<li class='mb-2'>{$item}</li>";
        }
    }
}

?>

<?= DOCTYPE ?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Experienced Backend Developer specializing in API development and database management. Crafting scalable and secure solutions for web applications. Contact me for your backend development needs.">
    <meta name="keywords" content="Backend Developer, API Development, Database Management, Node.js, Express.js, MongoDB, RESTful APIs, Java Developer, Ruby on Rails, C++ Developer">
    <meta name="author" content="Greg Shenefelt">
    <title><?= SITE_OWNER ?> - Backend Developer</title>
    <link href="<?= TAILWIND_URL ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
        integrity="sha512-K1N7E50C9F4MdSXyp9S1O+xnhlmaUzTnq+3OvVKg1Ib6AhT8YGh2kU1g5uPjXz3F0iKY+XCpAziq3PnGSUJ4Cg=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./css/about_styles.css"/>

</head>

<body class="bg-gray-100 font-sans">

    <? include_once './includes/navbar.php';  ?>

    <div class="container mx-auto p-4">

        <!-- Header -->
        <header class="text-center mb-8">
            <h1 class="text-4xl font-bold text-blue-600"><?= SITE_OWNER ?> - Backend Developer</h1>
            <p class="text-gray-600">Experienced in API Development and Database Management</p>
        </header>

        <!-- Main Content -->
        <section class="md:flex justify-between">

            <!-- About Me -->
            <div class="md:w-2/3 md:mr-4">
                <h2 class="text-2xl font-bold mb-4">About Me</h2>
                <p class="text-gray-700 leading-relaxed">
                    I am a passionate backend developer with extensive experience in crafting scalable and secure solutions
                    for web applications. Specializing in API development and database management, I design efficient
                    server-side systems to power the functionality of modern web applications.
                </p>
            </div>

            <!-- Skills -->

<div class="md:w-1/3">
    <h2 class="text-2xl font-bold mb-4">Skills</h2>
    <ul class="text-gray-700 skills-list">
        <? create_skills_list(); ?>
    </ul>
</div>


        </section>

        <!-- Services -->
        <section class="my-8">
            <h2 class="text-2xl font-bold mb-4">Services</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                <div class="bg-white p-6 rounded-lg shadow-md grid-item">
                    <h3 class="text-xl font-bold mb-2">API Development</h3>
                    <p class="text-gray-700">
                        Crafting RESTful APIs to connect frontend applications with robust backend systems.
                    </p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md grid-item">
                    <h3 class="text-xl font-bold mb-2">Database Management</h3>
                    <p class="text-gray-700">
                        Designing and optimizing databases to ensure efficient data storage and retrieval.
                    </p>
                </div>
                <div class="bg-white p-6 rounded-lg shadow-md grid-item">
                    <h3 class="text-xl font-bold mb-2">Java Software Development</h3>
                    <p class="text-gray-700">
                        Designing classes, data structures, creating enterprise level software packages
                    </p>
                </div>
                <!-- Add more backend service cards as needed -->
            </div>
        </section>

        <!-- Contact Information -->
        <section class="md-2 md:flex justify-between">

            <!-- Contact Information -->
            <div class="md:w-1/3">
                <h2 class="text-2xl font-bold mb-4">Contact</h2>
                <ul class="text-gray-700">
                    <li class="flex items-center mb-2">
                        <i class="far fa-envelope mr-2"></i> <?= OWNER_EMAIL ?>
                    </li>
                    <li class="flex items-center">
                        <i class="fas fa-globe mr-2"></i> <?= BASE_URI ?>
                    </li>

                    <li class="flex items-center">
                        <i class="fas fa-globe mr-2"></i> <?= OWNER_GITHUB ?>
                    </li>
                </ul>
            </div>
        </section>
    </div>

    <? include_once './includes/footer.php'; ?>
    <script>
        document.querySelectorAll("H2").forEach(val =>{
            val.className = 'about_heading';
        });
        </script>
<script src="./javascript/colors.js" type="text/javascript"> </script>
</body>
</html>
