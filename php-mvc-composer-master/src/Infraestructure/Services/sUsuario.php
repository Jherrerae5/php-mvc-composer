<?php
namespace App\Infraestructure\Services;

use App\Infraestructure\DataBase\DB_PruebasPHPEntities;
use PDO;

class sUsuario {
    private $_db;

    public function __construct($db = null) {
        $this->_db = $db ? $db->DB_PruebaPHPEntity() : (new DB_PruebasPHPEntities())->DB_PruebaPHPEntity();
    }

    // Método para agregar un nuevo usuario
    public function s_AgregarUsuario($username, $password, $nombre, $apellido) {
        $query = "INSERT INTO users (username, password, nombre, apellido) VALUES (:username, :password, :nombre, :apellido)";
        $stmt = $this->_db->prepare($query);
        $stmt->execute([
            ':username' => $username,
            ':password' => $password,
            ':nombre' => $nombre,
            ':apellido' => $apellido
        ]);
    }

    // Método para obtener todos los usuarios
    public function s_ObtenerUsuarios() {
        $query = "SELECT * FROM users";
        $stmt = $this->_db->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Método para obtener un usuario por su ID
    public function s_ObtenerUsuarioPorId($username) {
        $query = "SELECT * FROM users WHERE username = :username";
        $stmt = $this->_db->prepare($query);
        $stmt->execute([':username' => $username]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Método para actualizar un usuario
    public function s_ActualizarUsuario($username, $password, $nombre, $apellido) {
        $query = "UPDATE users SET password = :password, nombre = :nombre, apellido = :apellido WHERE username = :username";
        $stmt = $this->_db->prepare($query);
        $stmt->execute([
            ':username' => $username,
            ':password' => $password,
            ':nombre' => $nombre,
            ':apellido' => $apellido
        ]);
    }

    // Método para eliminar un usuario por su ID
    public function s_EliminarUsuario($username) {
        $query = "DELETE FROM users WHERE username = :username";
        $stmt = $this->_db->prepare($query);
        $stmt->execute([':username' => $username]);
    }
}
