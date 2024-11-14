<?php
session_start();
if (!isset($_SESSION['usuario_id']) || $_SESSION['usuario_tipo'] !== 'admin') {
    header("Location: login.php");
    exit();
}

include 'conexao.php';

// Consultar estatísticas
// 1. Total de usuários
$totalUsuarios = $conn->query("SELECT COUNT(*) AS total FROM usuarios")->fetch_assoc()['total'];

// 2. Total de livros
$totalLivros = $conn->query("SELECT COUNT(*) AS total FROM livros")->fetch_assoc()['total'];

// 3. Livros disponíveis
$livrosDisponiveis = $conn->query("SELECT COUNT(*) AS total FROM livros WHERE disponivel = 1")->fetch_assoc()['total'];

// 4. Livros emprestados
$livrosEmprestados = $conn->query("SELECT COUNT(*) AS total FROM emprestimos")->fetch_assoc()['total'];

// 5. Livro mais emprestado
$livroMaisEmprestado = $conn->query("
    SELECT livros.titulo, COUNT(emprestimos.id) AS total
    FROM emprestimos
    JOIN livros ON emprestimos.id_livro = livros.id
    GROUP BY emprestimos.id_livro
    ORDER BY total DESC
    LIMIT 1
")->fetch_assoc();
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estatísticas do Sistema</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Estatísticas do Sistema</h1>
        <a href="admin.php">⬅️ Voltar</a>
    </header>

    <main>
        <section class="card">
            <h2>Visão Geral</h2>
            <ul>
                <li><strong>Total de Usuários:</strong> <?php echo $totalUsuarios; ?></li>
                <li><strong>Total de Livros:</strong> <?php echo $totalLivros; ?></li>
                <li><strong>Livros Disponíveis:</strong> <?php echo $livrosDisponiveis; ?></li>
                <li><strong>Livros Emprestados:</strong> <?php echo $livrosEmprestados; ?></li>
            </ul>
        </section>

        <section class="card">
            <h2>Livro Mais Emprestado</h2>
            <?php if ($livroMaisEmprestado): ?>
                <p><strong><?php echo $livroMaisEmprestado['titulo']; ?></strong> com <?php echo $livroMaisEmprestado['total']; ?> empréstimos.</p>
            <?php else: ?>
                <p>Nenhum livro emprestado até agora.</p>
            <?php endif; ?>
        </section>
    </main>

    <footer>
        © 2024 Biblioteca Online. Todos os direitos reservados.
    </footer>
</body>
</html>
