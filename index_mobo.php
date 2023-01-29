<?php
session_start();
require './config/dbcon.php';

if (!isset($_POST['nome'])) {

    include_once "./View/paginacao.php";
    include "./View/head.php";
?>
<body>

        <?php include './View/headernavbar.php'; ?>

        <div class="container">

            <?php include('View/message.php'); ?>

            <div class="row">
                <div class="col-md-4">

                    <div class="card-body">


                        <table class="table table-bordered">
                            <thead class="table-primary">
                                <tr>
                                    <th>Nome</th>
                                    <th>Valor Unitário</th>
                                    <th>Local</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $busca = "SELECT cp.idcompras, cp.nome, cp.valor_unitario, mc.nome_fantasia, cp.data_compra FROM compras cp, mercados mc where id_mercado = idmercados";

                                $query = "$busca LIMIT $inicio, $total_reg"; // PAGINAÇÃO

                                $query_run = mysqli_query($con, $query);

                                $todos = mysqli_query($con, $busca); // PAGINAÇÃO

                                $tr = mysqli_num_rows($todos); // verifica o número total de registros  PAGINAÇÃO
                                $tp = $tr / $total_reg; // verifica o número total de páginas  PAGINAÇÃO


                                if (mysqli_num_rows($query_run) > 0) {
                                    foreach ($query_run as $student) {
                                        $date = new DateTime($student['data_compra']);
                                ?>
                                        <tr>
                                            <td><?= $student['nome']; ?></td>
                                            <td><?= 'R$ ' . $student['valor_unitario']; ?></td>
                                            <td><?= $student['nome_fantasia']; ?></td>
                                        </tr>
                                <?php
                                    }
                                } else {
                                    echo "<h5> Nenhum Produto cadastrado </h5>";
                                }
                                ?>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>

        <?php


        $anterior = $pc - 1;
        $proximo = $pc + 1;

        ?>
        <br />
        <div class="mx-auto" style="width: 200px;">
            <nav aria-label="Navegação">
                <ul class="pagination">
                    <?php echo  "<li class='nav-item'><a class='btn-link-primary' href='?pagina=1'><< | </a></li>"; ?>
                    <?php if ($pc > 1) {
                        echo   "<li class='nav-item'><a class='btn-link-primary' href='?pagina=$anterior'>Anterior |</a></li>";
                    }
                    if ($pc < $tp) {
                        echo   "<li class='nav-item'><a class='page-link-primary' href='?pagina=$proximo'>| Próximo</a></li>";
                    }
                    echo  "<li class='nav-item'><a class='btn-link-primary' hint='Última Página' href='?pagina=$tp'> | >></a></li>";
                    ?>
                </ul>
            </nav>
        </div>

        </div> <!-- CONTAINER -->

    <?php
    include_once './View/include/script.php';
    include_once './View/footer.php';
} else {
    include_once "View/busca_mobo.php";
}
    ?>