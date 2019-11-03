<?php require_once("views/layouts/head.php"); ?>
<body>
<?php parent::CheckSessionAdmin(); ?>
    <div id="empleado">
        <header>
        <img src="assets/app/img/admin-icon.png">
            <span>Bienvenido <?php print($_SESSION['user_administrador']->nombres_usuario); ?></span>
            
            <nav>
                <ul>
                    <li><a href="?class=Administrador&method=Registro">Registrar</a></li>
                    <li><a href="?class=Administrador&method=Reportes">Ver Reportes</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="?class=Logout&method=exit">logout</a></li>
                </ul>
            </nav>       
        </header>
        <section id="ReporteEmpleado">
        <div class="content-search">
            <h4>Consultar reportes por fechas</h4>
            <form method="post" action="?class=Administrador&method=ViewReportUsuario">
                <label for="">Fecha Inicial</label>
                    <input type="date" name="fecha_inicial" required="true">
                <label for="">Fecha Final</label>
                    <input type="date" name="fecha_final" required="true">
                <label for="">Numero Documento</label>
                    <input type="text" name="fk_numero_documento">
                <button type="submit">Consultar</button>
            </form>
        </div>
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
                                $hora_entrada = @$hora_entrada[1];
                                if($hora_entrada != ''){
                                    print($hora_entrada);
                                }
                                else{
                                    print("Aun no hay registro");
                                }                                                               
                            ?>
                        </td>
                        <td>   
                            <?php 
                                $hora_salida = $ReportesUsuario->hora_salida; 
                                $hora_salida = explode(" ", @$hora_salida);
                                $hora_salida = @$hora_salida[1];
                                if($hora_salida != ''){
                                    print($hora_salida);
                                }
                                else{
                                    print("Aun no hay registro");
                                }
                            ?>
                        </td>
                        <td>
                            <?php CalculateHours($hora_salida, $hora_entrada); ?>
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