require(['jquery'], function() {
    $(function () {
        var $nav = $('#nav'),
            $navMenuBox = $('.nav-menu-box', $nav),
            $navOpenIcon = $('.nav-open-icon', $nav),
            $navCloseIcon = $('#nav-close-icon', $nav);
        $navOpenIcon.on('click', function () {
            $navMenuBox.animate({top: 0});
        });
        $navCloseIcon.on('click', function () {
            $navMenuBox.animate({top: -192});
        });
    });
});


