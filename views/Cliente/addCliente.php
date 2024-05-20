<?php
require_once '../controllers/ClienteController.php';

if ($_POST) {
    $controller = new ClienteController();
    $result = $controller->createCliente($_POST);

    if ($result) {
        echo "Cliente añadido con éxito.";
    } else {
        echo "Error al añadir cliente.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Añadir Cliente</title>
</head>
<body>
    <h1>Añadir Cliente</h1>
    <form action="" method="POST">
        <label for="nomCli">Nombre:</label>
        <input type="text" name="nomCli" required><br>
        <label for="dirCli">Dirección:</label>
        <input type="text" name="dirCli" required><br>
        <label for="telCli">Teléfono:</label>
        <input type="text" name="telCli" required><br>
        <label for="emailCli">Email:</label>
        <input type="email" name="emailCli" required><br>
        <input type="submit" value="Añadir Cliente">
    </form>
    <a href="list_clientes.php">Volver a la lista</a>
</body>
</html>
