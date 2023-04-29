<?php
	$date = $_POST['date'];
	$time = $_POST['time'];
	$band_id = $_POST['band_id'];
	$main = $_POST['main'];
	$start = $_POST['start'];
	$sets = $_POST['sets'];
	$length = $_POST['length'];

	// validate form data here

	$stmt = $conn->prepare("INSERT INTO events_has_bands (datum, aanvangEvent, bands_id, hoofdact, aanvangShow, aantalSets, lengteVanSetMinuten) VALUES (?, ?, ?, ?, ?, ?, ?)");
	$stmt->bind_param("ssiiiii", $date, $time, $band_id, $main, $start, $sets, $length);
	$stmt->execute();
?>
