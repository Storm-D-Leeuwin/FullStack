<?php
    include_once 'includes/db.php';
    $conn = OpenCon();

    date_default_timezone_set('Europe/Amsterdam');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
   
    <h1>Create Event</h1>

    <form id="create-event-form" method="post">
    <label for="datum">Date:</label>
    <input type="date" name="datum" id="datum" required><br><br>

    <label for="aanvangEvent">Start Time:</label>
    <input type="time" name="aanvangEvent" id="aanvangEvent" required><br><br>

    <label for="naam">Name:</label>
    <input type="text" name="naam" id="naam" required><br><br>

    <label for="entreeprijs">Ticket Price:</label>
    <input type="number" name="entreeprijs" id="entreeprijs" step="0.01" required><br><br>

    <input type="submit" value="Create Event">
    
</form>

<div id="result"></div>

    <script>

        function createEvent() {
            var form = $('#create-event-form').serialize();
                $.ajax({
                    type: 'POST',
                    url: 'create_event.php',
                    data: form,
                    success: function(data) {
                        $('#result').html(data);
                    },
                    error: function() {
                        $('#result').html('Failed');
                    }
            });
        }

    </script>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $datum = isset($_POST['datum']) ? $_POST['datum'] : '';
    $aanvangEvent = isset($_POST['aanvangEvent']) ? $_POST['aanvangEvent'] : '';
    $naam = isset($_POST['naam']) ? $_POST['naam'] : '';
    $entreeprijs = isset($_POST['entreeprijs']) ? $_POST['entreeprijs'] : '';

    $sql = "INSERT INTO events (datum, aanvangEvent, naam, entreeprijs) VALUES ('$datum', '$aanvangEvent', '$naam', '$entreeprijs')";

    if (mysqli_query($conn, $sql) or die(mysqli_error($conn))) {
        echo "Event created";
    } else {
        echo "Failed: " . $sql . "<br>" . mysqli_error($conn);
    }

    mysqli_close($conn);
}

?>


</body>
</html>