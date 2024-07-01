<?php

namespace App\Controllers;

use App\Controller;
use App\Models\JournalModel;

class HomeController extends Controller
{
    public function index()
    {
        $_Listajournals = [
            new JournalModel('My Third Journal Entry', '2023'),
            new JournalModel('My Second Journal Entry', '2022'),
            new JournalModel('My First Journal Entry', '2021')
        ];
        $this->render('index', 'Home', ['listaIndex' => $_Listajournals]);
    }
}
