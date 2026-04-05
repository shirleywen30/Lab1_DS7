<html>
<head>
    <title>PROBLEMA 6: Calculadora</title>
    <style>
        /* Estilos para la página */
        body {
            font-family: Arial, sans-serif;
            background-color: rgba(67, 230, 67, 0.3);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        /* Caja principal de la calculadora */
        .calculadora {
            background: #ffffff;
            padding: 25px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.2);
            width: 320px;
            text-align: center;
        }
        /* Título de la calculadora */
        .calculadora h1 {
            font-size: 22px;
            margin-bottom: 20px;
            color: #333;
        }
        /* Campos de texto y combobox */
        input[type="text"], select {
            width: 90%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 6px;
            font-size: 16px;
        }
        /* Botón de calcular */
        input[type="submit"] {
            background: #4CAF50;
            color: white;
            padding: 8px 14px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 14px;
            width: auto;
        }
        input[type="submit"]:hover {
            background: #45a049;
        }
        /* Resultado */
        .resultado {
            margin-top: 15px;
            font-size: 18px;
            font-weight: bold;
            color: #222;
        }
        /* Mensaje de error */
        .error {
            margin-top: 15px;
            font-size: 16px;
            color: red;
        }
    </style>
</head>
<body>
    <div class="calculadora">
        <h1>Calculadora</h1>
        <!-- Formulario con dos campos para los números, el combobox y el botón para calcular -->
        <form method="POST">
            <input type="text" name="num1" placeholder="Número 1">
            <input type="text" name="num2" placeholder="Número 2">
            <select name="operacion">
                <option value="suma">Suma</option>
                <option value="resta">Resta</option>
                <option value="multiplicacion">Multiplicación</option>
                <option value="division">División</option>
            </select>
            <input type="submit" value="Calcular">
        </form>

        <?php
        //Verifica que el formulario fue enviado
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            //Valida que ambos campos no estén vacíos
            if ($_POST["num1"] !== "" && $_POST["num2"] !== "") {
                //Valida que ambos valores sean numéricos
                if (is_numeric($_POST["num1"]) && is_numeric($_POST["num2"])) {
                    //Convierte a número decimal
                    $num1 = floatval($_POST["num1"]);
                    $num2 = floatval($_POST["num2"]);
                    //Obtiene la operacion seleccionada
                    $operacion = $_POST["operacion"];
                    $resultado = "";

                    //Selecciona la operación según el valor del combobox
                    switch ($operacion) {
                        case "suma":
                            $resultado = $num1 + $num2;
                            break;
                        case "resta":
                            $resultado = $num1 - $num2;
                            break;
                        case "multiplicacion":
                            $resultado = $num1 * $num2;
                            break;
                        case "division":
                            if ($num2 != 0) {
                                $resultado = $num1 / $num2;
                            } else {
                                //Mensaje de error si se intenta dividir entre cero
                                echo "<div class='error'>No se puede dividir entre cero.</div>";
                                exit;
                            }
                            break;
                    }
                    //Muestra el resultado redondeado a 2 decimales
                    echo "<div class='resultado'>Resultado: " . round($resultado, 2) . "</div>";
                } else {
                    //Mensaje si no se ingresa un número
                    echo "<div class='error'>Debe ingresar valores numéricos válidos.</div>";
                }
            } else {
                //Mensaje si algún campo está vacío
                echo "<div class='error'>Debe ingresar ambos números.</div>";
            }
        }
        ?>
    </div>
</body>
</html>