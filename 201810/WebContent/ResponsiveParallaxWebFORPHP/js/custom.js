// JavaScript Document
$(document).ready(function() {
    
	//해상도 = 브라우저 구현
	var b_width = $(window).width();
	var b_height = $(window).height();
	$("section").height(b_height);
	
	//너비가 좁으면
	if(b_width < 1280){
		//메뉴 영역을 감추기
		$(".menu_list").css("display","none");
		$(".menu_btn img").css("margin-left","0px");
		$(".menu_btn img").attr("src","imgs/menu_btn_off.png");	
		$(".menu_btn img").attr("alt","메뉴 닫힌 상태 버튼");	
		$(".menu_btn img").attr("title","메뉴 닫힌 상태 버튼");	
		
		//로고영역 축소
		$(".logo img").css("width","100px");
		$(".logo img").css("bottom","0px");
		$(".logo img").css("left","0px");
		
		//메인 wrap 영역 감추기
		$(".main_wrap").css("display","none");
		
		//bottom wrap 영역 확대
		$(".bottom_wrap").css("width","100%");
		$(".responsive_zone").css("width","100%");
	}
	
	//리사이즈 브라우저 구현
	$(window).on("resize",function(){
		b_width = $(window).width();
		b_height = $(window).height();
		$("section").height(b_height);
		
		if(b_width <= 1280){
			//메뉴 영역을 감추기
			$(".menu_list").css("display","none");
			$(".menu_btn img").css("margin-left","0px");
			$(".menu_btn img").attr("src","imgs/menu_btn_off.png");	
			$(".menu_btn img").attr("alt","메뉴 닫힌 상태 버튼");	
			$(".menu_btn img").attr("title","메뉴 닫힌 상태 버튼");	
			
			//로고영역 축소
			$(".logo img").css("width","100px");
			$(".logo img").css("bottom","0px");
			$(".logo img").css("left","0px");
			
			//메인 wrap 영역 감추기
			$(".main_wrap").css("display","none");
			
			//bottom wrap 영역 확대
			$(".bottom_wrap").css("width","100%");
			$(".responsive_zone").css("width","100%");
		}
		
		if(b_width > 1280){
			//메뉴 영역을 감추기
			$(".menu_list").css("display","block");
			$(".menu_btn img").css("margin-left","100px");
			$(".menu_btn img").attr("src","imgs/menu_btn_on.png");	
			$(".menu_btn img").attr("alt","메뉴 열린 상태 버튼");	
			$(".menu_btn img").attr("title","메뉴 열린 상태 버튼");	
			
			//로고영역 축소
			$(".logo img").css("width","200px");
			$(".logo img").css("bottom","50px");
			$(".logo img").css("left","50px");
			
			//메인 wrap 영역 감추기
			$(".main_wrap").css("display", "block");
			
			//bottom wrap 영역 확대
			$(".bottom_wrap").css("width","80%");
			$(".responsive_zone").css("width","49%");
		}
		
	});
	
	// 메뉴 열고/닫기 기능 구현
	$(".menu_btn").click(function(e){
		e.preventDefault();
		var dis = $(".menu_list").css("display");
		$(".menu_list").stop().slideToggle(1500, "easeOutBounce", function(){
				
				if(dis == "block"){
					$(".menu_btn img").css("margin-left","0px");
					$(".menu_btn img").attr("src","imgs/menu_btn_off.png");	
					$(".menu_btn img").attr("alt","메뉴 닫힌 상태 버튼");	
					$(".menu_btn img").attr("title","메뉴 닫힌 상태 버튼");	
				}else{
					$(".menu_btn img").css("margin-left","100px");
					$(".menu_btn img").attr("src","imgs/menu_btn_on.png");	
					$(".menu_btn img").attr("alt","메뉴 열린 상태 버튼");	
					$(".menu_btn img").attr("title","메뉴 열린 상태 버튼");
				}
		});	
	});
	
	// 메뉴 항목 클릭시 페이지 이동 구현
	$(".menu_list>li").click(function(e){
		e.preventDefault();
		var idx = $(this).index();
		var goPage = parseInt(idx) * parseInt(b_height);
		$("html, body").stop().animate({"scrollTop":parseInt(goPage)}, 1500, "easeOutSine", function(){
			$("section").eq(idx).attr("tabindex","0").focus();
		});
	});
	
	// 관광후기 더보기 클릭시 페이지 이동
	$(".view_bbs").click(function(e){
		e.preventDefault();
		var idx = $(".menu_list>li.bbs").index();
		var goPage = parseInt(idx) * parseInt(b_height);
		$("html, body").stop().animate({"scrollTop":parseInt(goPage)}, 1500, "easeOutSine", function(){
			$("section").eq(idx).attr("tabindex","0").focus();
		});
	});
	
	// 페이지 이동시 메뉴 변경 구현
	$(window).on("scroll", function(){
		var dis = $(window).scrollTop()+300;
		$("section").each(function(idx){
			if($(this).position().top < dis){
				$(".menu_list>li.on").removeClass("on");
				$(".menu_list>li").eq(idx).addClass("on");	
			}
		}); 	
	});
	
	// 마우스 휠로 페이지 이동 구현
	$("section").on("mousewheel DOMMouseScroll",function(e){
		var delta = 0;
		if(!e) e = window.event;
		delta = e.originalEvent.wheelDelta
		if(e.detail) delta = -(e.detail);
		
		if(delta > 0){
			try{
				var prev = $(this).position().top - parseInt(b_height);
				$("html, body").stop().animate({"scrollTop":parseInt(prev)}, 1500, "easeInQuad", function(){
					var idx = $(".menu_list>li.on").index();
					$("section").eq(idx).attr("tabindex", "0").focus();
				});
			}catch(e){}
		}else{
			try{
				var next = $(this).position().top + parseInt(b_height);
				$("html, body").stop().animate({"scrollTop":parseInt(next)}, 1500, "easeOutQuart", function(){
					var idx = $(".menu_list>li.on").index();
					$("section").eq(idx).attr("tabindex", "0").focus();
				});
			}catch(e){}		
		}	
	});
	
	// 키보도 방향키로 페이지 이동 구현
	$("body").on("keydown",function(e){
		var keycd = e.which;
		var csp = window.pageYOffset;
		if(keycd == 37 || keycd == 38 || keycd == 100 || keycd == 104){
			try{
				var prev = parseInt(csp) - parseInt(b_height);
				$("html, body").stop().animate({"scrollTop":parseInt(prev)}, 1500, "easeInCubic", function(){
					var idx = $(".menu_list>li.on").index();
					$("section").eq(idx).attr("tabindex", "0").focus();
				});
			}catch(e){}
		}else if(keycd == 39 || keycd == 40 || keycd == 98 || keycd == 102){
			try{
				var next = parseInt(csp) + parseInt(b_height);
				$("html, body").stop().animate({"scrollTop":parseInt(next)}, 1500, "easeOutCirc", function(){
					var idx = $(".menu_list>li.on").index();
					$("section").eq(idx).attr("tabindex", "0").focus();
				});
			}catch(e){}
		}
	});
	
	// 관광명소 사진 클릭시 모달 이미지 노출 구현
	$(".view_photo").click(function(e){
		e.preventDefault();
		var _focus = $(this);
		var src = $(this).children("img").attr("src");
		var alt = $(this).children("img").attr("alt");
		
		$(".modal").css("display","block");
		$(".modal").attr("tabindex","0").focus();
		$(".modal_contents").attr("src",src);
		$(".modal_caption").html(alt);
		
		$(".close").click(function(){
			$(".modal").css("display","none");
			_focus.focus();
		});	
	});
	
	// 글쓰기 페이지 이동 구현
	$("#goWrite").click(function(){
		document.location.href="write_Form.php";	
	});
	
	// 메인 슬라이드 구현
	var cnt = $(".main_slide .slide").children("li").length;
	var width = $(".main_slide").css("width");
	var full = parseInt(cnt) * parseInt(width);
	var turn = parseInt(full) - parseInt(width);
	$(".slide").css("width",parseInt(full));
	setInterval(function(){
		var left = $(".slide").css("left");
		if(parseInt(left) == -(parseInt(turn))){
			$(".slide").stop().animate({left:0}, "fast");
		}else{
			$(".slide").stop().animate({left:"-="+parseInt(width)}, "slow");
		}
	}, 3000);
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
});