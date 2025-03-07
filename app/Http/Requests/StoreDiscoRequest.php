<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreDiscoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {

        return [
            'titulo'      => 'required|string|unique:discos,titulo',
            'tipo'        => 'required|string',
            'anio'         => 'required|integer|min:1950|max:' . date('Y'),
            'artista'     => 'required|string',
            'cover_image' => 'nullable|image|max:2048',
        ];
    }

    public function store(StoreDiscoRequest $request)
    {
        dd($request->all());
        // ...
    }



}
