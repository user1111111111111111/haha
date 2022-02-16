;$(function(){
	/* 메인 배너슬라이드 */
    $('#m_container .visual ul.visual_list').bxSlider({
		auto: true,
		mode: 'fade',
		autoHover: true,
		autoControls: false

    });

	/* 인증서팝업 */
	$(".patent_list > ul > li").on("click", function(e) {
		e.preventDefault();
		$(".patent_view").fadeIn();
		var v = $(this).find("img").attr("src");
		$(".patent_view img").attr("src", v);
	});
	$(".patent_view .btn_close").on("click", function(e) {
		e.preventDefault();
		$(".patent_view").fadeOut();
	});


	$('.bigImg').slick({
		slidesToShow: 1,
		slidesToScroll: 1,
		fade: true,
		arrows: false,
		swipe:false,
		asNavFor: '.prodThumb'
	});
	$('.prodThumb').slick({
		slidesToShow: 3,
		slidesToScroll: 1,
		asNavFor: '.bigImg',
		dots: false,
		arrows: true,
		touchMove:false,
		swipe:false,
		focusOnSelect: true
	});


	/* 탑 버튼 */
	$(".btn_top").on('click', function() {
		$("body, html").animate({scrollTop:0}, 500);
		return false;
	});

	/* 메인 뉴스 슬라리드*/
	$('.m_contents .section_1 ul').slick({
		arrows: true,
		autoplay: true,
		autoplaySpeed:5000,
		dots: false,
		infinite: true,
		speed: 300,
		slidesToShow: 5,
		slidesToScroll: 5,
		responsive: [
			{
				breakpoint: 900,
				settings: {
					arrows: true,
					slidesToShow: 2,
					slidesToScroll: 1
				}
			},
			{
				breakpoint: 600,
				settings: {
					arrows: true,
					slidesToShow: 1,
					slidesToScroll: 1
				}
			}
		]
	});

	/* snb 슬라이드메뉴 */
	$('.snb strong').each(function(i) {
		$(this).on('click', function() {
			$('.snb strong').each(function(j) {
				if (i == j) {
					$(this).next('ul').slideToggle();
					$(this).toggleClass("on");
					$('#contTop .bg').fadeToggle();
				} else {
					$(this).next('ul').slideUp();
					$(this).removeClass("on");
				}
			});
			return false;
		});
	});

	$('.tabMenu strong').each(function(i) {
		$(this).on('click', function() {
			$('.tabMenu strong').each(function(j) {
				if (i == j) {
					$(this).next('ul').slideToggle();
					$(this).toggleClass("on");
				} else {
					$(this).next('ul').slideUp();
					$(this).removeClass("on");
				}
			});
			return false;
		});
	});

	$('.category02 strong').each(function(i) {
		$(this).on('click', function() {
			$('.category02 strong').each(function(j) {
				if (i == j) {
					$(this).next('ul').slideToggle();
					$(this).toggleClass("on");
				} else {
					$(this).next('ul').slideUp();
					$(this).removeClass("on");
				}
			});
			return false;
		});
	});

	/* GNB 메뉴활성화  */
	var li = $(".gnb>ul>li.menu"+sb_dep1_id);
	li.addClass("on");
	var li = $(".snb"+sb_dep1_id+sb_dep2_id);
	li.addClass("on");

	$( ".prd_cate strong" ).click(function() {
	   $(this).next().slideToggle();
	   return false;
	});


	//input[type=file] design
	var uploadFile = $('.fileBox .uploadBtn');
	uploadFile.on('change', function(){
		if(window.FileReader){
			var filename = $(this)[0].files[0].name;
		} else {
			var filename = $(this).val().split('/').pop().split('\\').pop();
		}
		$(this).parents('.fileBox').find('.fileName').val(filename);
	});


	/* Madia */
	$(window).resize(function(){
		$("#header .bg").removeAttr("style");

		var width = window.innerWidth;
		if (width<1024) {
			$("#nav>.gnb>ul>li>a").off('click');
			$("#nav>.gnb>ul>li>a").removeClass("on");
			$('#nav>.gnb>ul>li').off('mouseenter');
			$('#nav>.gnb>ul>li').off('mouseleave');
			$("#nav>.gnb>ul>li ul").off('click');
			$("#nav>.gnb>ul>li ul").removeAttr("style");
			$("#container #contTop .snb ul").removeAttr("style");

			$("#nav>.gnb>ul>li>a").on('click', function(e){
				$("#nav>.gnb>ul>li>a").removeClass("on");
				e.preventDefault();
				$(this).removeClass("on");
				$("#nav .sgnb").slideUp();

				var submenu = $(this).next(".sgnb");
				if( submenu.is(":visible") ){
				}else{
					$(this).addClass("on");
					submenu.slideDown();
				}
				return false;
			});
			//dep1 click
			var btn = $(".gnb > ul > li > a"); //<-btn
			var hasAnb3 = false;

			btn.each(function(i) {
				if (!$(this).parent().find("ul").length) {
					$(this).find(".on").hide();
				}
				$(this).on("click", function() {
					if($(this).parent().find("ul").length) {
						hasAnb3 = true;
					} else {
						hasAnb3 = false;
					}
					if (!hasAnb3) {
						location.href = $(this).attr("href");
					} 
				});
			});






		} else if (width>= 1024) {
			$("#nav>.gnb>ul>li>a").off('click');
			$('#nav>.gnb>ul>li>a').off('mouseenter');
			$('#nav>.gnb>ul>li>a').off('mouseleave');
			$("#nav>.gnb>ul>li>a").removeClass("on");
			$(".sgnb").removeAttr("style");


			// gnb메뉴 효과
			$(".gnb>ul>li").on("mouseenter", function() {
				$(this).find(".sgnb").show();
			});
			$(".gnb>ul>li").on("mouseleave", function() {
				$(this).find(".sgnb").hide();
			});
		}
	}).resize();


	$(window).resize(function(){
		$("#nav").animate({"right":-($(window).width())},0);
	}).resize();
	$(".btn_nav").on("click", function() {
		$("#nav").animate({"right":0},500);
		$('.bg').fadeIn();
	});
	$("#nav .btn_close").on("click", function() {
		$("#nav").animate({"right":-($(window).width()*1)},500);
		$('.bg').fadeOut();
	});

})








