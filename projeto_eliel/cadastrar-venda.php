<h1>Cadastrar Venda</h1>
<form action="?page=salvar-venda" method="post">
	<input type="hidden" name="acao" value="cadastrar">
	<div class="mb-3">
		<label>Cliente
			<select name="cliente_id_cliente" class="form-control" required>
				<option value="">-ESCOLHA-</option>
				<?php
					$sql = "SELECT * FROM cliente";
					$res = $conn->query($sql);
					$qtd = $res->num_rows;
					if($qtd > 0){
						while($row = $res->fetch_object()){
							print "<option value='{$row->id_cliente}'>".htmlspecialchars($row->nome_cliente)."</option>";
						}
					}else{
						print "<option>Nenhum resultado encontrado</option>";
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
					$sql = "SELECT * FROM funcionario";
					$res = $conn->query($sql);
					$qtd = $res->num_rows;
					if($qtd > 0){
						while($row = $res->fetch_object()){
							print "<option value='{$row->id_funcionario}'>".htmlspecialchars($row->nome_funcionario)."</option>";
						}
					}else{
						print "<option>Nenhum resultado encontrado</option>";
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
					$sql = "SELECT * FROM modelo";
					$res = $conn->query($sql);
					$qtd = $res->num_rows;
					if($qtd > 0){
						while($row = $res->fetch_object()){
							print "<option value='{$row->id_modelo}'>".htmlspecialchars($row->nome_modelo)."</option>";
						}
					}else{
						print "<option>Nenhum resultado encontrado</option>";
					}
				?>
			</select>
		</label>
	</div>

	<div class="mb-3">
		<label>Valor
			<input type="text" name="valor_venda" class="form-control" required>
		</label>
	</div>

	<div class="mb-3">
		<label>Data da Venda
			<input type="date" name="data_venda" class="form-control" required>
		</label>
	</div>

	<div>
		<button type="submit" class="btn btn-primary">Enviar</button>
	</div>
</form>

