<?php

namespace App;

class Controller
{
    protected function render($View,$Controller, $Model)
    {
        $viewPath =  __DIR__ . "/Views/{$Controller}/{$View}.php";
        $layoutPath =  __DIR__. '/Views/Shared/_Layout.php';
        if (file_exists($layoutPath)) {
            extract($Model);
            $view = $viewPath; // Pasar la ruta de la vista
            include $layoutPath; // Incluir el layout
        } else {
            echo "El archivo de layout no se encontró." . $layoutPath;
            include $viewPath;
        }
    }
}
