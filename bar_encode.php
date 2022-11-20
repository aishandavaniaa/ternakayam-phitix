<?php
require("koneksi.php");
header('Content-Type: application/json');

$sqlQuery = "SELECT * FROM distribusi ORDER BY total_ayam";

$result = mysqli_query($koneksi,$sqlQuery);

$data = array();
foreach ($result as $row) {
	$data[] = $row;
}

mysqli_close($koneksi);

echo json_encode($data);
?> 