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
		<a href="boss_menu.php" class="Left"><img src="img/icon_menu.png" alt="메뉴"></a>
		<a href="#" class="Left"><img src="img/arrow_left.png" alt="이전으로" onClick="javascript:history.back(-1);"></a>
		<a href="boss_menu.php" class="Right"><img src="img/icon_home.png" alt="메인으로"></a>
		<a href="#" class="Right"><span class="alarm">&nbsp;</span><img src="img/icon_notice.png" alt="알림"></a>
	</div>
</header>

<div id="content" class="content">
	<div class="wrap">
		<h2>스탬프 관리</h2>

		<div id="m_content" class="m_content">

			<div class="profile_div">
				<p>카페365 <strong>test</strong> 님 입니다.</p>

				<form action="boss_stamp_edit2.php" name="" id="" onsubmit="return form_submit(this);" method="post">
					<input type="hidden" name="mode" value="m">
					<input type="hidden" name="secureCode" id="secureCode">
					<label for="" class="sound_only">수량</label>
					<input type="number" name="stampNum" id="stampNum" class="frm_input" style="width:100px;height:22px;">
					<input type="submit" value="추가하기" class="edit_btn">
				</form>

				<table>
					<thead>
						<tr>
							<th>일련번호</th>
							<th>등록일</th>
							<th>관리</th>
						</tr>
					</thead>
					<tbody>
						<?php
						// Connect to the database
						$conn = mysqli_connect("localhost", "root", "1234", "cafe_in");
						mysqli_set_charset($conn, "utf8"); // Set Korean encoding

						// Check connection
						if ($conn->connect_error) {
							die("Connection failed: " . $conn->connect_error);
						}

						// Handle form submission
						if (isset($_POST['stampNum'])) {
							$num = $_POST['stampNum'];

							// Prepare the SQL statement
							$stmt = $conn->prepare("INSERT INTO stamp (num, mem_id, own_id, regist_day) VALUES (null, 'test', 'owner1', NOW())");

							for ($i = 1; $i <= $num; $i++) {
								$stmt->bind_param("test", $_SESSION['mem_id']);
								$stmt->execute();
								$inserted_id = $stmt->insert_id;
							}

							$stmt->close();
						}

						// Handle deletion
						if (isset($_POST['delete_id'])) {
							$delete_id = $_POST['delete_id'];

							// Prepare the SQL statement for deleting the entry
							$delete_stmt = $conn->prepare("DELETE FROM stamp WHERE num = ?");

							// Bind the ID parameter
							$delete_stmt->bind_param("i", $delete_id);

							// Execute the deletion
							$delete_stmt->execute();

							$delete_stmt->close();
						}

						// Display existing stamp entries for mem_id = 'test'
						$query = "SELECT * FROM stamp WHERE mem_id = 'test' AND own_id = 'owner1'";
						$result = $conn->query($query);
						if ($result->num_rows > 0) {
							while ($row = $result->fetch_assoc()) {
								echo "<tr>";
								echo "<td>" . $row['num'] . "</td>";
								echo "<td>" . $row['regist_day'] . "</td>";
								echo "<td>
										  <form action='boss_stamp_edit2.php' method='post' onsubmit='return confirm(\"정말 삭제하시겠습니까?\");'>
											  <input type='hidden' name='delete_id' value='" . $row['num'] . "'>
											  <input type='submit' value='삭제' class='edit_btn'>
										  </form>
									  </td>";
								echo "</tr>";
							}
						}

						$conn->close();

						?>
					</tbody>
				</table>
			</div>

		</div>

	<div>
</div>

</body>
</html>
