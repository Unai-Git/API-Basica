<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>API</h1>

    <!-- Mostrar todos los personajes -->
    <h2>Mostrar todos los personajes</h2>
    <button id="mostrar">Mostrar/Ocultar</button>
    <div id="personajes" style="display: none;">
        <h3>Personajes:</h3>
    </div>

    <br>
    <br>

    <!-- Buscar un personajes -->
    <h2>Buscar un personajes</h2>
    <input id="id_buscar" type="number" placeholder="Buscar por id">
    <button id="buscar">buscar</button>
    <pre id="personaje"></pre>

    <!-- Eliminar un personajes -->
    <h2>Eliminar un personajes</h2>
    <input id="id_eliminar" type="number" placeholder="Eliminar por id">
    <button id="eliminar">eliminar</button>
    <pre id="feedback"></pre>

    



    <script src="JavaScript/script.js"></script>
</body>

</html>