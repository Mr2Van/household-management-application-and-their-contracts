<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MenagereRequest extends FormRequest
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
            //

            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'telephone' => 'required|numeric|digits_between:8,15',
            'photo' => 'nullable|image|max:2048', // Photo : facultative, max 2MB
            'age' => 'required|integer|min:18|max:65', // Limite d'âge entre 18 et 65 ans
            'quartier' => 'required|string|max:255',
            'ville' => 'required|string|max:255',
            'langues_parlees' => 'required|array|min:1', // Au moins une langue requise
            'langues_parlees.*' => 'string|max:255', // Chaque langue doit être une chaîne
            'commentaire' => 'nullable|string|max:500', // Facultatif, max 500 caractères
            'sous_contrat' => 'required|boolean', // Valeur booléenne (true/false)
        ];
    }
}
