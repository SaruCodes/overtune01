<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreDiscoRequest;
use App\Http\Requests\UpdateDiscoRequest;
use App\Models\Disco;
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
        // Select todos los atributos de discos
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
        $datos = $request->only("titulo", "tipo", "año", "artista");

        // Manejo de la imagen
        if ($request->hasFile('cover_image')) {
            // Subir la imagen y obtener el nombre de archivo
            $imagen = $request->file('cover_image');
            $imagenNombre = $imagen->store('images/discos', 'public'); // Guardar en la carpeta public/images/discos/
            $datos['cover_image'] = $imagenNombre; // Almacenar la ruta en los datos
        }

        // Crear un nuevo disco y guardar en la base de datos
        $disco = new Disco($datos);
        $disco->save();

        session()->flash("mensaje", "$disco->tipo titulado $disco->titulo registrado");
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
        $datos = $request->input();

        // Manejo de la imagen
        if ($request->hasFile('cover_image')) {
            // Eliminar la imagen antigua si existe
            if ($disco->cover_image && Storage::exists('public/' . $disco->cover_image)) {
                Storage::delete('public/' . $disco->cover_image);
            }

            // Subir la nueva imagen
            $imagen = $request->file('cover_image');
            $imagenNombre = $imagen->store('images/discos', 'public'); // Guardar en la carpeta public/images/discos/
            $datos['cover_image'] = $imagenNombre; // Actualizar la ruta de la imagen
        }

        // Actualizar los datos del disco
        $disco->update($datos);

        session()->flash("mensaje", "El $disco->tipo titulado $disco->titulo actualizado");
        return redirect()->route('discos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Disco $disco)
    {
        // Eliminar la imagen asociada
        if ($disco->cover_image && Storage::exists('public/' . $disco->cover_image)) {
            Storage::delete('public/' . $disco->cover_image);
        }

        $disco->delete();
        session()->flash("mensaje", "El $disco->tipo titulado $disco->titulo ha sido eliminado");
        return redirect()->route('discos.index');
    }

    /**
     * Saca los últimos discos añadidos a la web en la página de novedades.
     */
    public function novedades()
    {
        $discos = Disco::latest()->take(12)->get();
        return view('discos.novedades', compact('discos'));
    }
}

