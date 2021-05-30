<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Facturation;
use App\Models\Reservation;
use App\Models\Candidat;
use PDF;

class recuFacturation extends Controller
{
    public function download($id){
 

        $facturation= Facturation::join('reservations','reservations.id_reservation','=','facturations.id_reservation')
        ->join('candidats','candidats.cin_candidat','=','reservations.cin_candidat')
        ->where('facturations.id_fact',$id)
        ->get()->first();

          $pdf=PDF::loadview('viewFacturation.recupaiement',compact('facturation','id'));
       return $pdf->download('facturation.pdf');
      }
     
  }