<html>
<head>
    <title>PROBLEMA 2: Pulgadas a centímetros</title>

    <style>
        /* Estilos para la página */
        body {
            font-family: Arial, sans-serif;
            background-color: #d579b5;
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
            border-radius: 12px;
            box-shadow: 0 6px 15px rgba(0,0,0,0.15);
            width: 350px;
            text-align: center;
        }

        h1 {
            font-size: 18px;
            color: #333;
            margin-bottom: 20px;
        }

        input[type="text"] {
            width: 90%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 8px;
            outline: none;
        }

        input[type="text"]:focus {
            border-color: #4a90e2;
        }

        input[type="submit"] {
            background-color: #c10971;
            color: white;
            border: none;
            padding: 10px;
            width: 100%;
            border-radius: 8px;
            cursor: pointer;
            font-size: 16px;
        }

        input[type="submit"]:hover {
            background-color: #f664c5;
        }

        .resultado {
            margin-top: 15px;
            font-weight: bold;
            color: #333;
        }
    </style>
</head>

<body>

<div class="container">
    <h1>PROBLEMA 2: Convertir pulgadas a centímetros</h1>

    <form method="POST">
        Ingrese las pulgadas:
        <input type="text" name="pulgadas">
        <input type="submit" value="Convertir">
    </form>

    <div class="resultado">
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        //Verifica que el campo no esté vacío
        if (!empty($_POST["pulgadas"])) {
            //Convierte el valor ingresado a número decimal
            $pulgadas = floatval($_POST["pulgadas"]);
            //Valida que el número ingresado sea positivo
            if ($pulgadas > 0) {
                //Cálculo para la conversión
                $centimetros = $pulgadas * 2.54;
                //Imprime el resultado
                echo "$pulgadas pulgadas = $centimetros centímetros.";
            } else {
                //Mensaje de error si el número es negativo
                echo "Ingrese un número positivo.";
            }

        } else {
            //Mensaje de error si el campo está vacío o es cero
            echo "Debe ingresar un valor en el campo.";
        }
    }
    ?>
    </div>

</div>

</body>
</html>