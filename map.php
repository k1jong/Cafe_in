<!doctype html>
<html lang="ko">
<head>
<title>cafe-in</title>
<meta charset="utf-8">

<meta http-equiv="Content-Security-Policy" content="default-src *; style-src 'self' 'unsafe-inline'; script-src 'self' 'unsafe-inline' 'unsafe-eval' dapi.kakao.com t1.daumcdn.net">
<meta name="msapplication-tap-highlight" content="no">
<meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1.0, minimum-scale=1.0, width=device-width, viewport-fit=cover">
<meta name="color-scheme" content="light dark">
<link rel="stylesheet" href="css/style.css">
<script src="js/jquery.min.js"></script>
<script src="js/app.common.js"></script>
</head>

<body class="main">
<style>
	.infowindow-title {
    font-family: "나눔고딕", sans-serif;
    font-size: 18px;
    color: #4a4a4a;
	}
</style>
<header>
	<div class="wrap">
		<h1 id="appTitle">cafe-in</h1>
		<a href="menu.html" class="Left"><img src="img/icon_menu.png" alt="메뉴"></a>
		<a href="#" class="Left"><img src="img/arrow_left.png" alt="이전으로" onClick="javascript:history.back(-1);"></a>
		<a href="profile1.php" class="Right profile_thum"><img src="img/icon_profile_thum.png" alt="프로필"></a>
		<a href="profile2.php" class="Right"><img src="img/icon_notice.png" alt="알림"></a>
	</div>

	<nav>
		<ul class="wrap">
			<li id="menuOn_1"><a href="eventlist.php" id="appMenu1"><img src="img/icon_event.png">event</a></li>
			<li id="menuOn_2"><a href="coupon1.php" id="appMenu2"><img src="img/icon_coupon.png">coupon</a></li>
			<li class="main"><a href="main.php"><img src="img/icon_main.png"></a></li>
			<li id="menuOn_3" class="on"><a href="map.php" id="appMenu3"><img src="img/icon_map.png">map</a></li>
			<li id="menuOn_4"><a href="profile1.php" id="appMenu4"><img src="img/icon_profile.png">profile</a></li>
		</ul>
	</nav>
</header>

