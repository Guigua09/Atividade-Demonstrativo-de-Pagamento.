<?php
require 'config.php';
if (!isset($_GET['id'])) {
    header('Location: listagem.php');
    exit;
}
$id = intval($_GET['id']);

if (isset($_POST['confirm']) && $_POST['confirm'] === 'yes') {
    $stmt = $conecta_db->prepare("DELETE FROM tb_funcionarios WHERE N_Registro = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $stmt->close();
    header('Location: listagem.php');
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head><meta charset="utf-8"><title>Excluir</title></head>
<body>
  <h2>Confirmar exclusão</h2>
  <p>Tem certeza que deseja excluir o registro #<?php echo $id; ?>?</p>
  <form method="post">
    <button name="confirm" value="yes" type="submit">Sim, excluir</button>
    <a href="listagem.php" style="margin-left:12px">Cancelar</a>
  </form>
</body>
</html>