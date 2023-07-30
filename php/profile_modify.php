<?php
	session_start();
    $userid = $_SESSION["userid"];

	$pass = $_POST["pass"];
	$name = $_POST["name"];
	$phone = $_POST["phone"];

	$con = mysqli_connect("localhost", "root", "1234", "cafe_in");

	$sql = "update members set pass = '$pass', name = '$name', phone = '$phone' where id='$userid'";
	$result = mysqli_query($con, $sql);
	mysqli_close($con);

	echo "
            <script>
                location.href = '../profile1.php';
            </script>
        ";
?>