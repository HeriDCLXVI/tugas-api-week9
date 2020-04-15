<?php
	header("Access-Control-Allow-Origin: *");

	include "connect.php";

	$query = mysqli_query($link, "select * from company");

	$companies = array();
	while ($row = mysqli_fetch_array($query)) {
		$company = array(
			"id" => $row['id'],
			"kode" => $row['kode'],
			"nama" => $row['nama'],
		);
		array_push($companies, $company);
	}

	echo json_encode($companies);
?>