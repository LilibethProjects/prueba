<?php

$nombre = isset($_POST['txt_nombre']) ? $_POST['txt_nombre'] : '';
$apellido = isset($_POST['txt_apellido']) ? $_POST['txt_apellido'] : '';
$telefono = isset($_POST['txt_telefono']) ? $_POST['txt_telefono'] : '';

try {

    $conexion = new PDO("mysql:host=localhost;dbname=prueba_db", "root", "");
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

    $pdo = $conexion->prepare('INSERT INTO contactos(nombre, apellido, telefono) VALUES(?, ?, ?)');
    $pdo->bindParam(1, $nombre);
    $pdo->bindParam(2, $apellido);
    $pdo->bindParam(3, $telefono);
    $pdo->execute() or die(print($pdo->errorInfo()));

    echo json_encode('true');

} catch(PDOException $error) {
    echo $error->getMessage();
    die();
}