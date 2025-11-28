<h1>Editar Venda</h1>
<?php
if (!isset($_GET['id_venda']) || empty($_GET['id_venda'])){
	print "<script>alert('ID da venda não informado'); location.href='?page=listar-venda';</script>";
	exit;
}

$id = (int) $_GET['id_venda'];

$sql = "SELECT * FROM venda WHERE id_venda = $id";
$res = $conn->query($sql);

if ($res->num_rows == 0){
	print "<script>alert('Venda não encontrada'); location.href='?page=listar-venda';</script>";
	exit;
}

$row = $res->fetch_object();

?>

<form action="?page=salvar-venda" method="post">
	<input type="hidden" name="acao" value="editar">
	<input type="hidden" name="id_venda" value="<?php print $row->id_venda; ?>">

	<div class="mb-3">
		<label>Cliente
			<select name="cliente_id_cliente" class="form-control" required>
				<option value="">-ESCOLHA-</option>
				<?php
					$sqlc = "SELECT * FROM cliente";
					$resc = $conn->query($sqlc);
					if($resc->num_rows > 0){
						while($c = $resc->fetch_object()){
							$sel = ($c->id_cliente == $row->cliente_id_cliente) ? 'selected' : '';
							print "<option value='{$c->id_cliente}' $sel>".$c->nome_cliente."</option>";
						}
					}
				?>
			</select>
		</label>
	</div>

	<div class="mb-3">
		<label>Funcionário
			<select name="funcionario_id_funcionario" class="form-control" required>
				<option value="">-ESCOLHA-</option>
				<?php
					$sqlf = "SELECT * FROM funcionario";
					$resf = $conn->query($sqlf);
					if($resf->num_rows > 0){
						while($f = $resf->fetch_object()){
							$sel = ($f->id_funcionario == $row->funcionario_id_funcionario) ? 'selected' : '';
							print "<option value='{$f->id_funcionario}' $sel>".$f->nome_funcionario."</option>";
						}
					}
				?>
			</select>
		</label>
	</div>

	<div class="mb-3">
		<label>Modelo
			<select name="modelo_id_modelo" class="form-control" required>
				<option value="">-ESCOLHA-</option>
				<?php
					$sqlm = "SELECT * FROM modelo";
					$resm = $conn->query($sqlm);
					if($resm->num_rows > 0){
						while($m = $resm->fetch_object()){
							$sel = ($m->id_modelo == $row->modelo_id_modelo) ? 'selected' : '';
							print "<option value='{$m->id_modelo}' $sel>".$m->nome_modelo."</option>";
						}
					}
				?>
			</select>
		</label>
	</div>

	<div class="mb-3">
		<label>Valor
			<input type="text" name="valor_venda" class="form-control" value="<?php print $row->valor_venda; ?>" required>
		</label>
	</div>

	<div class="mb-3">
		<label>Data da Venda
			<input type="date" name="data_venda" class="form-control" value="<?php print $row->data_venda; ?>" required>
		</label>
	</div>

	<div>
		<button type="submit" class="btn btn-primary">Salvar</button>
	</div>
</form>

