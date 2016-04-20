<!doctype html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>我的主页</title>
    <base href="<?php echo site_url(); ?>">
    <link rel="stylesheet" href="css/amazeui.min.css"/>
    <link rel="stylesheet" href="css/admin.css">
</head>
<body>

<?php include 'admin_header.php'; ?>

<div class="am-cf admin-main">

    <?php include 'admin_sidebar.php';?>

    <!-- content start -->
    <div class="admin-content">

        <div class="am-cf am-padding">
            <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">评论管理</strong> / <small>comment</small></div>
        </div>

        <div class="am-g">

            <div class="am-u-sm-12 am-u-md-6">
                <div class="am-btn-toolbar">
                    <div class="am-btn-group am-btn-group-xs">
                        <input id="checkAll" type="button" class="am-btn am-btn-default" value="全选">
                        <input id="checkNo" type="button" class="am-btn am-btn-default" value="全不选">
                        <input id="checkReverse" type="button" class="am-btn am-btn-default" value="反选">
                        <input id="deleteMore" type="button" class="am-btn am-btn-default" value="删除">
                    </div>
                </div>
            </div>

            <div class="am-u-sm-12 am-u-md-3">
                <div class="am-input-group am-input-group-sm">
                    <input type="text" class="am-form-field">
          <span class="am-input-group-btn">
            <button class="am-btn am-btn-default" type="button">搜索</button>
          </span>
                </div>
            </div>

        </div>

        <div class="am-g">
            <div class="am-u-sm-12">

                <table class="am-table am-table-striped am-table-hover table-main">
                    <thead>
                    <tr>
                        <th class="table-check"><input type="checkbox" /></th>
                        <th class="table-id">ID</th>
                        <th style="text-indent: -10px;" class="table-author am-hide-sm-only">文章ID</th>
                        <th style="text-indent: 10px;" class="table-title">评论内容</th>
                        <th style="text-indent: -12px;" class="table-author am-hide-sm-only">评论人姓名</th>
                        <th style="text-indent: 50px;" class="table-author am-hide-sm-only">时间</th>
                        <th style="text-indent: 6px;" class="table-author am-hide-sm-only">操作</th>

                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    foreach($comments as $comment) {
                        ?>
                        <tr>
                            <td><input type="checkbox" name="list" value="<?php echo $comment->comment_id;?>"></td>
                            <td><?php echo $comment->comment_id;?></td>
                            <td><?php echo $comment->blog_id; ?></td>
                            <td><?php echo $comment->comment; ?></td>
                            <td><?php echo $comment->by_name; ?></td>
                            <td><?php echo $comment->add_time; ?></td>

                            <td>
                                <div>
                                    <input class="delete" data-id="<?php echo $comment->comment_id; ?>" type="button" value="删除">

                                </div>
                            </td>
                        </tr>
                        <?php
                    }
                    ?>
                    </tbody>
                </table>

                <div class="am-cf">
                    共<?php echo $total_rows; ?>条记录
                    <div class="am-fr">
                        <ul class="am-pagination">
                           <?php echo $this->pagination->create_links(); ?>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- content end -->
</div>

<a href="#" class="am-icon-btn am-icon-th-list am-show-sm-only admin-menu" data-am-offcanvas="{target: '#admin-offcanvas'}"></a>

<footer>
    <hr>
    <p class="am-padding-left">© Design by Li Danni 2015.</p>
</footer>


<script src="js/jquery.js"></script>
<script src="js/amazeui.min.js"></script>
<script>
    $(function(){

        //删除评论
        $('.delete').on('click', function () {
            var commentId = $(this).data('id');

            if (confirm('确定是否删除记录,不可恢复!')) {
                location.href = 'admin/delete_comment?id=' + commentId; //页面刷新,不跳转
            }
        });

        //全选,反选,删除按钮
        $('#checkAll').on('click', function(){
            $('[name=list]').prop('checked', true);
        });
        $('#checkNo').on('click',function(){
            $('[name=list]').prop('checked',false);
        });
        $('#checkReverse').on('click', function(){
            $('[name=list]').each(function(){
                this.checked=!this.checked;
            });
        });

        //删除多条
        $('#deleteMore').on('click', function(){
            var string = '';
            var $list = $(':checked');
            for(var i=0; i<$list.length; i++) {
                string += $list.eq(i).val() + ',';
            }
            var str = string.substring(0,string.length-1);

            if(str != ''){
                if (confirm('确定是否删除记录,不可恢复!')) {
                    location.href = 'admin/delete_more_comment?str=' + str;
                }
            }
            else{
                alert('请勾选要删除的记录!');
            }

        });
    });
</script>


</body>
</html>
