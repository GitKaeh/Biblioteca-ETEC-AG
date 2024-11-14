<?php
include 'conexao.php';

$search = "";
if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $sql = "SELECT * FROM livros WHERE titulo LIKE '%$search%' OR autor LIKE '%$search%'";
} else {
    $sql = "SELECT * FROM livros";
}

$result = $conn->query($sql);

session_start();
if (!isset($_SESSION['usuario_id'])) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Lista de Livros</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Lista de Livros Disponíveis</h1>
        <a href="index.php">⬅️ Voltar</a>
        <form method="get" action="livros.php" class="search-bar">
            <input type="text" name="search" placeholder="Buscar por título ou autor" value="<?php echo htmlspecialchars($search); ?>">
            <button type="submit">Pesquisar</button>
        </form>
    </header>

    <table class="book-list">
        <tr>
            <th>Título</th>
            <th>Autor</th>
            <th>Ano</th>
            <th>Disponível</th>
        </tr>
        <?php if ($result->num_rows > 0): ?>
            <?php while($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo htmlspecialchars($row['titulo']); ?></td>
                <td><?php echo htmlspecialchars($row['autor']); ?></td>
                <td><?php echo htmlspecialchars($row['ano']); ?></td>
                <td><?php echo $row['disponivel'] ? 'Sim' : 'Não'; ?></td>
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
