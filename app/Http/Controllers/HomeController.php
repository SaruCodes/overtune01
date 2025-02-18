<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Aquí iría la lógica para mostrar la vista del Home
        return view('home'); // Retorna home.blade.php
    }
}
