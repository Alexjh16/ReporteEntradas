<?php require_once("views/layouts/head.php"); ?>
<body>
<?php parent::CheckSessionEmpleado(); ?>
    <div id="empleado">
        <header>
            <img src="assets/app/img/icon-login.png">
            <span>Bienvenido <?php print($_SESSION['user_empleado']->nombres_usuario); ?></span>
            <nav>
                <ul>
                    <li><a class="active-button" href="#">Ingreso/Salida</a></li>
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
                        Recuerde llenar ambos espacios con su Numero de documento, tener en cuenta primero la *Hora de entrada.
                    </h4>
                    <form method="post" action="?class=Empleado&method=EnviarReporte">
                    <?php if(@$is_report_true[0]->hora_entrada == ''): ?>
                        <label for="dato_entrada">Marcar hora de entrada</label>
                        <input type="number" id="dato_entrada" name="dato_entrada" placeholder="Numero documento">
                    <?php endif; ?>

                    <?php if(@$is_report_true[0]->hora_salida == ''): ?>
                            <label for="dato_salida">Marcar hora de salida</label>
                            <input type="number" id="dato_salida" name="dato_salida" placeholder="Numero documento">                       
                    <?php endif; ?>
                        <input type="hidden" name="numero_documento" value="<?php print($_SESSION['user_empleado']->numero_documento); ?>">
                        <input type="hidden" name="fk_documento_empleado" value="<?php print($_SESSION['user_empleado']->id_usuario); ?>">
                    <?php if(@$is_report_true[0]->hora_salida == '' || @$is_report_true[0]->hora_entrada == ''): ?>
                        <button type="submit">Hacer Registro</button> 
                    <?php endif; ?>
                        <?php if(isset($_REQUEST['WrongDocument'])): ?>
                            <span> *Error* ha digitado mal su numero de identificación</span>
                        <?php endif; ?>

                        <?php if(@$is_report_true[0]->hora_entrada != ''): ?>
                            <p> *Registro de entrada completo*</p>
                        <?php endif; ?>

                        <?php if(@$is_report_true[0]->hora_salida != '' && @$is_report_true[0]->hora_entrada != ''): ?>
                            <p> *Ya se realizaron registros el dia de hoy*</p>
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