<?php

$servername = "127.0.0.1";
$username = "Lanex";
$password = "";
$dbname = "ejemplo";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

function create_user($pdo, $nombre, $edad,$sexo) {
    $stmt = $pdo->prepare("INSERT INTO usuarios (nombre, edad, sexo) VALUES (:nombre, :edad, :sexo)");
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':edad', $edad);
    $stmt->bindParam(':sexo', $sexo);
    $stmt->execute();
  }
  
  
  
  function delete_user($pdo, $id) {
    $stmt = $pdo->prepare("DELETE FROM usuarios WHERE id = ?");
    $stmt->execute([$id]);
  }
  
  function read_users($pdo) {
    $stmt = $pdo->query("SELECT * FROM usuarios");
    $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $usuarios;s
  }
  
?>


