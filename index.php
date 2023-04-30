<!DOCTYPE html>
<html>
<head>
	<title>Event Management System</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			background-color: #f2f2f2;
			margin: 0;
			padding: 0;
		}
		.container {
			max-width: 800px;
			margin: 0 auto;
			padding: 40px 20px;
			box-sizing: border-box;
			text-align: center;
			background-color: white;
			border-radius: 10px;
			box-shadow: 0 0 10px rgba(0,0,0,0.2);
		}
		h1 {
			margin: 0;
			font-size: 36px;
			font-weight: bold;
			color: #333;
		}
		p {
			margin: 20px 0;
			font-size: 18px;
			color: #555;
		}
		.button {
			display: inline-block;
			background-color: #1E90FF;
			color: white;
			padding: 12px 30px;
			border: none;
			border-radius: 5px;
			font-size: 18px;
			font-weight: bold;
			cursor: pointer;
			margin: 10px;
			text-decoration: none;
		}
		.button:hover {
			background-color: #0066CC;
		}
		.button:active {
			background-color: #004C99;
		}
	</style>
</head>
<body>
	<div class="container">
		<h1>Event Management System</h1>
		<p>What do you want to do?</p>
		<a href="bandAdmin.php" class="button">Create a band</a>
		<a href="eventAdmin.php" class="button">Create an event</a>
		<a href="connectAllToOne.php" class="button">Connect band to event</a>
		<br><br>
		<p>View all:</p>
		<a href="bandAll.php" class="button">Bands</a>
		<a href="eventAll.php" class="button">Events</a>
		<a href="seeAll.php" class="button">Entire event</a>
	</div>
</body>
</html>
