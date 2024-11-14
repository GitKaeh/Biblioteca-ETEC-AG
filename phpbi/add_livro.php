<?php
include 'conexao.php';

// Processa o formulário quando enviado
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $titulo = $_POST['titulo'];
    $autor = $_POST['autor'];
    $ano = $_POST['ano'];
    $disponivel = 1; // O livro está disponível ao ser adicionado

    // Insere o livro na tabela
    $sql = "INSERT INTO livros (titulo, autor, ano, disponivel) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ssii", $titulo, $autor, $ano, $disponivel);
    $stmt->execute();

    echo "<p class='success-message'>Livro adicionado com sucesso!</p>";
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Adicionar Livro</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>Adicionar Novo Livro</h1>
        <p>Preencha as informações abaixo para adicionar um novo livro ao acervo.</p>
        <a href="admin.php">⬅️ Voltar</a>
    </header>

    <form method="post" action="add_livro.php" class="add-book-form" onsubmit="return validarFormulario()">
        <label for="titulo">Título:</label>
        <input type="text" id="titulo" name="titulo" required>

        <label for="autor">Autor:</label>
        <input type="text" id="autor" name="autor" required>

        <label for="ano">Ano de Publicação:</label>
        <input type="number" id="ano" name="ano" min="1000" max="<?php echo date('Y'); ?>" required>

        <button type="submit">Adicionar Livro</button>
    </form>

    <script>
    function validarFormulario() {
        const titulo = document.getElementById('titulo').value;
        const autor = document.getElementById('autor').value;
        const ano = document.getElementById('ano').value;

        if (!titulo || !autor || !ano) {
            alert("Por favor, preencha todos os campos.");
            return false;
        }

        if (ano < 1000 || ano > new Date().getFullYear()) {
            alert("Por favor, insira um ano válido.");
            return false;
        }
        
        return true;
    }
    </script>
</body>
</html>
