<?php 
	session_start();
	if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
	else $userid = "";

	$con = mysqli_connect("localhost", "root", "1234", "cafe_in");
	$sql = "select * from members where id='$userid'";
	mysqli_set_charset($con, "utf8"); // 한글 인코딩
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_array($result);
	
	$name = $row["name"];
	$phone = $row["phone"];
	$id = $row["id"];
	$pass = $row["pass"];

	mysqli_close();
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
	function user_check() {
		if(<?= $pass?> == $("#profile_check_pass").val()){
			// console.log("인증성공!");
			$(".profile_div input").removeAttr("disabled");
			$(".profile_check").removeAttr("style");
			$(".modify_btn").hide();
			$(".save_btn").show();
		}
		else {
			console.log("비밀번호가 틀렸습니다.");
		}
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
		<h2>프로필</h2>

		<div id="m_content" class="m_content">

			<a href="profile1.php" class="page_btn on">내 정보</a>
			<a href="profile2.php" class="page_btn">전체사용내역</a>

			<form name="membercheck" id="membercheck" method="post" action="./php/profile_modify.php">
			<input type="hidden" name="mode" value="m">
			<input type="hidden" name="secureCode" id="secureCode">
			
				<div class="profile_div">
					<p><img src="img/icon_profile_thum.png" alt="프로필"></p>
					<dl>
						<dt>아이디</dt>
						<dd><?= $id?></dd>
						<dt>이름</dt>
						<dd><input type="text" id="profile_check_name" name="name" class="profile_check" placeholder="이름" value="<?= $name?>" style="border:none;" required disabled></dd>
						<dt>전화번호</dt>
						<dd><input type="text" id="profile_check_phone" name="phone" class="profile_check" placeholder="전화번호" value="<?= $phone?>" style="border:none;" required disabled></dd>
						<dt>비밀번호</dt>
						<dd><input type="password" id="profile_check_pass" name="pass" placeholder="비밀번호입력" required></dd>
					</dl>
					<input type="button" value="수정하기" class="modify_btn block_btn" onclick=user_check()>
					<input type="submit" value="저장하기" class="save_btn block_btn" style="display : none;">
				</div>

			</form>

		</div>

	<div>
</div>

</body>
</html>