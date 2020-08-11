<?php
include "db.php";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CHAT CON PHP, MYSQL Y AJAX</title>
    <link rel="icon" href="logo.png">
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Mukta+Vaani:wght@400;500;600;700&display=swap" rel="stylesheet">

    <script type="text/javascript">
    function ajax(){
        var req = new XMLHttpRequest();

        req.onreadystatechange = function (){
            if(req.readyState == 4 && req.status == 200){
                document.getElementById('chat').innerHTML = req.responseText;
            }
        }

        req.open('GET', 'chat.php', true);
        req.send();
    }

    //linea que refresca la página cada segundo

    setInterval(function(){ajax();}, 1000);

    </script>

</head>
<body onload="ajax();">


    <div id="contenedor">
        <div id="caja-chat">
        
        <h1>Conversaciones</h1>

            <div id="chat"></div>
        </div>


        <form method="POST" action="index.php">
        <input type="text" name="nombre" placeholder="Ingresa tu nombre">
        <textarea name="mensaje" placeholder="Ingresa tu mensaje"></textarea>
        <input type="submit" name="enviar" value="Enviar">
        </form>
        <?php
        if(isset($_POST['enviar'])){
            $nombre = $_POST['nombre'];
            $mensaje = $_POST['mensaje'];

            $consulta = "INSERT INTO chat (nombre, mensaje) VALUES ('$nombre', '$mensaje')";
            $ejecutar = $conexion->query($consulta);


        if($ejecutar){
            echo "<embed loop='false' hidden='true'>";
        }

        }

        ?>
    </div>

        <!--SCRIPTS DE LA PÁGINA-->
    </body>
</html>