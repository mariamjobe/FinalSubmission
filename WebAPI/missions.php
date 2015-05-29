<?php
$id = isset($_GET["id"])?$_GET["id"]:"";
$id2 = isset($_GET["id2"])?$_GET["id2"]:"";
$result = false;
if(empty($id) == false) {
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
	
	$sql = "select Mission_Name, Address, City, Country from Missions where Employee_ID = '".$id."' AND CompanyID = '".$id2."' ";
	$result = $conn->query($sql);
	$data = '{"missions": [';
	if ($result->num_rows > 0) {
		
		// output data of each row
		while($row = $result->fetch_assoc()) {
			$data .= json_encode($row).',';
		}
	}
	$data .= ']}';
	echo $data;
}
?>