/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

$(function() {
    $('.fa-user-circle').click(function (e) { 
        $('#page_accueil').removeClass('blur-out');
        $('#page_accueil').addClass('blur-in');
        $('.pop-up').fadeIn(1000);
        $('.pop-up').show();
            $('.close-button').click(function (e) { 
            $('.pop-up').fadeOut(700);
            $('#page_accueil').removeClass('blur-in');
            $('#page_accueil').addClass('blur-out');
            e.stopPropagation();

        });
    });
});
 
 $(function() {
    $('.promoteIcon').click(function (e) { 
        $('aside,section').removeClass('blur-out');
        $('aside,section').addClass('blur-in');
        $('#popup-flag').fadeIn(1000);
        $('#popup-flag').show();
            $('.close-button').click(function (e) { 
            $('#popup-flag').fadeOut(700);
            $('aside,section').removeClass('blur-in');
            $('aside,section').addClass('blur-out');
            e.stopPropagation();

        });
    });
});

 $(function() {
    $('.bouton-cache').click(function (e) { 
        $('aside,section').removeClass('blur-out');
        $('aside,section').addClass('blur-in');
        $('#popup-promotion').fadeIn(1000);
        $('#popup-promotion').show();
            $('.close-button').click(function (e) { 
            $('#popup-promotion').fadeOut(700);
            $('aside,section').removeClass('blur-in');
            $('aside,section').addClass('blur-out');
            e.stopPropagation();

        });
    });
});

$(function() {
    $('.bouton-1').click(function (e) { 
    $('aside,section').removeClass('blur-out');
        $('aside,section').addClass('blur-in');
        $('#popup-exit').fadeIn(1000);
        $('#popup-exit').show();
            $('.close-button').click(function (e) { 
            $('#popup-exit').fadeOut(700);
            $('aside,section').removeClass('blur-in');
            $('aside,section').addClass('blur-out');
            e.stopPropagation();

        });
   });
});

$(function() {
    $('.fa-times').click(function (e) { 
    $('aside,section').removeClass('blur-out');
        $('aside,section').addClass('blur-in');
        $('#popup-ban').fadeIn(1000);
        $('#popup-ban').show();
            $('.close-button').click(function (e) { 
            $('#popup-ban').fadeOut(700);
            $('aside,section').removeClass('blur-in');
            $('aside,section').addClass('blur-out');
            e.stopPropagation();

        });
   });
});