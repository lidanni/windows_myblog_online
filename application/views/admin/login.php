<!DOCTYPE html>
<html>
<head lang="en">
  <meta charset="UTF-8">
  <title>我的主页</title>
  <base href="<?php echo site_url(); ?>">
  <link rel="stylesheet" href="css/amazeui.min.css"/>
  <link rel="stylesheet" href="css/admin.css">
  <style>
    .header {
      text-align: center;
    }
    .header h1 {
      font-size: 200%;
      color: #333;
      margin-top: 30px;
    }
    .header p {
      font-size: 14px;
    }
  </style>
</head>
<body>
<div class="header">
  <div class="am-g">
    <h1>Web ide</h1>
    <p>Integrated Development Environment<br/>代码编辑，代码生成，界面设计，调试，编译</p>
  </div>
  <hr />
</div>
<div class="am-g">
  <div class="am-u-lg-6 am-u-md-8 am-u-sm-centered">
    <h3>管理员登录</h3>
    <hr>
    <div class="am-btn-group">
      <a href="#" class="am-btn am-btn-secondary am-btn-sm">Github</a>
      <a href="#" class="am-btn am-btn-success am-btn-sm">Google+</a>
      <a href="#" class="am-btn am-btn-primary am-btn-sm">stackOverflow</a>
    </div>
    <br>
    <br>

    <form action="admin/check_login" method="post" class="am-form">
      <label for="email">用户名:</label>
      <input type="text" name="admin_name" id="email" value="">
      <br>
      <label for="password">密码:</label>
      <input type="password" name="admin_pwd" id="password" value="">
      <br>
      <label for="remember-me">
        <input id="remember-me" type="checkbox">
        记住密码
      </label>
      <br />
      <div class="am-cf">
        <input type="submit" name="" value="登 录" class="am-btn am-btn-primary am-btn-sm am-fl">
        <input type="submit" name="" value="忘记密码 ^_^? " class="am-btn am-btn-default am-btn-sm am-fr">
      </div>
    </form>
    <hr>
    <p>© Design by Li Danni 2015</p>
  </div>
</div>

<script src="js/jquery.js"></script>

</body>
</html>