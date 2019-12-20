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
	
	$userId= $_REQUEST["userId"];
	$userName = $_REQUEST["userName"];
	$userPwd = $_REQUEST["userPwd"];
	
	$conn = mysqli_connect("localhost", "root", "", "pshdb");
	mysqli_query($conn, "set names utf8");
	$sql_stmt = "insert into member(m_id, m_pwd, m_name) values ('".$userId."', '".$userPwd."', '".$userName."')";
	
	if($result = mysqli_query($conn, $sql_stmt)){
		$msg = "정상적으로 가입되었습니다.";
		$flag = 1;
	}else{
		$msg = "내부 오류가 발생했습니다.";
	}
	mysqli_close($conn);
?>
<script>
	alert('<?=$msg?>');
	if(<?=$flag?> == 1){
		document.location.href = "../index.php";
	}else{
		window.history.go(-1);	
	}
</script>