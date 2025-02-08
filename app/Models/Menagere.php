<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Menagere extends Model
{
    //

    use HasFactory;

    protected $fillable = [
        'nom',
        'prenom',
        'telephone',
        'photo',
        'age',
        'quartier',
        'ville',
        'langues_parlees',
        'commentaire',
        'sous_contrat'
    ];

    protected $casts = [
        'langues_parlees' => 'array',
        'sous_contrat' => 'boolean'
    ];

    public function contrat()
    {
        return $this->hasOne(Contrat::class);
    }
}
