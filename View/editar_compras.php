<?php
session_start();
require '../config/dbcon.php';

include_once "../View/head.php";

?>

<body>

    <?php include '../View/headernavbar.php'; ?>

    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Editar Produto
                            <a href="../index.php" class="btn btn-danger float-end">VOLTAR</a>
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
                        <form action="../Model/code.php" method="POST">
                            <input type="hidden" name="student_id" value="<?= $student['idcompras']; ?>">

                            <div class="mb-3">
                                <label>Nome</label>
                                <input type="text" name="nome" value="<?= $student['nome']; ?>" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label>Valor Unitário</label>
                                <input type="text" name="valor_unitario" value="<?= $student['valor_unitario']; ?>"class="form-control">
                            </div>
                            <div class="mb-3">
                                <button type="submit" name="editar_compras" class="btn btn-primary">
                                    Atualizar Produto
                                </button>
                            </div>

                        </form>
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

    <?php include_once '../View/css/include/script.php'; ?>
</body>

</html>