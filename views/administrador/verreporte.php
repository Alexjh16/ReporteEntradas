<?php require_once("views/layouts/head.php"); ?>
<body>
<?php parent::CheckSessionAdmin(); ?>
    <div id="empleado">
        <header>
            <img src="assets/app/img/icon-login.png">
            <span>Bienvenido <?php print($_SESSION['user_administrador']->nombres_usuario); ?></span>
            
            <nav>
                <ul>
                    <li><a href="?class=Empleado&method=DiligenciarReporte">Ingreso/Salida</a></li>
                    <li><a class="active-button" href="#">Ver mis reportes</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="?class=Logout&method=exit">logout</a></li>
                </ul>
            </nav>        
        </header>
        <section id="ReporteEmpleado">
            <table>
                <tr>
                    <th>Fecha Reporte</th>
                    <th>Hora Entrada</th>
                    <th>Hora Salida</th>
                </tr>
                <?php foreach($ReportesUsuarios as $ReportesUsuario): ?>
                    <tr>
                        <td>
                            <input type="hidden" value="<?php
                                $fecha_reporte =  $ReportesUsuario->fecha_reporte; 
                                $fecha_reporte = explode("-",$fecha_reporte);
                                $month = $fecha_reporte[1];     
                                $month = CalculateMonth($month);
                            ?>"">
                            <?php
                            print($month." ".$fecha_reporte[2]." del ".$fecha_reporte[0]);
                            ?>
                        </td>
                        <td>
                            <?php 
                                $hora_entrada = $ReportesUsuario->hora_entrada; 
                                $hora_entrada = explode(" ", $hora_entrada);
                                $hora_entrada = $hora_entrada[1];
                                print($hora_entrada);                                
                            ?>
                        </td>
                        <td>   
                            <?php 
                                $hora_salida = $ReportesUsuario->hora_salida; 
                                $hora_salida = explode(" ", $hora_salida);
                                $hora_salida = $hora_salida[1];
                                print($hora_salida);                                
                            ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
        </section>
    </div>    
    <!-- <a href="?class=Logout">Salir</a> -->
<?php require_once("views/layouts/footer.php"); ?>
</body>
</html>