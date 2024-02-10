// Function to open the modal
function openModal() {
    modal.style.display = 'block';
}

// Function to close the modal
function closeModal() {
    modal.style.display = 'none';
}

// Function to add a grid item with random pastel background
function addGridItem(event) {
    event.preventDefault();
    const itemName = document.getElementById('itemName').value;

    // Check if the item name is not empty
    if (itemName.trim() !== '') {
        const gridItem = document.createElement('div');
        gridItem.className = 'grid-item';
        gridItem.textContent = itemName;

        // Generate a random pastel background color
        const randomColor = generateRandomPastelColor();
        gridItem.style.backgroundColor = randomColor;

        // Add the grid item to the main content
        document.querySelector('.main-content').appendChild(gridItem);

        // Close the modal
        closeModal();
    }
}

// Function to generate a random pastel color
function generateRandomPastelColor() {
    const hue = Math.floor(Math.random() * 360);
    const pastelColor = `hsl(${hue}, 80%, 80%)`;
    return pastelColor;
}

// Get the modal and the button that opens it
const modal = document.getElementById('modal');
const addGridItemBtn = document.getElementById('addGridItemBtn');

// Event listener to open the modal when the button is clicked
addGridItemBtn.addEventListener('click', openModal);

