<?php
// Definindo as credenciais para o banco de dados
$servername = "localhost";  // Endereço do servidor (localhost para desenvolvimento local)
$username = "root";         // Nome de usuário do MySQL
$password = "";             // Senha (no XAMPP, por padrão o root não tem senha)
$dbname = "biblioteca";     // Nome do banco de dados

// Criando a conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificando se houve erro na conexão
if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);  // Exibe o erro caso a conexão falhe
}

// Caso não haja erro, a conexão está bem-sucedida
// echo "Conexão bem-sucedida!";
?>
