<div class="contenedor olvide">
    <?php include_once __DIR__ . '/../templates/nombre-sitio.php'; ?>
    
    <div class="contenedor-sm">
        <p class="descripcion-pagina">Dang, forgot your password, eh?</p>
        <?php include_once __DIR__ . '/../templates/alertas.php'; ?>
        <form class="formulario" method="POST" action="/olvide">
            <div class="campo">
                <label for="email">Email</label>
                <input type="email" id="email" placeholder="Email" name="email">
            </div>

            <input type="submit" class="boton" value="Reset password">
        </form>
        <div class="acciones">
            <a href="/">Already have an account? Log in here</a>
            <a href="/crear">Don't have an account?, Sign up for free</a>
        </div>
    </div> <!--.contenedor-sm -->
</div>