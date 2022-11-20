<?php
require_once "koneksi.php";
	if(function_exists($_GET['function'])) {
		$_GET['function']();
	}
	function get_user()
	{
		global $koneksi;
		$query = $koneksi->query("SELECT * FROM user_detail");
		while($row=mysqli_fetch_object($query))

	{
		$data[] = $row;
	}	
	$response=array(
		'status' => 1,
		'message' => 'Success',
		'data' => $data
	);
	header('Content-Type: application/json');
	echo json_encode($response);
}


function get_user_id()
{
	global $koneksi;
	if (!empty($_GET["id"])) {
		$id = $_GET["id"];
	}
	$query = "SELECT * FROM user_detail WHERE id= $id";
	$result = $koneksi->query($query);
	while($row = mysqli_fetch_object($result))
	{
		$data[]= $row;
	}
	if($data)
	{
	$response = array (
		'status' => 1, 
		'message' => 'Success',
		'data' => $data
	);
}else{
	$response=array (
		'status' => 0,
		'message' =>'No Data Found'
	);
}
header('Content-Type: application/json');
echo json_encode($response);
	}
	

function update_user()
{
	global $koneksi;
	if(!empty($_GET["id"])) {
		$id=$_GET["id"];
		$email = $_GET["email"];
		$password = $_GET["password"];
		$name = $_GET["name"];
	}
	$query = "UPDATE user_detail SET user_email = '$email', user_password = '$password', user_fullname = '$name' WHERE id = $id";
	if($result=mysqli_query($koneksi, $query)){
		if($result)
	{
		$response=array(
			'status' => 1,
			'message' =>'Update Success'
		);
	}
	else
		{
		$response=array(
			'status' => 0,
			'message' =>'Update Failed'
		);
	}
}else {
		$response=array(
			'status' => 0,
			'message' =>'Wrong Parameter',
			'data' => $id,
			'query' => $query
		);
	}
		header('Content-Type: application/json');
		echo json_encode($response);
	}


function delete_user()
{
	global $koneksi;
	$id = $_GET['id'];
	$query = "DELETE FROM user_detail WHERE id=$id";
	if(mysqli_query($koneksi, $query))
	{
		$response=array(
			'status' => 1, 
			'message' => 'Delete Success'
		);
	}
	else{
		$response=array(
			'status'=> 0,
			'message'=> 'Delete Fail.',
			'message' => $query
		);
	}
	header('Content=Type: application/json');
		echo json_encode($response);
}


function input_user()
{
	global $koneksi;

	if(!empty($_GET['id'])) {
		$id = $_GET['id'];
		$email = $_GET['email'];
		$password = $_GET['password'];
		$name = $_GET['name'];
		$level = $_GET['level'];
	}
 	$query = "INSERT INTO user_detail VALUES ('$id', '$email', '$password', '$name', '$level')";
    $result = mysqli_query($koneksi, $query);
	if($result)
	{
		$response=array(
			"status" => 1,
			"message" => "INSERT INTO user_detail ('user_email', 'user_password', 'user_fullname', 2) VALUES ('email', 'password', 'name', 2)"
		);
	}else {
		$response=array(
			'status' => 0,
			'message' =>'Insert Failed',
		);
	}
		header('Content-Type: application/json');
		echo json_encode($response);
	}
?> 