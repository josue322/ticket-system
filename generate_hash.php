<?php

include 'includes/db.php';

$password = 'admin';

$hashed_password = password_hash($password, PASSWORD_DEFAULT);


$sql = "INSERT INTO usuarios (username, password) VALUES ('admin', '$hashed_password')";
if ($conn->query($sql) === TRUE) {
    echo "Usuario administrador creado exitosamente.<br>";
} else {
    echo "Error al crear el usuario administrador: " . $conn->error . "<br>";
}

$conn->close();

?>