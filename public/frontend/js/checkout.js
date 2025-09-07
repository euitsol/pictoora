document.addEventListener('DOMContentLoaded', function () {
    $(function () {
        //Active deactivate step
        $('.step, .step-text').click(function () {
            const step = $(this).data('step');
            $('.step').removeClass('step-active').addClass('step-inactive');
            $('#step-' + step).removeClass('step-inactive').addClass('step-active');
            $('.step-text').removeClass('text-active').addClass('text-inactive');
            $('#step-' + step + '-text').removeClass('text-inactive').addClass('text-active');
        });
    });
});
