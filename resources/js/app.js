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

