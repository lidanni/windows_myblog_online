require(['jquery','nav','footer'], function() {
    $(function () {
        $('#form').on('submit', function () {
            var $area = $('.area'),
                $by_name = $('.by_name');
            if($area.val() == '' || $by_name.val() == ''){
                alert("请输入完整信息!");
            }
            else{
                alert("添加成功!");
            }
        });


    });
});