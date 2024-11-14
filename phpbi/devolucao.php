<?php
include 'conexao.php';

// Lida com a devolução do livro
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id_emprestimo'], $_POST['id_livro'])) {
    $id_emprestimo = $_POST['id_emprestimo'];
    $id_livro = $_POST['id_livro'];
    $data_devolucao = date('Y-m-d');

    // Atualiza a data de devolução na tabela de empréstimos
    $sql = "UPDATE emprestimos SET data_devolucao = ? WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $data_devolucao, $id_emprestimo);
    $stmt->execute();

    // Atualiza a disponibilidade do livro
    $updateSql = "UPDATE livros SET disponivel = 1 WHERE id = ?";
    $updateStmt = $conn->prepare($updateSql);
    $updateStmt->bind_param("i", $id_livro);
    $updateStmt->execute();
}

// Seleciona os livros emprestados e que ainda não foram devolvidos
$sql = "SELECT emprestimos.id AS id_emprestimo, livros.id AS id_livro, livros.titulo, livros.autor, emprestimos.usuario, emprestimos.data_emprestimo 
        FROM emprestimos 
        JOIN livros ON emprestimos.id_livro = livros.id 
        WHERE emprestimos.data_devolucao IS NULL";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Devolução de Livros</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Devolução de Livros</h1>
        <p>Veja os livros atualmente emprestados e devolva-os aqui.</p>
        <a href="index.php">⬅️ Voltar</a>
    </header>

    <table class="book-list">
        <tr>
            <th>Título</th>
            <th>Autor</th>
            <th>Usuário</th>
            <th>Data de Empréstimo</th>
            <th>Devolução</th>
        </tr>
        <?php if ($result->num_rows > 0): ?>
            <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['titulo']); ?></td>
                <td><?php echo htmlspecialchars($row['autor']); ?></td>
                <td><?php echo htmlspecialchars($row['usuario']); ?></td>
                <td><?php echo htmlspecialchars($row['data_emprestimo']); ?></td>
                <td>
                    <form method="post" action="devolucao.php">
                        <input type="hidden" name="id_emprestimo" value="<?php echo $row['id_emprestimo']; ?>">
                        <input type="hidden" name="id_livro" value="<?php echo $row['id_livro']; ?>">
                        <button type="submit">Devolver</button>
                    </form>
                </td>
            </tr>
            <?php endwhile; ?>
        <?php else: ?>
            <tr>
                <td colspan="5">Nenhum livro para devolução no momento.</td>
            </tr>
        <?php endif; ?>
    </table>
</body>
</html>
