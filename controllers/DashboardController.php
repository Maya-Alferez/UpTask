<?php
namespace Controllers;

use MVC\Router;
use Model\Proyecto;

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
        isAuth();
        $alertas = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $proyecto = new Proyecto($_POST);
            
            //Validación
            $alertas = $proyecto->validarProyecto();

            if(empty($alertas)) {
                //Guardar proyecto
                debuguear($proyecto);
            }
        }

        $router->render('dashboard/crear-proyecto', [
            'alertas' => $alertas,
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