<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Facturation;
use App\Models\Reservation;

class CandidatFacturation extends Controller
{
  //-----------------------liste reservation-----------------------------------------------//
    public function listReservation(){
        $table=new Reservation();
        $data=$table::get();
        return view('viewFacturation.reservationCandidat',compact('data'));
    }

    //-------------------------------liste facturations-------------------------------------------------//
    public function listFacturation(Request $request, $id){
      //$url = $request->url();
   
        $table=new Facturation();
        $dataAdd=$table::get()->where('id_reservation',$id);
     
        return view('viewFacturation.facturation',compact('dataAdd','id'));
    }

    
    //-------------------------------------ajouter facturation-------------------------------------------//
    public function addFact(Request $request)
    {
        $table=new Facturation();

        $request->validate([
          'num'=>'required',
          'date'=>'required',
          'prix' =>'required',
         
          
        ]);
        
        $query=$table::insert([
            'id_reservation'=>$request->num,
          'montant_paye'=>$request->prix,
          'date_fact' =>$request->date
         
        ]);
      
       if($query )
        {
          return back()
          ->with('success','data has been successfuly inserted !');
        }
        else {
          return back()
          ->with('fail','error!');
        }
    }
    
    //-----------------------------------update facturation-----------------------------------//
    public function updateFact(Request $request){
      $table=new Facturation();
      $update = [
        'id_fact'=>$request->numF,
        'montant_paye' =>	$request->prixF,
        'date_fact' =>	$request->dateU
      
    ];
 
    $query=$table->where('id_fact',$request->numF)->update($update);
    
    
    if($query )
        {
          return back()
          ->with('successUpdate','data has been successfuly updated !');
        }
        else {
          return back()
          ->with('failUpdate','error!');
        }
    }
}