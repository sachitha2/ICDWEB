<?php
include("db.php");
$sql = "INSERT INTO total (id, total) VALUES (NULL, '25');";
if ($conn->query($sql) === TRUE) {
    $last_id = $conn->insert_id;
    echo "New record created successfully. Last inserted ID is: " . $last_id;
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>