<!-- <!DOCTYPE html>
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
	<h1>All Events</h1>
	<table>
		<thead>
			<tr>
				<th>Date</th>
				<th>Start Time</th>
				<th>Name</th>
				<th>Ticket Price</th>
			</tr>
		</thead>
		<tbody>
			<?php
				// include_once 'includes/db.php';
				// $conn = OpenCon();

				// $sql = "SELECT datum, aanvangEvent, naam, entreeprijs FROM events";
				// $result = $conn->query($sql);

				// if ($result->num_rows > 0) {
				//     // output data of each row
				//     while($row = $result->fetch_assoc()) {
				//         echo "<tr><td>".$row["datum"]."</td><td>".$row["aanvangEvent"]."</td><td>".$row["naam"]."</td><td>".$row["entreeprijs"]."</td></tr>";
				//     }
				// } else {
				//     echo "0 results";
				// }
				// CloseCon($conn);
			?>
		</tbody>
	</table>
</body>
</html> -->

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

	<a href="connectAllToOne.php">View an entire event</a><br><br>
	<a href="bandAll.php">View all bands</a><br><br>
	<a href="index.php">
	<h1>All Events</h1>
	</a>

	<form method="post">
		<label for="month">Select Month:</label>
		<select name="month" id="month">
			<option value="01">January</option>
			<option value="02">February</option>
			<option value="03">March</option>
			<option value="04">April</option>
			<option value="05">May</option>
			<option value="06">June</option>
			<option value="07">July</option>
			<option value="08">August</option>
			<option value="09">September</option>
			<option value="10">October</option>
			<option value="11">November</option>
			<option value="12">December</option>
		</select>

		<label for="year">Select Year:</label>
		<select name="year" id="year">
			<?php 
				$current_year = date("Y");
				for ($i = $current_year; $i <= $current_year+10; $i++) {
				    echo "<option value='".$i."'>".$i."</option>";
				}
			?>
		</select>

		<input type="submit" value="Search">
	</form>

	<br>

	<table>
		<thead>
			<tr>
				<th>Date</th>
				<th>Start Time</th>
				<th>Name</th>
				<th>Ticket Price</th>
			</tr>
		</thead>
		<tbody>
			<?php
				include_once 'includes/db.php';
				$conn = OpenCon();

				if (isset($_POST['month']) && isset($_POST['year'])) {
					$month = $_POST['month'];
					$year = $_POST['year'];

					$sql = "SELECT datum, aanvangEvent, naam, entreeprijs FROM events WHERE MONTH(datum) = $month AND YEAR(datum) = $year";
					$result = $conn->query($sql);

					if ($result->num_rows > 0) {
					    // output data of each row
					    while($row = $result->fetch_assoc()) {
					        echo "<tr><td>".$row["datum"]."</td><td>".$row["aanvangEvent"]."</td><td>".$row["naam"]."</td><td>".$row["entreeprijs"]."</td></tr>";
					    }
					} else {
					    echo "0 results";
					}
				} else {
					echo "Please select a month and year";
				}

				CloseCon($conn);
			?>
		</tbody>
	</table>
</body>
</html>

