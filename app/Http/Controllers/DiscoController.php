<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDiscoRequest;
use App\Http\Requests\UpdateDiscoRequest;
use App\Models\Disco;
use Illuminate\Support\Facades\Schema;

class DiscoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $campos = Schema::getColumnListing('discos');
        $exclude =["created_at","updated_at"];
        $campos = array_diff($campos,$exclude);
        $filas = Disco::select($campos)->get();
        //select todos los atributos de discos
        return view('discos.index',compact('filas',"campos"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view("discos.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDiscoRequest $request)
    {
        $datos = $request->only("titulo","tipo","año","artista");
        $disco = new Disco($datos);
        $disco->save();
        session()->flash("mensaje","$disco->tipo titulado $disco->nombre registrado");

        return redirect()->route('disco.index');
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Disco $disco)
    {
        //
        return(view('discos.show',compact('disco')));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Disco $disco)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDiscoRequest $request, Disco $disco)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Disco $disco)
    {
        //
        $disco->delete();
        session()->flash("mensaje","El $disco->tipo titulado $disco->titulo ha sido eliminado");
        return redirect()->route('discos.index');
    }
}
