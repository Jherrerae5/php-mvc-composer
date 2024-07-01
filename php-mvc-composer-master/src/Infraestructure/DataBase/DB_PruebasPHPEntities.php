<?php
namespace App\Infraestructure\DataBase;

use PDO;
use PDOException;

class DB_PruebasPHPEntities {
    private $DefaultConnection;

    // Constructor para establecer la conexión a la base de datos
    public function __construct() {
        $dsn = 'mysql:host=192.168.1.32;port=3306;dbname=practica_php';
        $username = 'root';
        $password = 'password';

        try {
            $this->DefaultConnection = new PDO($dsn, $username, $password, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ]);
        } catch (PDOException $e) {
            die('Error de conexión: ' . $e->getMessage());
        }
    }

    // Método para obtener la conexión
    public function DB_PruebaPHPEntity() {
        return $this->DefaultConnection;
    }
}