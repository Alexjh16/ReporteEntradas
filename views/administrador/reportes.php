<?php require_once("views/layouts/head.php"); ?>
<body>
<?php parent::CheckSessionAdmin(); ?>
    <div id="administrador">
        <header>
            <img src="assets/app/img/admin-icon.png">
            <span>Bienvenido <?php print($_SESSION['user_administrador']->nombres_usuario); ?></span>
            
            <nav>
                <ul>
                    <li><a href="?class=Administrador&method=Registro">Registrar</a></li>
                    <li><a class="active-button" href="#">Ver Reportes</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="?class=Logout&method=exit">logout</a></li>
                </ul>
            </nav>        
        </header>
        <section id="ReporteEmpleado">
            <div class="content">                
            
            </div>
            <div class="content-text">
                <div class="content-elements">
                    <h4>
                        Para consultar los reportes de los empleados, por favor digite el numero de documento.
                    </h4>
                    <form method="post" action="?class=Administrador&method=ViewReport">
                        <div class="content-elements-1">
                            <label for="numero_documento">Numero Documento</label>
                            <input type="number" name="numero_documento" id="numero_documento" required="true">
                        </div>                        
                        <button type="submit">Consultar</button>
                    </form>
                </div>                                
            </div>
        </section>
    </div>    
    <!-- <a href="?class=Logout">Salir</a> -->
<?php require_once("views/layouts/footer.php"); ?>
</body>
</html>