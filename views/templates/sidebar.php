<aside class="sidebar">
    <div class="contenedor-sidebar">
        <h2>CatTrello</h2>
        <div class="cerrar-menu">
            <img src="build/img/cerrar.png" id="cerrar-menu" alt="imagen-cerrar-menu">
        </div>
    </div>
    
    <nav class="sidebar-nav">
        <a class="<?php echo ($titulo === 'Projects') ? 'activo' : ''; ?>" href="/dashboard">Projects</a>
        <a class="<?php echo ($titulo === 'Create a new project') ? 'activo' : '';?>" href="/crear-proyecto">Create a new project</a>
        <a class="<?php echo ($titulo === 'Profile') ? 'activo' : '';?>" href="/perfil">Profile</a>
    </nav>

    <div class="cerrar-sesion-mobile">
        <a href="/logout" class="cerrar-sesion">Log out</a>
    </div>
</aside>