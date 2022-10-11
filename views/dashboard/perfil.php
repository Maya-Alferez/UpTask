<?php include_once __DIR__ . '/header-dashboard.php'; ?>

<div class="contenedor-sm">
    <?php include_once __DIR__ . '/../templates/alertas.php'; ?>

    <a href="/cambiar-password" class="enlace">Change password</a>

    <form class="formulario" method="POST" action="/perfil">
        <div class="campo">
            <label for="nombre">Name</label>
            <input type="text" value="<?php echo $usuario->nombre; ?>" name="nombre" placeholder="Name">
        </div>
        <div class="campo">
            <label for="email">Email</label>
            <input type="email" value="<?php echo $usuario->email; ?>" name="email" placeholder="mail@mail.com">
        </div>
        <input type="submit" value="Save changes">
    </form>
</div>

<?php include_once __DIR__ . '/footer-dashboard.php'; ?>