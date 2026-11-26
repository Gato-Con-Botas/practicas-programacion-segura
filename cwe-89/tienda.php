<?php
class Tienda
{
    static $mysqli;
    static $servidor = 'localhost';
    static $usuario = 'tienda_user';
    static $password = 't13Nd@';
    static $base_de_datos = 'tienda';

    public function __construct()
    {
        self::conectar();
    }

    function __destruct()
    {
        self::$mysqli->close();
    }

    protected function conectar()
    {
        self::$mysqli = new mysqli(self::$servidor, self::$usuario, self::$password, self::$base_de_datos);
        if (self::$mysqli->connect_error) {
            die('Error de Conexión (' . self::$mysqli->connect_errno . ') ' . self::$mysqli->connect_error);
        }
    }

    public function obten_conexion()
    {
        return self::$mysqli;
    }
}