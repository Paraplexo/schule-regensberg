// Source code from https://www.elegantthemes.com/blog/community/divi-mobile-menu-hack-collapsing-nested-sub-menu-items //
// Adds the collapse/expand functionality for mobile menu. //
// Only works with the corresponding CSS code added to childtheme/style.css //
(function($) {
      
    function setup_collapsible_submenus() {
        var $menu = $('#mobile_menu'),
            top_level_link = '#mobile_menu .menu-item-has-children > a';
             
        $menu.find('a').each(function() {
            $(this).off('click');
              
            if ( $(this).is(top_level_link) ) {
                $(this).attr('href', '#');
            }
              
            if ( ! $(this).siblings('.sub-menu').length ) {
                $(this).on('click', function(event) {
                    $(this).parents('.mobile_nav').trigger('click');
                });
            } else {
                $(this).on('click', function(event) {
                    event.preventDefault();
                    $(this).parent().toggleClass('visible');
                });
            }
        });
    }
      
    $(window).load(function() {
        setTimeout(function() {
            setup_collapsible_submenus();
        }, 700);
    });
 
})(jQuery);