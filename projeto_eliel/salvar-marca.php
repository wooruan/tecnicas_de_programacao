<?php
    switch ($_REQUEST["acao"]){
        case 'cadastrar':
            $nome = $_POST["nome_marca"];

            $sql = "INSERT INTO marca (nome_marca) VALUES ('{$nome}', '{$email}', '{$telefone}')";

            $res = $conn->query($sql);

            if($res==true){
                print "<script>alert('Marca cadastrada com sucesso');</script>";
                print "<script>location.href='?page=listar-marca';</script>";
            }else{
                print "<script>alert('Não foi possível cadastrar a marca');</script>";
                print "<script>location.href='?page=listar-marca';</script>";
            }
            break;

        case 'editar':
            $nome = $_POST["nome_marca"];

            $sql = "UPDATE marca SET nome_marca='{$nome}' WHERE id_marca=".$_REQUEST["id_marca"];

            $res = $conn->query($sql);

            if($res==true){
                print "<script>alert('marca editada com sucesso');</script>";
                print "<script>location.href='?page=listar-marca';</script>";
            }else{
                print "<script>alert('Não foi possível editar a marca');</script>";
                print "<script>location.href='?page=listar-marca';</script>";
            }
            break;

        case 'excluir':
            $sql = "DELETE FROM marca WHERE id_marca=".$_REQUEST["id_marca"];

            $res = $conn->query($sql);

            if($res==true){
                print "<script>alert('marca excluída com sucesso');</script>";
                print "<script>location.href='?page=listar-marca';</script>";
            }else{
                print "<script>alert('Não foi possível excluir a marca');</script>";
                print "<script>location.href='?page=listar-marca';</script>";
            }
            break;
    }