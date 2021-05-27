<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Document extends Model
{
    use HasFactory;
    public $timestamps=false;
    protected $documment=[

        'id_dossier','carte_recto','carte_verso','certificat_medical','photo','permis','attestation_fin_formation','recu_paiement',
        'demmande_etablit','cin_candidat',
    ];
    public function candidat()
    {
        return $this->belongsTo(Candidat::class);
    }
}
