<h1>Editar Modelo</h1>
<?php
if (!isset($_GET['id_modelo']) || empty($_GET['id_modelo'])){
    print "<script>alert('ID do modelo não informado'); location.href='?page=listar-modelo';</script>";
    exit;
}

$id = (int) $_GET['id_modelo'];

$sql = "SELECT * FROM modelo WHERE id_modelo = $id";
$res = $conn->query($sql);

if ($res->num_rows == 0){
    print "<script>alert('Modelo não encontrado'); location.href='?page=listar-modelo';</script>";
    exit;
}

$row = $res->fetch_object();
?>

<form action="?page=salvar-modelo" method="POST">
    <input type="hidden" name="acao" value="editar">
    <input type="hidden" name="id_modelo" value="<?php print $row->id_modelo; ?>">

    <div class="mb-3">
        <label>Marca
            <select name="marca_id_marca" class="form-control" required>
                <option value="">-ESCOLHA-</option>
                <?php
                    $sql_1 = "SELECT * FROM marca";
                    $res_1 = $conn->query($sql_1);
                    if($res_1 && $res_1->num_rows > 0){
                        while($row_1 = $res_1->fetch_object()){
                            $sel = ($row_1->id_marca == $row->marca_id_marca) ? 'selected' : '';
                            print "<option value='{$row_1->id_marca}' $sel>".$row_1->nome_marca."</option>";
                        }
                    } else {
                        print "<option>Nenhum resultado encontrado</option>";
                    }
                ?>
            </select>
        </label>
    </div>

    <div class="mb-3">
        <label>Nome
            <input type="text" name="nome_modelo" class="form-control" value="<?php print $row->nome_modelo; ?>">
        </label>
    </div>

    <div class="mb-3">
        <label>Cor
            <input type="text" name="cor_modelo" class="form-control" value="<?php print $row->cor_modelo ?? ''; ?>">
        </label>
    </div>

    <div class="mb-3">
        <label>Ano
            <input type="text" name="ano_modelo" class="form-control" value="<?php print $row->ano_modelo ?? ''; ?>">
        </label>
    </div>

    <div class="mb-3">
        <label>Tipo
            <input type="text" name="tipo_modelo" class="form-control" value="<?php print $row->tipo_modelo ?? ''; ?>">
        </label>
    </div>

    <div>
        <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
</form>