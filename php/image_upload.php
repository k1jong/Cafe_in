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
		/* align-items : space-around; */
	}
	span{
		font-weight : bold;
	}
	form div{
		margin : 15px 0;
		width : 100%
	}
	input[type="text"],
	input[type="date"],
	input[type="file"],
	input[type="submit"]{
		margin-left : 15px;
		height : 35px;
		border: 1px solid #ccc;
		/* align-items : center; */
	}
	input[type="file"]{
		width : 65%;
		font-size : 14px;
	}
	input[type="submit"] {
		border : 0px;
		color: black;
		background-color: #F4D2BE;
		cursor: pointer;
		font-weight : bold;
	}

	input[type="submit"]:hover {
		background-color: #f5cac3;
	}
	
</style>
	
<header>
	<div class="wrap">
		<h1 id="appTitle">cafe-in business</h1>
		<a href="menu.htm" class="Left"><img src="img/icon_menu.png" alt="메뉴"></a>
		<a href="#" class="Left"><img src="img/arrow_left.png" alt="이전으로" onClick="javascript:history.back(-1);"></a>
		<a href="main.htm" class="Right"><img src="img/icon_home.png" alt="메인으로"></a>
		<a href="profile2.htm" class="Right"><span class="alarm">&nbsp;</span><img src="img/icon_notice.png" alt="알림"></a>
	</div>
</header>

<div id="content" class="content">
	<div class="wrap">
		<h2>이벤트 진행하기</h2>

		<div id="m_content" class="m_content">

			<div class="profile_div">
				<fieldset id="hd_sch">
					<body>
   	
					<form action="upload.php" method="post" enctype="multipart/form-data">
					  <div class="box">
						  <div>제목: </div><input type="text" id="title" name="title">
						</div>
						<div class="box">
						  <div>시작일: </div><input type="date" id="start_date" name="start_date">
						</div>
						<div class="box">
						  <div>종료일: </div><input type="date" id="end_date" name="end_date">
						</div>
						<div class="box">
						  <div>베너 이미지: </div><input type="file" id="small_image" class="fileImg" name="small_image">
						</div>
						<div class="box">
						  <div>상세 이미지: </div><input type="file" id="detail_image" class="fileImg" name="detail_image">
						</div>
					  
					  <input type="submit" value="저장하기">
					</form> 


				</fieldset>

			</div>

		</div>

	<div>
									
			

</div>

</body>
</html>