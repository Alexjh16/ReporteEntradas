<?php require_once("views/layouts/head.php"); ?>
<body>
<?php parent::CheckSessionEmpleado(); ?>
    <div id="empleado">
        <header>
            <img src="assets/app/img/icon-login.png">
            <span>Bienvenido <?php print($_SESSION['user_empleado']->nombres_usuario); ?></span>
            
            <nav>
                <ul>
                    <li><a href="?class=Empleado&method=DiligenciarReporte">Ingreso/Salida</a></li>
                    <li><a class="active-button" href="#">Ver mis reportes</a></li>
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
                        <label for="dato_entrada">Marcar Hora de Entrada</label>
                        <label for="dato_salida">Marcar Hora de Salida</label>
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