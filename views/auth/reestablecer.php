<div class="contenedor reestablecer">
    <?php include_once __DIR__ . '/../templates/nombre-sitio.php'; ?>
    <div class="contenedor-sm">
        <p class="descripcion-pagina">Reset password</p>
        <?php include_once __DIR__ . '/../templates/alertas.php'; ?>
        <?php if($mostrar) { ?>
        <form class="formulario" method="POST">
            <div class="campo">
                <label for="password">Password</label>
                <input type="password" id="password" placeholder="New password" name="password">
            </div>

            <input type="submit" class="boton" value="Save new password">
        </form>
        <?php } ?>
        <div class="acciones">
            <a href="/">Already have an account? Log in here</a>
            <a href="/crear">Don't have an account?, Sign up for free</a>
        </div>
    </div> <!--.contenedor-sm -->
</div>