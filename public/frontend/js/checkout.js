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

        $('.next-step-btn').click(function () {
            console.log('Next step clicked');
            switchToStep(currentStep + 1);
        });

        $('.prev-step-btn').click(function () {
            console.log('Previous step clicked');
            switchToStep(currentStep - 1);
        });

        //Google map api key
    });
});

// Step navigation function
function switchToStep(step) {
    currentStep = step;
    $('#cart-step').hide();
    $('#delivery-step').hide();
    // $('.payment-step').hide();
    if (step === 1) {
        $('#cart-step').show();
    } else if (step === 2) {
        $('#delivery-step').show();
    } else if (step === 3) {
        $('#payment-step').show();
    }
}
