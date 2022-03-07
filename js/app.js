$(document).ready(function () {
    $('.dongho').hover(function () {
            // over
            $('.hover_nam1').addClass('d-flex');
        }, function () {
            $('.hover_nam1').removeClass('d-flex');
        }
    );
    $('.phukien').hover(function () {
            // over
            $('.hover_nu').addClass('d-flex');
        }, function () {
            $('.hover_nu').removeClass('d-flex');
        }
    );
});