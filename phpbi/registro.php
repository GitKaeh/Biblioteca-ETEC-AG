<?php
include 'conexao.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = password_hash($_POST['senha'], PASSWORD_BCRYPT); // Criptografa a senha

    $sql = "INSERT INTO usuarios (nome, email, senha) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $nome, $email, $senha);

    if ($stmt->execute()) {
        echo "<p class='success-message'>Usuário registrado com sucesso!</p>";
        header("Location: login.php");
    } else {
        echo "<p class='error-message'>Erro ao registrar o usuário. Tente novamente.</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Usuário</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <form method="post" action="registro.php" class="emprestimo-form">
        <h1>Cadastro</h1>
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" required>

        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" required>

        <label for="senha">Senha:</label>
        <input type="password" id="senha" name="senha" required>

        <button type="submit">Registrar</button>

        <!-- Botão para voltar ao login -->
        <p>Já tem uma conta? <a href="login.php" class="login-link">Voltar para Login</a></p>
    </form>
</body>
</html>
