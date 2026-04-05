<html>
    <head><title>PROBLEMA 2: Pulgadas a centímetros</title></head>
    <body>
        <h1>PROBLEMA 2: Convertir pulgadas a centímetros</h1>
        <form method = "POST">
            Ingrese las pulgadas: <input type = "text" name = "pulgadas">
            <input type = "submit" value = "Convertir">
        </form>

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
                    
                    //Muestra el resultado
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
    </body>
</html>