<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDiscoRequest;
use App\Http\Requests\UpdateDiscoRequest;
use App\Models\Disco;
use App\Models\Genero;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

class DiscoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $campos = Schema::getColumnListing('discos');
        $exclude = ["created_at", "updated_at"];
        $campos = array_diff($campos, $exclude);
        $filas = Disco::select($campos)->get();
        return view('discos.index', compact('filas', "campos"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("discos.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDiscoRequest $request)
    {
        // Obtenemos solo los datos necesarios
        $datos = $request->only("titulo","tipo","anio","artista","cover_image");

        // Creamos el objeto disco con los datos proporcionados
        $disco = new Disco($datos);
        $disco->save();  // Guardamos el disco

        // Verificamos si se han enviado géneros
        if ($request->has("generos")) {
            foreach ($request->generos as $genero_disco) {
                // Creamos una nueva instancia de Genero para cada género
                $genero = new Genero();
                $genero->disco_id = $disco->id;
                $genero->genero = $genero_disco;
                $genero->subgenero = $request->subgenero[$genero_disco] ?? null;

                $genero->save();
            }
        }

        // Mensaje de éxito
        session()->flash("mensaje", "Disco $disco->titulo registrado");

        // Redirigimos a la vista de listado de discos
        return redirect()->route('discos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Disco $disco)
    {
        return view('discos.show', compact('disco'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Disco $disco)
    {
        return view('discos.edit', compact('disco'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDiscoRequest $request, Disco $disco)
    {
        // Verificar si hay una nueva imagen de portada y guardarla
        if ($request->hasFile('cover_image')) {
            // Eliminar la imagen anterior si existe
            if ($disco->cover_image && $disco->cover_image !== 'images/discos/placeholder.jpg') {
                Storage::delete('public/' . $disco->cover_image); // Esto elimina la imagen vieja
            }

            // Subir la nueva imagen a la carpeta 'images/discos'
            $coverImagePath = $request->file('cover_image')->store('images/discos', 'public');
            $disco->cover_image = $coverImagePath;  // Asignar la ruta a la columna
        }


        $disco->update($request->except('cover_image'));
        session()->flash("mensaje", "Disco $disco->titulo actualizado");
        return redirect()->route('discos.index');
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Disco $disco)
    {
        $disco->delete();
        session()->flash("mensaje", "El $disco->tipo titulado $disco->titulo ha sido eliminado");
        return redirect()->route('discos.index');
    }
}
