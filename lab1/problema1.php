<html>
<head>
    <title>PROBLEMA 1: Área y perímetro de un círculo</title>
</head>
<body>
    <h1>PROBLEMA 1: Área y perímetro de un círculo</h1>
    <form method="POST"> <!-- Para que no muestre el resultado en el URL -->
        Introduce el radio: <input type="text" name="radio"><br> <!-- Textbox para ingresar el radio y un salto para que el botón este abajo -->
        <input type="submit" value="Calcular"> <!-- Botón para calcular -->
    </form>

    <?php
    // Solo se ejecuta si el formulario fue enviado y el campo radio no está vacío para evitar que muestre resultados antes de correrlo
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (!empty($_POST["radio"])) {
            $radio = floatval($_POST["radio"]); // Convierte lo que viene del form a un número decimal

            if ($radio > 0) {
                $area = pi() * pow($radio, 2);       // Cálculo para Área = π * r^2
                $perimetro = 2 * pi() * $radio;      // Cálculo para Perímetro = 2 * π * r

                echo "Área: " . round($area, 2) . "<br>";       // Imprime el área, redondea hasta 2 decimales, salto
                echo "Perímetro: " . round($perimetro, 2);      // Imprime el perímetro, redondea hasta 2 decimales
            } else {
                echo "Ingrese un número positivo.";     // Validación que se ingrese un número
            }
        } else {
            echo "Debe ingresar un valor en el campo.";       // Validacion cuando se envía campo vacío
        }
    }
    ?>
</body>
</html>
