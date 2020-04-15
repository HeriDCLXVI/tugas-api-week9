<?php
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json;");

	include "connect.php";

	$data = json_decode(file_get_contents("php://input"));

	$id = $data->id;

	$response = array();

	$query = mysqli_query($link, "DELETE FROM company where id = '$id'");

	if ($query) {
		$response['error'] = false;
		$response['message'] = "Data berhasil dihapus!";
	}
	else {
		$response['error'] = true;
		$response['message'] = "Data gagal dihapus!";
	}

	echo json_encode($response);
?>