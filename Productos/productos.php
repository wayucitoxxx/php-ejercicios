<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Función para procesar los datos
    function procesarProducto($nombre, $cantidad, $valor) {
        $cantidad = (float) $cantidad;  // Aseguramos que la cantidad sea un número
        $valor = (float) $valor;        // Aseguramos que el valor sea un número
        $total = $cantidad * $valor;    // Calculamos el total
        return $total;
    }

    // Inicializamos los datos de los productos
    $productos = [
        [
            "nombre" => $_POST['nombre1'],
            "cantidad" => $_POST['cantidad1'],
            "valor" => $_POST['valor1'],
        ],
        [
            "nombre" => $_POST['nombre2'],
            "cantidad" => $_POST['cantidad2'],
            "valor" => $_POST['valor2'],
        ],
        [
            "nombre" => $_POST['nombre3'],
            "cantidad" => $_POST['cantidad3'],
            "valor" => $_POST['valor3'],
        ],
        [
            "nombre" => $_POST['nombre4'],
            "cantidad" => $_POST['cantidad4'],
            "valor" => $_POST['valor4'],
        ]
    ];

    // Procesamos los productos y calculamos totales
    $totalGeneral = 0;
    $descuento = 0;

    foreach ($productos as $producto) {
        if ($producto["nombre"] != "") {
            $totalProducto = procesarProducto($producto["nombre"], $producto["cantidad"], $producto["valor"]);
            $totalGeneral += $totalProducto;

            // Aplicamos el descuento dependiendo del total
            if ($totalProducto > 50000 && $totalProducto < 100000) {
                $descuento += $totalProducto * 0.02; // 2% descuento
            } elseif ($totalProducto > 100000 && $totalProducto < 150000) {
                $descuento += $totalProducto * 0.03; // 3% descuento
            } elseif ($totalProducto > 150000 && $totalProducto < 200000) {
                $descuento += $totalProducto * 0.04; // 4% descuento
            } elseif ($totalProducto > 200000) {
                $descuento += $totalProducto * 0.05; // 5% descuento
            }
        }
    }

    // Aplicamos el descuento total
    $totalConDescuento = $totalGeneral - $descuento;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factura</title>
    <link rel="stylesheet" href="./productos.css">
</head>
<body>

<h1>Factura de Productos</h1>

<table border="1" cellpadding="10">
    <thead>
        <tr>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>Valor Unitario</th>
            <th>Total</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Imprimir los productos en la tabla
        foreach ($productos as $producto) {
            if ($producto["nombre"] != "") {
                $totalProducto = procesarProducto($producto["nombre"], $producto["cantidad"], $producto["valor"]);
                echo "<tr>";
                echo "<td>" . $producto["nombre"] . "</td>";
                echo "<td>" . $producto["cantidad"] . "</td>";
                echo "<td>" . $producto["valor"] . "</td>";
                echo "<td>" . $totalProducto . "</td>";
                echo "</tr>";
            }
        }
        ?>
    </tbody>
</table>

<h3>Subtotal: <?php echo $totalGeneral; ?></h3>
<h3>Descuento: <?php echo $descuento; ?></h3>
<h3>Total a pagar: <?php echo $totalConDescuento; ?></h3>

<a href="/productos.html">Volver a agregar más productos</a>

</body>
</html>
