<?php
include_once("config.php");

$acao = $_REQUEST['acao'] ?? '';

if ($acao == 'cadastrar') {
    $nome = $_POST['nome_cliente'];
    $cpf = $_POST['cpf_cliente'];
    $email = $_POST['email_cliente'];
    $telefone = $_POST['telefone_cliente'];
    $data_nasc = $_POST['dt_nasc_cliente'];
    $endereco = $_POST['endereco_cliente'];

    $sql = "INSERT INTO cliente (nome_cliente, cpf_cliente, email_cliente, telefone_cliente, dt_nasc_cliente, endereco_cliente)
            VALUES ('$nome', '$cpf', '$email', '$telefone', '$data_nasc', '$endereco')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
            alert('✅ Cliente cadastrado com sucesso!');
            location.href='?page=listar-cliente';
        </script>";
    } else {
        echo "<script>
            alert('❌ Erro ao cadastrar: " . addslashes($conn->error) . "');
            location.href='?page=listar-cliente';
        </script>";
    }

} elseif ($acao == 'editar') {
    $id = $_POST['id_cliente'];
    $nome = $_POST['nome_cliente'];
    $cpf = $_POST['cpf_cliente'];
    $email = $_POST['email_cliente'];
    $telefone = $_POST['telefone_cliente'];
    $data_nasc = $_POST['dt_nasc_cliente'];
    $endereco = $_POST['endereco_cliente'];

    $sql = "UPDATE cliente
            SET nome_cliente = '$nome',
                cpf_cliente = '$cpf',
                email_cliente = '$email',
                telefone_cliente = '$telefone',
                dt_nasc_cliente = '$data_nasc',
                endereco_cliente = '$endereco'
            WHERE id_cliente = $id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
            alert('✏ Cliente atualizado com sucesso!');
            location.href='?page=listar-cliente';
        </script>";
    } else {
        echo "<script>
            alert('❌ Erro ao atualizar: " . addslashes($conn->error) . "');
            location.href='?page=listar-cliente';
        </script>";
    }

} elseif ($acao == 'excluir') {
    if (!isset($_GET['id']) || empty($_GET['id'])) {
        echo "<script>
            alert('❌ ID do cliente não informado.');
            location.href='?page=listar-cliente';
        </script>";
        exit;
    }

    $id = (int) $_GET['id'];

    $sql = "DELETE FROM cliente WHERE id_cliente = $id";

    if ($conn->query($sql) === TRUE) {
        echo "<script>
            alert('🗑 Cliente excluído com sucesso!');
            location.href='?page=listar-cliente';
        </script>";
    } else {
        echo "<script>
            alert('❌ Erro ao excluir: " . addslashes($conn->error) . "');
            location.href='?page=listar-cliente';
        </script>";
    }
}
?>