<?php
session_start();

// Verifica se há uma sessão ativa
if (!isset($_SESSION['login'])) {
  header('Location: Login.php');
  exit();
}

// Verifica se os dados de cadastro foram submetidos
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $titulo = $_POST['titulo'];
  $autor = $_POST['autor'];
  $data_emprestimo = $_POST['data_emprestimo'];

  // Abre o arquivo de livros emprestados para adicionar o novo registro
  $arquivo = fopen('livros_emprestados.txt', 'a');
  if ($arquivo) {
    $registro = "$titulo|$autor|$data_emprestimo\n";
    fwrite($arquivo, $registro); //fwrite retorna o número de itens completos que a função grava
    fclose($arquivo); //fclose fecha o arquivo quando as operações de entrada e saída estão completas
    $mensagem = 'Registro adicionado com sucesso';
  } else {
    $mensagem = 'Erro ao abrir o arquivo de registros';
  }
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Cadastro de livros emprestados</title>
</head>
<body>
  <h1>Cadastro de livros emprestados</h1>
  <?php if (isset($mensagem)) echo "<p>$mensagem</p>"; ?>
  <form method="post">
    <label for="titulo">Título:</label>
    <input type="text" name="titulo"><br>
    <label for="autor">Autor:</label>
    <input type="text" name="autor"><br>
    <label for="data_emprestimo">Data do empréstimo:</label>
    <input type="date" name="data_emprestimo"><br>
    <input type="submit" value="Cadastrar"><br>
    <a href="Registros.php">Visualizar cadastro de livros emprestados</a>
  </form>
</body>
</html>