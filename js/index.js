require(['jquery','lightbox','nav','footer'], function($, lb) {
	$(function(){
		/**************************  portfolio  ***************************/
		$('#portfolio li').hover(function () {
			$(this).children('img').stop().animate({
				width: 305,
				height: 193,
				marginLeft: -10,
				marginTop: -7
			});
			$(this).children('.mask').stop().show().animate({
				opacity: 0.84
			});
		}, function () {
			$(this).children('img').stop().animate({
				width: 285,
				height: 180,
				marginLeft: 0,
				marginTop: 0
			});
			$(this).children('.mask').stop().animate({
				opacity: 0
			});
		});

		$('#portfolio li').on('click', function () {
			lb.open({
				src: $(this).data('src'),
				width: $(this).data('width'),
				height: $(this).data('height')
			});
		});
		/**************************  portfolio  ***************************/


		/**************************  myblog  ***************************/
		var $uls = $('#myblog ul');
		var bload = false;//标识位,标识是否加载完毕,这次加载完毕才能加载下一批
		var iPage = 1;
		var bEnd = false;//标识是否是最后一页,如果是最后一页就不要在发送请求了
		var $minUl2 = null;

		function loadData(){
			//url,data,callback,type
			$.get('welcome/get_blogs',{page: iPage++}, function(res){
				bEnd = res.isEnd;
				//setTimeout(function(){
				for(var i=0; i<res.data.length; i++){
					var blog = res.data[i];
					var html = '<li>'
							+ '<img class="img" src="'+blog.img+'" alt="">'
							+ '<h3><a class="title" href="welcome/blog/'+blog.blog_id+'">'+blog.title+'</a></h3>'
							+ '<span class="author">'+blog.admin_name+'</span>'
							+ '<p class="des">'+blog.content+'</p>'
							//+ '<p class="add_time">'+blog.add_time+'</p>'
							+ '<a class="seemore" href=" welcome/blog/'+blog.blog_id+'">SEE MORE</a>'
							+ '</li>';
					var $minUl = getMinUl();
					$minUl.append(html);
				}
				$minUl2 = getMinUl();
				bload = true;
				//},2000);
			}, 'json');
		};

		loadData();

		function getMinUl(){
			var $minUl = $uls.eq(0);//返回3个ul中的一个,并且是jquery对象
			for(var i=1; i<$uls.length; i++){
				if($uls.eq(i).height()<$minUl.height()){
					$minUl = $uls.eq(i);
				}
			}
			return $minUl;
		}

		$(window).on('scroll', function(){
			var iScrollTop = $(window).scrollTop(),
					iWinHeight = $(window).height();

			if(iScrollTop + iWinHeight + 32 >= $minUl2.height() + $minUl2.offset().top && bload == true && !bEnd){
				loadData();
				bload=false;
			}
		});
		/**************************  myblog  ***************************/

	});
});




























