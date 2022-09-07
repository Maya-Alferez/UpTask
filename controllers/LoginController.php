<?php
namespace Controllers;
use MVC\Router;
use Model\Usuario;

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
        $alertas = [];
        $usuario = new Usuario;

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario->sincronizar($_POST);
            $alertas = $usuario->validarNuevaCuenta();
        }

        //Render a la vista
        $router->render('auth/crear', [
            'titulo' => 'Crea una cuenta',
            'usuario' => $usuario,
            'alertas' => $alertas
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

    public static function confirmar(Router $router) {
        $router->render('auth/confirmar', [
            'titulo' => 'Confirm your account CatTrello'
        ]);
    }
}