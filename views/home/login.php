<?php require_once("views/layouts/head.php"); ?>

<body>
    <div id="login">
        <div class="login-blur-container">
            <div class="login-container">
                <form action="">
                    <h2>Login</h2>
                    <label for="identificacion_usuario">Email/Documento</label>
                        <input type="text" id="identificacion_usuario">
                    <label for="clave_usuario">Clave</label>
                        <input type="password" id="clave_usuario">
                        <label class="remember" for="remember"><i>Recordarme</i></label>
                            <input type="checkbox" id="remember"> 
                        <button type="submit">Login</button><span> *Incorrect Password</span>
                     
                </form>
            </div>
        </div>
    </div>
    <?php require_once("views/layouts/footer.php"); ?>
</body>

</html>