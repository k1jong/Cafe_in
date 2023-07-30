<?php
	session_start();
	if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
	else $userid = "";

	$name = $_GET["name"];
	$current_stamp = $_GET["count"];
	// echo "<script>console.log('$userid');</script>";
	
	$con = mysqli_connect("localhost", "root", "1234", "cafe_in");
	$sql = "select * from cafe_info where name='$name'";
	mysqli_set_charset($con, "utf8"); // 한글 인코딩
	$result = mysqli_query($con, $sql);
	
	$row = mysqli_fetch_array($result);
	$own_id = $row["own_id"];
	$own_stamp = $row["stamp"];
	$own_stampbook = $row["stampbook"];
	$own_coupon = $row["coupon"];
	$own_coupon_detail = $row["coupon_detail"];
	
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
<script src="js/jquery.min.js"></script>
<script src="js/app.common.js"></script>
<script>
	function history_change(e) {
		$(".coupon_history a").attr("class","off");
		$(e).attr("class","on");
		var text = $(e).attr('id');
		$(".coupon_history tbody").css("display","none");
		$("."+text).css("display","");
	}
</script>
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
			<li id="menuOn_1"><a href="event1.html" id="appMenu1"><img src="img/icon_event.png">event</a></li>
			<li id="menuOn_2" class="on"><a href="coupon1.php" id="appMenu2"><img src="img/icon_coupon.png">coupon</a></li>
			<li class="main"><a href="main.php"><img src="img/icon_main.png"></a></li>
			<li id="menuOn_3"><a href="map.php" id="appMenu3"><img src="img/icon_map.png">map</a></li>
			<li id="menuOn_4"><a href="profile1.php" id="appMenu4"><img src="img/icon_profile.png">profile</a></li>
		</ul>
	</nav>
</header>

<div id="content" class="content">
	<div class="wrap">
		<h2><?= $name?></h2>

		<div id="m_content" class="m_content">

			<div class="stamp_div">
<?php
				for($i = 0; $i<$current_stamp; $i++){
?>
					<span><img src="img/<?= $own_stamp?>" alt="완료"></span>
<?php
				}
?>

				<p><img src="img/<?= $own_stampbook?>" alt="스탬프"></p>
			</div>
<?php
			
			$sql = "select * from coupon where mem_id='$userid' and own_id='$own_id'";
			$result = mysqli_query($con, $sql);
			$rows_record = mysqli_num_rows($result);
?>
			<div class="stamp_div">
				<p>보유쿠폰 <strong><?=$rows_record?></strong> 장<br>
<?php
					for($i = 0; $i<$rows_record; $i++){
?>
					<img src="img/<?= $own_coupon?>" alt="할인쿠폰">
<?php
					}
?>
				</p>
			</div>

			<div class="coupon_history">
				<a class="on" id="h1" onclick=history_change(this)>All</a>
				<a class="off" id="h2" onclick=history_change(this)>쿠폰 내역</a>
				<a class="off" id="h3" onclick=history_change(this)>스탬프 내역</a>
				<table>
					<colgroup>
						<col width="50%">
						<col width="40%">
						<col width="10%">
					</colgroup>
					
					<!-- 기록 ALL -->
					<tbody class="h1" style="display: null;">
<?php
						$sql = "select * from stamp_history where id='$userid' and cafe_name='$name' order by num desc ";
						$result = mysqli_query($con, $sql);
						$rows_record = mysqli_num_rows($result);
						for($i = 0; $i<$rows_record; $i++){
							mysqli_data_seek($result,$i);
							$row = mysqli_fetch_array($result);
							$title = $row["title"];
							$regist_day = $row["regist_day"];
							$count = $row["count"];
?>
						<tr>
							<td><?= $title?></td>
							<td><?= $regist_day?></td>
							<td><strong><?= $count?></strong></td>
						</tr>
<?php
						}
?>
					</tbody>
					
					<!-- 기록 쿠폰 -->
					<tbody class="h2" style="display: none;" >
<?php
						$sql = "select * from stamp_history where id='$userid' and cafe_name='$name' and (title LIKE '쿠폰%') order by num desc";
						$result = mysqli_query($con, $sql);
						$rows_record = mysqli_num_rows($result);
						for($i = 0; $i<$rows_record; $i++){
							mysqli_data_seek($result,$i);
							$row = mysqli_fetch_array($result);
							$title = $row["title"];
							$regist_day = $row["regist_day"];
							$count = $row["count"];
?>
						<tr>
							<td><?= $title?></td>
							<td><?= $regist_day?></td>
							<td><strong><?= $count?></strong></td>
						</tr>
<?php
						}
?>
					</tbody>
					
					<!-- 기록 스탬프 -->
					<tbody class="h3" style="display: none;">
<?php
						$sql = "select * from stamp_history where id='$userid' and cafe_name='$name' and (title LIKE '스탬프%') order by num desc";
						$result = mysqli_query($con, $sql);
						$rows_record = mysqli_num_rows($result);
						for($i = 0; $i<$rows_record; $i++){
							mysqli_data_seek($result,$i);
							$row = mysqli_fetch_array($result);
							$title = $row["title"];
							$regist_day = $row["regist_day"];
							$count = $row["count"];

?>
						<tr>
							<td><?= $title?></td>
							<td><?= $regist_day?></td>
							<td><strong><?= $count?></strong></td>
						</tr>
<?php
						}
						mysqli_close();
?>
					</tbody>

				</table>
			</div>
		</div>

	<div>
</div>

</body>
</html>