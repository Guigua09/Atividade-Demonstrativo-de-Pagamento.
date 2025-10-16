<?php
require 'config.php';

function limpa_numero($str) {
    $str = str_replace('.', '', $str);
    $str = str_replace(',', '.', $str);
    $str = preg_replace('/[^0-9\\.\\-]/', '', $str);
    return $str;
}

$nome = trim(isset($_POST['Nome_Funcionario']) ? $_POST['Nome_Funcionario'] : '');
$data_admissao = isset($_POST['data_admissao']) ? $_POST['data_admissao'] : '';
$cargo = trim(isset($_POST['cargo']) ? $_POST['cargo'] : '');
$qtde_salarios = isset($_POST['qtde_salarios']) ? intval($_POST['qtde_salarios']) : 0;
$salario_bruto = isset($_POST['salario_bruto']) ? floatval(limpa_numero($_POST['salario_bruto'])) : 0;

if ($salario_bruto > 1550.00) {
    $inss = round($salario_bruto * 0.11, 2);
} else {
    $inss = 0.00;
}
$salario_liquido = round($salario_bruto - $inss, 2);

if (in_array('', [$nome, $data_admissao, $cargo]) || $qtde_salarios <= 0) {
    die('Dados inválidos. <a href="home_funcionarios.php">Voltar</a>');
}


if (isset($_POST['N_Registro']) && $_POST['N_Registro'] !== '') {
    // UPDATE
    $id = intval($_POST['N_Registro']);
    $stmt = $conecta_db->prepare("UPDATE tb_funcionarios SET Nome_Funcionario=?, data_admissao=?, cargo=?, qtde_salarios=?, salario_bruto=?, inss=?, salario_liquido=? WHERE N_Registro=?");
    $stmt->bind_param("sssidddi", $nome, $data_admissao, $cargo, $qtde_salarios, $salario_bruto, $inss, $salario_liquido, $id);
    $ok = $stmt->execute();
    $stmt->close();
} else {
    // INSERT
    $stmt = $conecta_db->prepare("INSERT INTO tb_funcionarios (Nome_Funcionario, data_admissao, cargo, qtde_salarios, salario_bruto, inss, salario_liquido) VALUES (?,?,?,?,?,?,?)");
    $stmt->bind_param("sssiddd", $nome, $data_admissao, $cargo, $qtde_salarios, $salario_bruto, $inss, $salario_liquido);
    $ok = $stmt->execute();
    $stmt->close();
}

if ($ok) {
    header('Location: listagem.php');
    exit;
} else {
    echo "Erro ao gravar: " . htmlspecialchars($conecta_db->error) . '<br><a href="home_funcionarios.php">Voltar</a>';
}
?>
