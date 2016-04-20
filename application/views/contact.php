<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>我的主页</title>
    <base href="<?php echo site_url(); ?>">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/blog.css">
    <link rel="stylesheet" href="css/contact.css">
</head>
</head>
<body>

    <?php include 'nav.php'; ?>


<div id="header" class="blog_header">
        <img class="header-bg" src="img/bg2.jpg" alt="">
    </div>


    <div id="contact">
        <div class="container">

            <div class="left">
                <p>
                    <label for="name">Name:</label><br/>
                    <input id="name" class="name" type="text" name="username">
                </p>
                <p>
                    <label for="email">Email:</label><br/>
                    <input id="email" class="email" type="text" name="email">
                </p>
                <p>
                    <label for="area">Question:</label><br/>
                    <textarea id="area" class="area" name="content"></textarea>
                </p>
                <input type="button" name="submit" id="submit" value="Leave Message">
            </div>

            <div class="right">
                <h3>ADDRESS</h3>
                <p>Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum. Typi non</p>
                <div>18346067490</div>
                <a href="">358947326@qq.com</a>
            </div>

        </div>
    </div>

    <?php include 'footer.php'; ?>

    <script src="js/require.js" data-main="js/contact.js"></script>

</body>
</html>