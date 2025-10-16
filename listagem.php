<?php
require 'config.php';
$result = $conecta_db->query("SELECT * FROM tb_funcionarios ORDER BY N_Registro DESC");
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="utf-8">
  <title>Listagem de Funcionários</title>
  <style>table{border-collapse:collapse;} td,th{padding:6px;border:1px solid #ccc;}</style>
</head>
<body>
  <h1>Listagem de Funcionários</h1>
  <p><a href="home_funcionarios.php">Novo cadastro</a></p>

  <table>
    <tr>
      <th>#</th><th>Nome</th><th>Admissão</th><th>Cargo</th><th>Qtde salários</th>
      <th>Salário bruto</th><th>INSS</th><th>Salário líquido</th><th>Ações</th>
    </tr>

    <?php while($row = $result->fetch_assoc()): ?>
      <tr>
        <td><?php echo $row['N_Registro']; ?></td>
        <td><?php echo htmlspecialchars($row['Nome_Funcionario']); ?></td>
        <td><?php echo htmlspecialchars($row['data_admissao']); ?></td>
        <td><?php echo htmlspecialchars($row['cargo']); ?></td>
        <td style="text-align:right"><?php echo (int)$row['qtde_salarios']; ?></td>
        <td style="text-align:right"><?php echo number_format($row['salario_bruto'], 2, ',', '.'); ?></td>
        <td style="text-align:right"><?php echo number_format($row['inss'], 2, ',', '.'); ?></td>
        <td style="text-align:right"><?php echo number_format($row['salario_liquido'], 2, ',', '.'); ?></td>
        <td>
          <a href="home_funcionarios.php?edit=<?php echo $row['N_Registro']; ?>">Editar</a> |
          <a href="excluir.php?id=<?php echo $row['N_Registro']; ?>" onclick="return confirm('Confirma exclusão?')">Excluir</a>
        </td>
      </tr>
    <?php endwhile; ?>

  </table>
</body>
</html>