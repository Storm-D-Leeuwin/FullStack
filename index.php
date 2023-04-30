<!DOCTYPE html>
<html>
<head>
	<title>Admin Panel</title>
	<style>
		body {
			font-family: Arial, sans-serif;
			text-align: center;
			margin: 0;
			padding: 0;
		}

		h1 {
			font-size: 3rem;
			margin: 2rem 0;
		}

		.btn {
			display: inline-block;
			padding: 1.5rem 2rem;
			margin: 1rem;
			background-color: #007bff;
			color: #fff;
			text-transform: uppercase;
			font-weight: bold;
			border-radius: 5px;
			transition: all 0.2s ease-in-out;
		}

		.btn:hover {
			background-color: #0062cc;
			cursor: pointer;
		}
	</style>
</head>
<body>
	<h1>What do you want to do?</h1>
	<a href="bandAdmin.php" class="btn">Create a Band</a>
	<a href="eventAdmin.php" class="btn">Create an Event</a>
	<a href="connectAllToOne.php" class="btn">Connect Band to Event</a>
</body>
</html>
