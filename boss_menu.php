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

<header>
	<div class="wrap">
		<h1 id="appTitle">cafe-in business</h1>
		<!--<a href="menu.htm" class="Left"><img src="img/icon_menu.png" alt="메뉴"></a>-->
		<a href="#" class="Left"><img src="img/arrow_left.png" alt="이전으로" onClick="javascript:history.back(-1);"></a>
		<!--<a href="main.htm" class="Right"><img src="img/icon_home.png" alt="메인으로"></a>-->
		<!--<a href="profile2.htm" class="Right"><span class="alarm">&nbsp;</span><img src="img/icon_notice.png" alt="알림"></a>-->
	</div>
</header>

	<?php
	// 데이터베이스에 연결
	$db = new mysqli("localhost", "root", "1234", "cafe_in");
	mysqli_set_charset($db, "utf8"); // 한글 인코딩	

	// 현재 로그인한 사용자의 own_id 가져오기
	session_start();
	if (isset($_SESSION["userid"])) $own_id = $_SESSION["userid"];
	else $own_id = "";
	
	// cafe_info 테이블에서 own_id에 해당하는 name 가져오기
	$stmt = $db->prepare('SELECT name FROM cafe_info WHERE own_id=?');
	$stmt->bind_param('s', $own_id);
	$stmt->execute();
	$stmt->bind_result($name);
	$stmt->fetch();
	$stmt->close();
	?>

	
<div id="content" class="content">
	<div class="wrap">
		<h2><i><?php echo $name; ?></i>님 반갑습니다!</h2>
		
		<div id="m_content" class="m_content">

			<div class="profile_div">
				<p><img src="img/icon_profile_thum.png" alt="프로필"><br><?php echo $own_id; ?></p>

				<ul>
					<li><a href="boss_create_stamp.php"><img src="img/img_business1.png" alt=""><br>스탬프 설정</a></li>
					<li><a href="boss_create_coupon.php"><img src="img/img_business2.png" alt=""><br>쿠폰 설정</a></li>
					<li><a href="boss_stamp_edit.html"><img src="img/img_business3.png" alt=""><br>스탬프 관리</a></li>
					<li><a href="boss_coupon_edit.html"><img src="img/img_business4.png" alt=""><br>쿠폰 관리</a></li>
					<li><a href="boss_create_event.php"><img src="img/img_business5.png" alt=""><br>이벤트 추가</a></li>
					<li><a href="boss_eventlist.php"><img src="img/img_business6.png" alt=""><br>이벤트 내역</a></li>
				</ul>
			</div>

		</div>

	<div>
</div>

</body>
</html>