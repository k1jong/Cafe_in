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
			<li id="menuOn_1" class="on"><a href="eventlist.php" id="appMenu1"><img src="img/icon_event.png">event</a></li>
			<li id="menuOn_2"><a href="coupon1.php" id="appMenu2"><img src="img/icon_coupon.png">coupon</a></li>
			<li class="main"><a href="main.php"><img src="img/icon_main.png"></a></li>
			<li id="menuOn_3"><a href="map.php" id="appMenu3"><img src="img/icon_map.png">map</a></li>
			<li id="menuOn_4"><a href="profile1.php" id="appMenu4"><img src="img/icon_profile.png">profile</a></li>
		</ul>
	</nav>
</header>

<div id="content" class="content">
	<div class="wrap">
		<h2>이벤트 전체</h2>

		<div id="m_content" class="m_content">
<?php
$con = mysqli_connect("localhost", "root", "1234", "cafe_in");
mysqli_set_charset($con, "utf8"); // 한글 인코딩	
$result = $con->query('SELECT title, small_image, detail_image, start_date, end_date FROM event WHERE end_date > NOW() ORDER BY start_date ASC');
// 이미지 정보 가져오기

$row = $result->fetch_assoc();
$image = $row['small_image'];
$detail_image = $row['detail_image'];
$title = $row['title'];
$start = $row['start_date'];
$end = $row['end_date'];

// 이미지가 위치한 디렉토리 설정
$dir = '/cafe_in/img/event/';
$i = 0;
while ($row = $result->fetch_assoc()) {
    $image = $row['small_image'];
    $detail_image = $row['detail_image'];
    $title = $row['title'];
	$start = $row['start_date'];
	$end = $row['end_date'];
    echo "<img src='$dir$image' alt='Image' id='image$i' data-detail-image='$detail_image' style='margin-bottom:0.5px;'>";
    echo "<p style='text-align:center;font-weight:bold;margin-top:0.5px;'>$title</p>";
    echo "<p style='text-align:center;font-size:0.8em;margin-top:5px;'>기간: $start ~ $end</p>";


    // 클릭 이벤트 리스너 추가
    echo "<script>
    document.getElementById('image$i').addEventListener('click', function() {
        // 클릭 시 다른 이미지 정보 가져오기
        var detail_image = this.getAttribute('data-detail-image');
        document.getElementById('modal-image').src = '$dir' + detail_image;
        document.getElementById('modal').style.display = 'block';
    });
    </script>";
    $i++;
}

// 모달창 추가
echo "<div id='modal' style='display:none;position:fixed;top:0;left:0;width:100%;height:100%;background-color:rgba(0,0,0,0.5);'>
<img id='modal-image' src='' style='position:absolute;top:50%;left:50%;transform:translate(-50%,-50%);'>
</div>";
echo "<script>
document.getElementById('modal').addEventListener('click', function() {
    this.style.display = 'none';
});
</script>";
?> 
    </div>
</div>

</body>
</html>