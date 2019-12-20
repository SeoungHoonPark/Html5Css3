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
		var name = $("#userName").val();
		var pwd = $("#userPwd").val();
		var chk = $("#pwdChk").val();
		
		if(id == "" || name == "" || pwd == "" ){
			alert("모든 항목을 입력하세요.");
			$("#userId").focus();
			return false;	
		}
		
		if(pwd !=chk){
			alert("비밀번호가 일치하지 않습니다.");
			$("#userPwd").focus();
			return false;
		}else{
			$("#myfrm").submit();	
		}
	}
</script>
</head>
<body>
	<form id="myfrm" action="action/join_action.php" method="post" enctype="multipart/form-data">
    	<h1 class="title">회 원 가 입</h1>
        <hr>
        	<ul class="table">
            	<li>
                	회원 아이디 : 
                    <input type="text" name="userId" id="userId" placeholder="아이디를 입력하세요">
                </li>
                <li>
                	회원 이름 : 
                    <input type="text" name="userName" id="userName" placeholder="이름를 입력하세요">
                </li>
                <li>
                	회원 비밀번호 : 
                    <input type="password" name="userPwd" id="userPwd" placeholder="비밀번호를 입력하세요">
                </li>
                <li>
                	비밀번호 확인 : 
                    <input type="password" name="pwdChk" id="pwdChk" placeholder="비밀번호를 다시 입력하세요">
                </li>
            </ul>
        <hr>
        <button type="button" onClick="window.history.go(-1)"> 취 소 </button>
        <button type="button" onClick="return _okSubmit();"> 확 인 </button>
        
    </form>
</body>
</html>