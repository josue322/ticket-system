<?php
require 'vendor/autoload.php';
use Dompdf\Dompdf;

include 'includes/db.php';

$name = $_POST['name'];
$dni = $_POST['dni'];
$scheduled_time = $_POST['scheduled_time'];

$sql = "INSERT INTO tickets (name, dni, scheduled_time) VALUES ('$name', '$dni', '$scheduled_time')";
$conn->query($sql);

$ticket_id = $conn->insert_id;

$scheduled_datetime = new DateTime($scheduled_time);
$scheduled_formatted = $scheduled_datetime->format('H:i - Y-m-d');

$html = "
<!DOCTYPE html>
<html>
<head>
<style>
    body {
        font-family: Arial, sans-serif;
        text-align: center;
        margin: 50px;
    }
    #ticket {
        border: 2px solid #333;
        padding: 20px;
        max-width: 400px;
        margin: 0 auto;
        position: relative;
    }
    .watermark {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        opacity: 0.1;
        font-size: 200px;
        color: #333;
        pointer-events: none;
    }
</style>
</head>
<body>
<div id='ticket'>
    <div class='watermark'>Toby</div>
    <h2>Ticket de Atención</h2>
    <p>Nombre: $name</p>
    <p>DNI: $dni</p>
    <p>Número de Ticket: $ticket_id</p>
    <p>Hora de atención: $scheduled_formatted</p>
</div>
</body>
</html>
";

$dompdf = new Dompdf();
$dompdf->loadHtml($html);
$dompdf->setPaper('A4', 'portrait');
$dompdf->render();

$dompdf->stream("ticket_$ticket_id.pdf", ["Attachment" => true]);

$conn->close();
?>