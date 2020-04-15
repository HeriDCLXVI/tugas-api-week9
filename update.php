<?php
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json;");

	include "connect.php";

	$data = json_decode(file_get_contents("php://input"));

	$id = $data->id;
	$kode = $data->kode;
	$nama = $data->nama;

	$response = array();

	$query = mysqli_query($link, "UPDATE company set kode = '$kode', nama = '$nama' where id = '$id'");

	if ($query) {
		$response['error'] = false;
		$response['message'] = "Data berhasil diupdate!";
	}
	else {
		$response['error'] = true;
		$response['message'] = "Data gagal diupdate!";
	}

	echo json_encode($response);
?>