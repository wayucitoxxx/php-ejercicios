<?php

if(isset($_POST['calculo-cuadra'])){

    $l1 = ($_POST['lado-cuadra1']);
    $l2 = ($_POST['lado-cuadra2']);

    $A_cuadrado = 0;
    $P_cuadrado = 0;

    if (isset($_POST['calculo-cuadra'])){
        $A_cuadrado = $l1 * $l2;
        $P_cuadrado = 2*($l1+$l2);
        echo "<h2> Area del cuadrado es:  </h2>".$A_cuadrado; 
        echo "<h2> Perimetro del cuadrado es:  </h2>".$P_cuadrado;
    }
}
?>