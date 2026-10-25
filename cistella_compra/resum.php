<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resumen de compra - Café Gourmet</title>
</head>
<body>
    <header>
        <h1>☕ Café Gourmet</h1>
        <nav>
            <ul>
                <li><a href="index.html">Inicio</a></li>
                <li><a href="cistella_compra.php">Cesta</a></li>
            </ul>
        </nav>
    </header>

    <div>
        <h2>Resumen de tu compra</h2>
        
        <?php
        if (isset($_SESSION["producte"]) && count($_SESSION["producte"]) > 0) {
            $productes = $_SESSION["producte"];
            $quant = $_SESSION["quant"];
            $preu = $_SESSION["preu"];
            $total = count($productes);
            
            $productos_datos = [
                "ARABICA" => [
                    "nombre" => "Café Arábica Premium",
                    "precio_unitario" => 15
                ],
                "ROBUSTA" => [
                    "nombre" => "Café Robusta Intenso",
                    "precio_unitario" => 10
                ]
            ];

            for ($i = 0; $i < $total; $i++) {
                $prod = $productes[$i];
                $datos = $productos_datos[$prod];
                echo '<div>
                    <h3>' . $datos["nombre"] . '</h3>
                    <p>Precio unitario: ' . $datos["precio_unitario"] . '€</p>
                    <p>Cantidad: ' . $quant[$i] . '</p>
                    <p>Subtotal: ' . $preu[$i] . '€</p>
                    <hr>
                </div>';
            }
            
            $total_compra = array_sum($_SESSION['preu']);
            echo '<h3>TOTAL A PAGAR: ' . $total_compra . '€</h3>';
        } else {
            echo '<p>No hay productos en tu compra</p>';
        }
        ?>
        
        <div>
            <a href="cistella_compra.php">Volver a la cesta</a>
            <?php
            if (isset($_SESSION["producte"]) && count($_SESSION["producte"]) > 0) {
                echo '<form action="compra.php" method="POST" style="display: inline;">
                    <button type="submit">Confirmar compra</button>
                </form>';
            }
            ?>
        </div>
    </div>
</body>
</html>
