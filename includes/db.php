<?php
$host = 'localhost:3310';
$dbname = 'xuri_concesionario';
$user = 'root';
$pass = '';

try {
    $db = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}

// Tablas necesarias (ejecutar solo una vez)
function createTables() {
    global $db;
    
    $db->exec("CREATE TABLE IF NOT EXISTS vehiculos (
        id INT AUTO_INCREMENT PRIMARY KEY,
        marca VARCHAR(50) NOT NULL,
        modelo VARCHAR(50) NOT NULL,
        año INT NOT NULL,
        km INT NOT NULL,
        combustible VARCHAR(20) NOT NULL,
        precio DECIMAL(10,2) NOT NULL,
        imagen VARCHAR(255),
        descripcion TEXT,
        caracteristicas JSON,
        stock INT DEFAULT 1,
        fecha_creacion TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )");
    
    $db->exec("CREATE TABLE IF NOT EXISTS compras (
        id INT AUTO_INCREMENT PRIMARY KEY,
        usuario_id INT,
        fecha DATETIME NOT NULL,
        total DECIMAL(10,2) NOT NULL,
        estado ENUM('pendiente', 'completada', 'cancelada') DEFAULT 'pendiente',
        metodo_pago VARCHAR(50),
        direccion_envio TEXT
    )");
    
    $db->exec("CREATE TABLE IF NOT EXISTS detalles_compra (
        id INT AUTO_INCREMENT PRIMARY KEY,
        compra_id INT NOT NULL,
        vehiculo_id INT NOT NULL,
        cantidad INT NOT NULL,
        precio_unitario DECIMAL(10,2) NOT NULL,
        FOREIGN KEY (compra_id) REFERENCES compras(id),
        FOREIGN KEY (vehiculo_id) REFERENCES vehiculos(id)
    )");
    
    $db->exec("CREATE TABLE IF NOT EXISTS usuarios (
        id INT AUTO_INCREMENT PRIMARY KEY,
        email VARCHAR(100) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL,
        nombre VARCHAR(100),
        apellidos VARCHAR(100),
        direccion TEXT,
        telefono VARCHAR(20),
        rol ENUM('admin', 'cliente') DEFAULT 'cliente',
        fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
    )");
}
createTables(); // Descomentar para crear tablas la primera vez
?>