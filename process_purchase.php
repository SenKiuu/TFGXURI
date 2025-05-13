<?php
// Configuración de la base de datos
$servername = "localhost";
$username = "tu_usuario";
$password = "tu_contraseña";
$dbname = "tu_base_de_datos";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die(json_encode(['success' => false, 'message' => 'Error de conexión: ' . $conn->connect_error]));
}

// Obtener datos del POST
$data = json_decode(file_get_contents('php://input'), true);
$items = $data['items'];
$total = $data['total'];
$fecha = $data['fecha'];

// Insertar en la tabla compras
$sql = "INSERT INTO compras (fecha, total) VALUES (?, ?)";
$stmt = $conn->prepare($sql);
$stmt->bind_param("sd", $fecha, $total);

if ($stmt->execute()) {
    $compra_id = $conn->insert_id;
    
    // Insertar items de la compra
    $sql_items = "INSERT INTO detalles_compra (compra_id, vehiculo_id, marca, modelo, precio, cantidad) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt_items = $conn->prepare($sql_items);
    
    foreach ($items as $item) {
        $stmt_items->bind_param("iissdi", 
            $compra_id,
            $item['id'],
            $item['marca'],
            $item['modelo'],
            $item['precio'],
            $item['quantity']
        );
        $stmt_items->execute();
    }
    
    echo json_encode(['success' => true]);
} else {
    echo json_encode(['success' => false, 'message' => 'Error al registrar la compra: ' . $conn->error]);
}

$stmt->close();
$conn->close();
?>