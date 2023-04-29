<?php
    include_once 'includes/db.php';
    $conn = OpenCon();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $bandnaam = $_POST['bandnaam'];
        $genre = $_POST['genre'];
        $land_id = $_POST['land_id'];
        $omschrijving = $_POST['omschrijving'];

        $sql = "INSERT INTO bands (bandnaam, genre, land_id, omschrijving) VALUES (?, ?, ?, ?)";
        echo $sql; // this will print the query to the screen
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssis", $bandnaam, $genre, $land_id, $omschrijving);

        if (!$stmt) {
            echo "Error preparing statement.";
            exit();
        }

        if ($stmt->execute()) {
            echo "Band added successfully!";
        } else {
            echo "Error adding band.";
        }

        $stmt->close();
        $conn->close();
    }
?>
