<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicule extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *	
     * @var array
     */
    protected $fillable = [
        'type_véhicule',
         'marque',
         'etat',
         'matricule',
    ];

    public function moniteurs()
    {
        return $this->belongsToMany(Moniteur::class, 'affectations');
    }
}
