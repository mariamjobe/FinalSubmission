<?php
$username = isset($_GET["username"])?$_GET["username"]:"";
$password = isset($_GET["password"])?$_GET["password"]:"";

if (empty($username) && isset($_POST["username"]))
	$username = $_POST["username"];
if (empty($password) && isset($_POST["password"]))
	$password = $_POST["password"];

$output = 'false';
if(empty($username) == false && empty($password) == false) {
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
		echo $data;
		$output = 'true';
		print "$output";
	}	
}
echo $output;
?>