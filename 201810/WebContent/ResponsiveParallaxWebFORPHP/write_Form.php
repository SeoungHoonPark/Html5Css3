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
<title>코리아투어 -방문을 환영합니다-</title>
<script src="js/jquery-3.2.1.js"></script>
<script src="js/jquery-ui.js"></script>
<link rel="stylesheet" href="css/style.css">
<script src="js/custom.js"></script>
<script>
	function _okSubmit(){
		var id = $("#userId").val();
		var subject = $("#subject").val();
		var contents = $("#contents").val();
		if(id ==""){
			alert("로그인 후에 글작성이 가능합니다.");
			return false;
		}
		
		if(subject == "" || contents == "" ){
			alert("모든 항목을 입력하세요.");
			$("#subject").focus();
			return false;	
		}else{
			$("#myfrm").submit();	
		}
	}
</script>
</head>
<body>
	<form id="myfrm" action="action/write_action.php" method="post" enctype="multipart/form-data">
    	<h1 class="title">관 광 후 기</h1>
        <hr>
        	<ul class="table">
            	<li>
                	제 목 :
                    <input type="text" name="subject" id="subject" placeholder="제목을 입력하세요">
                </li>
                <li>
                	내 용 :
                    <textarea cols="5" rows="5" name="contents" id="contents" placeholder="내용을 입력하세요"></textarea>
                </li>
            	<li>
                	작성자 : 
                    <input type="text" name="userId" id="userId" value="<?=$userId?>" readonly>
                </li>
            </ul>
        <hr>
        <button type="button" onClick="window.history.go(-1)"> 취 소 </button>
        <button type="button" onClick="return _okSubmit();"> 확 인 </button>
        
    </form>
</body>
</html>