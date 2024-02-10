/**
 * All functions releated to coloring HTML elements on any given page. 
 */

document.addEventListener("DOMContentLoaded", ()=>{
    let grid_items = document.querySelectorAll(".grid-item");
    let h2_collection = document.querySelectorAll(".about_heading");

    colorize_grid_items(grid_items); // if we have grid items on the page color them
    shadow_headers(h2_collection); // if we have any H2 elements add pastel text shadow.
});


// generate a random background color that is within the pastel RGB value range each time. 
function getRandomPastelColor() {

    return `rgb(${Math.floor(Math.random() * 100 + 95)},
                        ${ Math.floor(Math.random() * 100 + 155)}, 
                        ${Math.floor(Math.random() * 100 + 245)})`;
}

/**
 * 
 * @param {*} items an array of HTML elements query selector all collection type.
 * @returns null - only applies styles. 
 */
function colorize_grid_items(items)
{
    // first make sure my array isn't empty
    if(items.length <= 0)
    {
        return false;
    }

    // change each items background color.
    items.forEach(val => {
        val.style.background = getRandomPastelColor();
    })
}

function shadow_headers(headers_collection)
{
    if(headers_collection.length <= 0)
    {
        return false;
    }

    headers_collection.forEach( val => {
        val.style.textShadow = `2px 2px 2px ${getRandomPastelColor()}`;
    })
}


// let items = document.querySelectorAll(".grid-item");
// let color_letters = document.querySelector("#colorful")

// color_letters.innerHTML = make_colorful_letters(color_letters.textContent);
// color_letters.style.textShadow = '2px 2px 1px ' + getRandomPastelColor();
// function make_colorful_letters(letters)
// {
//     let spans = [];
//     for(i = 0; i < letters.length; i++)
//     {
//         spans[i] = `<span style='color: ${getRandomPastelColor()}'> ${letters.charAt(i)} </span>`;
//     }

// return spans.join("");
// }


