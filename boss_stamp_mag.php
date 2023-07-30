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
		<a href="menu.htm" class="Left"><img src="img/icon_menu.png" alt="메뉴"></a>
		<a href="#" class="Left"><img src="img/arrow_left.png" alt="이전으로" onClick="javascript:history.back(-1);"></a>
		<a href="main.htm" class="Right"><img src="img/icon_home.png" alt="메인으로"></a>
		<a href="profile2.htm" class="Right"><span class="alarm">&nbsp;</span><img src="img/icon_notice.png" alt="알림"></a>
	</div>
</header>

<div id="content" class="content">
	<div class="wrap">
		<h2>스탬프 관리</h2>

		<div id="m_content" class="m_content">

			<div class="profile_div">
				<fieldset id="hd_sch">
					<legend>검색</legend>
					<form name="frmsearch1" method="POST" action="" onsubmit="return search_submit(this);">
						<label for="sch_str" class="sound_only">검색어<strong class="sound_only"> 필수</strong></label>
						<input type="text" name="q" value="" id="sch_str" required placeholder="검색어를 입력해주세요">
						<button type="submit" id="sch_submit" value="검색"><img src="img/icon_search.png" alt="검색"></button>
					</form>
					<script>
						function search_submit(f) {
							if (f.q.value.length < 2) {
								alert("검색어는 두글자 이상 입력하십시오.");
								f.q.select();
								f.q.focus();
								return false;
							}
							return true;
						}
					</script>
					<?php
// Connect to the database
$db = new mysqli("localhost", "root", "1234", "cafe_in");
mysqli_set_charset($db, "utf8"); // 한글 인코딩	
// Check for a successful connection
if ($db->connect_error) {
    die("Connection failed: " . $db->connect_error);
}

// Get the search value from the form
$searchValue = $_POST['q'];

// Create a prepared statement
$stmt = $db->prepare("SELECT * FROM members WHERE phone = ?");

// Check for errors in the prepared statement
if (!$stmt) {
    die("Error in prepared statement: " . $db->error);
}

// Bind the search value as a parameter to the prepared statement
$stmt->bind_param("s", $searchValue);

// Execute the prepared statement
if (!$stmt->execute()) {
    die("Error executing prepared statement: " . $stmt->error);
}

// Get the result of the query
$result = $stmt->get_result();

// Check if any rows were returned
if ($result->num_rows > 0) {
    // Output the data of each row
    while($row = $result->fetch_assoc()) {
        echo "Name: " . $row["name"]. " - Phone: " . $row["phone"]. "<br>";
		echo " <button onclick=\"location.href='edit_coupon.php?id=" . $row["id"] . "'\">수정</button><br>";
    }
} else {
    // No results found
    echo "0 results";
}

// Close the prepared statement and the database connection
$stmt->close();
$db->close();
?>
				</fieldset>

				
			</div>

		</div>

	<div>


</div>

</body>
</html>