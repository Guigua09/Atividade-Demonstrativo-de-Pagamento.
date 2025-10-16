<?php
require 'config.php';

$editing = false;
$registro = '';
$nome = '';
$data_admissao = '';
$cargo = '';
$qtde_salarios = '';
$salario_bruto = '';

if (isset($_GET['edit'])) {
    $id = intval($_GET['edit']);
    $stmt = $conn->prepare("SELECT * FROM tb_funcionarios WHERE N_Registro = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $res = $stmt->get_result();
    if ($res->num_rows) {
        $row = $res->fetch_assoc();
        $editing = true;
        $registro = $row['N_Registro'];
        $nome = $row['Nome_Funcionario'];
        $data_admissao = $row['data_admissao'];
        $cargo = $row['cargo'];
        $qtde_salarios = $row['qtde_salarios'];
        $salario_bruto = number_format($row['salario_bruto'], 2, '.', '');
    }
    $stmt->close();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <title>Cadastro de Funcionários</title>
  <link rel="stylesheet" href="style.css">

</head>
<body>
  <h1>Cadastro de Funcionários — Demonstrativo de Rendimentos Mensais</h1>

  <form method="post" action="gravar.php">
    <input type="hidden" name="N_Registro" value="<?php echo htmlspecialchars($registro); ?>">
    <label>Nome do funcionário:
      <input type="text" name="Nome_Funcionario" required value="<?php echo htmlspecialchars($nome); ?>">
    </label>

    <label>Data de admissão:
      <input type="date" name="data_admissao" required value="<?php echo htmlspecialchars($data_admissao); ?>">
    </label>

    <label>Cargo:
      <input type="text" name="cargo" required value="<?php echo htmlspecialchars($cargo); ?>">
    </label>

    <label>Quantidade de salários:
      <input type="number" name="qtde_salarios" min="1" required value="<?php echo htmlspecialchars($qtde_salarios); ?>">
    </label>

    <label>Salário bruto :
      <input type="text" name="salario_bruto" required value="<?php echo htmlspecialchars($salario_bruto); ?>">
    </label>

    <div class="actions">
      <button type="submit"><?php echo $editing ? 'Salvar alterações' : 'Cadastrar'; ?></button>
      <a href="listagem.php" style="margin-left:12px">Ver listagem</a>
    </div>
  </form>
</body>
</html>