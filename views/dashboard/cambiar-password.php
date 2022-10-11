<?php include_once __DIR__ . '/header-dashboard.php'; ?>

<div class="contenedor-sm">
    <?php include_once __DIR__ . '/../templates/alertas.php'; ?>

    <a href="/perfil" class="enlace">Come back to Profile</a>

    <form class="formulario" method="POST" action="/cambiar-password">
        <div class="campo">
            <label for="nombre">Password Actual</label>
            <input type="password" name="password_actual" placeholder="Password actual">
        </div>
        <div class="campo">
            <label for="email">Password nuevo</label>
            <input type="password" name="password_nuevo" placeholder="Password  nuevo">
        </div>
        <input type="submit" value="Save changes">
    </form>
</div>

<?php include_once __DIR__ . '/footer-dashboard.php'; ?>