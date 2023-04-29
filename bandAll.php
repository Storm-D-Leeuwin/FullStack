<?php
    include_once 'includes/db.php';
    $conn = OpenCon();

    // Check if a search query was submitted
    if (isset($_GET['search']) && !empty($_GET['search'])) {
        $search = mysqli_real_escape_string($conn, $_GET['search']);
        $sql = "SELECT * FROM bands WHERE bandnaam LIKE '%$search%'";
    } else {
        // Fetch all bands from the database
        $sql = "SELECT * FROM bands";
    }
    
    $result = mysqli_query($conn, $sql);

    // Create a table to display the data
    $table = '<table>';
    $table .= '<tr><th>Band ID</th><th>Band Name</th><th>Genre</th><th>Continent</th><th>Description</th></tr>';

    while ($row = mysqli_fetch_assoc($result)) {
        $table .= '<tr>';
        $table .= '<td>' . $row['bands_id'] . '</td>';
        $table .= '<td>' . $row['bandnaam'] . '</td>';
        $table .= '<td>' . $row['genre'] . '</td>';
        $table .= '<td>' . $row['land_id'] . '</td>';
        $table .= '<td>' . $row['omschrijving'] . '</td>';
        $table .= '</tr>';
    }

    $table .= '</table>';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Bands</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
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
        }
        tr:hover {
            background-color: #f5f5f5;
        }
        .search-container {
            float: right;
            margin-top: 10px;
            margin-bottom: 10px;
        }
        .search-container input[type=text] {
            padding: 6px;
            margin-top: 8px;
            font-size: 17px;
            border: none;
            border-radius: 4px;
        }
        .search-container button {
            float: right;
            padding: 6px 10px;
            margin-top: 8px;
            margin-right: 16px;
            background: #ddd;
            font-size: 17px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .search-container button:hover {
            background: #ccc;
        }
    </style>
</head>
<body>
   
    <h1>All Bands</h1>
    
    <!-- Add a search bar -->
    <div class="search-container">
        <form action="" method="get">
            <input type="text" placeholder="Search by band name" name="search">
            <button type="submit">Search</button>
        </form>
    </div>

    <?php echo $table; ?>

</body>
</html>
