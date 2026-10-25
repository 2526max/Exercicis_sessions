<?php
session_start();

if (isset($_POST["prod"]) && isset($_POST["quant"])) {
    if (!isset($_SESSION['producte'])) {
        $_SESSION["producte"] = array();
        $_SESSION["quant"] = array();
        $_SESSION["preu"] = array();
    }
    array_push($_SESSION["producte"], $_POST["prod"]);
    array_push($_SESSION["quant"], $_POST["quant"]);
    
    $preu_p = $_POST["preu"];
    $quant_p = $_POST["quant"];
    $calc = (int)$preu_p * (int)$quant_p;
    array_push($_SESSION["preu"], $calc);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Cesta de compra - Café Gourmet</title>
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
        <h2>Tu cesta de compra</h2>
        <?php
        if (isset($_SESSION["producte"]) && count($_SESSION["producte"]) > 0) {
            $productes = $_SESSION["producte"];
            $quant = $_SESSION["quant"];
            $total = count($productes);
            $preu = $_SESSION["preu"];
            
            $productos_datos = [
                "ARABICA" => [
                    "nombre" => "Café Arábica Premium",
                    "desc" => "Disfruta de un aroma intenso y notas frutales con nuestro grano seleccionado de las montañas de Etiopía."
                ],
                "ROBUSTA" => [
                    "nombre" => "Café Robusta Intenso",
                    "desc" => "Un sabor fuerte y con cuerpo, ideal para despertar tus mañanas con un espresso cargado de energía."
                ]
            ];

            for ($i = 0; $i < $total; $i++) {
                $prod = $productes[$i];
                $datos = $productos_datos[$prod];
                echo '<div>
                    <h3>' . $datos["nombre"] . '</h3>
                    <p>' . $datos["desc"] . '</p>
                    <p>Cantidad: ' . $quant[$i] . '</p>
                    <p>Subtotal: ' . $preu[$i] . '€</p>
                    <hr>
                </div>';
            }
        } else {
            echo '<p>Tu cesta está vacía</p>';
        }
        ?>
    </div>

    <?php 
    if (isset($_SESSION["producte"]) && count($_SESSION["producte"]) > 0) { 
        $total_compra = array_sum($_SESSION['preu']);
        echo '<div>
            <h3>Total: ' . $total_compra . '€</h3>
            <a href="index.html">Seguir comprando</a>
            <a href="resum.php">Finalizar compra</a>
        </div>';
    } else {
        echo '<div>
            <a href="index.html">Volver al catálogo</a>
        </div>';
    }
    ?>
</body>
</html>
