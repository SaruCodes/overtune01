<?php

namespace App\Http\Controllers;

use App\Models\Disco;
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
        $discos = Disco::take(3)->get(); // Obtener 3 discos desde la base de datos
        // Pasamos la variable $discos a la vista 'home'
        return view('home', compact('discos'));
    }
}
