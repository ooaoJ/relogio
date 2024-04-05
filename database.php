<?php
// Conexão com o banco de dados (substitua os valores pelos seus)
$servername = "localhost";
$username = "seu_usuario";
$password = "sua_senha";
$dbname = "seu_banco_de_dados";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Falha na conexão: " . $conn->connect_error);
}

// Recebe os dados do formulário
$email = $_POST['email'];
$senha = $_POST['senha'];

// Verifica as credenciais no banco de dados
$sql = "SELECT * FROM usuarios WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $row = $result->fetch_assoc();
  if (password_verify($senha, $row['senha'])) {
    echo "Login realizado com sucesso!";
  } else {
    echo "Senha incorreta!";
  }
} else {
  echo "Usuário não encontrado!";
}

$conn->close();
?>