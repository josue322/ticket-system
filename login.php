<?php
include 'includes/db.php';

$username = $_POST['username'];
$password = $_POST['password'];


$sql = "SELECT * FROM usuarios WHERE username = '$username'";
$result = $conn->query($sql);

if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {

        header('Location: dashboard.php');
        exit;
    } else {
        echo 'Contraseña incorrecta';
    }
} else {
    echo 'Usuario no encontrado';
}

$conn->close();
?>