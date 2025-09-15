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

document.addEventListener("DOMContentLoaded", function () {
    const helper = document.getElementById("mobileHelper");
    const speech = helper.querySelector(".helper-speech");
    let scrollTimer;

    // Speech bubble appears after scroll pause
    window.addEventListener("scroll", function () {
        speech.classList.remove("show");       // hide speech while scrolling
        clearTimeout(scrollTimer);

        scrollTimer = setTimeout(() => {
            speech.classList.add("show");        // show after pause
        }, 2000);
    });

    // Modal logic
    const modal = document.getElementById("quoteModal");
    if (modal) {
        modal.addEventListener("show.bs.modal", function () {
            helper.style.display = "none";    // hide button + speech
        });

        modal.addEventListener("hidden.bs.modal", function () {
            helper.style.display = "block";   // show button again
        });
    }
});


