<?php
	session_start();
	if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
	else $userid = "";

	// 데이터베이스 연결
	$conn = mysqli_connect("localhost", "root", "1234", "cafe_in");
	mysqli_set_charset($conn, "utf8"); // 한글 인코딩	
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}

	// 쿠폰 정보 조회 (based on mem_id)
	$query = "SELECT end_day FROM coupon WHERE mem_id = '$userid'";
	$result = mysqli_query($conn, $query);

	// Get the number of coupons for the user
	$numCoupons = mysqli_num_rows($result);
?>

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
	<script src="js/jquery.min.js" defer></script>
	<script src="js/app.common.js" defer></script>
</head>

<body class="main">

<header>
	<div class="wrap">
		<h1 id="appTitle">cafe-in</h1>
		<a href="#" class="Left"><img src="img/arrow_left.png" alt="이전으로" onClick="javascript:history.back(-1);"></a>
		<a href="profile1.php" class="Right profile_thum"><img src="img/icon_profile_thum.png" alt="프로필"></a>
		<a href="profile2.php" class="Right"><img src="img/icon_notice.png" alt="알림"></a>
	</div>

	<nav>
		<ul class="wrap">
			<li id="menuOn_1"><a href="eventlist.php" id="appMenu1"><img src="img/icon_event.png">event</a></li>
			<li id="menuOn_2" class="on"><a href="coupon1.php" id="appMenu2"><img src="img/icon_coupon.png">coupon</a></li>
			<li class="main"><a href="main.php"><img src="img/icon_main.png"></a></li>
			<li id="menuOn_3"><a href="map.php" id="appMenu3"><img src="img/icon_map.png">map</a></li>
			<li id="menuOn_4"><a href="profile1.php" id="appMenu4"><img src="img/icon_profile.png">profile</a></li>
		</ul>
	</nav>
</header>

<div id="content" class="content">
	<div class="wrap">
		<h2>쿠폰</h2>

		<div id="m_content" class="m_content">
			<div class="coupon_div">
				<?php
				// Generate coupon images based on the user's test coupon count
				for ($i = 0; $i < $numCoupons; $i++) {
				?>
					<div id="gridd">
						<div class="flip-box">
							<div class="flip-box-inner">
								<div class="flip-box-front">
									<img src="img/coupon1.png" width="100%" height="100%">
								</div>
								<div class="flip-box-back">
									<img src="img/coupon1_1.png" width="100%" height="100%">
								</div>
							</div>
						</div>
					</div>
				<?php
				}
				?>

			</div>
		</div>
	</div>
</div>

</body>
</html>