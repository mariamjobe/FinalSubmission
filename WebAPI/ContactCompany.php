<?php
$id = isset($_GET["id"])?$_GET["id"]:"";
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

	$sql = "Select Company_Phone from Company where CompanyID = '".$id."' ";
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
		$data = '{"contacts": [';
		// output data of each row
		while($row = $result->fetch_assoc()) {
			$data .= json_encode($row).',';
		}
	$data .= ']}';
	echo $data;
	}
}
?>