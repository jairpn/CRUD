<?php
    // INICIO PAGINAÇÃO
    $total_reg = "10";

    if (isset($_GET['pagina'])) {
        $pagina = $_GET['pagina'];
    } else {
        $pagina = 1;
    }



    if (!$pagina) {
        $pc = "1";
    } else {
        $pc = $pagina;
    }
    $inicio = $pc - 1;
    $inicio = $inicio * $total_reg;
    // FIM PAGINAÇÃO
?>