<?php
include 'conexao.php';

// Processa o pedido de exclusão
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id_livro'])) {
    $id_livro = $_POST['id_livro'];

    // Deleta o livro do banco de dados
    $sql = "DELETE FROM livros WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id_livro);
    $stmt->execute();

    echo "<p class='success-message'>Livro excluído com sucesso!</p>";
}

// Busca todos os livros para exibir na lista
$sql = "SELECT * FROM livros";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Excluir Livro</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Excluir Livro</h1>
        <p>Selecione o livro que deseja excluir do acervo.</p>
        <a href="admin.php">⬅️ Voltar</a>
    </header>

    <table class="book-list">
        <tr>
            <th>Título</th>
            <th>Autor</th>
            <th>Ano</th>
            <th>Ação</th>
        </tr>
        <?php if ($result->num_rows > 0): ?>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['titulo']); ?></td>
                <td><?php echo htmlspecialchars($row['autor']); ?></td>
                <td><?php echo htmlspecialchars($row['ano']); ?></td>
                <td>
                    <form method="post" action="delete_livro.php">
                        <input type="hidden" name="id_livro" value="<?php echo $row['id']; ?>">
                        <button type="submit" onclick="return confirm('Tem certeza que deseja excluir este livro?')">Excluir</button>
                    </form>
                </td>
            </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="4">Nenhum livro encontrado.</td>
            </tr>
        <?php endif; ?>
    </table>
</body>
</html>
