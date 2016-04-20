require(['jquery','nav','footer'], function() {
    $(function () {

        /**************************  保存留言信息  ***************************/
        $('#submit').on('click', function () {
            var $username = $('[name=username]');
            var $email = $('[name=email]');
            var $content = $('[name=content]');
            /*if($username.val()==''){
             alert('请输入用户名!');
             $username.focus();
             }*/
            /*post函数有4个参数,
             1.地址ur,
             2.数据data,
             3.回调函数callback,
             4.返回的数据类型type
             */
            $.post('welcome/message', {
                username: $username.val(),//username传到welcome的message函数中
                email: $email.val(),
                content: $content.val()
            }, function (res) {//回调函数中的代码是等服务器端通过echo返回结果后再执行的,结果返回给形参res
                if (res == 'fail') {
                    alert("请输入完整信息!");
                }
                else{
                    alert("留言成功!");
                }
            });

           /* //ajax方式监测页面是否已存在
            $('[name=username]').on('blur', function () {
                $.get('welcome/check_name', {uname: this.value}, function (res) {
                    if (res == 'fail') {
                        alert('username exists!');
                    }
                });
            });*/
        });
        /**************************  添加留言信息  ***************************/

    });
});