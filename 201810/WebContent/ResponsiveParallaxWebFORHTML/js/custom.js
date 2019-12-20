// JavaScript Document
$(document).ready(function() {
    
	//브라우저 해상도 == 세션 영역 해상도 구현
	var b_width = $(window).width();
	var b_height = $(window).height();
	$("section").height(b_height);
	
	if(b_width <= 1280){
		//메뉴 영역 조정
		$(".menu_list").css("display", "none");
		$(".menu_btn img").css("margin-left","0px");
		$(".menu_btn img").attr("src", "imgs/menu_btn_off.png");	
		$(".menu_btn img").attr("alt", "메뉴 영역 닫힌 상태 버튼");	
		$(".menu_btn img").attr("title", "메뉴 영역 닫힌 상태 버튼");
	
		//로고 영역 조정
		$(".logo").css("bottom", "0px");
		$(".logo").css("left", "0px");
		$(".logo img").css("width", "100px");
		
		//main_wrap 영역 조정
		$(".main_wrap").css("display", "none");
		
		//bottom_wrap 영역 조정
		$(".bottom_wrap").css("width", "100%");
		$(".responsive_zone").css("width", "100%");
	}
	
	//리사이즈 브라우저 해상도 == 세션 해상고 구현
	$(window).on("resize", function(){
		b_width = $(window).width();
		b_height = $(window).height();
		$("section").height(b_height);

		if(b_width <= 1280){
			//메뉴 영역 조정
			$(".menu_list").css("display", "none");
			$(".menu_btn img").css("margin-left","0px");
			$(".menu_btn img").attr("src", "imgs/menu_btn_off.png");	
			$(".menu_btn img").attr("alt", "메뉴 영역 닫힌 상태 버튼");	
			$(".menu_btn img").attr("title", "메뉴 영역 닫힌 상태 버튼");
		
			//로고 영역 조정
			$(".logo").css("bottom", "0px");
			$(".logo").css("left", "0px");
			$(".logo img").css("width", "100px");
			
			//main_wrap 영역 조정
			$(".main_wrap").css("display", "none");
			
			//bottom_wrap 영역 조정
			$(".bottom_wrap").css("width", "100%");
			$(".responsive_zone").css("width", "100%");
		}

		if(b_width > 1280){
			//메뉴 영역 조정
			$(".menu_list").css("display", "block");
			$(".menu_btn img").css("margin-left","100px");
			$(".menu_btn img").attr("src", "imgs/menu_btn_on.png");	
			$(".menu_btn img").attr("alt", "메뉴 영역 열린 상태 버튼");	
			$(".menu_btn img").attr("title", "메뉴 영역 열린 상태 버튼");
		
			//로고 영역 조정
			$(".logo").css("bottom", "50px");
			$(".logo").css("left", "50px");
			$(".logo img").css("width", "200px");
			
			//main_wrap 영역 조정
			$(".main_wrap").css("display", "block");
			
			//bottom_wrap 영역 조정
			$(".bottom_wrap").css("width", "80%");
			$(".responsive_zone").css("width", "49%");
		}
		
	});
		
	//1, 메뉴 여닫기 버튼 기능 구현
	$(".menu_btn").click(function(e){
		e.preventDefault();
		var dis = $(".menu_list").css("display");
		$(".menu_list").stop().slideToggle(1500, "easeOutBounce", function(){
			if(dis == "block"){
				$(".menu_btn img").css("margin-left","0px");
				$(".menu_btn img").attr("src", "imgs/menu_btn_off.png");	
				$(".menu_btn img").attr("alt", "메뉴 영역 닫힌 상태 버튼");	
				$(".menu_btn img").attr("title", "메뉴 영역 닫힌 상태 버튼");
			}else{
				$(".menu_btn img").css("margin-left","100px");
				$(".menu_btn img").attr("src", "imgs/menu_btn_on.png");	
				$(".menu_btn img").attr("alt", "메뉴 영역 열린 상태 버튼");	
				$(".menu_btn img").attr("title", "메뉴 영역 열린 상태 버튼");
			}
		});
	});
	
	//2, 메뉴 항목 클릭시 페이지 이동
	$(".menu_list>li").click(function(e){
		e.preventDefault();
		var idx = $(this).index();
		var goPage = parseInt(idx) * parseInt(b_height);
		$("html, body").stop().animate({"scrollTop":parseInt(goPage)}, 1500, "easeOutExpo", function(){
			$("section").eq(idx).attr("tabindex", "0").focus();	
		});
	});
	
	//3, 페이지 이동시 메뉴 항목 변경 기능 구현
	$(window).on("scroll", function(){
		var dist = $(window).scrollTop()+300;
		
		$("section").each(function(idx){
			if($(this).position().top < dist){
				$(".menu_list>li.on").removeClass("on");
				$(".menu_list>li").eq(idx).addClass("on");	
			}
		});	
	});
	
	//4, 더보기 클릭시 페이지 이동 구현
	$(".view_bbs").click(function(e){
		e.preventDefault();
		var idx = $(".menu_list>li.bbs").index();
		var goPage = parseInt(idx) * parseInt(b_height);
		$("html, body").stop().animate({"scrollTop":parseInt(goPage)}, 1500, "easeInOutSine", function(){
			$("section").eq(idx).attr("tabindex", "0").focus();	
		});
	});
	
	//5, 이미지 모달 기능 구현
	$(".view_photo").click(function(e){
		e.preventDefault();
		var _focus = $(this);
		var src = $(this).children("img").attr("src");
		var alt = $(this).children("img").attr("alt");
		
		$(".modal").css("display", "block");
		$(".modal").attr("tabindex","0").focus();
		
		$(".modal_contents").attr("src", src);
		$(".modal_contents").attr("alt", alt);
		$(".modal_caption").html(alt);
		
		$(".close").click(function(){
			$(".modal").css("display", "none");
			_focus.focus();
		});
	});
	
	//6, 메인 슬라이드 기능 구현
	var cnt = $(".main_slide .slide").children("li").length;
	var width = $(".main_slide").css("width");
	var full = parseInt(cnt) * parseInt(width);
	var turn = parseInt(full) - parseInt(width);
	$(".slide").css("width", parseInt(full));
	
	setInterval(function(){
		var left = $(".slide").css("left");
		if(parseInt(left) == -(parseInt(turn))){
			$(".slide").stop().animate({left:0}, "fast");	
		}else{
			$(".slide").stop().animate({left:"-="+parseInt(width)}, "slow");
		}	
	}, 3000);
	
	//7, 마우스 휠 이용한 페이지 이동 기능 구현
	$("section").on("mousewheel DOMMouseScroll", function(e){
		var delta = 0;
		if(!e) e = window.event;
		delta = e.originalEvent.wheelDelta;
		if(e.detail) delta = -(e.detail);
		
		if(delta > 0){
			try{
				var prev = $(this).position().top - parseInt(b_height);
				$("html, body").stop().animate({"scrollTop":parseInt(prev)}, 1500, "easeInQuart", function(){
					var idx = $(".menu_list>li.on").index();
					$("section").eq(idx).attr("tabindex","0").focus();	
				});
			}catch(e){}
		}else{
			try{
				var next = $(this).position().top + parseInt(b_height);
				$("html, body").stop().animate({"scrollTop":parseInt(next)}, 1500, "easeOutQuad", function(){
					var idx = $(".menu_list>li.on").index();
					$("section").eq(idx).attr("tabindex","0").focus();	
				});
			}catch(e){}
		}
	});
	
	//8, 키보드 방향키 이용한 페이지 이동 기능 구현
	$("body").on("keydown", function(e){
		var keycd = e.which;
		var csp = window.pageYOffset;
		if(keycd == 37 || keycd == 38 || keycd == 100 || keycd == 104){
			
			try{
				var prev = parseInt(csp) - parseInt(b_height);
				$("html, body").stop().animate({"scrollTop":parseInt(prev)}, 1500, "easeInCubic", function(){
					var idx = $(".menu_list>li.on").index();
					$("section").eq(idx).attr("tabindex","0").focus();	
				});
			}catch(e){}
			
		}else if(keycd == 39 || keycd == 40 || keycd == 98 || keycd == 102){
			
			try{
				var next = parseInt(csp) + parseInt(b_height);
				$("html, body").stop().animate({"scrollTop":parseInt(next)}, 1500, "easeOutCirc", function(){
					var idx = $(".menu_list>li.on").index();
					$("section").eq(idx).attr("tabindex","0").focus();	
				});
			}catch(e){}
			
		}
	});
	
	//9, 글쓰기 페이지 이동 기능 구현 
	$("#goWrite").click(function(){
		document.location.href = "write_Form.php";	
	});
});