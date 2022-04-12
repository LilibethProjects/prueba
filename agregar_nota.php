<?php

$descripcion_nota = isset($_POST['txt_titulo']) ? $_POST['txt_titulo'] : '';
$titulo = isset($_POST['txt_descripcion']) ? $_POST['txt_descripcion'] : '';

try {

    $conexion = new PDO("mysql:host=localhost;dbname=prueba_db", "root", "");
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

    $pdo = $conexion->prepare('INSERT INTO notas(titulo,descripcion_nota) VALUES(?, ?)');
    $pdo->bindParam(1, $descripcion_nota);
    $pdo->bindParam(2, $titulo);
    $pdo->execute() or die(print($pdo->errorInfo()));

    echo json_encode('true');

} catch(PDOException $error) {
    echo $error->getMessage();
    die();
}