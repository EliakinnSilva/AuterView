<?php
$servername = "seu_servidor_mysql";
$username = "seu_usuario_mysql";
$password = "sua_senha_mysql";
$dbname = "seu_banco_de_dados";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Conexão falhou: " . $conn->connect_error);
}

$sql = "SELECT id, title, filename FROM videos";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $videos[] = $row;
  }
} else {
  $videos = [];
}

$conn->close();

echo json_encode($videos);
?>
