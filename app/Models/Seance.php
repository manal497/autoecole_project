<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seance extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *  
     * @var array
     */
    protected $fillable = [
        'type_seance',
         'heure_debut',
         'heure_fin',
         'jour',
         'id_moniteur'
    ];

    public function moniteur()
    {
        return $this->belongsTo(Moniteur::class);
    }

    public function condidats()
    {
        return $this->belongsToMany(Condidat::class, 'assisters');
    }
}
