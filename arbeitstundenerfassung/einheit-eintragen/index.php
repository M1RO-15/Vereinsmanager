<?php
$servername = "localhost";
$db_username = "root";
$password = "";
$dbname = "vereinsmanager";

//Test Variable
$worker = 1;

if(isset($_POST['title'])) {
    $title = $_POST['title'];
    $date = $_POST['date'];
    $units = $_POST['units'];


    $conn = new mysqli($servername, $db_username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO arbeitsstunden (worker, title, date, units) VALUES ($worker, '$title', '$date', $units)";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

<form action="" method="post">

    Datum:<br>
    <input type="date" name="date"><br><br>

    Titel:<br>
    <input type="text" name="title"><br><br>

    Anzahl an Arbeitsstunden:<br>
    <input type="number" name="units" max="12"><br><br>

    <input type="submit" name="submit" value="Datensatz anlegen">
</form>
