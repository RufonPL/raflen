var APP = {
	getMaxHeight: function(el) {
		var heights = [];
		$(el).each(function() {
			$(this).css('min-height', '0');
			$(this).css('max-height', 'none');
			$(this).css('height', 'auto');
			
			heights.push($(this).height());
		});
			
		var max_h = Math.max.apply(Math, heights);
		return max_h;
	},
	home_slider_init: function() {
		if($('.flexslider').length) {
			$('.flexslider').flexslider({
				animation: "fade",
				slideshowSpeed:5000,
				pauseOnHover:true,
				controlsContainer: $(".custom-controls-container"),
				customDirectionNav: $(".custom-navigation a"),
				controlNav:true,
			});
		}
	},
	home_slider_mobile: function() {
		var slider = $('.flexslider');
		$(slider).css({'left':'0px'});
		if($(window).width()<768) {
			var sw = $(slider).width();
			var ww = $(window).width();
			if(sw > ww) {
				$(slider).css({'left':-((sw-ww)/2)+'px'});	
			}else {
				$(slider).css({'left':'0px'});
			}	
		}
	},
	slide_down: function() {
		if($('#slide-down').length) {
			var slide_down_btn = $('#slide-down');
			var btn_offset = $(slide_down_btn).offset().top+45;
			$(slide_down_btn).off('click');	
			$(slide_down_btn).on('click', function(e) {
				e.preventDefault();
				$('body, html').animate({
					'scrollTop' : btn_offset+'px'
				}, 800);
			});
		}
	},
	boxes_adjust: function() {
		if($(window).width()>972) {
			var box_image_col = $('.box-image-col').outerHeight();
			var box_text_col = $('.box-text-col').outerHeight();
			if(box_text_col > 345) {
				$('.box-image-col, .box-image-col img').css({'min-height':box_text_col+'px'});	
			}else {
				$('.box-image-col, .box-image-col img').css({'min-height':'345px'});
			}
		}else {
			$('.box-image-col, .box-image-col img, .box-col').css({'min-height':'1px'});
			$('.box-image-col').find('img').css({'position':'relative'});
		}
	},
	boxes_swap:function() {
		$('.boxes').each(function() {
			var image = $(this).find('.box-image-col img');
			$(image).css({'left':'0px'});
            var swap1 = $(this).find('.box-swap1');
            var swap2 = $(this).find('.box-swap2');
			var swap1c = $(swap1).html();
            var swap2c = $(swap2).html();
			if($(window).width()>972) {
				if($(swap1).hasClass('box-text-col')) {
					$(swap1).removeClass('box-text-col').addClass('box-image-col');	
					$(swap1).html(swap2c);	
					$(swap2).html(swap1c);
				}else {
					$(swap2).removeClass('box-image-col').addClass('box-text-col');
				}
			}else {
				var iw = $(image).width();
				var ww = $(window).width();
				if(iw > ww) {
					$(image).css({'left':-((iw-ww)/2)+'px'});	
				}else {
					$(image).css({'left':'0px'});
				}	
				if($(swap1).hasClass('box-image-col')) {
					$(swap1).removeClass('box-image-col').addClass('box-text-col');
					$(swap1).html(swap2c);	
					$(swap2).html(swap1c);
				}else {
					$(swap2).removeClass('box-text-col').addClass('box-image-col');
					/* $(swap1).html(swap1c);	
					$(swap2).html(swap2c); */
				}
			}
        });
	},
	header_image_adjust:function() {
		var image = $('.page-header-image img');
		$(image).css({'left':'0px'});
		var iw = $(image).width();
		var ww = $(window).width();
		if(iw > ww) {
			$(image).css({'left':-((iw-ww)/2)+'px'});	
		}	
	},
	partners_carousel_init: function() {
		$('#partners').owlCarousel({
			loop: $('#partners .partner').size() > 1 ? true : false,
			margin:10,
			nav:true,
			autoplay:true,
			autoplayTimeout:5000,
			touchDrag:true,
			autoplayHoverPause:true,
			pullDrag:false,
			mouseDrag:false,
			callbacks: true,
			controlsClass:'partners-controls',
			navText: [
			   "<i class='fa fa-chevron-left fa-18 color4 absolute-center-both'></i>",
			   "<i class='fa fa-chevron-right fa-18 color4 absolute-center-both'></i>"
			],
			responsive:{
				0:{
					items:1
				},
				480: {
					items:2
				},
				768:{
					items:3
				},
				1024:{
					items:4
				}
			}
		});
	},
	parallax: function() {
		if($(window).width()>=769) {
			var y = $(window).scrollTop();
			if($('.about-parallax').length) {
				$(".about-parallax").css({'background-position':'50% ' + parseInt(-y / 5) + 'px', 'opacity':'1'});
			};
			if($('.ph-parallax').length) {
				$(".ph-parallax").css({'background-position':'50% ' + parseInt(-y / 5) + 'px', 'opacity':'1'});
			};
		}else {
			if($('.about-parallax').length) {
				$(".about-parallax").css({'background-position':'50% 50%', 'opacity':'1'});
			};
			if($('.ph-parallax').length) {
				$(".ph-parallax").css({'background-position':'50% 50%', 'opacity':'1'});
			};
		}
	},
	nav_pills_height: function() {
		var el = $('.menu-tabs .nav-pills li');
		var el_h = this.getMaxHeight(el);
		console.log(el_h);
		$(el).find('a').css({'min-height': el_h+'px'});
	},
	lightbox: function() {
		function lightbox(a) {
			$(a).attr('data-imagelightbox', 'lightbox');	
		}
		lightbox('.gallery-item a');
	},
	
	onDOMready: function() {
		this.home_slider_init();
		this.partners_carousel_init();
		this.boxes_swap();
		this.lightbox();
	},
	onResize: function() {
		function on_resize(c,t) {
			onresize=function() {
				clearTimeout(t);
				t=setTimeout(c,100)
		};return c};
		on_resize(function() {
			APP.slide_down();
			APP.boxes_swap();
			APP.boxes_adjust();
			APP.home_slider_mobile();
			APP.header_image_adjust();
			//APP.nav_pills_height();
		});
		onresize();	
	}
}

jQuery(window).bind('load resize scroll', function() {
	APP.parallax();
});

jQuery(document).ready(function($) {
	APP.onDOMready();
	APP.onResize();
	
	if ($(window).width() > 768) {  
		$('.navbar .dropdown > a').click(function(){
			location.href = this.href;
		}); 
	} 
	/* 
	$('#partners').on('initialized.owl.carousel', function(e){
		var count = e.item.count;
		var controls = $('.owl-nav');
		count < 2 ? controls.hide() : controls.show();
	});
	$('#partners').owlCarousel({
		loop: $('#partners .partners-item').size() > 1 ? true : false,
		margin:10,
		nav:true,
		autoplay:true,
		autoplayTimeout:3000,
		touchDrag:false,
		autoplayHoverPause:true,
		pullDrag:false,
		mouseDrag:false,
		callbacks: true,
		controlsClass:'partners-controls',
		navText: [
		   "<i class='fa fa-chevron-left'></i>",
		   "<i class='fa fa-chevron-right'></i>"
		]
		responsive:{
			0:{
				items:2
			},
			480: {
				items:4
			},
			768:{
				items:5
			},
			1024:{
				items:7
			}
		}
	}); */
	
	
});

				
				

				
