<div class="contenedor login">
    <?php include_once __DIR__ . '/../templates/nombre-sitio.php'; ?>
    <div class="contenedor-sm">
        <p class="descripcion-pagina">Log in to your account</p>
        <?php include_once __DIR__ . '/../templates/alertas.php'; ?>
        <form class="formulario" method="POST" action="/" novalidate>
            <div class="campo">
                <label for="email">Email</label>
                <input type="email" id="email" placeholder="Email" name="email">
            </div>
            <div class="campo">
                <label for="password">Password</label>
                <input type="password" id="password" placeholder="Password" name="password">
            </div>

            <input type="submit" class="boton" value="Sign up with email">
        </form>
        <div class="acciones">
            <a href="/crear">Don't have an account?, Sign up for free</a>
            <a href="/olvide">Forgot your password, eh?</a>
        </div>
    </div> <!--.contenedor-sm -->
</div>