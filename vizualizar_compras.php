<?php
require './config/dbcon.php';

include_once "./incview/paginacao.php";
include "./incview/head.php"

?>


<body>
    <?php include './incview/headernavbar.php'; ?>

    <div class="container mt-5">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Dados do Produto
                            <a href="index.php" class="btn btn-danger float-end">VOLTAR</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php


                        if (isset($_GET['id'])) {
                            $student_id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM compras WHERE idcompras='$student_id' ";
                            $query_run = mysqli_query($con, $query);

                            if (mysqli_num_rows($query_run) > 0) {
                                $student = mysqli_fetch_array($query_run);
                        ?>

                                <div class="mb-3">
                                    <label>Nome</label>
                                    <p class="form-control">
                                        <?= $student['nome']; ?>
                                    </p>
                                </div>


                                <div class="mb-3">
                                    <label>Valor Unitário</label>
                                    <p class="form-control">
                                        <?= $student['valor_unitario']; ?>
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

    <?php include_once 'script.php'; ?>
</body>

</html>