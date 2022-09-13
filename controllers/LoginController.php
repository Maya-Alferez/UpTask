<?php
namespace Controllers;
use Classes\Email;
use MVC\Router;
use Model\Usuario;

class LoginController {
    public static function login(Router $router) {
       
        $alertas = [];
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario = new Usuario($_POST);
            $alertas = $usuario->validarLogin();

            if(empty($alertas)) {
                //Verificar que el usuario exista.
                $usuario = Usuario::where('email', $usuario->email);

                if(!$usuario || !$usuario->confirmado) {
                    Usuario::setAlerta('error', 'El usuario no existe o no esta confirmado');
                } else {
                    //El usuario existe
                    if( password_verify($_POST['password'], $usuario->password) ) {
                        //Iniciar sesión
                        session_start();
                        $_SESSION['id'] = $usuario->id;
                        $_SESSION['nombre'] = $usuario->nombre;
                        $_SESSION['email'] = $usuario->email;
                        $_SESSION['login'] = true;

                        //Redireccionar al usuario
                        header('Location: /dashboard');

                    } else {
                        Usuario::setAlerta('error', 'Password incorrecto');
                    }
                }
            }
        }

        $alertas = Usuario::getAlertas();
        //Render a la vista
        $router->render('auth/login', [
            'titulo' => 'Iniciar sesión',
            'alertas' => $alertas
        ]);
    }

    public static function logout() {
        session_start();
        $_SESSION = [];
        header('Location: /');
    }

    public static function crear(Router $router) {
        $alertas = [];
        $usuario = new Usuario;

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario->sincronizar($_POST);
            $alertas = $usuario->validarNuevaCuenta();

            if(empty($alertas)) {
                $existeUsuario = Usuario::where('email', $usuario->email);
                if($existeUsuario) {
                    Usuario::setAlerta('error', "User already exists");
                    $alertas = Usuario::getAlertas();
                } else {
                    //Hashear password
                    $usuario->hashPassword();
                    //Eliminar password2 para que este no se vaya a la BD
                    unset($usuario->password2);
                    //General token
                    $usuario->crearToken();

                    //Crear nuevo usuario
                    $resultado = $usuario->guardar();

                    //Enviar email
                    $email = new Email($usuario->email, $usuario->nombre, $usuario->token);
                    $email->enviarConfirmacion();

                    if($resultado) {
                        header('Location: /mensaje');
                    }
                }
            }
        }

        //Render a la vista
        $router->render('auth/crear', [
            'titulo' => 'Crea una cuenta',
            'usuario' => $usuario,
            'alertas' => $alertas
        ]);
    }

    public static function olvide(Router $router) {

        $alertas = [];

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $usuario = new Usuario($_POST);
            $alertas = $usuario->validarEmail();
            
            if(empty($alertas)) {
                $usuario = Usuario::where('email', $usuario->email);
                if($usuario && $usuario->confirmado === '1') {
                    //Generar un nuevo token
                    $usuario->crearToken();
                    unset($usuario->password2);
                    //Actualizar al usuario
                    $usuario->guardar();
                    //Enviar email
                    $email = new Email($usuario->email, $usuario->nombre, $usuario->token);
                    $email->enviarInstrucciones();
                    //Imprimir alerta
                    Usuario::setAlerta('exito', 'Check your email for instructions');
                } else { 
                    Usuario::setAlerta('error', 'Username does not exist or is not confirmed');
                }
            }
        }

        $alertas = Usuario::getAlertas();

        //Render a la vista
        $router->render('auth/olvide', [
            'titulo' => 'Forgot password',
            'alertas' => $alertas
        ]);
    }

    public static function reestablecer(Router $router) {
        $token = s($_GET['token']);
        $mostrar = true;
        if(!$token) header('Location: /');

        //Identificar al usuario con el token generado
        $usuario = Usuario::where('token', $token);
        if(empty($usuario)) {
            Usuario::setAlerta('error', 'Invalid token');
            $mostrar = false;
        }

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            //Añadir nuevo password
            $usuario->sincronizar($_POST);

            //Validar nuevo password
            $alertas = $usuario->validarPassword();

            if(empty($alertas)) {
                //Hashear nuevo password
                $usuario->hashPassword();
            
                //Eliminar token
                $usuario->token = null;

                //Guardar password en BD
                $resultado = $usuario->guardar();

                //Redireccionar al usuario
                if($resultado) {
                    header('Location: /');
                }
            }
        }

        $alertas = Usuario::getAlertas();

        //Render a la vista
        $router->render('auth/reestablecer', [
            'titulo' => 'Reset password',
            'alertas' => $alertas,
            'mostrar' => $mostrar
        ]);
    }

    public static function mensaje(Router $router) {
        $router->render('auth/mensaje' , [
        'titulo' => 'Forgot password'
    ]);

    }

    public static function confirmar(Router $router) {
        $token = s($_GET['token']);
        if(!$token) header('Location: /');

        //Encontrar al usuario con el token generado
        $usuario = Usuario::where('token', $token);

        if(empty($usuario)) {
            //No se encontró un usuario con ese token
            Usuario::setAlerta('error', 'Invalid token');
        } else {
            //Confirmar cuenta
            $usuario->confirmado = 1;
            $usuario->token = null;
            unset($usuario->password2);
            
            //Guardar datos en la BD
            $usuario->guardar();
            Usuario::setAlerta('exito', 'Account verified successfully');
        }

        $alertas = Usuario::getAlertas();

        $router->render('auth/confirmar', [
            'titulo' => 'Confirm your account CatTrello',
            'alertas' => $alertas
        ]);
    }
}