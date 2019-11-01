<?php require_once("views/layouts/head.php"); ?>
<body>
<?php parent::CheckSessionAdmin(); ?>
    <div id="administrador">
        <header>
            <img src="assets/app/img/admin-icon.png">
            <span>Bienvenido <?php print($_SESSION['user_administrador']->nombres_usuario); ?></span>
            
            <nav>
                <ul>
                    <li><a class="active-button" href="#">Registrar</a></li>
                    <li><a href="?class=Administrador&method=Reportes">Ver Reportes</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="?class=Logout&method=exit">logout</a></li>
                </ul>
            </nav>        
        </header>
        <section>
            <div class="content-registrar">                
            
            </div>
            <div class="content-text">
                <div class="content-elements">
                    <h5 class="title-registro">Registro de Empleados</h5>
                    <form method="post" action="?class=Usuarios&method=RegistrarEmpleado">
                        <div class="content-elements-1">
                            <label for="fk_tipo_documento">Tipo Documento</label>
                                <select name="fk_tipo_documento" id="fk_tipo_documento" required="true">
                                    <option value="" disabled="true" selected="true">Elija una opcion</option>
                                    <?php foreach($tipos_documentos  as $tipos_documento): ?>
                                        <option value="<?php print($tipos_documento->id_tipo_documento) ?>"><?php print($tipos_documento->nombre_tipo_documento); ?></option>
                                    <?php endforeach; ?>
                                </select>                 
                            <label for="fk_cargo">Cargo</label>
                                <select name="fk_cargo" id="fk_cargo" required="true">
                                    <option value="" disabled="true" selected="true">Elija una opcion</option>
                                    <?php foreach($cargos  as $cargo): ?>
                                        <option value="<?php print($cargo->id_cargo) ?>"><?php print($cargo->nombre_cargo); ?></option>
                                    <?php endforeach; ?>
                                </select>             
                            <label for="numero_documento">Numero Documento</label>
                                <input type="number" name="numero_documento" id="numero_documento" required="true">
                            <label for="nombres">Nombres</label>
                                <input type="text" name="nombres" id="nombres" required="true">
                        </div>
                        <div class="content-elements-2">
                            <label for="apellidos">Apellidos</label>
                                <input type="text" name="apellidos" id="apellidos" required="true">
                            <label for="email">Correo</label>
                                <input type="email" name="email" id="email" required="true">
                            <label for="clave">Clave</label>
                                <input type="password" name="clave" id="clave" required="true">
                            <label for="confirmar_clave">Confirmar Clave</label>
                                <input type="password" name="confirmar_clave" id="confirmar_clave" required="true">
                        </div>
                        <input type="submit" value="Registrar">       
                        <?php if(isset($_REQUEST['Inserted'])): ?>
                            <p class="text-success"> *Empleado Registrado :)</p>
                        <?php endif; ?>
                        <?php if(isset($_REQUEST['PasswordError'])): ?>
                            <p class="text-danger"> *Las claves no coinciden</p>
                        <?php endif; ?>
                    </form>
                </div>                                
            </div>
        </section>
    </div>    
    <!-- <a href="?class=Logout">Salir</a> -->
<?php require_once("views/layouts/footer.php"); ?>
</body>
</html>