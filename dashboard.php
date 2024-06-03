<?php
session_start();

if (!isset($_SESSION['username'])) {

    header('Location: index.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .form-group {
            margin-bottom: 20px;
        }

        .btn-submit {
            margin-top: 20px;
        }
    </style>
</head>

<body>

    <div class="container">
        <h1 class="mt-5">Bienvenido, <?php echo $_SESSION['username']; ?>!</h1>
        <h2>Generar Ticket</h2>
        <form action="download_ticket.php" method="post">
            <div class="form-group">
                <label for="name">Nombre completo:</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="dni">DNI:</label>
                <input type="text" class="form-control" id="dni" name="dni" required>
            </div>
            <div class="form-group">
                <label for="scheduled_time">Hora de atención:</label>
                <input type="datetime-local" class="form-control" id="scheduled_time" name="scheduled_time">
            </div>
            <button type="submit" class="btn btn-primary btn-submit">Generar Ticket</button>
        </form>
        <a href="logout.php" class="btn btn-danger mt-3">Cerrar sesión</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>