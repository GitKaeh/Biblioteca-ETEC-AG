<?php
session_start();
if (!isset($_SESSION['usuario_id']) || $_SESSION['usuario_tipo'] !== 'admin') {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administração</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Área Administrativa</h1>
        <p>Bem-vindo, <?php echo $_SESSION['usuario_nome']; ?>!</p>
        <nav>
    <a href="index.php">🏠 Página Inicial</a>
    <a href="add_livro.php">➕ Adicionar Livro</a>
    <a href="delete_livro.php">🗑️ Excluir Livro</a>
    <a href="gerenciar_usuarios.php">👥 Gerenciar Usuários</a>
    <a href="estatisticas.php">📊 Estatísticas</a>
    <a href="logout.php" class="logout">🚪 Sair</a>
</nav>

    </header>

    <main>
        <section class="card">
            <h2>Gerenciamento de Livros</h2>
            <p>Use as opções acima para adicionar, editar ou excluir livros.</p>
        </section>

        <section class="card">
            <h2>Gerenciamento de Usuários</h2>
            <p>Gerencie os usuários cadastrados, altere permissões ou remova contas.</p>
            <a href="gerenciar_usuarios.php" class="button">Gerenciar Usuários</a>
        </section>

        <section class="card">
            <h2>Estatísticas</h2>
            <p>Visualize estatísticas do sistema, como livros emprestados, usuários ativos e mais.</p>
            <a href="estatisticas.php" class="button">Ver Estatísticas</a>
        </section>
    </main>

    <footer>
        © 2024 Biblioteca Online. Todos os direitos reservados.
    </footer>
</body>
</html>
