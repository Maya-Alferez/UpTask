<?php include_once __DIR__ . '/header-dashboard.php'; ?>
    
    <?php if(count($proyectos) === 0) { ?>
        <div class="panel">
            <p class="no-proyectos">Create a Project and get organized!</p>
            <p class="no-proyectos"><a href="/crear-proyecto">Create one</a></p>
        </div>
    <?php } else { ?>
        <ul class="listado-proyectos">
            <?php foreach($proyectos as $proyecto) { ?>
                <li class="proyecto">
                    <a href="/proyecto?id=<?php echo $proyecto->url; ?>">
                        <?php echo $proyecto->proyecto;?>
                    </a>
                </li>
            <?php } ?>
        </ul>
    <?php } ?>

<?php include_once __DIR__ . '/footer-dashboard.php'; ?>