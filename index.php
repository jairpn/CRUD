<?php

$useragent = $_SERVER['HTTP_USER_AGENT'];

if (preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i', $useragent) || preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i', substr($useragent, 0, 4)))
    header('Location: https://jair.dev.br/index_mobo.php');


session_start();
require './config/dbcon.php';

if (!isset($_POST['nome'])) {

    include_once "./View/paginacao.php";
    include "./View/head.php";
?>


    <body>

        <?php include './View/headernavbar.php'; ?>

        <div class="container mt-4">



            <?php include('View/message.php'); ?>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">

                            <a href="View/compras.php" class="btn btn-primary float">Adicionar Produto</a>

                            <a href="View/mercados.php" class="btn btn-dark float-end">Adicionar Local</a>

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

                                                    <a href="View/vizualizar_compras.php?id=<?= $student['idcompras']; ?>" class="btn btn-primary btn-sm">Visualizar</a>

                                                    <a href="View/editar_compras.php?id=<?= $student['idcompras']; ?>" class="btn btn-success btn-sm">Editar</a>

                                                    <form action="Model/code.php" method="POST" class="d-inline">
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
    include_once './View/css/include/script.php';
    include_once './View/footer.php';
} else {
    include_once "View/busca.php";
}
    ?>