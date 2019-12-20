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
	$userPwd = $_REQUEST["userPwd"];
	
	$conn = mysqli_connect("localhost", "root", "", "pshdb");
	mysqli_query($conn, "set names utf8");
	$sql_stmt = "select * from member where m_id = '".$userId."' and m_pwd = '".$userPwd."'";

	if($result = mysqli_query($conn, $sql_stmt)){
		$list = mysqli_fetch_array($result);
		
			if($userId == $list["m_id"] &&  $userPwd == $list["m_pwd"]){
				$msg = "정상적으로 로그인되었습니다.";
				$flag = 1;
					session_start();
					$_SESSION["userId"]=$list["m_id"];
					$_SESSION["userName"]=$list["m_name"];
			}else{
				$msg = "아이디, 비밀번호가 다릅니다.";		
			}
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