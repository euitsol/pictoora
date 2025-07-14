document.addEventListener('DOMContentLoaded', function() {
    if (document.querySelector('.logo-slider')) {
        new Swiper('.logo-slider', {
            lazy: true,
            loop: true,
            speed: 1000,
            autoplay: {
                delay: 2000,
                disableOnInteraction: false,
                pauseOnMouseEnter: true
            },
            breakpoints: {
                320: {
                    slidesPerView: 2,
                    spaceBetween: 20
                },
                640: {
                    slidesPerView: 3,
                    spaceBetween: 20
                },
                1024: {
                    slidesPerView: 4,
                    spaceBetween: 30
                }
            }
        });
    }

    if (document.querySelector('.reviews-swiper')) {
        new Swiper('.reviews-swiper', {
            loop: true,
            speed: 800,
            autoplay: {
                delay: 2000,
                disableOnInteraction: false,
                pauseOnMouseEnter: true
            },
            breakpoints: {
                640: {
                    slidesPerView: 2,
                    spaceBetween: 24
                },
                1024: {
                    slidesPerView: 3,
                    spaceBetween: 32
                }
            }
        });
    }
});
document.addEventListener('DOMContentLoaded', function () {
    $(function () {
        $('.faq-question').click(function() {
            var $answer = $(this).next('.faq-answer');
            var $icon = $(this).find('.lucide');

            $('.faq-answer').not($answer).slideUp();
            $('.faq-question .lucide').not($icon).removeClass('rotate-180');

            $answer.slideToggle();
            $icon.toggleClass('rotate-180');
        });
    });
});
