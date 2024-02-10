function play_audio(){
    let audio = document.querySelector("#chase");
    audio.play();


}

// Function to generate random pastel background
function generateRandomPastelBackground(element, contrastColor) {
    var hue = Math.floor(Math.random() * 360);
    var saturation = '60%'; // Adjust saturation as needed
    var lightness = '80%'; // Adjust lightness as needed

    // Apply random pastel gradient background
    element.style.background = 'linear-gradient(45deg, hsl(' + hue + ', ' + saturation + ', ' + lightness + '), hsl(' + (hue + 45) + ', ' + saturation + ', ' + lightness + '))';
    element.style.color = contrastColor; // Set text color for contrast
}

// JavaScript code for random pastel background
document.addEventListener('DOMContentLoaded', function () {

    // Apply random pastel backgrounds to grid items
    var gridItems = document.querySelectorAll('.grid-item');
    gridItems.forEach(function (item) {
        generateRandomPastelBackground(item);
        item.addEventListener('click', function () {
            animateGridItem(item);
        });
    });


    // Apply random pastel backgrounds to sidebar and footer
    var sidebar = document.querySelector('.left-sidebar');
    var footer = document.querySelector('.footer');

    generateRandomPastelBackground(sidebar);
    generateRandomPastelBackground(footer);

    // Apply random pastel background to GREGSHUB heading with contrasting text color
    var gregsHubHeading = document.querySelector('.sidebar-heading');
    generateRandomPastelBackground(gregsHubHeading, '#fff'); // Set contrasting text color to white
    gregsHubHeading.classList.add('nerd-font-mono'); // Add class for font style

    // Button to add a new grid item
    var addGridItemBtn = document.getElementById('addGridItemBtn');
    addGridItemBtn.addEventListener('click', function () {
        addGridItem();
    });
    
    var song = document.querySelector("#songBtn");
    song.addEventListener("click", play_audio);
});


// JavaScript code for animation
function animateGridItem(gridItem) {
    gridItem.classList.add('open');
    setTimeout(function () {
      console.log(gridItem.dataset.url);
        window.location.href = gridItem.dataset.url;
        gridItem.classList.remove('open'); // Remove 'open' class after redirection
    }, 500);
}

// JavaScript code to add a new grid item
function addGridItem() {
    var mainContent = document.querySelector('.main-content');
    var newGridItem = document.createElement('div');
    newGridItem.classList.add('grid-item');
    newGridItem.textContent = 'New Item'; // Change the content as needed
    mainContent.appendChild(newGridItem);

    // Apply random pastel background directly after a slight delay
    setTimeout(function () {
        generateRandomPastelBackground(newGridItem);
    }, 10);

    newGridItem.addEventListener('click', function () {
        animateGridItem(newGridItem);
    });
}



