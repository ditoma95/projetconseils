<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
// use Illuminate\Support\Facades\Auth;

class StoreTrajetRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        // Obtenez l'utilisateur connecté
        // $user = Auth::user();

        // return auth()->check();
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        // Définissez les règles de validation ici
        return [
            // 'lieuDepart' => 'required|string|min:2',
            // 'lieuArrive' => 'required|string|min:2',
            // 'lieuEscale' => 'required|string|min:2',
            // 'heurDepart' => 'required|string',
            // 'dateDepart' => 'required|string',
            // 'tarif' => 'required|numeric',
        ];
    }
}
