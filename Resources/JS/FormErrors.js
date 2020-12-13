$(function () {
    'use strict';

    var usernameError = true,
            emailError = true,
            messageError = true;

    $('.username').blur(function () {
        if ($(this).val() === '') {
            $(this).css('border', '1px solid #f00');
            $(this).parent().find('.astr').fadeIn(200);
            usernameError = true;
        } else if ($(this).val().length <= 3) {
            $(this).css('border', '1px solid #f00');
            $(this).parent().find('.astr').fadeOut(200);
            $(this).parent().find('.custom-alert').fadeIn(200);
            usernameError = true;
        } else {
            $(this).css('border', '1px solid #080');
            $(this).parent().find('.custom-alert').fadeOut(200);
            usernameError = false;
        }
    });

    $('.email').blur(function () {
        if ($(this).val() === '') {
            $(this).css('border', '1px solid #f00');
            $(this).parent().find('.astr').fadeIn(200);
            $(this).parent().find('.custom-alert').fadeIn(200);
            emailError = true;
        } else {
            $(this).css('border', '1px solid #080');
            $(this).parent().find('.astr').fadeOut(200);
            $(this).parent().find('.custom-alert').fadeOut(200);
            emailError = false;
        }
    });

    $('.message').blur(function () {
        if ($(this).val() === '') {
            $(this).css('border', '1px solid #f00');
            $(this).parent().find('.astr').fadeIn(200);
            usernameError = true;
        } else if ($(this).val().length <= 10) {
            $(this).css('border', '1px solid #f00');
            $(this).parent().find('.astr').fadeOut(200);
            $(this).parent().find('.custom-alert').fadeIn(200);
            messageError = true;
        } else {
            $(this).css('border', '1px solid #080');
            $(this).parent().find('.custom-alert').fadeOut(200);
            messageError = false;
        }
    });

    $('.contcat-form').submit(function (e) {
        if (usernameError === true || emailError === true || messageError === true) {
            e.preventDefault();
            $('.username, .email, .message').blur();
        }
    });
});