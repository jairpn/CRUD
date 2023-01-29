<?php
require '../config/dbcon.php';

include_once "paginacao.php";
include "head.php"

?>


<body>
    <?php include 'headernavbar.php'; ?>

    <div class="container mt-5">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Dados do Produto
                            <a href="../index.php" class="btn btn-danger float-end">VOLTAR</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php


                        if (isset($_GET['id'])) {
                            $student_id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT cp.nome, cp.valor_unitario, mc.nome_fantasia FROM compras cp, mercados mc WHERE idcompras='$student_id' and id_mercado = idmercados";
                            $query_run = mysqli_query($con, $query);

                            if (mysqli_num_rows($query_run) > 0) {
                                $student = mysqli_fetch_array($query_run);
                        ?>

                                <div class="mb-3">
                                    <label>Nome</label>
                                    <p class="p-2 mb-3 bg-primary bg-gradient text-white">
                                        <?= $student['nome']; ?>
                                    </p>
                                </div>


                                <div class="mb-3">
                                    <label>Valor Unitário</label>
                                    <p class="p-2 mb-3 bg-primary bg-gradient text-white">
                                        <?= $student['valor_unitario']; ?>
                                    </p>
                                </div>

                                <div class="mb-3">
                                    <label>Local</label>
                                    <p class="p-2 mb-3 bg-primary bg-success text-white">
                                        <?= $student['nome_fantasia']; ?>
                                    </p>
                                </div>

                        <?php
                            } else {
                                echo "<h4>Nenhum ID encontrado</h4>";
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include_once 'css/include/script.php'; ?>
</body>

</html>