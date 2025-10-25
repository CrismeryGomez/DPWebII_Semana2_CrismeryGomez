<?php
// === MANEJO DE ERRORES (TEMPORAL) ===
// Muestra cualquier error de PHP en el navegador, esencial para el diagnóstico.
ini_set('display_errors', 1);
error_reporting(E_ALL);
// ====================================

// 1. Incluir el archivo de conexión
include 'db.php'; 

// Lógica para Crear / Eliminar (si se recibe la solicitud)
// ... [Su lógica de DELETE/CREATE va aquí, si no está en otro archivo] ...

// 2. Lógica para Leer (SELECT)
$sql = "SELECT id, nombre, email FROM usuarios"; // Ajuste el nombre de su tabla y campos
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mini CRUD con Docker PHP+MySQL</title>
    <style>
        /* Agregue CSS básico para que no se vea en blanco */
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { width: 100%; border-collapse: collapse; }
        th, td { border: 1px solid #ccc; padding: 10px; text-align: left; }
    </style>
</head>
<body>

    <h1>Listado de Registros</h1>
    <p><a href="create.php">Agregar Nuevo Registro</a></p>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"]. "</td>";
                    echo "<td>" . $row["nombre"]. "</td>";
                    echo "<td>" . $row["email"]. "</td>";
                    echo "<td><a href='delete.php?id=" . $row["id"] . "'>Eliminar</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No hay registros.</td></tr>";
            }
            $conn->close();
            ?>
        </tbody>
    </table>

</body>
</html>