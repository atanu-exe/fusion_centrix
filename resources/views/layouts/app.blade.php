@include('layouts.includes.header')

@yield('content')

@include('layouts.includes.footer')

@include('components.get-quote-modal')

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Don't show modal on contact page
            if (window.location.pathname === '/contact-us') {
                return;
            }

            // Check if modal was already shown recently (2-day expiration)
            const modalLastShown = localStorage.getItem('quoteModalLastShown');
            const twoDaysAgo = new Date().getTime() - (1 * 24 * 60 * 60 * 1000);

            if (modalLastShown && parseInt(modalLastShown) > twoDaysAgo) {
                return; // Modal was shown recently, skip
            }

            let modalShown = false;

            window.addEventListener('scroll', function () {
                if (!modalShown && window.scrollY > 300) {
                    const getQuoteModal = new bootstrap.Modal(document.getElementById('getQuoteModal'));
                    getQuoteModal.show();
                    localStorage.setItem('quoteModalLastShown', new Date().getTime());
                    modalShown = true;
                }
            });
        });
    </script>
