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
	<style>
		.sliderBox{
			border-top : 2px solid grey;
			border-bottom : 2px solid grey;
			display : flex;
			justify-content: center;
			height : 120px;
		}
		.slider {
			width: 1200px;
			height: 120px;
		  }
		.slider img{
			height : 120px;
			width : 100%;
		}
	</style>
	<div class="wrap">
		<h1 id="appTitle">cafe-in</h1>
		<!-- <a href="#" class="logo"><img src="img/logo.png" alt="메뉴" class=logo></a> -->
		<a href="menu.html" class="Left"></a>
		<a href="profile1.php" class="Right profile_thum"><img src="img/icon_profile_thum.png" alt="프로필"></a>
		<a href="profile2.php" class="Right" class="alarm"><span class="alarm">&nbsp;</span><img src="img/icon_notice.png" alt="알림"></a>
	</div>

	<nav>
		<ul class="wrap">
			<li id="menuOn_1"><a href="eventlist.php" id="appMenu1"><img src="img/icon_event.png">event</a></li>
			<li id="menuOn_2"><a href="coupon1.php" id="appMenu2"><img src="img/icon_coupon.png">coupon</a></li>
			<li class="main"><a href="main.php"><img src="img/icon_main.png"></a></li>
			<li id="menuOn_3"><a href="map.php" id="appMenu3"><img src="img/icon_map.png">map</a></li>
			<li id="menuOn_4"><a href="profile1.php" id="appMenu4"><img src="img/icon_profile.png">profile</a></li>
		</ul>
	</nav>
</header>
	
<div id="content" class="content">
	<div class="wrap">

		<div id="m_content" class="m_content">
			<!-- ---------------------slide----------------- -->
		<div class="sliderBox">
			<section id="slider1" class="slider">
				<div><img src="img/pic1.png" alt=""></div>
				<div><img src="img/pic2.png" alt=""></div>
				<div><img src="img/pic3.png" alt=""></div>
				<div><img src="img/pic4.png" alt=""></div>
				<div><img src="img/pic5.png" alt=""></div>
			</section>

		</div>

			<!-- <a href="event1.html"><img src="img/event1.png" alt="이벤트1"></a> -->

			<div class="coupon_main coupon_div">
<?php 
				session_start();
				if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
				else $userid = "";
				
				$con = mysqli_connect("localhost", "root", "1234", "cafe_in");
				$sql = "select own_id from stamp where mem_id='$userid' group by own_id";
				mysqli_set_charset($con, "utf8"); // 한글 인코딩
				$result = mysqli_query($con, $sql);
				$rows_record = mysqli_num_rows($result);
				
				for($i = 0; $i < $rows_record; $i++){
					mysqli_data_seek($result, $i);
					$row = mysqli_fetch_array($result);
					$own_id = $row["own_id"];
					
					// 카페 이름
					$sql2 = "select name from cafe_info where own_id='$own_id'";
					$result2 = mysqli_query($con, $sql2);
					$row2 = mysqli_fetch_array($result2);
    				$cafe_name = $row2["name"];
					// echo "<script>console.log('$cafe_name');</script>";
					
					// 스탬프 개수
					$sql3 = "select num from stamp where mem_id='$userid' and own_id='$own_id'";
					$result3 = mysqli_query($con, $sql3);
					$row3 = mysqli_fetch_array($result3);
    				$current_stamp = $row3["num"]%10;
					// echo "<script>console.log('$current_stamp');</script>";
					
					?>
					<a href="coupon_detail.php?name=<?=$cafe_name?>&count=<?=$current_stamp?>">
						<dl>
							<dt><?=$cafe_name?></dt>
							<dd><?=$current_stamp?>/10</dd>
						</dl>
					</a>
<?php
				}
				mysqli_close();
				
?>
			</div>

		</div>

	<div>
</div>
<script>
		//------------------------------slide
function Slider(target, type) {
    let index = 1;
    let isMoved = true;
    const speed = 1000; 
  
    const transform = "transform " + speed / 1000 + "s";
    let translate = (i) => "translateX(-" + 100 * i + "%)";
    
    const slider = document.querySelector(".slider");
    const sliderRects = slider.getClientRects()[0];
    slider.style["overflow"] = "hidden";
  
    const container = document.createElement("div");
    container.style["display"] = "flex";
    container.style["width"] = sliderRects.width + "px";
    container.style["height"] = sliderRects.height + "px";
    container.style["transform"] = translate(index);
  
    // 슬라이더 화면 목록
    let boxes = [].slice.call(slider.children);
    boxes = [].concat(boxes[boxes.length - 1], boxes, boxes[0]);
  
    // 슬라이더 화면 스타일
    const size = boxes.length;
    for (let i = 0; i < size; i++) {
      const box = boxes[i];
      box.style["flex"] = "none";
      box.style["flex-wrap"] = "wrap";
      box.style["height"] = "100%";
      box.style["width"] = "100%";
      container.appendChild(box.cloneNode(true));
    }
  
    container.addEventListener("transitionstart", function () {
      isMoved = false;
      setTimeout(() => {
        isMoved = true;
      }, speed);
    });
    container.addEventListener("transitionend", function () {
      // 처음으로 순간이동
      if (index === size - 1) {
        index = 1;
        container.style["transition"] = "none";
        container.style["transform"] = translate(index);
      }
    });
  
    slider.innerHTML = "";
    slider.appendChild(container);
  
    return {
    //   move: function (i) {
    //     if (isMoved === true) {
    //       index = i;
    //       container.style["transition"] = transform;
    //       container.style["transform"] = translate(index);
    //     }
    //   },
      next: function () {
        if (isMoved === true) {
          index = (index + 1) % size;
          container.style["transition"] = transform;
          container.style["transform"] = translate(index);
        }
      }
    };
  }
  
  const s1 = new Slider("#slider1", "H");
  
  setInterval(() => {
    s1.next();
  }, 2500)
  </script>
</body>
</html>