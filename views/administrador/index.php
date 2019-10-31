<?php require_once("views/layouts/head.php"); ?>
<body>
<?php parent::CheckSessionAdmin(); ?>
    <div id="administrador">
        <header>
            <img src="assets/app/img/admin-icon.png">
            <span>Bienvenido <?php print($_SESSION['user_administrador']->nombres_usuario); ?></span>
            
            <nav>
                <ul>
                    <li><a>Registrar</a></li>
                    <li><a>Ver Reportes</a></li>
                    <li><a>About</a></li>
                    <li><a>logout</a></li>
                </ul>
            </nav>        
        </header>
        <section>
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae distinctio accusantium eligendi porro ad sit eius vitae incidunt, excepturi, illum magni voluptatem eos facere voluptate optio, et amet natus dolores.
        </section>
    </div>    
    <!-- <a href="?class=Logout">Salir</a> -->
<?php require_once("views/layouts/footer.php"); ?>
</body>
</html>