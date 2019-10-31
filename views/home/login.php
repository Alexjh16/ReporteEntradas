<?php require_once("views/layouts/head.php"); ?>

<body>
    <div id="login">
        <div class="login-blur-container">
            <div class="login-container">
                <form action="?class=Login&method=auth" method="post">
                    <h2>Login</h2>
                    <label for="identificacion_usuario">Email/Documento</label>
                        <input type="text" id="identificacion_usuario" name="identificacion_usuario" required="true">
                    <label for="clave_usuario">Clave</label>
                        <input type="password" id="clave_usuario" name="clave_usuario" required="true">
                        <button type="submit">Login</button><span> *Incorrect Password</span>
                        <?php if(isset($_REQUEST['errorLogin'])): ?>
                            <p class="text-danger">* Identificacion o clave incorrecta.</p>
                        <?php endif; ?>                     
                </form>
            </div>
        </div>
    </div>
    <?php require_once("views/layouts/footer.php"); ?>
</body>
</html>