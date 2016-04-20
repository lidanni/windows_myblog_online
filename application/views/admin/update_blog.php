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
            <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">文章管理</strong> / <small>blog</small></div>
        </div>

        <div class="am-g">
            <div class="am-u-sm-12">

                <form action="admin/confirm_update" method="post">
                    修改文章信息:
                    <input name="blog_id" type="hidden" value="<?php echo $blog->blog_id; ?>">
                    <p>标题:<input name="title" type="text" value="<?php echo $blog->title; ?>"></p>
                    <p>内容:<textarea style="width: 300px; height: 65px;" name="content"><?php echo $blog->content; ?></textarea>
                    </p>
                    <p>文章配图:<input name="img" type="text" value="<?php echo $blog->img; ?>"></p>
                    <input name="author" type="hidden" value="<?php echo $blog->author;?>">
                    <p>
                        <input type="submit" value="确认修改">
                    </p>
                </form>

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


</body>
</html>
