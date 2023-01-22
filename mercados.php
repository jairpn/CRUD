<?php
session_start();

include_once "./config/dbcon.php";

include_once "./incview/head.php";

$sql = 'select * from mercados'; // Precisa para trazer o nome dos mercados

$res = mysqli_query($con, $sql);


?>

<body>

    <?php include './incview/headernavbar.php'; ?>

    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Adicionar Mercado
                            <a href="index.php" class="btn btn-danger float-end">VOLTAR</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST">

                            <div class="mb-3">
                                <label>Nome</label>
                                <input type="text" name="nome" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label>Local</label>
                                <input type="text" name="local" class="form-control">
                            </div>

                            <div class="mb-3">
                                <button type="submit" name="salvar_mercado" class="btn btn-primary">Salvar</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    include './incview/script.php';
    include './incview/footer.php';
    ?>
</body>

</html>