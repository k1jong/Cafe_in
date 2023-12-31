<!doctype html>
<html lang="ko">
<head>
<title>cafe-in</title>
<meta charset="utf-8">

<meta http-equiv="Content-Security-Policy" content="default-src *; style-src 'self' 'unsafe-inline'; script-src 'self' 'unsafe-inline' 'unsafe-eval'">

<meta name="msapplication-tap-highlight" content="no">
<meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1.0, minimum-scale=1.0, width=device-width, viewport-fit=cover">
<meta name="color-scheme" content="light dark">
<link rel="stylesheet" href="css/style.css">
<script src="js/jquery.min.js"></script>
<script src="js/app.common.js"></script>
</head>

<body class="business">
	
<style>
	div{
		display : flex;
		font-weight : bold;
		padding : 6px 0;
		align-items : center;
	}
	.box>div{
		width : 90px;
	}
	form div{
		margin : 15px 0;
	}
	input[type="text"],
	input[type="date"],
	input[type="file"],
	input[type="submit"]{
		width : 90%;
		margin-left : 15px;
		height : 35px;
		border: 1px solid #ccc;
	}
	input[type="submit"] {
		line-height : 20px;
		border : 0px;
		color: black;
		background-color: #F4D2BE;
		cursor: pointer;
		font-weight : bold;
		height : 40px;
	}
	
	input[type="submit"]:hover {
		background-color: #f5cac3;
	}
	
</style>
	
<header>
	<div class="wrap">
		<h1 id="appTitle">cafe-in business</h1>
		<!--<a href="menu.htm" class="Left"><img src="img/icon_menu.png" alt="메뉴"></a>-->
		<a href="#" class="Left"><img src="img/arrow_left.png" alt="이전으로" onClick="javascript:history.back(-1);"></a>
		<a href="boss_menu.php" class="Right"><img src="img/icon_home.png" alt="메인으로"></a>
		<!--<a href="profile2.htm" class="Right"><span class="alarm">&nbsp;</span><img src="img/icon_notice.png" alt="알림"></a>-->
	</div>
</header>

<div id="content" class="content">
	<div class="wrap">
		<h2>이벤트 진행하기</h2>

		<div id="m_content" class="m_content">

			<div class="profile_div">
<?php
	// 데이터베이스 연결
	$conn = mysqli_connect("localhost", "root", "1234", "cafe_in");
	mysqli_set_charset($conn, "utf8"); // 한글 인코딩		
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	session_start();
	$own_id = 'owner1';
	// 폼 데이터 가져오기
	$num = $_POST['stampNum'];

	// 데이터베이스에 저장
	$stmt = $conn->prepare("INSERT INTO stamp (num) VALUES (?)");
	$stmt->bind_param("i", $num);
	$stmt->execute();
	echo "스탬프가 정상적으로 추가되었습니다!";
	

?>

	
			</div>
<button onclick="location.href='boss_menu.php'" class="login_btn block_btn">홈으로 가기</button>	

		</div>
		</div>
	</div>
</body>
</html>
