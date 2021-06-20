<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Moniteur extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $moniteur=[

        'id','cin_moniteur','nom','prenom','adresse','telephone','date_naissance','lieu_naissance',
        'numero_permis','sexe','type_moniteur',
    ];

    public function seances()
    {
        return $this->hasMany(Seance::class);
    }

    public function vehicules()
    {
        return $this->belongsToMany(Vehicule::class, 'affectations');
    }
}