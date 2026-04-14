<html>
<head>
    <title>PROBLEMA 5: Formulario de entrada del dato</title>

    <style>
        /*Estilos para la página */
        body {
            font-family: Arial, sans-serif;
            background-color: #651c1c;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background-color: white;
            padding: 30px;
            border-radius: 14px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.25);
            width: 360px;
            text-align: center;
        }

        h2 {
            margin-bottom: 5px;
            color: #651c1c;
        }

        .label {
            display: block;
            text-align: left;
            font-weight: bold;
            margin-top: 10px;
            margin-bottom: 5px;
            color: #333;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 8px;
            outline: none;
        }

        input[type="text"]:focus {
            border-color: #4a90e2;
            box-shadow: 0 0 4px rgba(74,144,226,0.4);
        }

        input[type="submit"] {
            background-color: #ec3131;
            color: white;
            border: none;
            padding: 10px;
            width: 100%;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #ed4267;
        }

        .resultado {
            margin-top: 15px;
            text-align: left;
            background: #f8f8f8;
            padding: 10px;
            border-radius: 8px;
        }
    </style>
</head>

<body>

<div class="container">

    <h2>Formulario de Datos</h2>

    <?php
    // Normalización, trimming y sanitización
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Trim para eliminar espacios en blanco
        $nombre = trim($_POST["nombre"]);
        $edad = trim($_POST["edad"]);

        // Sanitización para convertir caracteres especiales en texto seguro
        $nombre = htmlspecialchars($nombre, ENT_QUOTES, 'UTF-8');
        $edad = htmlspecialchars($edad, ENT_QUOTES, 'UTF-8');

        // Normalización para que nombre empiece en mayúscula
        $nombre = ucwords(strtolower($nombre));

        echo "<div class='resultado'>";
        echo "<b>Nombre:</b> " . $nombre . "<br>";
        echo "<b>Edad:</b> " . $edad . "<br><br>";

        // Validación
        if (is_numeric($edad) && $edad >= 18) {
            echo "Usted puede votar en las próximas elecciones 2028.";
        } else {
            echo "Usted no es mayor de edad.";
        }

        echo "</div>";
    }
    ?>

    <!-- Formulario usando el método POST-->
    <form method="post">

        <!-- Campo para ingresar el nombre -->
        <label class="label">Ingrese su nombre:</label>
        <input type="text" name="nombre" id="nombre">

        <!-- Campo para ingresar la edad -->
        <label class="label">Ingrese su Edad:</label>
        <input type="text" name="edad" id="edad">

        <!-- Botón para enviar el formulario -->
        <input type="submit" value="Confirmar">

    </form>

</div>

</body>
</html>