<?php require_once("views/layouts/head.php"); ?>
<body>
<?php parent::CheckSessionEmpleado(); ?>

    <?php  var_dump($_SESSION['user_empleado']); ?>
    <a href="?class=Logout">Salir</a>
<?php require_once("views/layouts/footer.php"); ?>
</body>
</html>