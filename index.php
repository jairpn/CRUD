<?php
session_start();
require './config/dbcon.php';

if (!isset($_POST['nome'])) {

    include_once "./incview/paginacao.php";
    include "./incview/head.php";
?>
    <body>

        <?php include './incview/headernavbar.php'; ?>

        <div class="container mt-4">



            <?php include('message.php'); ?>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <!--    <h4>Detalhes do Produto -->
                            <a href="compras.php" class="btn btn-primary float">Adicionar Produto</a>

                            <a href="mercados.php" class="btn btn-dark float-end">Adicionar Mercado</a>
                            <!--  </h4> -->
                        </div>

                        <div class="card-body">


                            <table class="table table-bordered">
                                <thead class="table-primary">
                                    <tr>
                                        <th>#</th>
                                        <th>Nome</th>
                                        <th>Local</th>
                                        <th>Valor Unitário</th>
                                        <th>Data Compra</th>
                                        <th>Ação</th>
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
                                                <td><?= $student['idcompras']; ?></td>
                                                <td><?= $student['nome']; ?></td>
                                                <td><?= $student['nome_fantasia']; ?></td>
                                                <td><?= 'R$ ' . $student['valor_unitario']; ?></td>
                                                <td><?= $date->format('d/m/Y'); ?></td>
                                                <td>

                                                    <a href="vizualizar_compras.php?id=<?= $student['idcompras']; ?>" class="btn btn-primary btn-sm">Visualizar</a>

                                                    <a href="editar_compras.php?id=<?= $student['idcompras']; ?>" class="btn btn-success btn-sm">Editar</a>

                                                    <form action="code.php" method="POST" class="d-inline">
                                                        <button type="submit" name="delete_compras" value="<?= $student['idcompras']; ?>" class="btn btn-danger btn-sm">Deletar</button>
                                                    </form>
                                                </td>
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
                        <?php echo  "<li class='nav-item'><a class='btn-link-primary' href='?pagina=1'><<|</a></li>"; ?>
                        <?php if ($pc > 1) {
                            echo   "<li class='nav-item'><a class='btn-link-primary' href='?pagina=$anterior'> Anterior |</a></li>";
                        }
                        if ($pc < $tp) {
                            echo   "<li class='nav-item'><a class='page-link-primary' href='?pagina=$proximo'>| Próximo</a></li>";
                        }
                        echo  "<li class='nav-item'><a class='btn-link-primary' hint='Última Página' href='?pagina=$tp'>|>></a></li>";
                        ?>
                    </ul>
                </nav>
            </div>

        </div> <!-- CONTAINER -->

    <?php
    include_once './incview/script.php';
    include_once './incview/footer.php';
} else {
    include_once "busca.php";
}
    ?>