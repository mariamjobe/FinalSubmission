<?php
$username = isset($_GET["username"])?$_GET["username"]:"";
$password = isset($_GET["password"])?$_GET["password"]:"";

if (empty($username) && isset($_POST["username"]))
	$username = $_POST["username"];

$output = 'false';
if(empty($username) == false) {
	$servername = "dmysql01.westbahr.com";
	$db_login = "system_dev";
	$db_pwd = "98dSSCX9ryYLUwv8";
	$db = "system_dev";
	// Create connection
	$conn = new mysqli($servername, $db_login, $db_pwd, $db);
	// Check connection
	if ($conn->connect_error) {
		die("Connection failed: " . $conn->connect_error);
	}
	
	$sql = "select * from Employee where Username = '".$username."' AND Password = '".$password."'";
	$result = $conn->query($sql);
	if ($result->num_rows > 0) {
		$data = '{"data": [';
		// output data of each row
		while($row = $result->fetch_assoc()) {
			$data .= json_encode($row).',';
		}
		$data .= ']}';
		echo $data;
	}	
}
?>