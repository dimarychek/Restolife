$(document).ready(function() {
    homeCategory();
    siteMenu();
});

function homeCategory() {
    $('.front_item').hover(
        function() {
            $(this).children('a').children('.post_title').css('top', '15%');
            $(this).children('a').children('.post_content').css('opacity', 1);
        },
        function() {
            $(this).children('a').children('.post_title').css('top', '40%');
            $(this).children('a').children('.post_content').css('opacity', 0);
        }
    )
}

function siteMenu() {
    var menuItem = $('#menu li');

    menuItem.click(function() {
        if($(this).attr('class') == 'in_dev') {
            $(this).children('.indev_block').fadeIn(500);
            $(this).mouseout(function() {
                $(this).children('.indev_block').fadeOut(500);
            });

            return false;
        }
    });

    menuItem.each(function() {
        if(window.location.pathname == $(this).children('a').attr('href')) {
            $(this).addClass('active_item');
        }
    })
}