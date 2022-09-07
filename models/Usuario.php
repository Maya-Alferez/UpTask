<?php

namespace Model;

class Usuario extends ActiveRecord {
    protected static $tabla = 'usuarios';
    protected static $columnasDB = ['id', 'nombre', 'email', 'password', 'token', 'confirmado'];

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'] ?? '';
        $this->email = $args['email'] ?? '';
        $this->password = $args['password'] ?? '';
        $this->password2 = $args['password2'] ?? '';
        $this->token = $args['token'] ?? '';
        $this->confirmado = $args['confirmado'] ?? '';
    }

    //Validación para cuentas nuevas
    public function validarNuevaCuenta() {
        if(!$this->nombre) {
            self::$alertas['error'][] = 'User name is required';
        }

        if(!$this->email) {
            self::$alertas['error'][] =  "User's email is required";
        }

        if(!$this->password) {
            self::$alertas['error'][] =  "Password user is required";
        }

        if(strlen($this->password) < 6) {
            self::$alertas['error'][] =  "Please, make sure that your password includes 6 or more characters";
        }

        if($this->password !== $this->password2) {
            self::$alertas['error'][] = "Please, make sure that both passwords are the same";
        }

        return self::$alertas;
    }
}