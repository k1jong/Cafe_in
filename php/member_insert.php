<?php
	$mb_id = $_POST["mb_id"];
	$mb_pw = $_POST["mb_pw"];
	$mb_name = $_POST["mb_name"];
	$mb_hp = $_POST["mb_hp"];
	$type = $_POST["mode"];
    $regist_day = date("Y-m-d (H:i)");

	$con = mysqli_connect("localhost", "root", "1234", "cafe_in");
	$sql = "insert into members(id, pass, name, phone, type, regist_day) ";
	$sql .= "values('$mb_id', '$mb_pw', '$mb_name', '$mb_hp', '$type', '$regist_day')";

	
	mysqli_set_charset($con, "utf8"); // 한글 인코딩
	mysqli_query($con, $sql);
	
	if($type == "owner"){
		$cafe_name = $_POST["cafe_name"];
		$cafe_phone = $_POST["cafe_phone"];
		$cafe_address = $_POST["cafe_address"];
		$sql = "insert into cafe_info (own_id, name, phone, address, regist_day) ";
		$sql .= "values('$mb_id', '$cafe_name', '$cafe_phone', '$cafe_address', '$regist_day')";
		mysqli_set_charset($con, "utf8"); // 한글 인코딩
		mysqli_query($con, $sql);
	}
	mysqli_close($con);

	echo "
			  <script>
				  location.href = '../login.html';
			  </script>
		  ";

?>