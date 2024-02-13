<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"
          integrity="sha512-K1N7E50C9F4MdSXyp9S1O+xnhlmaUzTnq+3OvVKg1Ib6AhT8YGh2kU1g5uPjXz3F0iKY+XCpAziq3PnGSUJ4Cg=="
          crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./includes/google_font.css"/>

    <title>404 - Page Not Found</title>
</head>

<body class="bg-gray-100 font-sans flex flex-col min-h-screen">

    <!-- Navbar -->
    <?php include_once  './includes/navbar.php'; ?>

    <!-- Content -->
    <div class="container mx-auto p-4 text-center mt-15 flex-grow">

        <h2 class="text-4xl font-bold text-gray-800 mb-4 page-title">404 - Page Not Found</h2>

        <!-- Kitten Image Container -->
        <div class="flex justify-center items-center mt-4 mb-4 rounded-lg">
            <img src="https://placekitten.com/400/350" alt="Cute Kitten" class="rounded-md shadow-md">
        </div>

        <p class="text-gray-600 mb-6">Oops! It seems like you've ventured into uncharted territory. The page you're looking for may have taken a coffee break or doesn't exist. But hey, you can always return to the <a href="https://gregoryshenefelt.com" class="text-red-600">home page</a> and explore from there!</p>

    </div>

    <!-- Footer -->
    <div class="footer fixed bottom-0 left-0 right-0 bg-blue-600 text-white">
        <p class="text-center"> Gregory Shenefelt &copy; | info@gregoryshenefelt.com | <?php echo date("Y"); ?></p>
        <audio id="chase" src="./includes/808.mp4#t=00:01:18"></audio>
    </div>

<!-- load jquery before the pages custom script -->
<!-- <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script> -->
<?= JQUERY_TAG ?>

<script>
// Shorthand for $( document ).ready()
$(function () {
    function enter() {
        let title = $(".page-title");
        $(title).css("scalex", "0.5");
    }
    function exit() {
        let title = $(".page-title");
        $(title).css("scalex", "1");
    }

    // style the 404 text pink with black outline
    $("h2").css({
        color: "pink",
        fontWeight: "700",
        textShadow: "2px 2px 2px black"
    });

    $(".page-title")
        .on("mouseenter", function () {
            $(this).css("textShadow", "2px 2px 2px green");
            $(this).css("transform", "rotate(180deg)");
        })
        .on("mouseleave", function () {
            $(this).css("textShadow", "2px 2px 2px black");
            // go the full 360 when we leave so we flip the text back   properly
            $(this).css("transform", "rotate(360deg)");
        });

    $("img").css({
        borderRadius: "50%",
        width: "40%"
    });
    $("img")
        .on("mouseenter", function () {
            $("img").css("transform", "rotate(180deg)");
        })
        .on("mouseleave", function () {
            $("img").css("transform", "rotate(360deg)");
        });
});

</script>
</body>

</html>


