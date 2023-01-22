<header>
    <?php

    $dir1 = basename($_SERVER['PHP_SELF']);
    ?>

    <nav class="navbar navbar-dark bg-primary navbar navbar-expand-lg" style="background-color: #e3f2fd;">
        <div class="container-fluid">

            <ul class="navbar-nav">

                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="../index.php">Home</a>
                </li>

                <?php
                if (($dir1 == 'compras.php') || ($dir1 == 'mercados.php')) {
                ?>
                    <!--                <li class="nav-item">
                    <a class="nav-link disable" aria-current="page" href="compras.php">Inserir Produtos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disable" aria-current="page" href="mercados.php">Inserir Mercados</a>
                </li> -->
                <?php
                } else {
                ?>
                    <!--               <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="compras.php">Inserir Produtos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="mercados.php">Inserir Mercados</a>
                </li> -->
            </ul>
            <form class="d-flex" role="search" action="index.php" method="POST">
                <input type="text" class="form-control" name="nome" placeholder="Digite o produto">
                <button type="submit" class="btn btn-primary">Buscar</button>
            </form>
        <?php
                }
        ?>
        </div>
    </nav>
</header>