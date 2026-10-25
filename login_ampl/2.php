<?php
session_start();

if (empty($_SESSION["user"])) {
    header("Location: index.html");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Conceptos de POO en PHP</title>
</head>
<body>

    <header style="background-color: #f0f0f0; padding: 10px; margin-bottom: 20px; display: flex; justify-content: space-between; align-items: center;">
        <h2 style="margin: 0;">Usuario: <?= htmlspecialchars($_SESSION["user"]) ?></h2>
        <a href="logout.php" style="background-color: #dc3545; color: white; padding: 8px 15px; text-decoration: none; border-radius: 4px;">Desconectar</a>
    </header>

    <main>
        <article class="entrada">
            <h1>Conceptos Clave de la POO en PHP</h1>
            <p>La Programación Orientada a Objetos (POO) permite agrupar datos (propiedades) y el comportamiento que opera sobre esos datos (métodos) en entidades llamadas objetos. PHP soporta estos paradigmas de forma nativa.</p>

            <h2>1. Clases y Objetos</h2>
            <p>Una **Clase** es la plantilla o el molde. Un **Objeto** es una instancia concreta de esa plantilla.</p>
            <pre><code>
class Coche {
    public string $modelo;
    public function arrancar() { /* lógica */ }
}

$miCoche = new Coche(); // Creación del objeto
$miCoche->modelo = "Tesla";
            </code></pre>

            <h2>2. Encapsulamiento</h2>
            <p>El encapsulamiento protege el estado interno de un objeto mediante la visibilidad de sus propiedades (público, privado, protegido). Se accede a ellos a través de métodos (getters/setters).</p>
            <pre><code>
class Cuenta {
    private float $saldo = 0.0;

    public function depositar(float $cantidad) {
        $this->saldo += $cantidad;
    }
}
            </code></pre>

            <h2>3. Herencia</h2>
            <p>Permite que una clase (hija o subclase) herede propiedades y métodos de otra clase (padre o superclase), promoviendo la reutilización de código.</p>
            <pre><code>
class Animal { /* ... */ }
class Perro extends Animal { /* Hereda de Animal */ }
            </code></pre>

            <p><a class="llegir" href="index.html">← Volver a Recursos</a></p>
        </article>
    </main>
    <footer>Recursos de Programación · Estudio de POO en PHP</footer>
</body>
</html>
