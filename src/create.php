<?php
// === MANEJO DE ERRORES (TEMPORAL) ===
// Muestra cualquier error de PHP en el navegador.
ini_set('display_errors', 1);
error_reporting(E_ALL);
// ====================================

// 1. Incluir el archivo de conexión
include 'db.php';

// 2. Procesar el formulario si se enviaron datos
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitización y recogida de datos
    $nombre = $conn->real_escape_string($_POST['nombre']);
    
    // CORRECCIÓN CLAVE: Usamos 'email' porque es la columna en la DB
    $email = $conn->real_escape_string($_POST['email']); 

    // 3. Ejecutar la Inserción
    // CORRECCIÓN CLAVE: La consulta debe usar la columna 'email'
    $sql = "INSERT INTO usuarios (nombre, email) VALUES ('$nombre', '$email')"; 
    
    if ($conn->query($sql) === TRUE) {
        // Redirigir al listado después de una inserción exitosa
        header("Location: index.php");
        exit(); // Terminar el script después de la redirección
    } else {
        echo "Error al insertar registro: " . $conn->error;
    }
}
// 4. Mostrar el Formulario HTML (si no es POST o si es la primera carga)
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Nuevo Registro</title>
</head>
<body>
    <h1>Crear Nuevo Registro</h1>
    <form method="POST" action="create.php">
        <label for="nombre">Nombre:</label><br>
        <input type="text" id="nombre" name="nombre" required><br><br>
        
        <label for="email">Email:</label><br>
        <input type="email" id="email" name="email" required><br><br> 
        
        <input type="submit" value="Guardar Registro">
    </form>
    <p><a href="index.php">Volver al Listado</a></p>
</body>
</html>
<?php 
// 5. Cerrar la conexión solo si se abrió
if (isset($conn)) {
    $conn->close();
}
?>