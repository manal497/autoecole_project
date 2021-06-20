<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Affectation extends Model
{
    use HasFactory;
     /**
     * The attributes that are mass assignable.
     *  
     * @var array
     */
    protected $fillable = [
        'date_affectation',
         'vehicule_id',
         'moniteur_id',
    ];
}
