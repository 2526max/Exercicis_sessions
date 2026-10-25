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
    <title>Recursos de Programación</title>
</head>
<body>
    
    <header style="background-color: #f0f0f0; padding: 10px; margin-bottom: 20px; display: flex; justify-content: space-between; align-items: center;">
        <h2 style="margin: 0;">Usuario: <?= htmlspecialchars($_SESSION["user"]) ?></h2>
        <a href="logout.php" style="background-color: #dc3545; color: white; padding: 8px 15px; text-decoration: none; border-radius: 4px;">Desconectar</a>
    </header>

    <main>
        <h1>Recursos de Programación</h1>
        <p class="subtitol">Bienvenido, <?= htmlspecialchars($_SESSION["user"]) ?>. Explora temas clave de desarrollo.</p>

        <section class="entrada">
            <h2>Introducción a la Programación Orientada a Objetos (POO)</h2>
            <p>La POO es un paradigma que permite modelar el mundo real mediante objetos. Conceptos como clases, objetos, herencia y polimorfismo son fundamentales en PHP moderno.</p>
        </section>

        <section class="entrada">
            <h2>Buenas Prácticas en Código PHP</h2>
            <p>Prioriza la legibilidad sobre la concisión. Usa nombres descriptivos, evita la magia y mantén tus funciones atómicas y enfocadas.</p>
        </section>

        <section class="entrada">
            <h2>Manejo de Errores en PHP</h2>
            <p>No ignores los errores. Utiliza bloques try-catch para manejar excepciones de forma controlada y evita que el código falle inesperadamente en producción.</p>
        </section>
    </main>
    <footer>Recursos de Programación · Ejercicio de sesiones en PHP</footer>
    <a class="llegir" href="2.php">Leer más →</a>
</body>
</html>
