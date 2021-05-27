<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $reservation=[
      
        'id_reservation','heures_etudes','reste_heures','montant_payee','reste','date_reservation','cin_candidat',
    ];
    public function facturations()
    {
        return $this->hasMany(Facturation::class);
    }
}
