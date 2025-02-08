<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use App\Models\Menagere;


class Contrat extends Model
{
    use HasFactory;

    protected $fillable = [
        'menagere_id',
        'date_debut',
        'date_fin',
        'salaire',
        'plein_temps'
    ];

    protected $casts = [
        'date_debut' => 'date',
        'date_fin' => 'date',
        'plein_temps' => 'boolean'
    ];

    public function menagere()
    {
        return $this->belongsTo(Menagere::class);
    }

    public function estActif()
    {
        return now()->between($this->date_debut, $this->date_fin);
    }
}
