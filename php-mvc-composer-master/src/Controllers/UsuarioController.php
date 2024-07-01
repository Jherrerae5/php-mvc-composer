<?php

namespace App\Controllers;

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

use App\Controller;
use App\Infraestructure\Services\sUsuario;
use App\Models\UsuarioModel;
use App\Models\oUsuario;
use App\Models\Usuario_NuevoModel;
class UsuarioController extends Controller
{
    public function index()
    {
        try {
            // Crear una instancia de sUsuario
            $sUsuario = new sUsuario();

            // Definir que modelo usar 
            $modelo = new UsuarioModel();

            // Llamar al método para obtener los usuarios
            $TraerUsuario = $sUsuario->s_ObtenerUsuarios();

            // Llenar el modelo con los datos de la base de datos
            foreach ($TraerUsuario as $fila) {
                $_ListaUsuario = new oUsuario(
                    $fila['username'], $fila['password'], $fila['nombre'], $fila['apellido']
                );
                $modelo->addLista($_ListaUsuario);

            }
            //
            $modelo->Campo1 = "Hola Mundo";
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }

        $this->render('index', 'Usuario', ['mymodel' => $modelo]);
    }

    public function Nuevo()
    {
        $modelo = new UsuarioModel();
        $mensajeError = null;
    
        try {
            // Crear una instancia de sUsuario
            $sUsuario = new sUsuario();
    
            // Obtener y validar los datos del formulario
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $username = $_POST['username'] ?? null;
                $password = $_POST['password'] ?? null;
                $nombre = $_POST['nombre'] ?? null;
                $apellido = $_POST['apellido'] ?? null;
    
                if ($username && $password && $nombre && $apellido) {
                    // Crear una instancia del modelo Usuario_NuevoModel
                    $nuevoUsuario = new Usuario_NuevoModel($username, $password, $nombre, $apellido);
    
                    // Llamar al método para agregar un nuevo usuario
                    $sUsuario->s_AgregarUsuario(
                        $nuevoUsuario->username,
                        $nuevoUsuario->password,
                        $nuevoUsuario->nombre,
                        $nuevoUsuario->apellido
                    );
    
                    // Redirigir a la página de éxito o hacer alguna acción después de agregar el usuario
                    header('Location: /Usuario'); // Ejemplo de redirección a la lista de usuarios
                    exit;
                } else {
                    $mensajeError = "Todos los campos son obligatorios.";
                }
            }
        } catch (Exception $e) {
            $mensajeError = "Error: " . $e->getMessage();
        }
    
        $this->render('Nuevo', 'Usuario', ['mymodel' => $modelo, 'mensajeError' => $mensajeError]);
    }
    
    public function Editar()
    {
        $modelo = new UsuarioModel();
        $mensajeError = null;
        $username = $_GET['id'] ?? null;

        try {
            $sUsuario = new sUsuario();

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $username = $_POST['username'] ?? null;
                $password = $_POST['password'] ?? null;
                $nombre = $_POST['nombre'] ?? null;
                $apellido = $_POST['apellido'] ?? null;

                if ($username && $password && $nombre && $apellido) {
                    $usuarioActualizado = new Usuario_NuevoModel($username, $password, $nombre, $apellido);

                    $sUsuario->s_ActualizarUsuario(
                        $usuarioActualizado->username,
                        $usuarioActualizado->password,
                        $usuarioActualizado->nombre,
                        $usuarioActualizado->apellido
                    );

                    header('Location: /Usuario');
                    exit;
                } else {
                    $mensajeError = "Todos los campos son obligatorios.";
                }
            } else {
                if (!$username) {
                    $mensajeError = 'ID de usuario no proporcionado';
                } else {
                    $usuario = $sUsuario->s_ObtenerUsuarioPorId($username);
                    if ($usuario) {
                        $modelo = new Usuario_NuevoModel(
                            $usuario['username'],
                            $usuario['password'],
                            $usuario['nombre'],
                            $usuario['apellido']
                        );
                    } else {
                        $mensajeError = "Usuario no encontrado";
                    }
                }
            }
        } catch (Exception $e) {
            $mensajeError = "Error: " . $e->getMessage();
        }

        $this->render('Editar', 'Usuario', ['mymodel' => $modelo, 'mensajeError' => $mensajeError]);
    }

    public function Eliminar()
    {
        // Verificar si el método de la solicitud es GET
        if ($_SERVER['REQUEST_METHOD'] === 'GET') {
            // Obtener el username de la URL
            $username = $_GET['id'];

            try {
                // Crear una instancia de sUsuario
                $sUsuario = new sUsuario();

                // Llamar al método para eliminar el usuario
                $sUsuario->s_EliminarUsuario($username);

                // Redireccionar a la página principal o a donde desees después de eliminar el usuario
                header('Location: /Usuario');
                exit();
            } catch (Exception $e) {
                echo "Error: " . $e->getMessage();
            }
        } else {
            // Redirigir si el método de la solicitud no es GET
            header('Location: /Usuario');
            exit();
        }
    }
    public function apiIndex()
    {
        try {
            $sUsuario = new sUsuario();
            $usuarios = $sUsuario->s_ObtenerUsuarios();
            
            // Preparar los datos para la respuesta JSON
            $data = [];
            foreach ($usuarios as $usuario) {
                $data[] = [
                    'username' => $usuario['username'],
                    'password' => $usuario['password'],
                    'nombre' => $usuario['nombre'],
                    'apellido' => $usuario['apellido']
                ];
            }
    
            // Devolver la respuesta JSON
            header('Content-Type: application/json');
            echo json_encode($data);
            exit;
        } catch (Exception $e) {
            echo json_encode(['error' => $e->getMessage()]);
            exit;
        }
    }
}