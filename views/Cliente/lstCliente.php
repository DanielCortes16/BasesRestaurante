<?php
require_once '../controllers/ClienteController.php';

$controller = new ClienteController();
$clientes = $controller->readClientes();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Listar Clientes</title>
</head>
<body>
    <h1>Lista de Clientes</h1>
    <a href="add_cliente.php">Añadir Cliente</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Dirección</th>
            <th>Teléfono</th>
            <th>Email</th>
            <th>Acciones</th>
        </tr>
        <?php foreach($clientes as $cliente): ?>
            <tr>
                <td><?php echo $cliente['ideCli']; ?></td>
                <td><?php echo $cliente['nomCli']; ?></td>
                <td><?php echo $cliente['dirCli']; ?></td>
                <td><?php echo $cliente['telCli']; ?></td>
                <td><?php echo $cliente['emailCli']; ?></td>
                <td>
                    <a href="edit_cliente.php?ideCli=<?php echo $cliente['ideCli']; ?>">Editar</a>
                    <a href="delete_cliente.php?ideCli=<?php echo $cliente['ideCli']; ?>">Eliminar</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
