<?php
include 'conexao.php';

// Lida com o pedido de empréstimo
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id_livro'], $_POST['usuario'])) {
    $id_livro = $_POST['id_livro'];
    $usuario = $_POST['usuario'];
    $data_emprestimo = date('Y-m-d');
    
    // Insere o empréstimo no banco de dados
    $sql = "INSERT INTO emprestimos (id_livro, usuario, data_emprestimo) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("iss", $id_livro, $usuario, $data_emprestimo);
    $stmt->execute();
    
    // Atualiza a disponibilidade do livro
    $updateSql = "UPDATE livros SET disponivel = 0 WHERE id = ?";
    $updateStmt = $conn->prepare($updateSql);
    $updateStmt->bind_param("i", $id_livro);
    $updateStmt->execute();
}

// Seleciona os livros disponíveis para exibir na página
$sql = "SELECT * FROM livros WHERE disponivel = 1";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Empréstimo de Livros</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Empréstimo de Livros</h1>
        <p>Escolha um livro disponível e insira seu nome para fazer o empréstimo.</p>
        <a href="index.php">⬅️ Voltar</a>
    </header>

    <table class="book-list">
        <tr>
            <th>Título</th>
            <th>Autor</th>
            <th>Ano</th>
            <th>Empréstimo</th>
        </tr>
        <?php if ($result->num_rows > 0): ?>
            <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['titulo']); ?></td>
                <td><?php echo htmlspecialchars($row['autor']); ?></td>
                <td><?php echo htmlspecialchars($row['ano']); ?></td>
                <td>
                    <form method="post" action="emprestimo.php">
                        <input type="hidden" name="id_livro" value="<?php echo $row['id']; ?>">
                        <input type="text" name="usuario" placeholder="Nome" required>
                        <button type="submit">Emprestar</button>
                    </form>
                </td>
            </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="4">Nenhum livro disponível para empréstimo.</td>
            </tr>
        <?php endif; ?>
    </table>
</body>
</html>
