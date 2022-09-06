<div class="contenedor crear">
    <?php include_once __DIR__ . '/../templates/nombre-sitio.php'; ?>
    <div class="contenedor-sm">
        <p class="descripcion-pagina">Sign up for a CatTrello account</p>
        <form class="formulario" method="POST" action="/">
            <div class="campo">
                <label for="nombre">Name</label>
                <input type="text" id="nombre" placeholder="Name" name="nombre">
            </div>
            <div class="campo">
                <label for="email">Email</label>
                <input type="email" id="email" placeholder="Email" name="email">
            </div>
            <div class="campo">
                <label for="password">Password</label>
                <input type="password" id="password" placeholder="Password" name="password">
            </div>
            <div class="campo">
                <label for="password2">Repeat your password</label>
                <input type="password" id="password2" placeholder="Repeat your password" name="password2">
            </div>

            <input type="submit" class="boton" value="Sign up with email">
        </form>
        <div class="acciones">
            <a href="/">Already have an account? Log in here</a>
            <a href="/olvide">Forgot your password, eh?</a>
        </div>
    </div> <!--.contenedor-sm -->
</div>