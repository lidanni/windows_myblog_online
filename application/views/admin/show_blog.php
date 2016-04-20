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

      <div class="am-u-sm-12 am-u-md-6">
        <div class="am-btn-toolbar">
          <div class="am-btn-group am-btn-group-xs">
            <input id="checkAll" type="button" class="am-btn am-btn-default" value="全选">
            <input id="checkNo" type="button" class="am-btn am-btn-default" value="全不选">
            <input id="checkReverse" type="button" class="am-btn am-btn-default" value="反选">
            <input id="deleteMore" type="button" class="am-btn am-btn-default" value="删除">
            <input id="add-blog" type="button" class="am-btn am-btn-default" value="新增">
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
                  <th style="text-indent: 10px;" class="table-title">缩略图</th>
                  <th style="text-indent: 10px;" class="table-title">标题</th>
                  <th style="text-indent: 50px;" class="table-author am-hide-sm-only">配图</th>
                  <th style="text-indent: -5px;" class="table-date am-hide-sm-only">作者</th>
                  <th style="text-indent: 50px;" class="table-set">时间</th>
                  <th style="text-indent: 30px;" class="table-set">操作</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach($blogs as $blog) {
                  ?>
                  <tr>
                    <td><input type="checkbox" name="list" value="<?php echo $blog->blog_id;?>"></td>
                    <td><?php echo $blog->blog_id; ?></td>
                    <td><img width="100" height="70" src="<?php echo $blog->img; ?>"/></td>
                    <td> <a href="admin/blog_content?blog_id=<?php echo $blog->blog_id;?>"> <?php echo $blog->title;?> </a></td>
                    <td><?php echo $blog->img; ?></td>
                    <td><?php echo $blog->author; ?></td>
                    <td><?php echo $blog->add_time; ?></td>
                    <td>
                      <div>
                        <input class="update" data-id="<?php echo $blog->blog_id; ?>" type="button" value="修改">
                        <input class="delete" data-id="<?php echo $blog->blog_id; ?>" type="button" value="删除">

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
                <!--<li class="am-disabled"><a href="#">«</a></li>
                <li class="am-active"><a href="">1</a></li>
                <li><a href="#">2</a></li>
                <li><a href="#">3</a></li>
                <li><a href="#">4</a></li>
                <li><a href="#">5</a></li>
                <li><a href="#">»</a></li>-->
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

      //删除文章,传统方式删除,同步方式,页面刷新跳转
      $('.delete').on('click', function () {
        var blogId = $(this).data('id');

        if (confirm('确定是否删除记录,不可恢复!')) {
          location.href = 'admin/delete_blog?blog_id=' + blogId; //页面刷新,不跳转
        }
      });


      //更新文章
      $('.update').on('click', function () {
        var blogId = $(this).data('id');
        location.href = 'admin/update_blog?blog_id=' + blogId; //页面刷新,跳转到修改页面
      });


      //添加文章
      $('#add-blog').on('click', function(){
        location.href = "admin/add_blog_page";
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
            location.href = 'admin/delete_more?str=' + str;
          }
        }
        else{
          alert('请勾选要删除的记录!');
        }


        //    substring(开始位置,结束位置前一个)
        //    substr(开始位置,截取个数)

    });
  });
</script>


</body>
</html>
