<?php
include 'includes/db.php';

$name = $_POST['name'];
$event = $_POST['event'];
$date = $_POST['date'];
$ticket_number = uniqid();

$sql = "INSERT INTO tickets (name, event, date, ticket_number) VALUES ('$name', '$event', '$date', '$ticket_number')";

if ($conn->query($sql) === TRUE) {
    $ticket_id = $conn->insert_id;
    header("Location: download_ticket.php?id=$ticket_id");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
