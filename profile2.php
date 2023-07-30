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

<body class="main">

<header>
	<div class="wrap">
		<h1 id="appTitle">cafe-in</h1>
		<!-- <a href="menu.html" class="Left"><img src="img/icon_menu.png" alt="메뉴"></a> -->
		<a href="#" class="Left"><img src="img/arrow_left.png" alt="이전으로" onClick="javascript:history.back(-1);"></a>
		<a href="profile1.php" class="Right profile_thum"><img src="img/icon_profile_thum.png" alt="프로필"></a>
		<a href="profile2.php" class="Right"><img src="img/icon_notice.png" alt="알림"></a>
	</div>

	<nav>
		<ul class="wrap">
			<li id="menuOn_1"><a href="eventlist.php" id="appMenu1"><img src="img/icon_event.png">event</a></li>
			<li id="menuOn_2"><a href="coupon1.php" id="appMenu2"><img src="img/icon_coupon.png">coupon</a></li>
			<li class="main"><a href="main.php"><img src="img/icon_main.png"></a></li>
			<li id="menuOn_3"><a href="map.php" id="appMenu3"><img src="img/icon_map.png">map</a></li>
			<li id="menuOn_4" class="on"><a href="profile1.php" id="appMenu4"><img src="img/icon_profile.png">profile</a></li>
		</ul>
	</nav>
</header>

<div id="content" class="content">
	<div class="wrap">
		<h2>전체사용내역</h2>

		<div id="m_content" class="m_content">

			<a href="profile1.php" class="page_btn">내 정보</a>
			<a href="profile2.php" class="page_btn on">전체사용내역</a>
	
			<div class="profile_div">
				<table>
					<thead>
						<tr>
							<th>지점</th>
							<th>날짜</th>
							<th>정보</th>
						</tr>
					</thead>
					<tbody>
<?php
						session_start();
						$userid = $_SESSION["userid"];

						$con = mysqli_connect("localhost", "root", "1234", "cafe_in");
						$sql = "select * from stamp_history where id='$userid' order by num desc";
						mysqli_set_charset($con, "utf8"); // 한글 인코딩
						$result = mysqli_query($con, $sql);
						$rows_recored = mysqli_num_rows($result);
						
						for($i = 0; $i < $rows_recored; $i++){
							$row = mysqli_fetch_array($result);
							$cafe_name = $row["cafe_name"];
							$title = $row["title"];
							$regist_day = $row["regist_day"];
?>
							<tr>
								<td><?= $cafe_name?></td>
								<td><?= $regist_day?></td>
								<td><?= $title?></td>
							</tr>
<?php
						}
						mysqli_close($con);
?>
					</tbody>
				</table>
			</div>

		</div>

	<div>
</div>

</body>
</html>