$(document).ready(function(){
    var altura = $('.navbar').offset().top;

    $(window).on('scroll', function(){
        if ( $(window).scrollTop() > altura ){
            $('.navbar').addClass('menu-fixed');
        } else {
            $('.navbar').removeClass('menu-fixed');
        }
    });

});

jQuery(document).ready(function ($) {

    var lastId,
        topMenu = $("#top-navigation"),
        topMenuHeight = topMenu.outerHeight(),
    // All list items
        menuItems = topMenu.find("a"),
    // Anchors corresponding to menu items
        scrollItems = menuItems.map(function () {
            var href = $(this).attr("href");
            if(href.indexOf("#") === 0){
                var item = $($(this).attr("href"));
                if (item.length) {
                    return item;
                }
            }
        });
});

