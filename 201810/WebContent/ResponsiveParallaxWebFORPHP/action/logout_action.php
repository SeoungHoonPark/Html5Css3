<?php
	$userId= "";
	$userName = "";
	$userPwd = "";
	$subject = "";
	$contents = "";
	
	$conn = null;
	$sql_stmt = "";
	$msg = "로그아웃되었습니다";
	$flag = 0;
	
	session_start();
	$flag = 1;
	session_destroy();
?>
<script>
	alert('<?=$msg?>');
	if(<?=$flag?> == 1){
		document.location.href = "../index.php";
	}else{
		window.history.go(-1);	
	}
</script>