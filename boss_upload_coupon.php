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
				<?php
// 데이터베이스에 연결
$db = new mysqli("localhost", "root", "1234", "cafe_in");

// 오류 확인
if ($db->connect_error) {
    die("연결 실패: " . $db->connect_error);
}

// 이미지 업로드 대상 디렉토리 설정
$target_dir = "/workspace/cafe_in/img/coupon/";

// 첫 번째 이미지의 대상 파일 설정
$target_file1 = $target_dir . basename($_FILES["image1"]["name"]);

// 두 번째 이미지의 대상 파일 설정
$target_file2 = $target_dir . basename($_FILES["image2"]["name"]);

// 첫 번째 이미지 업로드
if (move_uploaded_file($_FILES["image1"]["tmp_name"], $target_file1)) {
    echo "첫 번째 이미지가 업로드되었습니다.<br>";
} else {
    echo "죄송합니다. 첫 번째 이미지를 업로드하는 중에 오류가 발생했습니다.<br>";
}

// 두 번째 이미지 업로드
if (move_uploaded_file($_FILES["image2"]["tmp_name"], $target_file2)) {
    echo "두 번째 이미지가 업로드되었습니다.<br>";
} else {
    echo "죄송합니다. 두 번째 이미지를 업로드하는 중에 오류가 발생했습니다.<br>";
}



// 현재 로그인한 사용자의 own_id 가져오기
//$own_id = $_SESSION['own_id'];
$own_id = 'owner1';

// 데이터베이스에 이미지 이름 삽입
$stmt = $db->prepare("UPDATE cafe_info SET coupon=?, coupon_detail=? WHERE own_id=?");
$stmt->bind_param("sss", basename($target_file1), basename($target_file2), $own_id);
$stmt->execute();

// 데이터베이스 연결 종료
$db->close();
?>

					
					</div>
			<button onclick="location.href='boss_menu.php'" class="login_btn block_btn">홈으로 가기</button>	
				</form>
			</div>

		</div>

	<div>
</div>

</body>
</html>

