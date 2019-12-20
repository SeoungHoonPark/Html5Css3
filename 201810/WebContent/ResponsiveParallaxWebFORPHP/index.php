<?php
	$userId= "";
	$userName = "";
	
	session_start();
	if(isset($_SESSION["userId"])){
		$userId= $_SESSION["userId"];
		$userName = $_SESSION["userName"];
	}
?>

<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="content-type" content="text/html">
<meta http-equiv="X-UA-Compatible" content="IE=Edge, Chrome=1">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, minimum-scale=1, user-scalable=no">
<title>ResponsiveParallaxWebFORPHP</title>
<script src="js/jquery-3.2.1.js"></script>
<script src="js/jquery-ui.js"></script>
<link rel="stylesheet" href="css/style.css">
<script src="js/custom.js"></script>
</head>
<body>
	<!-- 로고영역 -->
	<h1 class="logo">
    	<a href="index.php" title="인덱스페이지 다시 호출">
        	<img alt="코리아투어 로고" title="코리아투어 로고" src="imgs/logo2.png">
        </a>
    </h1>
    
    
    <!-- 메뉴영역 -->
    <div id="floating_wrap">
    	<a href="#" title="메뉴 열고/닫기 기능 버튼" class="menu_btn">
        	<img alt="메뉴 열린 상태 버튼" title="메뉴 열린 상태 버튼" src="imgs/menu_btn_on.png">
        </a>
        
        <ul class="login_list">
        <?php if($userId == ""){ ?>
        	<li>
            	<a href="login_Form.php" title="로그인 페이지로 이동">
                	LOGIN
                </a>
            </li>
            <li>
            	<a href="join_Form.php" title="회원가입 페이지로 이동">
                	JOIN
                </a>
            </li>
        <?php }else{ ?>
            <li>
            	<a href="action/logout_action.php" title="로그아웃 하기">
                	LOGOUT
                </a>
            </li>
            <li>
            	<a href="#" title="멤버 페이지로 이동">
                	<?=$userName?>
                </a>
            </li>
        <?php } ?>
        </ul>
        
        <ul class="menu_list">
        	<li class="on">
            	<a href="#" title="메인 페이지로 이동">
                	메인
                </a>
            </li>
            <li >
            	<a href="#" title="사이트안내 페이지로 이동">
                	사이트안내
                </a>
            </li>
            <li >
            	<a href="#" title="관광명소 페이지로 이동">
                	관광명소
                </a>
            </li>
            <li >
            	<a href="#" title="축제안내 페이지로 이동">
                	축제안내
                </a>
            </li>
            <li class="bbs">
            	<a href="#" title="관광후기 페이지로 이동">
                	관광후기
                </a>
            </li>
        </ul>
    </div><!-- floating_wrap -->
    
    <div id="wrap">
    
    <!-- 메인 세션 영역 -->
    <section>
    	<article>
        	<div class="clip_top">
            	<div class="top_title">
                	- 메 인 - <span class="title_point">마우스 휠/키보드 방향키</span>를 이용하여 페이지를 이동할 수 있습니다.
                </div>
            </div><!-- clip_top -->
            
            <div class="clip">
            	<div class="main_wrap">
                	<div class="main_slide">
                    	<ul class="slide">
                        	<li>
                            	<a href="#" title="슬라이드 이벤트 페이지로 이동">
                                	<p class="slide_cmt">
                                    	해당 이벤트 보충 설명 글...<br>
                                        해당 이벤트 보충 설명 글...<br>
                                        해당 이벤트 보충 설명 글...
                                    </p>
                                    <img alt="k-치킨 한여름 치킨 파티" title="k-치킨 한여름 치킨 파티" src="imgs/slide_event_han_river.jpg">
                                </a>
                            </li>
                            <li>
                            	<a href="#" title="슬라이드 이벤트 페이지로 이동">
                                	<p class="slide_cmt">
                                    	해당 이벤트 보충 설명 글...<br>
                                        해당 이벤트 보충 설명 글...<br>
                                        해당 이벤트 보충 설명 글...
                                    </p>
                                    <img alt="제주 아일랜드 관광특구 지정 2주년 문화제" title="제주 아일랜드 관광특구 지정 2주년 문화제" src="imgs/slide_event_jeju.jpg">
                                </a>
                            </li>
                            <li>
                            	<a href="#" title="슬라이드 이벤트 페이지로 이동">
                                	<p class="slide_cmt">
                                    	해당 이벤트 보충 설명 글...<br>
                                        해당 이벤트 보충 설명 글...<br>
                                        해당 이벤트 보충 설명 글...
                                    </p>
                                    <img alt="광주 평화음악회" title="광주 평화음악회" src="imgs/slide_event_gwangju.jpg">
                                </a>
                            </li>
                        </ul>
                    </div>
                </div><!-- main_wrap -->
                
                <div class="bottom_wrap">
	                
                    <div class="responsive_zone float_left">
                    	<div class="head_wrap">
                        	<div class="head_bbs w_80">
                            	관 광 후 기
                            </div>
                            <a href="#" title="관광후기 페이지로 이동" class="view_bbs">
                            	더보기
                            </a>
                        </div><!-- head_wrap -->
                    	
                        <ul class="response_list">
                        <?php 
							$conn = null;
							$sql_stmt = "";
							
							$conn = mysqli_connect("localhost", "root", "", "pshdb");
							mysqli_query($conn, "set names utf8");
							
							$sql_stmt = "select * from board order by b_regedit desc limit 5";
							
							$result = mysqli_query($conn, $sql_stmt);
							
							if(0 == mysqli_num_rows($result)){
						?>
                        	<li style="text-align:center;">
                            	등록된 게시글이 없습니다.
                            </li>
                        <?php }else{
							
								while($list = mysqli_fetch_array($result)){	
						 ?>
                        	<li>
                            	<a href="#" title="해당 게시글 상세보기페이지로 이동">
                                	<?=$list["b_subject"]?>
                                </a>
                                <span class="float_right">
                                	( <?=$list["b_mid"]?>, <?=$list["b_regedit"]?> )
                                </span>
                            </li>
                        <?php
								} // while 문
							}	//개수 if문
							mysqli_close($conn);
						?>
                        </ul>
                	</div><!-- zone left -->
                    
                    <div class="responsive_zone float_right">
                    	<div class="head_wrap">
                        	<div class="head_bbs w_80">
                            	관 광 명 소
                            </div>
                            <a href="#" title="관광명소 페이지로 이동" class="view_bbs">
                            	더보기
                            </a>
                        </div><!-- head_wrap -->
                    	
                        <ul class="photo_list">
                        	<li>
                            	<a href="#" title="해당 게시글 상세보기페이지로 이동" class="view_photo">
									<img alt="고성 녹차마을" title="고성 녹차마을" src="imgs/photo_place_gosung.jpg">
                                </a>
                            </li>
                            <li>
                            	<a href="#" title="해당 게시글 상세보기페이지로 이동" class="view_photo">
									<img alt="광주 평화의 광장" title="광주 평화의 광장" src="imgs/photo_place_gwangju.jpg">
                                </a>
                            </li>
                            <li>
                            	<a href="#" title="해당 게시글 상세보기페이지로 이동" class="view_photo">
									<img alt="경주 오랜된 풍경속 그림같은 다리" title="경주 오랜된 풍경속 그림같은 다리" src="imgs/photo_place_kyoungju.jpg">
                                </a>
                            </li>
                            <li>
                            	<a href="#" title="해당 게시글 상세보기페이지로 이동" class="view_photo">
									<img alt="강원도 설악산" title="강원도 설악산" src="imgs/photo_place_seolAk.jpg">
                                </a>
                            </li>
                            <li>
                            	<a href="#" title="해당 게시글 상세보기페이지로 이동" class="view_photo">
									<img alt="서울에 살아숨기는 한양의 경회루" title="서울에 살아숨기는 한양의 경회루" src="imgs/photo_place_seoul.jpg">
                                </a>
                            </li>
                        </ul>
                        
                        <!-- 이미지 모달 영역 -->
                        <div class="modal" style="display:none">
                        	<img alt="이미지 모달" title="이미지 모달" src="" class="modal_contents">
                            <div class="modal_caption"></div>
                            <button type="button" class="close">닫 기</button>
                        </div><!-- modal -->
                        
                	</div><!-- zone right -->
    	        </div><!-- bottom_wrap -->
            </div><!-- clip -->
        </article>
    </section>
    
     <!-- 사이트안내 세션 영역 -->
    <section>
    	<article>
        	<div class="clip_top">
            	<div class="top_title">
                	- 사 이 트 안내  - <span class="title_point">마우스 휠/키보드 방향키</span>를 이용하여 페이지를 이동할 수 있습니다.
                </div>
            </div><!-- clip_top -->
            
            <div class="clip">
            
            </div><!-- clip -->
        </article>
    </section>
       
    <!-- 관광명소 세션 영역 -->
    <section>
    	<article>
        	<div class="clip_top">
            	<div class="top_title">
                	- 관 광 명 소  - <span class="title_point">마우스 휠/키보드 방향키</span>를 이용하여 페이지를 이동할 수 있습니다.
                </div>
            </div><!-- clip_top -->
            
            <div class="clip">
            
            </div><!-- clip -->
        </article>
    </section>
    
    <!-- 축제안내 세션 영역 -->
    <section>
    	<article>
        	<div class="clip_top">
            	<div class="top_title">
                	- 축 제 안 내  - <span class="title_point">마우스 휠/키보드 방향키</span>를 이용하여 페이지를 이동할 수 있습니다.
                </div>
            </div><!-- clip_top -->
            
            <div class="clip">
            
            </div><!-- clip -->
        </article>
    </section>
    
    <!-- 관광후기 세션 영역 -->
    <section>
    	<article>
        	<div class="clip_top">
            	<div class="top_title">
                	- 관 광 후 기 - <span class="title_point">마우스 휠/키보드 방향키</span>를 이용하여 페이지를 이동할 수 있습니다.
                </div>
            </div><!-- clip_top -->
            
            <div class="clip">
            	<div class="bottom_wrap">
                    <div class="responsive_bbs">
                    	<div class="head_wrap">
                        	<div class="head_bbs w_100">
                            	관 광 후 기
                            </div>
                        </div><!-- head_wrap -->
                    	
                        <ul class="response_list">
                        <?php 
							$conn = null;
							$sql_stmt = "";
							
							$conn = mysqli_connect("localhost", "root", "", "pshdb");
							mysqli_query($conn, "set names utf8");
							
							$sql_stmt = "select * from board order by b_regedit desc limit 5";
							
							$result = mysqli_query($conn, $sql_stmt);
							
							if(0 == mysqli_num_rows($result)){
						?>
                        	<li style="text-align:center;">
                            	등록된 게시글이 없습니다.
                            </li>
                        <?php }else{
							
								while($list = mysqli_fetch_array($result)){	
						 ?>
                        	<li>
                            	<a href="#" title="해당 게시글 상세보기페이지로 이동">
                                	<?=$list["b_subject"]?>
                                </a>
                                <span class="float_right">
                                	( <?=$list["b_mid"]?>, <?=$list["b_regedit"]?> )
                                </span>
                            </li>
                        <?php
								} // while 문
							}	//개수 if문
							mysqli_close($conn);
						?>
                        </ul>
                        <hr>
                        <button type="button" id="goWrite">글 쓰 기</button>
                	</div><!-- bbs -->
    	        </div><!-- bottom_wrap -->
            </div><!-- clip -->
        </article>
    </section>
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    </div><!-- wrap -->
</body>
</html>