<?php
// Verificamos si se ha enviado el formulario
if (isset($_POST['enviar'])){
    // Obtenemos los números del formulario
    $n1 = isset($_POST['num1']) ? $_POST['num1'] : 0;
    $n2 = isset($_POST['num2']) ? $_POST['num2'] : 0;

    // Inicializamos las variables de resultados
    $sum = 0;
    $res = 0;
    $multi = 0;
    $divi = 0;

    // Realizamos las operaciones
    if (isset($_POST['enviar'])) {
        $sum = $n1 + $n2;
        $res = $n1 - $n2;
        $multi = $n1 * $n2;
        if($n1 || $n2 == 0){
            echo"<h2>no se puede dividir";
        }
            else{
                $divi = $n1 / $n2;
                
            }
    }

}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado de Operación</title>
</head>
<body>
    <h1>Resultado</h1>
    <?php
    // Mostramos el resultado de las operaciones si se realizaron
    if (isset($sum)) {
        echo "<h2>La suma de los dos números es: $sum</h2>";
    }
    if (isset($res)) {
        echo "<h2>La resta de los dos números es: $res</h2>";
    }
    if (isset($multi)) {
        echo "<h2>La multiplicación de los dos números es: $multi</h2>";
    }

    if (isset($divi)){
        echo "<h2>La divicion de los dos numeros es: $divi</h2>";
    }
    ?>
    <br>
    <a href="Suma-dos-numeros.html">Volver al formulario</a>
</body>
</html>
