<?php
session_start();

if (!isset($_SESSION['login'])) {
  header('Location: login.php');
  exit();
}

$arquivo = fopen('livros_emprestados.txt', 'r');// Lê todos os registros do arquivo de livros emprestados
if ($arquivo) {
  $registros = array();
  while (($linha = fgets($arquivo)) !== false) {
    $registro = explode('|', trim($linha));
    $registros[] = $registro;
  }
  fclose($arquivo);
} else {
  $mensagem = 'Erro ao abrir o arquivo de registros';
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Listagem de livros emprestados</title>
</head>
<body>
  <h1>Listagem de livros emprestados</h1>
  <?php if (isset($mensagem)) echo "<p>$mensagem</p>"; ?>
  <table>
  <table border = "1">
    <tr>
      <th>Título</th>
      <th>Autor</th>
      <th>Data de empréstimo</th>
    </tr>
    <?php foreach ($registros as $registro): ?>
      <tr>
        <td><?= $registro[0] ?></td>
        <td><?= $registro[1] ?></td>
        <td><?= $registro[2] ?></td>
      </tr>
    <?php endforeach; ?>
  </table>
</body>
</html>