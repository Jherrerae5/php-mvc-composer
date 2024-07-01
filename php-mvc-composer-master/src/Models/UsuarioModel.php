<?php

namespace App\Models;

class oUsuario
{
    public $username;
    public $password;
    public $nombre;
    public $apellido;

    public function __construct($username, $password, $nombre, $apellido)
    {
        $this->username = $username;
        $this->password = $password;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
    }
}

class UsuarioModel
{
    public $listaIndex = [];
    public $Campo1;

    public function __construct($campo1 = "")
    {
        $this->Campo1 = $campo1;
    }

    public function addLista($usuario)
    {
        $this->listaIndex[] = $usuario;
    }
}

class Usuario_NuevoModel
{
    public $username;
    public $password;
    public $nombre;
    public $apellido;

    public function __construct($username, $password, $nombre, $apellido)
    {
        $this->username = $username;
        $this->password = $password;
        $this->nombre = $nombre;
        $this->apellido = $apellido;
    }
}