<?php
session_start();
if(!$_SESSION['usuarioValido']){
    header('location:index.php?action=inicio');
}
?>
<h1>SALIR</h1>
<p>El usuario: <?php echo $_SESSION['nombreUsuario'] ?></p>
<p>Ha finalizado la sesion.</p>
<?php
session_destroy();
?>