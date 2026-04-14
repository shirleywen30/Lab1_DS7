<?php
$valorPantalla = null; // Guarda el resultado para mostrarlo en la pantalla

// Verifica si el formulario fue enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Verifica que la expresión no esté vacía
    if (!empty($_POST["expresion"])) {

        $expresion = $_POST["expresion"]; // Captura la expresión ingresada

        // Sanitiza para evitar código malicioso
        $expresion = htmlspecialchars($expresion, ENT_QUOTES, 'UTF-8');

        // Valida que solo haya números y operadores y que no termine en operador
        if (preg_match('/^[0-9+\-*\.]+$/', $expresion) && !preg_match('/[+\-*]$/', $expresion)) {

            try {
                // Evalúa la expresión matemática
                $resultado = eval("return $expresion;");

                // Redondea el resultado a 2 decimales
                $valorPantalla = round($resultado, 2);

            } catch (Throwable $e) {
                // Si ocurre error en el cálculo
                $valorPantalla = "Error";
            }

        }
    }
}
?>

<html>
<head>
    <title>PROBLEMA 6: Calculadora</title>

    <style>
        /* Estilo general de la página */
        body {
            font-family: Arial, sans-serif;
            background-color: rgba(67, 230, 67, 0.3);
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        /* Contenedor de la calculadora */
        .calculadora {
            background: #2b2b2b;
            padding: 20px;
            border-radius: 12px;
            width: 260px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.4);
        }

        /* Pantalla donde se muestran números y resultado */
        .pantalla {
            width: 100%;
            height: 50px;
            background: #000;
            color: #0f0;
            font-size: 22px;
            text-align: right;
            padding: 10px;
            border-radius: 6px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        /* Grid para organizar botones */
        .botones {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 8px;
        }

        /* Estilo general de botones */
        button {
            padding: 15px;
            font-size: 16px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        /* Botones de números */
        .numero {
            background: #3a3a3a;
            color: white;
        }

        /* Botones de operadores */
        .operador {
            background: #ff9500;
            color: white;
        }

        /* Botón igual (más largo) */
        .igual {
            background: #4CAF50;
            color: white;
            grid-column: span 2;
        }

        /* Botón limpiar */
        .clear {
            background: #e53935;
            color: white;
        }
    </style>

    <script>
        // Agrega valores a la pantalla
        function agregar(valor) {
            document.getElementById("pantalla").value += valor;
        }

        // Limpia la pantalla
        function limpiar() {
            document.getElementById("pantalla").value = "";
        }
    </script>
</head>

<body>

<div class="calculadora">

    <form method="POST">

        <!-- Pantalla de la calculadora -->
        <input type="text" id="pantalla" name="expresion" class="pantalla"
        <?php if (!empty($valorPantalla)) echo 'value="'.$valorPantalla.'"'; ?> readonly>

        <!-- Botones -->
        <div class="botones">

            <!-- Fila 1 -->
            <button type="button" class="clear" onclick="limpiar()">C</button>
            <button type="button"></button>
            <button type="button"></button>
            <button type="button"></button>

            <!-- Fila 2 -->
            <button type="button" class="numero" onclick="agregar('7')">7</button>
            <button type="button" class="numero" onclick="agregar('8')">8</button>
            <button type="button" class="numero" onclick="agregar('9')">9</button>
            <button type="button" class="operador" onclick="agregar('*')">×</button>

            <!-- Fila 3 -->
            <button type="button" class="numero" onclick="agregar('4')">4</button>
            <button type="button" class="numero" onclick="agregar('5')">5</button>
            <button type="button" class="numero" onclick="agregar('6')">6</button>
            <button type="button" class="operador" onclick="agregar('-')">−</button>

            <!-- Fila 4 -->
            <button type="button" class="numero" onclick="agregar('1')">1</button>
            <button type="button" class="numero" onclick="agregar('2')">2</button>
            <button type="button" class="numero" onclick="agregar('3')">3</button>
            <button type="button" class="operador" onclick="agregar('+')">+</button>

            <!-- Fila 5 -->
            <button type="button" class="numero" onclick="agregar('0')">0</button>
            <button type="button" class="numero" onclick="agregar('.')">.</button>
            <button type="submit" class="igual">=</button>

        </div>

    </form>

</div>

</body>
</html>