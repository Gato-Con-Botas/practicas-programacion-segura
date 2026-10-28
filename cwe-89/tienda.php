<?php

class Tienda
{
    // Intentamos una conexión a un servidor de MySQL
    static $mysqli;
    static $servidor = 'localhost';
    static $usuario = 'tienda_user';
    static $password = 't13Nd@';
    static $base_de_datos = 'tienda';

    public function __construct()
    {
        self::conectar();
    }

    public function __destruct()
    {
        if (self::$mysqli) {
            self::$mysqli->close();
        }
    }

    protected function conectar()
    {
        // Esta función es la que realiza la conexión al servidor de MySQL
        self::$mysqli = new mysqli(self::$servidor, self::$usuario, self::$password, self::$base_de_datos);

        // En caso de error lo mandamos a imprimir a la pantalla
        // Imprimimos el número de error y su descripción
        if (self::$mysqli->connect_error) {
            die('Error de Conexión (' . self::$mysqli->connect_errno . ') ' . self::$mysqli->connect_error);
        }
    }

    public function obten_conexion()
    {
        return self::$mysqli;
    }
}