<html>
<head>
    <title>PROBLEMA 1: Área y perímetro de un círculo</title>
    <style>
    /* Estilos para la página */
        body {
            font-family: Arial, sans-serif;
            background-color: rgba(230, 197, 67, 0.3);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
            background: white;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
            width: 350px;
            text-align: center;
        }

        h1 {
            font-size: 20px;
            margin-bottom: 20px;
            color: #333;
        }

        input[type="text"] {
            width: 90%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 8px;
            outline: none;
            transition: 0.3s;
        }

        input[type="text"]:focus {
            border-color: #6c63ff;
            box-shadow: 0 0 5px rgba(108, 99, 255, 0.5);
        }

        input[type="submit"] {
            background: #f09a45;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 8px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
            transition: 0.3s;
        }

        input[type="submit"]:hover {
            background: #fcd089;
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
    <h1>PROBLEMA 1: Área y perímetro de un círculo</h1>

    <form method="POST">
        Introduce el radio:
        <input type="text" name="radio">
        <input type="submit" value="Calcular">
    </form>

    <div class="resultado">
    <?php
    // Solo se ejecuta si el formulario fue enviado y el campo radio no está vacío para evitar que muestre resultados ates de correrlo
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (!empty($_POST["radio"])) {
            $radio = floatval($_POST["radio"]); //Convierte lo que viene del form a un número decimal

            if ($radio > 0) {
                $area = pi() * pow($radio, 2);
                $perimetro = 2 * pi() * $radio;

                echo "Área: " . round($area, 2) . "<br>";   //Imprime el cálculo para área y redondea hasta 2 decimales y hace un salto
                echo "Perímetro: " . round($perimetro, 2);  //Imprime el cálculo para perímetro y redondea hasta 2 decimales
            } else {
                echo "Ingrese un número positivo."; //Validación que se ingrese un número
            }
        } else {
            echo "Debe ingresar un valor en el campo."; //Validación cuando se envía campo vacío
        }
    }
    ?>
    </div>

</div>

</body>
</html>