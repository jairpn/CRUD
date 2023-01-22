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
                        <h4>Adicionar Produto
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
                                <label>Valor Unitário</label>
                                <input type="number" step="0.01" name="valorunitario" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label>Local</label>
                                <select name="mercado" class="form-select" aria-label="Default select example">
                                    <?php foreach ($res as $i) { ?>
                                    <option value="<?= $i['idmercados'] ?>"><?= $i['nome_fantasia'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>

                            <div class="mb-3">
                                <button type="submit" name="salvar_produto" class="btn btn-primary">Salvar
                                    Produto</button>
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