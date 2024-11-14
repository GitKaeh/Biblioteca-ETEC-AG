<?php
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca Online</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&family=Poppins:wght@400;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <!-- Hero Section -->
    <header>
    <div class="logo-container">
    <img src="assets/images/logo-livro.png" alt="Logo Livro" class="logo">
        <h1>Bem-vindo à Biblioteca Online</h1>
        <a href="livros.php">📚 Explorar Livros</a>
    </header>

    <!-- Menu de Navegação -->
    <nav>
        <a href="index.php">🏠 Página Inicial</a>
        <a href="livros.php">📚 Lista de Livros</a>
        <a href="emprestimo.php">📖 Empréstimos</a>
        <a href="devolucao.php">🔄 Devoluções</a>

        <!-- Opções visíveis apenas para administradores -->
        <?php if ($_SESSION['usuario_tipo'] === 'admin'): ?>
            <a href="admin.php">⚙️ Administração</a>
        <?php endif; ?>

        <a href="logout.php" class="logout">🚪 Sair</a>
    </nav>

    <!-- Conteúdo Principal -->
    <main>
        <!-- Card: Sobre a Biblioteca -->
        <section class="card">
            <h2>Sobre a Biblioteca</h2>
            <p>
                Aqui, você pode explorar um grande acervo de livros, disponível para empréstimo e leitura.
                Nosso sistema permite que você veja quais livros estão disponíveis e gerencie facilmente os empréstimos.
                Aproveite nosso acervo e descubra novos conhecimentos!
            </p>
        </section>
        <section class="highlight-section">

    <h2>Por que escolher a Biblioteca Virtual?</h2>
    <div class="highlight-container">
        <div class="highlight-card">
            <h3>User Experience</h3>
            <p>
                A melhor experiência de usuário do mercado com navegação intuitiva 
                em qualquer dispositivo e sistema operacional.
            </p>
        </div>
        <div class="highlight-card">
            <h3>MEC</h3>
            <p>
                Atende a todos os requisitos legais do MEC com acervo virtual para 
                compor bibliografias obrigatórias e complementares.
            </p>
        </div>
        <div class="highlight-card">
            <h3>Integrações</h3>
            <p>
                Integração direta e fácil com sistemas LMS e intranets das instituições.
            </p>
        </div>
    </div>
</section>

        <!-- Card: Como Usar -->
        <section class="card">
            <h2>Como Usar o Sistema</h2>
            <ul>
                <li><strong>Lista de Livros:</strong> Veja todos os livros disponíveis na biblioteca.</li>
                <li><strong>Empréstimo de Livros:</strong> Escolha um livro e faça o empréstimo.</li>
                <li><strong>Devolução de Livros:</strong> Devolva os livros emprestados quando terminar a leitura.</li>
                <li><strong>Adicionar Novo Livro:</strong> (Apenas administradores).</li>
                <li><strong>Excluir Livro:</strong> (Apenas administradores).</li>
            </ul>
        </section>
    </main>

    <!-- Rodapé -->
    <footer>
        © 2024 Biblioteca Online. Todos os direitos reservados.
    </footer>
</body>
</html>
