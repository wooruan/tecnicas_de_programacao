<h1>Cadastrar Modelo</h1>
<form action="?page=salvar-modelo" method ="POST">
    <input type="hidden" name="acao" value="cadastrar">
    <div class="mb-3">
        <label>Marca
            <select name="marca_id_marca" class="form-control" required>
                <option>-ESCOLHA-</option>
                <?php
                    $sql = "SELECT * FROM marca";
                    $res = $conn->query($sql);
                    $qtd = $res->num_rows;
                    if($qtd > 0){
                        while($row = $res->fetch_object()){
                            print "<option value='{$row->id_marca}'>{$row->nome_marca}</option>";
                        }
                    }else{
                            print "<option>Nenhum resultado encontrado</option>";
                        }
                ?>
            </select>
        </label>
    </div>
    <div class="mb-3">
        <label>Nome
            <input type="text" name="nome_modelo" class="form-control">
        </label>
    </div>
    <div class="mb-3">
        <label>Cor
            <input type="text" name="cor_modelo" class="form-control">
        </label>
    </div>
    <div class="mb-3">
        <label>Ano
            <input type="text" name="ano_modelo" class="form-control">
        </label>
    </div>
    <div class="mb-3">
        <label>Tipo
            <input type="text" name="tipo_modelo" class="form-control">
        </label>
    </div>
    <div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</form>