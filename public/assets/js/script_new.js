/**
 * Fusion Centrix - Global Blog Theme JavaScript
 * Core functionality for blog and all pages
 */

class FusionTheme {
    constructor() {
        this.init();
    }

    init() {
        this.setupScrollAnimations();
        this.setupNavigation();
        this.setupSmoothScroll();
        this.setupFormValidation();
        this.setupSearchDebounce();
    }

    /**
     * Setup scroll-triggered animations
     */
    setupScrollAnimations() {
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('fade-in');
                    observer.unobserve(entry.target);
                }
            });
        }, observerOptions);

        document.querySelectorAll('[data-animate], .card, .section').forEach(el => {
            observer.observe(el);
        });
    }

    /**
     * Setup navigation active states
     */
    setupNavigation() {
        const navLinks = document.querySelectorAll('nav a, .navbar-nav a');
        const currentPath = window.location.pathname;

        navLinks.forEach(link => {
            const href = link.getAttribute('href');
            if (currentPath === href || currentPath.startsWith(href + '/')) {
                link.classList.add('active');
            }
        });
    }

    /**
     * Setup smooth scroll to anchors
     */
    setupSmoothScroll() {
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', (e) => {
                const href = anchor.getAttribute('href');
                if (href !== '#') {
                    e.preventDefault();
                    const target = document.querySelector(href);
                    if (target) {
                        target.scrollIntoView({ 
                            behavior: 'smooth', 
                            block: 'start' 
                        });
                    }
                }
            });
        });
    }

    /**
     * Setup form validation
     */
    setupFormValidation() {
        const forms = document.querySelectorAll('form');
        
        forms.forEach(form => {
            // Skip newsletter form from JS validation to allow backend validation
            if (form.classList.contains('fc-newsletter-form')) {
                return;
            }
            const inputs = form.querySelectorAll('input[required], textarea[required]');
            inputs.forEach(input => {
                input.addEventListener('blur', () => {
                    if (!input.value.trim()) {
                        input.classList.add('is-invalid');
                    } else {
                        input.classList.remove('is-invalid');
                    }
                });
            });
            form.addEventListener('submit', (e) => {
                let isValid = true;
                inputs.forEach(input => {
                    if (!input.value.trim()) {
                        input.classList.add('is-invalid');
                        isValid = false;
                    } else {
                        input.classList.remove('is-invalid');
                    }
                });
                if (!isValid) {
                    e.preventDefault();
                }
            });
        });
    }

    /**
     * Debounce search input
     */
    setupSearchDebounce() {
        const searchInputs = document.querySelectorAll('.fc-search-box input, #searchInput');
        
        searchInputs.forEach(input => {
            let timeout;
            input.addEventListener('input', function() {
                clearTimeout(timeout);
                timeout = setTimeout(() => {
                    this.form?.submit();
                }, 500);
            });
        });
    }

    /**
     * Static utility: Copy to clipboard
     */
    static copyToClipboard(text) {
        return navigator.clipboard.writeText(text).then(() => true).catch(() => false);
    }

    /**
     * Static utility: Format number
     */
    static formatNumber(num) {
        return new Intl.NumberFormat('en-US').format(num);
    }

    /**
     * Static utility: Format date
     */
    static formatDate(date) {
        return new Date(date).toLocaleDateString('en-US', {
            year: 'numeric',
            month: 'short',
            day: 'numeric'
        });
    }

    /**
     * Static utility: Show notification
     */
    static showNotification(message, type = 'info', duration = 3000) {
        const notification = document.createElement('div');
        notification.className = `alert alert-${type} position-fixed`;
        notification.style.top = '20px';
        notification.style.right = '20px';
        notification.style.zIndex = '9999';
        notification.textContent = message;
        
        document.body.appendChild(notification);
        
        setTimeout(() => {
            notification.remove();
        }, duration);
    }

    /**
     * Static utility: Validate email
     */
    static validateEmail(email) {
        const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        return re.test(email);
    }

    /**
     * Static utility: Debounce function
     */
    static debounce(func, wait) {
        let timeout;
        return function executedFunction(...args) {
            const later = () => {
                clearTimeout(timeout);
                func(...args);
            };
            clearTimeout(timeout);
            timeout = setTimeout(later, wait);
        };
    }

    /**
     * Static utility: Add button loader
     */
    static addButtonLoader(buttonSelector) {
        const button = document.querySelector(buttonSelector);
        if (button) {
            button.disabled = true;
            button.dataset.originalText = button.textContent;
            button.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Loading...';
        }
    }

    /**
     * Static utility: Remove button loader
     */
    static removeButtonLoader(buttonSelector) {
        const button = document.querySelector(buttonSelector);
        if (button) {
            button.disabled = false;
            button.textContent = button.dataset.originalText || 'Submit';
        }
    }
}

// Initialize theme on document ready
document.addEventListener('DOMContentLoaded', () => {
    new FusionTheme();
});

// Export for use
if (typeof module !== 'undefined' && module.exports) {
    module.exports = FusionTheme;
}
