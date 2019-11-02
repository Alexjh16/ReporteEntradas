<?php require_once("views/layouts/head.php"); ?>
<body>
<?php parent::CheckSessionEmpleado(); ?>
    <div id="administrador">
        <header>
            <img src="assets/app/img/icon-login.png">
            <span>Bienvenido <?php print($_SESSION['user_empleado']->nombres_usuario); ?></span>
            
            <nav>
                <ul>
                    <li><a href="?class=Empleado&method=DiligenciarReporte">Ingreso/Salida</a></li>
                    <li><a href="?class=Empleado&method=VerReportes">Ver mis reportes</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="?class=Logout&method=exit">logout</a></li>
                </ul>
            </nav>        
        </header>
        <section>
            <div class="content">                
            
            </div>
            <div class="content-text">
                <div class="content-elements">
                    <h4>
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Eaque voluptatum corporis maxime, similique tempore maiores ullam neque adipisci <a href="#">tenetur</a> sed excepturi aperiam debitis? Veniam natus modi labore quae, excepturi beatae.
                    </h4>
                    <button>Debian Training</button>
                </div>                                
            </div>
        </section>
    </div>    
    <!-- <a href="?class=Logout">Salir</a> -->
<?php require_once("views/layouts/footer.php"); ?>
</body>
</html>