<div id="content" class="content">
	<div class="wrap">
		<h2>지도</h2>

		<div id="m_content" class="m_content">

			<div id="map"style="width:100%;height:550px;">
				<!--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12821.778718543743!2d128.77486693955075!3d36.5433896!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3566a330c9285f7d%3A0xfd7ce8bbef2e391f!2z7J2065SU7JW87Luk7ZS8IOyViOuPmeuMgOygkA!5e0!3m2!1sko!2skr!4v1684895104021!5m2!1sko!2skr" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>-->
			</div>
			    <!-- 지도를 표시할 div -->
			<script type="text/javascript" src="//dapi.kakao.com/v2/maps/sdk.js?appkey=6557699d8543fc1e3ee8b9ccd0431cf1&libraries=services"></script>
			<script>
			var mapContainer = document.getElementById('map'), // 지도를 표시할 div 
				mapOption = { 
					center: new kakao.maps.LatLng(36.5422, 128.7963), // 안동대 36.538679°128.787205°


					level: 4 // 지도의 확대 레벨
				};
			
				// 지도를 표시할 div와  지도 옵션으로  지도를 생성합니다
				var map = new kakao.maps.Map(mapContainer, mapOption); 
				//줌 기능
				var zoomControl = new kakao.maps.ZoomControl();
				map.addControl(zoomControl, kakao.maps.ControlPosition.MIDDLERIGHT);
				
				// 주소-좌표 변환 객체함수
				var geocoder = new kakao.maps.services.Geocoder();
				
				function getCoordsByAddress(address) {
				  // promise 형태로 반환
				  return new Promise((resolve, reject) => {
					// 주소로 좌표를 검색합니다
					geocoder.addressSearch(address, function (result, status) {
					  // 정상적으로 검색이 완료됐으면
					  if (status === kakao.maps.services.Status.OK) {
						var coords = new kakao.maps.LatLng(result[0].y, result[0].x);
						return resolve(coords);
					  }
					  reject(new Error("getCoordsByAddress Error: not valid Address"));
					});
				  });
				}
				
				function getCentent(cafe_name) {
					 return `<div class="infowindow">
					  <div class="infowindow-body">
  						 <p style="text-align: center;" class="infowindow-title">${cafe_name}</p>
					</div>
					`;
				}		
				
				<?php
				$con = mysqli_connect("localhost", "root", "1234", "cafe_in");
   				$sql = "select address from cafe_info";
				mysqli_set_charset($con, "utf8"); // 한글 인코딩		
				// Check connection
				if ($con->connect_error) {
					die("Connection failed: " . $con->connect_error);
				}

				$result = $con->query($sql);

				$data_array = array();

				if ($result->num_rows > 0) {
					// output data of each row
					while($row = $result->fetch_assoc()) {
						array_push($data_array, $row["address"]);
					}
				} else {
					echo "0 results";
				}
				//print_r($data_array);
				$con->close();

				?>
				<?php
				$con = mysqli_connect("localhost", "root", "1234", "cafe_in");
   				$sql = "select name from cafe_info";
				mysqli_set_charset($con, "utf8"); // 한글 인코딩		
				// Check connection
				if ($con->connect_error) {
					die("Connection failed: " . $con->connect_error);
				}

				$result = $con->query($sql);

				$data_name = array();

				if ($result->num_rows > 0) {
					// output data of each row
					while($row = $result->fetch_assoc()) {
						array_push($data_name, $row["name"]);
					}
				} else {
					echo "0 results";
				}
				//print_r($data_array);
				$con->close();

				?>


				
				var row = <?php echo json_encode($data_array); ?>;
				var cafe_name = <?php echo json_encode($data_name); ?>;
				setMap(row);
				
				async function setMap(row) {
				  for (var i = 0; i < row.length; i++) {
					let coords = await getCoordsByAddress(row[i]);
			
					var marker = new kakao.maps.Marker({
					  map: map, // 마커를 표시할 지도
					  position: coords,// 마커를 표시할 위치
					});


					markerArray.push(marker);
					  
					   var infowindow = new kakao.maps.InfoWindow({
					  content: getCentent(cafe_name[i]),
					  //content: get(dataSet[i]), // 인포윈도우에 표시할 내용
					});

					infowindowArray.push(infowindow)//인포윈도우 배열이 생성될때마다 인포윈도우 개체 추가

					// 마커에 mouseover 이벤트와 mouseout 이벤트를 등록합니다
					// 이벤트 리스너로는 클로저를 만들어 등록합니다 
					// for문에서 클로저를 만들어 주지 않으면 마지막 마커에만 이벤트가 등록됩니다
					kakao.maps.event.addListener(
					  marker,
					  "click",
					  makeOverListener(map, marker, infowindow, coords)
					);
					kakao.maps.event.addListener(
					  map, "click",
					  makeOutListener(infowindow)
					);
				  }	
				}
				function makeOverListener(map, marker, infowindow, coords) {
  return function () {
    // - 클릭시 다른 인포 윈도우 닫기
    closeInfoWindow();
    infowindow.open(map, marker);
    //- 클릭한 곳으로 지도 중심 옮;기기
    // map.panTo(coords)
  };
}
let infowindowArray = [] //인포윈도우를 관리할 배열
function closeInfoWindow() {
  for (let infowindow of infowindowArray) {
    infowindow.close();
  }

}

// 인포윈도우를 닫는 클로저를 만드는 함수입니다 
function makeOutListener(infowindow) {
  return function () {
    infowindow.close();
  };
}

		let markerArray = [];
		function closeMarker() {
		  for (marker of markerArray) {
			marker.setMap(null)
		  }
		}
			</script>
		</div>

	<div>
</div>

</body>
</html>