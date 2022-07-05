<?php

//Abrir conexión a la base de datos
function connect($db)
{
    try {
        $conn = new PDO("mysql:host={$db['host']};dbname={$db['db']}", $db['username'], $db['password']);

        // setAttribute Establece un atributo en el manejador de la base de datos.
        // PDO::ATTR_ERRMODE  Reporte de errores.
        // PDO::ERRMODE_EXCEPTION   Lanzar excepción.

        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $conn;
    } catch (PDOException $exception) {
        exit($exception->getMessage());
    }
}


//Obtener parámetros para updates
function getParams($input)
{
    $filterParams = [];
    foreach ($input as $param => $value) {
        $filterParams[] = "$param=:$param";
    }
    return implode(", ", $filterParams);
}

//Asociar todos los parámetros a un sql
function bindAllValues($statement, $params)
{
    foreach ($params as $param => $value) {
        $statement->bindValue(':' . $param, $value);
    }
    return $statement;
}
