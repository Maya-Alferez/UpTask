<?php
namespace Controllers;
use MVC\Router;

class LoginController {
    public static function login(Router $router) {

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
        }

        //Render a la vista
        $router->render('auth/login', [
            'titulo' => 'Iniciar sesión'
        ]);
    }

    public static function logout() {
        echo "Desde logout";
    }

    public static function crear(Router $router) {

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
        }

        //Render a la vista
        $router->render('auth/crear', [
            'titulo' => 'Crea una cuenta'
        ]);
    }

    public static function olvide(Router $router) {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
        }

        //Render a la vista
        $router->render('auth/olvide', [
            'titulo' => 'Forgot password'
        ]);
    }

    public static function reestablecer(Router $router) {

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

        }

        //Render a la vista
        $router->render('auth/reestablecer', [
            'titulo' => 'Reset password'
        ]);
    }

    public static function mensaje(Router $router) {
        $router->render('auth/mensaje' , [
        'titulo' => 'Forgot password'
    ]);

    }

    public static function confirmar() {
        echo "confirmar";
    }
}