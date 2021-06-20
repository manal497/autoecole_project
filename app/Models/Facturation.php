<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facturation extends Model
{
    use HasFactory;
    protected $facturation=[

        'id_facturation','date_fact','montant_paye', 'id_reservation',
    ];
    public function reservation()
    {
        return $this->belongsTo(Reservation::class);
    }
}