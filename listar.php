<?php
try {

$conexion = new PDO("mysql:host=localhost;dbname=prueba_db", "root", "");
$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);


$res = $conexion->query('SELECT * FROM contactos') or die(print($conexion->errorInfo()));

$data = [];

while ($item = $res->fetch(PDO::FETCH_OBJ)){
    $data[] = [
        'nombre' => $item->nombre,
        'apellido' => $item->apellido,
        'telefono' => $item->telefono

    ];
}
echo json_encode($data);

} catch(PDOException $error) {
    echo $error->getMessage();
    die();
}
