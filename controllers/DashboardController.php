<?php
namespace Controllers;

use MVC\Router;

class DashboardController {
    public static function index(Router $router) {

        session_start();
        isAuth();

        $router->render('dashboard/index', [
            'titulo' => 'Projects'
            
        ]);

    }

    public static function crear_proyecto(Router $router) {
        session_start();

        $router->render('dashboard/crear-proyecto', [
            'titulo' => 'Create a new project'
            
        ]);
    }

    public static function perfil(Router $router) {
        session_start();

        $router->render('dashboard/perfil', [
            'titulo' => 'Profile'
        ]);
    }
}