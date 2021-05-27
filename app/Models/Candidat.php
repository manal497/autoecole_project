<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidat extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $candidat=[

        'id_candidat','cin_candidat','nom','prenom','adresse','telephone','date_naissance','lieu_naissance',
        'type_permis','sexe',
    ];
    public function documments()
    {
        return $this->hasMany(Document::class);
    }
    public function reservations()
    {
        return $this->hasMany(Reservation::class);
    }
}
