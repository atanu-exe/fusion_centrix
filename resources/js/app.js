import './bootstrap';
import lightGallery from 'lightgallery';
import lgThumbnail from 'lightgallery/plugins/thumbnail';
import lgZoom from 'lightgallery/plugins/zoom';

// LightGallery Styles
import 'lightgallery/css/lightgallery.css';
import 'lightgallery/css/lg-thumbnail.css';
import 'lightgallery/css/lg-zoom.css';

document.addEventListener("DOMContentLoaded", () => {
    const galleryEl = document.getElementById('lightgallery');
    if (galleryEl) {
        lightGallery(galleryEl, {
            plugins: [lgThumbnail, lgZoom],
            speed: 500,
             thumbnail: true
        });
    }
});
document.addEventListener("DOMContentLoaded", function () {
    const menuToggle = document.getElementById("menuToggle");
    const mainMenu = document.getElementById("mainMenu");

    menuToggle.addEventListener("click", function () {

        mainMenu.classList.toggle("show");
    });

    // Auto close menu when clicking a link (mobile UX)
    mainMenu.querySelectorAll("a").forEach(link => {
        link.addEventListener("click", () => {
            mainMenu.classList.remove("show");
        });
    });
});



