document.addEventListener('DOMContentLoaded', function () {
    $(function () {
        let lastScrollTop = 0;
        let isScrolling = false;
        let isMenuOpen = false;

        // Scroll behavior for header hide/show
        $(window).scroll(function() {
            if (!isScrolling) {
                window.requestAnimationFrame(function() {
                    const scrollTop = $(window).scrollTop();
                    const header = $('#main-header');

                    if (scrollTop > lastScrollTop && scrollTop > 100) {
                        header.slideUp(200);
                    } else {
                        header.slideDown(200);
                    }

                    lastScrollTop = scrollTop;
                    isScrolling = false;
                });
            }

            isScrolling = true;
        });

        // Mobile menu toggle
        $('#mobile-menu-btn').click(function() {
            const mobileMenu = $('#mobile-menu');
            const icon = $(this).find('i');

            isMenuOpen = !isMenuOpen;

            if (isMenuOpen) {
                mobileMenu.slideToggle();
                icon.attr('data-lucide', 'x');
            } else {
                mobileMenu.slideToggle();
                icon.attr('data-lucide', 'menu');
            }
        });

        // Close mobile menu when clicking on nav links
        $('#mobile-menu a').click(function() {
            const mobileMenu = $('#mobile-menu');
            const icon = $('#mobile-menu-btn').find('i');

            isMenuOpen = false;
            mobileMenu.slideToggle();
            icon.attr('data-lucide', 'menu');
        });

        // Close mobile menu when clicking outside
        $(document).click(function(event) {
            if (!$(event.target).closest('#mobile-menu-btn, #mobile-menu').length && isMenuOpen) {
                const mobileMenu = $('#mobile-menu');
                const icon = $('#mobile-menu-btn').find('i');

                isMenuOpen = false;
                mobileMenu.slideToggle();
                icon.attr('data-lucide', 'menu');
            }
        });
    });
});
