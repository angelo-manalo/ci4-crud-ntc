<?php
$mysqli = new mysqli("localhost", "root", "", "ci4_crud_exam");
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}
$result = $mysqli->query("DESCRIBE records");
if ($result) {
    while($row = $result->fetch_assoc()) {
        echo $row['Field'] . " - " . $row['Type'] . "\n";
    }
} else {
    echo "Table not found.";
}
$mysqli->close();
