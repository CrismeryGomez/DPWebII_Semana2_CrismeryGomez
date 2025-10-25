<?php

$host = 'db_webii_semana2'; // CORRECTO: Usa el nombre del contenedor de Docker como host
$user = 'root'; 
$password = 'root'; 
$database = 'crud_db'; 

// Intentar conexión a MySQL
$conn = new mysqli($host, $user, $password, $database);

// Chequear la conexión
if ($conn->connect_error) {
    // Si la conexión falla, se detiene y se muestra el error.
    // Esto evita la página en blanco y revela el problema real.
    die("Error de conexión: " . $conn->connect_error);
}

// Opcional: Esto asegura que la base de datos se inicialice si el contenedor MySQL aún la está creando.
// Aunque Docker Compose lo maneja con init.sql, a veces es necesario un pequeño retraso.
// Este código solo garantiza que la conexión exista antes de que se intente cualquier consulta.

?>