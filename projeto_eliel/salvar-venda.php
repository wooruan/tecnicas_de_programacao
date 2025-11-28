<?php
switch ($_REQUEST["acao"]) {
	case 'cadastrar':
		$cliente = $_POST['cliente_id_cliente'];
		$funcionario = $_POST['funcionario_id_funcionario'];
		$modelo = $_POST['modelo_id_modelo'];
		$valor = $_POST['valor_venda'];
		$data = $_POST['data_venda'];

		$sql = "INSERT INTO venda (cliente_id_cliente, funcionario_id_funcionario, modelo_id_modelo, valor_venda, data_venda) VALUES ('{$cliente}', '{$funcionario}', '{$modelo}', '{$valor}', '{$data}')";

		$res = $conn->query($sql);

		if ($res == true) {
			print "<script>alert('Venda cadastrado com sucesso');</script>";
			print "<script>location.href='?page=listar-venda';</script>";
		} else {
			print "<script>alert('Não foi possível cadastrar a venda');</script>";
			print "<script>location.href='?page=listar-venda';</script>";
		}
		break;

	case 'editar':
		$id = $_POST['id_venda'];
		$cliente = $_POST['cliente_id_cliente'];
		$funcionario = $_POST['funcionario_id_funcionario'];
		$modelo = $_POST['modelo_id_modelo'];
		$valor = $_POST['valor_venda'];
		$data = $_POST['data_venda'];

		$sql = "UPDATE venda SET cliente_id_cliente='{$cliente}', funcionario_id_funcionario='{$funcionario}', modelo_id_modelo='{$modelo}', valor_venda='{$valor}', data_venda='{$data}' WHERE id_venda=" . $id;

		$res = $conn->query($sql);

		if ($res == true) {
			print "<script>alert('Venda editada com sucesso');</script>";
			print "<script>location.href='?page=listar-venda';</script>";
		} else {
			print "<script>alert('Não foi possível editar a venda');</script>";
			print "<script>location.href='?page=listar-venda';</script>";
		}
		break;

	case 'excluir':
		$sql = "DELETE FROM venda WHERE id_venda=" . $_REQUEST['id_venda'];
		$res = $conn->query($sql);

		if ($res == true) {
			print "<script>alert('Venda excluída com sucesso');</script>";
			print "<script>location.href='?page=listar-venda';</script>";
		} else {
			print "<script>alert('Não foi possível excluir a venda');</script>";
			print "<script>location.href='?page=listar-venda';</script>";
		}
		break;
}

?>

