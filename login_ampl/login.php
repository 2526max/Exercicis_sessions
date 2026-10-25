<?php
session_start();

if (isset($_SESSION["user"])) {
    header("Location: 1.php");
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["user"]) && isset($_POST["pass"]) && 
        $_POST["user"] === $_POST["pass"]) { 
        
        $_SESSION["user"] = $_POST["user"];
        header("Location: 1.php");
        exit;
    } else {
        $error = "Usuario o contraseña incorrectos.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Bienvenido</title>
</head>
<body>
   <nav>
    <a href="login.php" style="color:#000;margin-right:12px;">Iniciar Sesión</a>
    <a href="1.php" style="color:#000;margin-right:12px;">Página Principal</a>
    <a href="2.php" style="color:#000;margin-right:12px;">Detalles</a>
  </nav>
  <div class="content">
    <?php if (isset($error)): ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php else: ?>
        <h1>Hola <?php echo htmlspecialchars($_SESSION["user"] ?? "Invitado"); ?>!</h1>
        <div class="actions">
            <a href="1.php">Volver al Blog</a>
        </div>
    <?php endif; ?>
  </div>
</body>
</html>
