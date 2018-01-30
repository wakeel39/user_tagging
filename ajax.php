<?php 
//ajax.php
$con = mysqli_connect("127.0.0.1", "root", "", "mywork");
if (!$con) {
     
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}

    $query = "SELECT * FROM users";
	$rows  = mysqli_query($con,$query);
	$res = array();
	while($row = mysqli_fetch_object($rows)) {
		 
		$res[] = $row;
	}
	echo json_encode($res);
?>