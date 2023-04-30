<!DOCTYPE html>
<html>
<head>
	<title>All Events</title>
	<style>
		table {
			border-collapse: collapse;
			width: 100%;
		}
		th, td {
			text-align: left;
			padding: 8px;
			border-bottom: 1px solid #ddd;
		}
		th {
			background-color: #f2f2f2;
			color: black;
		}
		tr:hover {
			background-color: #f5f5f5;
		}
	</style>
</head>
<body>
	
    <a href="bandAll.php">View all bands</a><br><br>
    <a href="eventAll.php">View all events</a><br><br>
    
    <a href="index.php">
    <h1>All Events</h1>
    </a>


	<form method="post" action="">
		<label for="date">Select date:</label>
		<input type="date" id="date" name="date">
		<br><br>
		<label for="time">Select time:</label>
		<input type="time" id="time" name="time">
		<br><br>
		<input type="submit" name="submit" value="Submit">
	</form>
	<br>
	<?php
		if(isset($_POST['submit'])){
			$date = $_POST['date'];
			$time = $_POST['time'];

            echo "<h2>The event on ".$date." at ".$time."</h2>";
			
			include_once 'includes/db.php';
			$conn = OpenCon();

            $sql = "SELECT bands.bandnaam, events_has_bands.hoofdact, events_has_bands.aantalSets, events_has_bands.lengteVanSetMinuten, bands.bands_id
        FROM events_has_bands
        JOIN bands ON events_has_bands.bands_id = bands.bands_id
        WHERE events_has_bands.datum = '$date'
        AND events_has_bands.aanvangEvent = '$time'";

$result = $conn->query($sql);

if ($result === false) {
    echo "Error: " . $conn->error;
} else if ($result->num_rows > 0) {
    // output data of each row
    echo '<table>
            <thead>
                <tr>
                    <th>Bands Name</th>
                    <th>Head Act</th>
                    <th>Number of sets</th>
                    <th>Duration in minutes</th>
                </tr>
            </thead>
            <tbody>';
            while($row = $result->fetch_assoc()) {
                $hoofdact = $row['hoofdact'] == 1 ? 'Yes' : 'No';
                $bandID = $row['bands_id'];
                $sql2 = "SELECT bandnaam FROM bands WHERE bands_id = '$bandID'";
                $result2 = $conn->query($sql2);
                if ($result2) {
                    $row2 = $result2->fetch_assoc();
                    $bandName = $row2['bandnaam'];
                    echo "<tr><td>".$bandName."</td><td>".$hoofdact."</td><td>".$row["aantalSets"]."</td><td>".$row["lengteVanSetMinuten"]."</td></tr>";
                } else {
                    echo "Error: " . $sql2 . "<br>" . $conn->error;
                }
            }
    echo '</tbody></table>';
} else {
    echo "0 results";
}

			CloseCon($conn);
		}
	?>
</body>
</html>