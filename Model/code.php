<?php
session_start();
require '../config/dbcon.php';

if (isset($_POST['delete_compras'])) {
    $student_id = mysqli_real_escape_string($con, $_POST['delete_compras']);

    $query = "DELETE FROM compras WHERE idcompras='$student_id' ";
    $query_run = mysqli_query($con, $query);


    if ($query_run) {
        $_SESSION['message'] = "Produto excluido com sucesso";
        header("Location: ../index.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Não foi possível excluir o produto";
        header("Location: ../index.php");
        exit(0);
    } 
}

if (isset($_POST['editar_compras'])) {
    $student_id = mysqli_real_escape_string($con, $_POST['student_id']);
    $date = date('Y-m-d');

    $nome = mysqli_real_escape_string($con, $_POST['nome']);
    $valor_unitario = mysqli_real_escape_string($con, $_POST['valor_unitario']);
    $datacompra = $date;


    $query = "UPDATE compras SET nome='$nome',  valor_unitario='$valor_unitario', data_compra= '$date' WHERE idcompras='$student_id' ";

    $query_run = mysqli_query($con, $query);

    if ($query_run) {
        $_SESSION['message'] = "Produto atualizado com sucesso";
        header("Location: ../index.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Produto não atualizado";
        header("Location: ../index.php");
        exit(0);
    }
}


if (isset($_POST['salvar_produto'])) {
    $nome = mysqli_real_escape_string($con, $_POST['nome']);
    $id_mercado = mysqli_real_escape_string($con, $_POST['mercado']);
    $valorunitario = mysqli_real_escape_string($con, $_POST['valorunitario']);
    $date = date('Y-m-d');

    $query = "INSERT INTO compras (nome, id_mercado, valor_unitario, data_compra) VALUES ('$nome','$id_mercado', '$valorunitario', '$date')";


    $query_run = mysqli_query($con, $query);
    if ($query_run) {
        $_SESSION['message'] = "Produto cadastrado com sucesso!";
        header("Location: ../View/compras.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Produto não cadastrado";
        header("Location: ../View/compras.php");
        exit(0);
    }
}


////////////////////////////////////////////////////////

if (isset($_POST['salvar_mercado'])) {
    $nome = mysqli_real_escape_string($con, $_POST['local']);
    $nomefantasia = mysqli_real_escape_string($con, $_POST['nome']);

    $query = "INSERT INTO mercados (nome,  nome_fantasia) VALUES ('$nome','$nomefantasia')";

    echo $query;

    $query_run = mysqli_query($con, $query);
 
 
    if ($query_run) {
        $_SESSION['message'] = "Mercado cadastrado com sucesso!";
        header("Location: ../View/mercados.php");
        exit(0);
    } else {
        $_SESSION['message'] = "Mercado não cadastrado";
        header("Location: ../View/mercados.php");
        exit(0);
    }
    
}
