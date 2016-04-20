<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>我的主页</title>
	<base href= "<?php echo site_url(); ?>" >
	<meta name="keywords" content="个人博客，个人网站">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/index.css">
	<link rel="stylesheet" href="css/lightbox.css">	
</head>
<body>

	<?php include 'nav.php'; ?>


	<div id="header" class="index_header"></di>
		<img src="img/bg2.jpg" class="header-bg" alt="">
		<div class="myphoto">
			<img src="img/me.jpg" class="me" alt="">
		</div>
		<div class="introduction">
			<h1>Li Danni</h1>
			<p>Love to website design :) </p>
			<ul>
				<li><a href="#">Hire Me</a></li>
				<li><a href="#">Follow Me</a></li>
			</ul>
		</div>
	</div>


	<div id="aboutme">
		<div class="container">
			<div class="title">
				<h2>about me</h2>
				<span></span>
			</div>
			<div class="content">
				<div class="about-left">
					<h3>videntur parum</h3>
					<span>GRAPHIC DESIGNER,UI/UX EXPERT</span>
					<p>LOREM IPSUM DOLOR SIT AMET, CONSECTETUER ADIPISCING ELIT, SED DIAM NONUMMY NIBH EUISMOD TINCIDUNT UT LAOREET DOLORE MAGNA ALIQUAM ERAT VOLUTPAT. UT WISI ENIM AD MINIM VENIAM, QUIS NOSTRUD EXERCI TATION ULLAMCORPER SUSCIPIT LOBORTIS NISL UT ALIQUIP EX EA COMMODO CONSEQUAT. DUIS AUTEM VEL EUM IRIURE DOLOR IN HENDRERIT IN VULPUTATE VELIT ESSE MOLESTIE CONSEQUAT, VEL ILLUM DOLORE EU FEUGIAT NULLA FAM.</p>
					<p>LOREM IPSUM DOLOR SIT AMET, CONSECTETUR ADIPISCING ELIT. SUSPENDISSE SIT AMET PURUS IPSUM. IN ANTE LEO, ELEMENTUM AT PLACERAT IN, ALIQUET NON LECTUS. NAM IMPERDIET MAGNA EU FAUCIBUS CURSUS.</p>
				</div>
				<div class="about-right">
					<a href="#"><img src="img/me3.jpg" alt=""></a>
				</div>
			</div>
		</div>
	</div>


	<div id="myservice">
		<div class="container">
			<div class="title">
				<h2>my services</h2>
				<span></span>
			</div>
			<div class="content">
				<div class="service-list top-list">
					<span class="icon1"> </span>
					<h3>PRODUCT DESIGN</h3>
					<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam</p>
				</div>
				<div class="service-list top-list">
					<span class="icon2"> </span>
					<h3>PRODUCT DESIGN</h3>
					<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam</p>
				</div>
				<div class="service-list top-list">
					<span class="icon3"> </span>
					<h3>PRODUCT DESIGN</h3>
					<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam</p>
				</div>
				<div class="service-list">
					<span class="icon4"> </span>
					<h3>PRODUCT DESIGN</h3>
					<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam</p>
				</div>
				<div class="service-list">
					<span class="icon5"> </span>
					<h3>PRODUCT DESIGN</h3>
					<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam</p>
				</div>
				<div class="service-list">
					<span class="icon6"> </span>
					<h3>PRODUCT DESIGN</h3>
					<p>Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam</p>
				</div>
			</div>
		</div>
	</div>


	<div id="portfolio">
		<div class="container">
			<div class="title">
				<h2>portfolio</h2>
				<span></span>
			</div>
			<!--单击li弹出遮罩层，给li加一个自定义属性,自定义属性通常以”data－“开头，自带的data函数会把属性值取出来 -->
			<ul class="portfolio-list">
				<!--li的“data－src”属性加载原图，即大图，img的src属性加载缩略图 -->
				<li data-src="img/port-pic1.jpg" data-width="331" data-height="208">
					<img src="img/port-pic1.jpg" alt="">
					<div class="mask">
						<span class="hover-icon"></span>
						<h3>Product Design</h3>
						<p>"LimeLight"</p>
					</div>
				</li>
				<li data-src="img/port-pic2.jpg" data-width="331" data-height="208">
					<img src="img/port-pic2.jpg" alt="">
					<div class="mask">
						<span class="hover-icon"></span>
						<h3>Product Design</h3>
						<p>"LimeLight"</p>
					</div>
				</li>
				<li data-src="img/port-pic3.jpg" data-width="331" data-height="208">
					<img src="img/port-pic3.jpg" alt="">
					<div class="mask">
						<span class="hover-icon"></span>
						<h3>Product Design</h3>
						<p>"LimeLight"</p>
					</div>
				</li>
				<li data-src="img/port-pic4.jpg" data-width="331" data-height="208">
					<img src="img/port-pic4.jpg" alt="">
					<div class="mask">
						<span class="hover-icon"></span>
						<h3>Product Design</h3>
						<p>"LimeLight"</p>
					</div>
				</li>
				<li data-src="img/port-pic5.jpg" data-width="331" data-height="208">
					<img src="img/port-pic5.jpg" alt="">
					<div class="mask">
						<span class="hover-icon"></span>
						<h3>Product Design</h3>
						<p>"LimeLight"</p>
					</div>
				</li>
				<li data-src="img/port-pic6.jpg" data-width="331" data-height="208">
					<img src="img/port-pic6.jpg" alt="">
					<div class="mask">
						<span class="hover-icon"></span>
						<h3>Product Design</h3>
						<p>"LimeLight"</p>
					</div>
				</li>
				<li data-src="img/port-pic7.jpg" data-width="331" data-height="208">
					<img src="img/port-pic7.jpg" alt="">
					<div class="mask">
						<span class="hover-icon"></span>
						<h3>Product Design</h3>
						<p>"LimeLight"</p>
					</div>
				</li>
				<li data-src="img/port-pic2.jpg" data-width="331" data-height="208">
					<img src="img/port-pic2.jpg" alt="">
					<div class="mask">
						<span class="hover-icon"></span>
						<h3>Product Design</h3>
						<p>"LimeLight"</p>
					</div>
				</li>
			</ul>
		</div>
	</div>	


	<div id="myblog">
		<div class="container">
			<div class="title">
				<h2>MY BLOG</h2>
				<span></span>
			</div>
			<div class="content clearfix">
				<ul	style="word-break:break-all;" class="blog-list">
				</ul>
				<ul style="word-break:break-all;" class="blog-list">
				</ul>
				<ul style="word-break:break-all;" class="blog-list right-ul">
				</ul>
			</div>

			<p class="more-blogs">
				Check Out My
				<a href="welcome/blog/1">BLOG</a>
				And Subscribe To Get All The Updates
			</p>
		</div>
	</div>


	<div id="projects">
		<div class="container">
			<div class="circle-bg">
				<div class="top-part">
					<p >79</p>
					<p>PROJECTS</p>
					<div class="three-cricle">
						<div class="three-circle-content top-circle-content"></div>
					</div>
				</div>
				<div class="left-part">
					<p>25</p>
					<p>CLIENTS</p>
					<div class="three-cricle">
						<div class="three-circle-content left-circle-content"></div>
					</div>
				</div>
				<div class="right-part">
					<p>100%</p>
					<p>SATISFACTION</p>
					<div class="three-cricle">
						<div class="three-circle-content right-circle-content"></div>
					</div>
				</div>
			</div>
		</div>
	</div>


	<div id="contact">
		<div class="container">
			<p>WANT TO DISCUSS ANY CREATIVE PROJCT ? <a href="welcome/contact">CONTACT ME</a></p>
		</div>
	</div>


	<?php include 'footer.php'; ?>


	<script src="js/require.js" data-main="js/index.js"></script>



</body>
</html>