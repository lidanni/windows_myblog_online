<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>我的主页</title>
	<base href="<?php echo site_url(); ?>">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/blog.css">
</head>
<body>

	<?php include 'nav.php'; ?>

	<div id="header" class="blog_header">
		<img class="header-bg" src="img/bg2.jpg" alt="">
	</div>

	<div id="content">
		<div class="container">
			<img src="img/single.jpg" alt="">

			<p style="word-break:break-all;" class="blog_title">
				<?php echo $blog->title; ?>
			</p>

			<p style="word-break:break-all;" class="blog_content">
				<?php echo $blog->content; ?>
			</p>

			<div class="author">
				<p>Written by <span><?php echo $blog->admin_name; ?></span></p>
				<img src="<?php echo $blog->admin_photo; ?>" alt="">
				<p class="des">View all posts by: <span><?php echo $blog->admin_name; ?></span></p>
			</div>

			<p class="article">Article Comment</p>
			<ul class="blog_comment">
				<?php
					foreach($blog->comments as $comment) {
				?>
					<li><?php echo $comment->comment; ?>-------<?php echo $comment->by_name;?><span style="float: right;"><?php echo $comment->add_time;?></span><li>
				<?php
					}
				?>
			</ul>

			<form id="form" action="welcome/comment" method="post">
				<p class="add" >Add New Comment</p>
				<div class="add-comment">
					<p>
						<input type="hidden" name="blog_id" value="<?php echo $this->uri->segment(3);?>">
					</p>

					<p>
						<span>*</span>
						<textarea name="comment" class="area"></textarea>
					</p>

					<p class="yourname">Your name:
						<span class="necessary">*</span>
						<input class="by_name" name="by_name" type="text">
					</p>
					
					<input type="submit" class="submit" value="submit">
				</div>
			</form>

		</div>
	</div>

	<?php include 'footer.php'; ?>

	<script src="js/require.js" data-main="js/blog.js"></script>

</body>
</html>