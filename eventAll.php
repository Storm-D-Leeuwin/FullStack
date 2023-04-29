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
				include_once 'includes/db.php';
				$conn = OpenCon();

				$sql = "SELECT datum, aanvangEvent, naam, entreeprijs FROM events";
				$result = $conn->query($sql);

				if ($result->num_rows > 0) {
				    // output data of each row
				    while($row = $result->fetch_assoc()) {
				        echo "<tr><td>".$row["datum"]."</td><td>".$row["aanvangEvent"]."</td><td>".$row["naam"]."</td><td>".$row["entreeprijs"]."</td></tr>";
				    }
				} else {
				    echo "0 results";
				}
				CloseCon($conn);
			?>
		</tbody>
	</table>
</body>
</html>
