require(['jquery'], function() {
    $(function () {
        var $icon = $('.to-top');

        $(window).on('scroll', function () {
           if($(window).scrollTop()>300){
               $icon.fadeIn(500);
           }else{
               $icon.fadeOut(500);
           }
            //alert("haha");
        });

        $icon.on('click', function(){
           var timer = setInterval(function(){
               $(window).scrollTop($(window).scrollTop()-20);
               if($(window).scrollTop() <= 0){
                   clearInterval(timer);
               }
           },3);
        });

    });
});
