define(['jquery'], function(){
	return {
		open: function(options){
			var that = this;
			this.$bigMask = $('<div class="bigmask"></div>').appendTo(document.body),
			this.$div =	$('<div class="lightbox-img"><div class="loading">loading</div><span class="close">X</span></div>');

			this.$bigMask.show().animate({        //第二个参数:指定动画运行多长时间，默认值400
				opacity: 0.83
			},800);

			//生成div,图片,close按钮,将其加到div加到遮罩层中
			var iWidth = options.width>=600?600:options.width;
			this.$div.css({
				width: iWidth,
				height: options.height,
				left: ($(window).width() - iWidth) / 2,
				top: ($(window).height() - options.height)/2
			}).appendTo(document.body);

			this.$div.show().delay(1000).animate({
				opacity: 0.83
			},800);

			//生成图片，加载图片
			var oImg = new Image();
			oImg.className = 'bigimg';
			oImg.onload = function(){
				that.$div.children('.loading').hide();
				this.width = iWidth;
				$(this).appendTo(that.$div);
			};
			oImg.src = options.src;

			this.$bigMask.on('click', function(){
				that.close();  //open对象调用close方法
			});
			$('.close').on('click', function(){
				that.close();
			});
		},
		close: function(){
			this.$bigMask.animate({
				opacity: 0
			}).hide(200);
			this.$div.animate({
				opacity: 0
			}).hide(200);

			//给close按钮注册单击事件,关闭
			/*objects.obj1.on('click', function(){
				$bigMask.animate({
					opacity: 0
				}).hide(200);
				$div.animate({
					opacity: 0
				}).hide(200);
			});

			//给遮罩层注册单击事件,关闭
			objects.obj2.on('click', function(){
				$bigMask.animate({
					opacity: 0
				}).hide(200);
				$div.animate({
					opacity: 0
				}).hide(200);
			});*/
		}
	}

});

























