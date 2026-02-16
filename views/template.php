<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proyecto Curso PHP</title>
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>views/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?php echo BASE_URL; ?>views/css/bootstrap-icons.min.css">
    <script src="<?php echo BASE_URL; ?>views/js/sweetalert2.js"></script>
</head>

<body>
    <header>
        <?php
        include("views/modules/navegacion.php");
        ?>
    </header>

    <section>
        <?php
        $controlador = new Controlador();
        $controlador->enlacesPaginasControlador();
        ?>
    </section>

    <footer class="bg-back text-white pt-4 pb-2">
        <?php include("views/modules/footer.php"); ?>
    </footer>

    <script src="<?php echo BASE_URL; ?>views/js/jquery.js"></script>
    <script src="<?php echo BASE_URL; ?>views/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo BASE_URL; ?>views/js/funciones.js"></script>
    <script src="<?php echo BASE_URL; ?>views/js/validar.js"></script>

</body>

</html>