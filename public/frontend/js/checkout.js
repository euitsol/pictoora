document.addEventListener('DOMContentLoaded', function () {
    $(function () {
        let currentStep = 1;

        switchToStep(1);

        //Active deactivate step
        $('.step, .step-text').click(function () {
            const step = $(this).data('step');
            $('.step').removeClass('step-active').addClass('step-inactive');
            $('#step-' + step).removeClass('step-inactive').addClass('step-active');
            $('.step-text').removeClass('text-active').addClass('text-inactive');
            $('#step-' + step + '-text').removeClass('text-inactive').addClass('text-active');
        });

        $('.cart-step-btn').click(function () {
            console.log('Cart step clicked');
            switchToStep(1);
        });

        $('.delivery-step-btn').click(function () {
            console.log('Delivery step clicked');
            switchToStep(2);
        });

        $('.payment-step-btn').click(function () {
            console.log('Payment step clicked');
            switchToStep(3);
        });

        $('.next-step-btn').click(function () {
            console.log('Next step clicked');
            switchToStep(currentStep + 1);
        });

        $('.prev-step-btn').click(function () {
            console.log('Previous step clicked');
            switchToStep(currentStep - 1);
        });

        $('.shipping-option').click(function () {
            $('.shipping-option').removeClass('selected');
            $(this).addClass('selected');

            $('.shipping-option-checkmark').removeClass('opacity-100').addClass('opacity-0');
            $(this).find('.shipping-option-checkmark').removeClass('opacity-0').addClass('opacity-100');
        });
    });
});

// Step navigation function
function switchToStep(step) {
    currentStep = step;

    $('.step').removeClass('step-active').addClass('step-inactive');
    $('#step-' + step).removeClass('step-inactive').addClass('step-active');
    $('.step-text').removeClass('text-active').addClass('text-inactive');
    $('#step-' + step + '-text').removeClass('text-inactive').addClass('text-active');

    $('.mobile-step').removeClass('bg-purple-600 text-white').addClass('border-gray-300 text-gray-500');
    $('.mobile-step-' + step).removeClass('border-gray-300 text-gray-500').addClass('bg-purple-600 text-white');

    $('#cart-step').hide();
    $('#delivery-step').hide();
    $('#payment-step').hide();

    if (step === 1) {
        $('#cart-step').show();

        window.scrollToElement('#cart-step');
    } else if (step === 2) {
        $('#delivery-step').show();
        window.scrollToElement('#delivery-step');
    } else if (step === 3) {
        $('#payment-step').show();
        window.scrollToElement('#payment-step');
    }
}
