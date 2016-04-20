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
            <div class="am-fl am-cf">
                <strong class="am-text-primary am-text-lg">文章管理</strong> / <small>blog</small>
            </div>
        </div>

        <div class="am-g">
            <div class="am-u-sm-12">
                <div class="admin-content">
                    <div class="am-tabs am-margin" data-am-tabs>
                        <ul class="am-tabs-nav am-nav am-nav-tabs">
                            <li><a href="#tab2">详细描述</a></li>
                        </ul>
                        <div class="am-tabs-bd">
                           <div class="am-tab-panel am-fade" id="tab2">

                                <form class="am-form" action="admin/add_blog" method="post" enctype="multipart/form-data">

                                    <div class="am-g am-margin-top">
                                        <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                            文章标题
                                        </div>
                                        <div class="am-u-sm-8 am-u-md-4">
                                            <input name="title" type="text" class="am-input-sm">
                                        </div>
                                        <div class="am-hide-sm-only am-u-md-6">*必填，不可重复</div>
                                    </div>


                                    <div class="am-g am-margin-top">
                                        <div class="am-u-sm-4 am-u-md-2 am-text-right">
                                            文章主图
                                        </div>
                                        <div class="am-u-sm-8 am-u-md-4">
                                            <input type="file" class="am-input-sm" name="img">
                                        </div>
                                        <div class="am-u-sm-12 am-u-md-6">图片不能超过3M</div>
                                    </div>


                                    <div class="am-g am-margin-top-sm">
                                        <div class="am-u-sm-12 am-u-md-2 am-text-right admin-form-text">
                                            内容描述
                                        </div>
                                        <div class="am-u-sm-12 am-u-md-10">
                                            <textarea name="content" rows="10" placeholder="请使用富文本编辑插件"></textarea>
                                        </div>
                                    </div>


                                    <div class="am-g am-margin-top">
                                        <div class="am-u-sm-8 am-u-md-4 am-u-end col-end">
                                            <input name="author" type="hidden" value="<?php echo $admin->admin_id;?>" >
                                        </div>
                                    </div>


                                    <div class="am-margin">
                                        <button type="submit" class="am-btn am-btn-primary am-btn-xs">提交保存</button>
                                    </div>

                                </form>

                        </div>
                        </div>
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

</body>
</html>
