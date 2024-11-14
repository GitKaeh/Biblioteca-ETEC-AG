<?php
session_start();
if (!isset($_SESSION['usuario_id']) || $_SESSION['usuario_tipo'] !== 'admin') {
    header("Location: login.php");
    exit();
}

include 'conexao.php';

// Excluir usuário se solicitado
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];

    // Certifique-se de que o administrador não exclua a si mesmo
    if ($delete_id != $_SESSION['usuario_id']) {
        $sql = "DELETE FROM usuarios WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("i", $delete_id);
        if ($stmt->execute()) {
            $message = "Usuário excluído com sucesso.";
        } else {
            $message = "Erro ao excluir o usuário.";
        }
    } else {
        $message = "Você não pode excluir a si mesmo.";
    }
}

// Buscar todos os usuários
$sql = "SELECT * FROM usuarios";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gerenciar Usuários</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Gerenciar Usuários</h1>
        <a href="admin.php">⬅️ Voltar</a>
    </header>

    <main>
        <?php if (isset($message)): ?>
            <p class="success-message"><?php echo $message; ?></p>
        <?php endif; ?>

        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nome</th>
                    <th>Email</th>
                    <th>Tipo</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo htmlspecialchars($row['nome']); ?></td>
                    <td><?php echo htmlspecialchars($row['email']); ?></td>
                    <td><?php echo ucfirst($row['tipo']); ?></td>
                    <td>
                        <!-- Botão para excluir -->
                        <?php if ($row['id'] != $_SESSION['usuario_id']): ?>
                            <a href="gerenciar_usuarios.php?delete_id=<?php echo $row['id']; ?>" 
                               onclick="return confirm('Tem certeza que deseja excluir este usuário?');">
                               🗑️ Excluir
                            </a>
                        <?php else: ?>
                            <span>Seu Perfil</span>
                        <?php endif; ?>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </main>

    <footer>
        © 2024 Biblioteca Online. Todos os direitos reservados.
    </footer>
</body>
</html>
