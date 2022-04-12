<?php

$descripcion_tarea = isset($_POST['txt_descripcion_tarea']) ? $_POST['txt_descripcion_tarea'] : '';
$estado_tarea = isset($_POST['txt_estado_tarea']) ? $_POST['txt_estado_tarea'] : '';

try {

    $conexion = new PDO("mysql:host=localhost;dbname=prueba_db", "root", "");
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

    $pdo = $conexion->prepare('INSERT INTO tareas(descripcion_tarea, estado_tarea) VALUES(?, ?)');
    $pdo->bindParam(1, $descripcion_tarea);
    $pdo->bindParam(2, $estado_tarea);
    $pdo->execute() or die(print($pdo->errorInfo()));

    echo json_encode('true');

} catch(PDOException $error) {
    echo $error->getMessage();
    die();
}