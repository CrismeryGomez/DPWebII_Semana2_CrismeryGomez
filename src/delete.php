<?php
// === MANEJO DE ERRORES (TEMPORAL) ===
// Muestra cualquier error de PHP en el navegador, esencial para el diagnóstico.
ini_set('display_errors', 1);
error_reporting(E_ALL);
// ====================================

include 'db.php'; // 1. Incluir conexión

// 2. Comprobar si se ha pasado un 'id' por la URL
if (isset($_GET['id'])) {
    
    // 3. Sanitizar y convertir a entero para seguridad (previene inyección SQL)
    $id = (int)$_GET['id'];
    
    // 4. Ejecutar la Eliminación
    // La consulta es correcta, asumiendo que 'usuarios' es su tabla.
    $sql = "DELETE FROM usuarios WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        // 5. Redirección exitosa al index
        header("Location: index.php");
        exit(); // Terminar el script después de la redirección
    } else {
        // 6. Mostrar error si la consulta SQL falla
        echo "Error al eliminar registro: " . $conn->error;
    }
} else {
    // 7. Si no hay ID, redirigir a index (evita errores)
    header("Location: index.php");
    exit();
}

$conn->close();
?>