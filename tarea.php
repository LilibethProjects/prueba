<?php
try {

$conexion = new PDO("mysql:host=localhost;dbname=prueba_db", "root", "");
$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);


$res = $conexion->query('SELECT * FROM tareas') or die(print($conexion->errorInfo()));

$data = [];

while ($item = $res->fetch(PDO::FETCH_OBJ)){
    $data[] = [
        'descripcion_tarea' => $item->descripcion_tarea,
        'estado_tarea' => $item->estado_tarea,

    ];
}
echo json_encode($data);

} catch(PDOException $error) {
    echo $error->getMessage();
    die();
}