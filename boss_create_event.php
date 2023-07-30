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
	/* input[type="submit"] {
  color: black ;
  font-size: 20px ;
  padding: 0px 20px ;
  display: block ;
  margin: 0 auto ;
}  */
	form{
		display : flex;
		flex-direction : column;
	}
	h4{
		margin : 8px 0px;
	}
	input[type="text"],
	input[type="date"],
	input[type="file"],
	input[type="submit"]{
		margin-left : 20px;
		width : 70%;
		border: 1px solid #ccc;
		/* align-items : center; */
	}

	/* input[type="text"],
	input[type="date"],
	input[type="file"],
	input[type="submit"] {
		width: 70%;
		height : 50px;
		font-size: 16px;
		border-radius: 5px;
		border: 1px solid #ccc;
		box-sizing: border-box;
		align-items : center;


	input[type="submit"] {
		border : 0px;
		color: black;
		background-color: #F4D2BE;
		cursor: pointer;
		font-weight : bold;
	}

	input[type="submit"]:hover {
		background-color: #005580;
	} */
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
				<fieldset id="hd_sch">
					
					<form action="boss_upload.php" method="post" enctype="multipart/form-data">
					  <h4>&nbsp;&nbsp;&nbsp;제목: <input type="text" id="title" name="title"></h4>
					  <h4>시작일: <input type="date" id="start_date" name="start_date"></h4>
					  <h4>종료일: <input type="date" id="end_date" name="end_date"></h4>
					  <h4>베너 이미지: <input type="file" id="small_image" name="small_image"></h4>
					  <h4>상세 이미지: <input type="file" id="detail_image" name="detail_image"></h4>
					  <input type="submit" value="저장하기">
					</form> 

				</fieldset>

			</div>

		</div>

	<div>
<!-- 									
			
			// // 데이터베이스 연결
			// 	$conn = mysqli_connect("localhost", "root", "1234", "cafe_in");
			// 	mysqli_set_charset($conn, "utf8"); // 한글 인코딩		
			// 	// Check connection
			// 	if ($conn->connect_error) {
			// 		die("Connection failed: " . $conn->connect_error);
			// }
		
			
		
			// session_start();
			// $own_id = 'owner1';
			// //$own_id = $_SESSION['own_id'];
			// // 폼 데이터 가져오기
			// $title = $_POST['title'];
			// $start_date = $_POST['start_date'];
			// $end_date = $_POST['end_date'];
			// $small_image = $_FILES['small_image']['name'];
			// $detail_image = $_FILES['detail_image']['name'];
	
			// echo "title: " . $title . "<br>";
			// echo "start_date: " . $start_date . "<br>";
			// echo "end_date: " . $end_date . "<br>";
			// echo "small_image: " . $small_image . "<br>";
			// echo "detail_image: " . $detail_image . "<br>";

			// 			// 이미지 파일 저장 디렉토리
			// $target_dir = "/cafe_in/img/event/";
			// move_uploaded_file($_FILES["small_image"]["tmp_name"], $target_dir . $small_image);
			// move_uploaded_file($_FILES["detail_image"]["tmp_name"], $target_dir . $detail_image);
		    
			// // 데이터베이스에 저장
			// $stmt = $conn->prepare("INSERT INTO event (title, start_date, end_date, small_image, detail_image,own_id) VALUES (?, ?, ?, ?, ?, ?)");
			// $stmt->bind_param("ssssss", $title, $start_date, $end_date, $small_image, $detail_image,$own_id);
			// $stmt->execute(); -->
		 
</div>

</body>
</html>