<?php require_once("views/layouts/head.php"); ?>
<body>
<?php parent::CheckSessionAdmin(); ?>

    <?php  var_dump($_SESSION['user_administrador']); ?>
    <a href="?class=Logout">Salir</a>
<?php require_once("views/layouts/footer.php"); ?>
</body>
</html>