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

    public static function olvide() {
        echo "Desde olvide mi password";

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

        }
    }

    public static function reestablecer() {
        echo "Desde reestablecer password";

        if($_SERVER['REQUEST_METHOD'] === 'POST') {

        }
    }

    public static function mensaje() {
        echo "Revisa tu correo electrónico";
    }

    public static function confirmar() {
        echo "confirmar";
    }
}