<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mydbh";

// create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$date = $_POST['date'];
$time = $_POST['time'];
$band_id = $_POST['band_id'];
$main = $_POST['main'];
$sets = $_POST['sets'];
$length = $_POST['length'];

// validate form data here

$stmt = $conn->prepare("INSERT INTO events_has_bands (datum, aanvangEvent, bands_id, hoofdact, aantalSets, lengteVanSetMinuten) VALUES (?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssiiii", $date, $time, $band_id, $main, $sets, $length);
$stmt->execute();

header("Location: seeAll.php");
exit();
?>