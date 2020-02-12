jQuery(document).ready(function($) {
    // Skip to content smooth scroll JavaScript

    $(document).ready(function() {
        $('.skip-link').click(function(skip) {
            skip.preventDefault();
            $('html, body').animate({scrollTop: $(this.hash).offset().top }, 500);
        });
    });

    // Menu show and hide in focus attributes

    $('.main-navigation ul li a').focus(function(){
        $(this).parent().addClass('focus');
    });

    $('.main-navigation ul li a').focusout(function(){
        if(!$(this).parent().hasClass('menu-item-has-children')) {
            $(this).parent().removeClass('focus');
        }
    });

    $('.main-navigation ul .sub-menu .menu-item:last-child').focusout(function() {
        if(!$(this).hasClass('focus')) {
            $(this).parent().parent().removeClass('focus');
        }
    });

    $(window).click(function(){
        $('.main-navigation ul li').removeClass('focus');
    });
 
    // Add class in navigation bar

    $(window).scroll(function() {
        var height = $(window).scrollTop();
        if (height > 200) {
            $('.main-navigation').addClass('fixed');
        } else {
            $('.main-navigation').removeClass('fixed');
        }
    });

    // Added class on dropdown menu span

    if ($(document).width() < 1200) {
        var $menu_item = $('.menu-item-has-children');

        $menu_item.append('<span class="caret"></span>');

        $('.caret').click(function() {
            $(this).parent().toggleClass('menu-open').siblings().removeClass('menu-open');
        });
    }

    // Add class in navigation alt search form

    $('.search-form .search-icon').click(function() {
        $('.search-form').toggleClass('search-form-show');
    });

    $('.search-form .close-icon').click(function() {
        $('.search-form').removeClass('search-form-show');
    });

    // To top Java Script

    $(window).scroll(function() {
        var height = $(window).scrollTop();
        if (height >= 200) {
            $('#up-btn').addClass('ayotothetop');
        } else {
            $('#up-btn').removeClass('ayotothetop');
        }
    });
    $('#up-btn').click(function() {
        $('html, body').animate({ scrollTop: 0 }, 1000);
    });

    // Menu close in clicking on background

    $('.navbar-toggler').click(function(){
        $('.menu-overlay-bg').addClass('show');
    });

    $('.menu-overlay-bg').click(function(){
        $('.menu-overlay-bg, .navbar-collapse').removeClass('show');
    });

    $('.navbar-toggler').click(function(){
        $('.appear-left').addClass('show');
    });

    $('.menu-overlay-bg').click(function(){
        $('.appear-left').removeClass('show');
    });
});