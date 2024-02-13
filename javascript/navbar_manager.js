/**
 * Given the current URL hide the navbar link for the current page that we are on. 
 */

const  site_url = 'https://www.gregoryshenefelt.com';
let current_url = document.URL;

// grab all <a> elements by id name
// unmutability 
const links = [
    document.querySelector("#about_page"),
    document.querySelector("#contact_page"),
    document.querySelector("#homepage")
];

// unmutability 
const site_pages = [
    `${site_url}/`,
    `${site_url}/about`,
    `${site_url}/contact`,
];

// hide the <a> elements based on document.URL
if (current_url === site_pages[0]) // homepage
{
    links[2].style.display = 'none';
}
else if (current_url === site_pages[1]) // about page
{
    links[0].style.display = 'none';
}
else if (current_url === site_pages[2]) // contact page
{
    links[1].style.display = 'none';
}