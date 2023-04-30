<!DOCTYPE html>
<html>
<head>
	<title>Connect Bands to Events</title>

    <style>

        label {
			display: block;
			margin-bottom: 5px;
		}

    input[type="date"],
	input[type="time"],
	input[type="number"],
	select {
		margin-bottom: 10px;
		padding: 5px;
		font-size: 16px;
		border-radius: 5px;
		border: 1px solid #ccc;
		box-shadow: 1px 1px 1px rgba(0, 0, 0, 0.1);
	}
	
	input[type="submit"] {
		background-color: #4CAF50;
		color: white;
		border: none;
		border-radius: 5px;
		padding: 10px 20px;
		cursor: pointer;
		font-size: 16px;
	}
	
	input[type="submit"]:hover {
		background-color: #3e8e41;
	}
	
	h1 {
		font-size: 32px;
		margin-bottom: 20px;
	}
	
	form {
		width: 50%;
		margin: auto;
		padding: 20px;
		border-radius: 5px;
		box-shadow: 1px 1px 1px rgba(0, 0, 0, 0.1);
	}
	
	body {
		font-family: Arial, sans-serif;
		background-color: #f2f2f2;
	}
</style>
</head>
<body>

<a href="index.php">
	<h1>Connect Bands to Events</h1>
</a>
	<form method="post" action="submit.php">
		<label for="date">Date:</label>
		<input type="date" id="date" name="date" required><br><br>

		<label for="time">Time:</label>
		<input type="time" id="time" name="time" required><br><br>

        <a href="eventAll.php">Click here to find the event your looking for</a><br><br>

		<label for="band_id">Band ID:</label>
		<input type="number" id="band_id" name="band_id" min="1" max="999" required><br><br>

        <a href="bandAll.php">Click here to find the ID of a Band</a><br><br>

		<label for="main">Main Performance:</label>
		<select id="main" name="main" required>
			<option value="1">Yes</option>
			<option value="0">No</option>
		</select><br><br>

		<label for="sets">Number of Sets:</label>
		<input type="number" id="sets" name="sets" min="1" max="9" required><br><br>

		<label for="length">Length of Sets (Minutes):</label>
		<input type="number" id="length" name="length" min="1" max="999" required><br><br>

		<input type="submit" value="Submit">
	</form>
</body>
</html>
