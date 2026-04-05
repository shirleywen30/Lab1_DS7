<?php
//Obtiene el valor del campo "nombre" usando el REQUEST que viene del POST 
$Nombre = $_REQUEST['nombre'];
echo "El nombre es: " . $Nombre . "<br>";

//Obtiene el valor del campo "edad" que viene del POST
$Edad = $_POST["edad"];

//Verifica si la variable $Edad está definida y si es mayor a 18
if (isset($Edad) && $Edad > 18) {
    //  Mensaje si es mayor de edad
    echo "Usted puede votar en las próximas elecciones 2028";
} else {
    // Mensaje si no es mayor de edad
    echo "Usted no es mayor de edad";
}
?>
