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
		<a href="boss_menu.php" class="Right"><img src="img/icon_home.png" alt="메인으로"></a>
		<!--<a href="profile2.htm" class="Right"><span class="alarm">&nbsp;</span><img src="img/icon_notice.png" alt="알림"></a>-->
	</div>
</header>

<div id="content" class="content">
	<div class="wrap">
		<h2>쿠폰 설정</h2>

		<div id="m_content" class="m_content">

			<div class="profile_div">
				<form action="boss_upload_coupon.php" method="post" enctype="multipart/form-data">
					<label for="image1">쿠폰 이미지를 선택해주세요.</label>
					<input type="file" name="image1" id="image1"><br><br>
					<label for="image2">쿠폰 설명 이미지를 선택해주세요</label>
					<input type="file" name="image2" id="image2"><br><br>
					<input type="submit" value="설정하기" class="login_btn block_btn">
				</form>

					
					</div>
				</form>
			</div>

		</div>

	<div>
</div>

</body>
</html>