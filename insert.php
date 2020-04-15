<?php
	header("Access-Control-Allow-Origin: *");
	header("Content-Type: application/json;");

	include "connect.php";

	$data = json_decode(file_get_contents("php://input"));

	$kode = $data->kode;
	$nama = $data->nama;

	$response = array();

	$query = mysqli_query($link, "INSERT INTO company(kode, nama) VALUES ('$kode', '$nama')");

	if ($query) {
		$response['error'] = false;
		$response['message'] = "Data berhasil disimpan!";
	}
	else {
		$response['error'] = true;
		$response['message'] = "Data gagal disimpan!";
	}

	echo json_encode($response);
?>