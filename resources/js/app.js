// Require bootstrap file
require('./bootstrap');

// Import the real Bootstrap framework
import 'bootstrap';

// Import Lightgallery scripts
import 'lightgallery.js';

// Import imagesLoaded
window.imagesLoaded = require('imagesloaded');

// Import Masonry
window.Masonry = require('masonry-layout');

// Color navbar properly
let navbar = document.getElementsByClassName('navbar')[0];
let navbar_transparent = navbar.classList.contains('bg-transparent');
let navbar_navigation = document.getElementById('navigation');
let navbar_height = navbar.offsetHeight.toString()+'px';
window.onscroll = function() {
    if (navbar_transparent) {
        if (this.scrollY > 300) {
            navbar.classList.remove('bg-transparent');
            navbar.classList.add('shadow');
        } else if (!navbar_navigation.classList.contains('show')) {
            navbar.classList.add('bg-transparent');
            navbar.classList.remove('shadow');
        }
    }
};
navbar_navigation.addEventListener('show.bs.collapse', function () {
    if (navbar_transparent) {
        navbar.classList.remove('bg-transparent');
        navbar.classList.add('shadow');
    }
});
navbar_navigation.addEventListener('hidden.bs.collapse', function () {
    if (navbar_transparent && window.scrollY < 300) {
        navbar.classList.add('bg-transparent');
        navbar.classList.remove('shadow');
    }
});
// Account for fixed navbar when required (mainly for landing page)
if (navbar.classList.contains('fixed-top')) {
    let elements_with_ids = document.querySelectorAll('[id]');
    elements_with_ids.forEach(function(element){element.setAttribute('style', element.getAttribute('style') + ';scroll-margin-top:'+navbar_height);});
    let header_text = document.getElementsByClassName('background-text')[0];
    header_text.setAttribute('style', header_text.getAttribute('style') + ';padding-top:'+navbar_height);
}
// Highlight current menu items (in the navbar)
let url_current = location.protocol + '//' + location.host + location.pathname;
let navbar_links = document.querySelectorAll('nav ul li.nav-item a');
for (let i = 0; i < navbar_links.length; i++) {
    let clean_url = navbar_links[i].getAttribute('href').split('?')[0]
    if(url_current.startsWith(clean_url)){
        navbar_links[i].closest('li.nav-item').classList.add('active');
    }
}
