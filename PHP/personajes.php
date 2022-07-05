<?php

/*
!Códigos de estado de respuesta HTTP:
*Respuestas informativas (100–199),
*Respuestas satisfactorias (200–299),
*Redirecciones (300–399),
*Errores de los clientes (400–499),
*y errores de los servidores (500–599).
*/

//Incluir fichero de configuración y conexión.
include "config.php";
include "conexion.php";

//Recuperar conexión
$dbConn =  connect($db);

//*Ver personajes(Todos o solo uno por Id)
//Comprobar que los datos lleguen por el método GET
if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    //Si no viene vació el parámetro id
    if (isset($_GET['id'])) {
        //Preparar la sentencia SQL
        $sql = $dbConn->prepare("SELECT * FROM personajes WHERE id=:id");
        //Pasar parámetros a la sentencia preparada.
        $sql->bindValue(":id", $_GET['id']);
        //Ejecutar sentencia sql
        $sql->execute();
        //Redirigir pagina con respuesta satisfactoria 
        header("HTTP/1.1 200 OK");
        //Pasar los datos recibidos a JSON
        echo json_encode($sql->fetch(PDO::FETCH_ASSOC));
        //Salir
        exit();
    } else {
        //Si no se pasa Id, mostrar todos los personajes.
        //Preparar sentencia sql para mostrar TODOS los personajes.
        $sql = $dbConn->prepare("SELECT * FROM personajes");
        //Ejecutar sentencia
        $sql->execute();
        //Recuperar datos modo (array asociativo)
        $sql->setFetchMode(PDO::FETCH_ASSOC);
        //Redirigir pagina con respuesta satisfactoria 
        header("HTTP/1.1 200 OK");
        //Pasar datos a JSON
        echo json_encode($sql->fetchAll());
        //Salir
        exit();
    }
}

//* Crear un nuevo Personaje
//Comprobar que los datos lleguen por el método POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //Almacenar POST
    $input = $_POST;
    //Sentencia SQL
    $sql = "INSERT INTO personajes(nombre,apellido,alias,nacimiento,estado,info)
                        VALUES (:nombre,:apellido,:alias,:nacimiento,:estado,:info)";
    //Preparar sentencia
    $statement = $dbConn->prepare($sql);
    //Pasar parámetros(post) a la sentencia sql
    bindAllValues($statement, $input);
    //Ejecutar sentencia
    $statement->execute();
    //Comprobar el ultimo id insertado guardarlo en el id. 
    $postId = $dbConn->lastInsertId();
    if ($postId) {
        $input['id'] = $postId;
        header("HTTP/1.1 200 OK");
        //Pasar datos a JSON y mostrarlos
        echo json_encode($input);
        exit();
    }
}

//* Eliminar un personaje por su Id
//Comprobar que los datos lleguen por el método DELETE
if ($_SERVER['REQUEST_METHOD'] == 'DELETE') {
    //Guardar id enviado por parámetro
    $id = $_GET['id'];
    //Preparar sentencia sql
    $statement = $dbConn->prepare("DELETE FROM personajes where id=:id");
    //Pasar parámetro a la sql
    $statement->bindValue(':id', $id);
    //Ejecutar sentencia
    $statement->execute();
    //Redirigir pagina con respuesta satisfactoria
    header("HTTP/1.1 200 OK");
    //Salir
    exit();
}

//* Actualizar personaje por su id
//Comprobar que los datos lleguen por el método PUT
if ($_SERVER['REQUEST_METHOD'] == 'PUT') {
    //Almacenar GET
    $input = $_GET;
    //Guardar el parámetro id
    $postId = $input['id'];
    //LLamar a la función del fichero conexión
    $fields = getParams($input);

    //SQL sentencia
    $sql = "
          UPDATE personajes
          SET $fields
          WHERE id='$postId'
           ";
    //Preparar sentencia
    $statement = $dbConn->prepare($sql);
    //Pasar parámetro a la SQL
    bindAllValues($statement, $input);
    //Ejecutar sentencia
    $statement->execute();
    //Redirigir pagina con respuesta satisfactoria
    header("HTTP/1.1 200 OK");
    //Salir
    exit();
}

//En caso de que ninguna de las opciones anteriores se haya ejecutado, redirigir pagina con respuesta de error.
header("HTTP/1.1 400 Bad Request");
