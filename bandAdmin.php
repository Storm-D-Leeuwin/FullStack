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
    <title>Add Band</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
   
    <h1>Add Band</h1>

    <form id="add-band-form" method="post">
        <label for="bandnaam">Band Name:</label>
        <input type="text" name="bandnaam" id="bandnaam" maxlength="50" required><br><br>

        <label for="genre">Genre:</label>
        <select name="genre" id="genre" required>
            <option value="">--Select--</option>
            <option value="Alternative">Alternative</option>
            <option value="Anime">Anime</option>
            <option value="Blues">Blues</option>
            <option value="Children">Children</option>
            <option value="Classical">Classical</option>
            <option value="Country">Country</option>
            <option value="Dance">Dance</option>
            <option value="Electronic">Electronic</option>
            <option value="Folk">Folk</option>
            <option value="Hip-Hop/Rap">Hip-Hop/Rap</option>
            <option value="Holiday">Holiday</option>
            <option value="Indie">Indie</option>
            <option value="Instrumental">Instrumental</option>
            <option value="Jazz">Jazz</option>
            <option value="K-Pop">K-Pop</option>
            <option value="Karaoke">Karaoke</option>
            <option value="Latin">Latin</option>
            <option value="Metal">Metal</option>
            <option value="New Age">New Age</option>
            <option value="Opera">Opera</option>
            <option value="Pop">Pop</option>
            <option value="R&B/Soul">R&B/Soul</option>
            <option value="Reggae">Reggae</option>
            <option value="Rock">Rock</option>
        </select><br><br>

        <label for="land_id">Continent:</label>
        <select name="land_id" id="land_id" required>
            <option value="">--Select--</option>
            <option value="1">Europe</option>
            <option value="2">North America</option>
            <option value="3">South America</option>
            <option value="4">Africa</option>
            <option value="5">Asia</option>
            <option value="6">Oceania</option>
            <option value="7">Middle East</option>
        </select><br><br>

        <label for="omschrijving">Description:</label>
        <textarea name="omschrijving" id="omschrijving" maxlength="100" required></textarea><br><br>

        <input type="submit" value="Add Band">
    </form>

    <div id="result"></div>

    <script>
        function addBand() {
    event.preventDefault(); // prevent default form submission behavior
    var form_data = $("#add-band-form").serialize(); // get form data
    $.ajax({
        url: "add_band.php",
        type: "POST",
        data: form_data,
        success: function(response) {
            $("#result").html("<p>Band added successfully!</p>");
        },
        error: function(xhr, status, error) {
            $("#result").html("<p>Error adding band: " + xhr.responseText + "</p>");
        }
    });

    $('#add-band-form').trigger("reset");
}

    $(document).ready(function() {
        $("#add-band-form").submit(function(event) {
            addBand(); // call addBand() function when form is submitted
        });
    });   

    </script>

</body>
</html>