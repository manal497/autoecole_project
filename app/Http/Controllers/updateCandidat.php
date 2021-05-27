<?php

namespace App\Http\Controllers;
use App\Models\Candidat;
use App\Models\Document;
use App\Models\Reservation;
use Illuminate\Http\Request;

class updateCandidat extends Controller
{
    public function detailsCandidat($cin){
        $dataCandidat= Candidat::get()->where('cin_candidat',$cin)->first();
        $dataReservation=Reservation::get()->where('cin_candidat',$cin);
        $dataDocument=Document::get()->where('cin_candidat',$cin);
        $dataDocumentPhoto=Document::get()->where('cin_candidat',$cin)->first();
      
      return view('viewCandidat.details',compact('dataCandidat','dataReservation','dataDocumentPhoto'));
      }

      public function formupdate($cin){

        $dataCandidatUpdate= Candidat::get()->where('cin_candidat',$cin)->first();
        $dataReservationUpdate=Reservation::get()->where('cin_candidat',$cin);
        $dataDocUpdate=Document::get()->where('cin_candidat',$cin);
        return view('viewCandidat.updateInfoCandidat',compact('dataCandidatUpdate','dataReservationUpdate','dataDocUpdate','cin'));
       }

       
    public function updateInfo(Request $request){
        $table=new Candidat();
        $update=[
            'cin_candidat'=>$request->cin,
            'nom'=>$request->nom,
            'prenom'=>$request->prenom,
            'adresse'=>$request->adresse,
            'telephone'=>$request->tel,
            'date_naissance'=>$request->dateNais,
            'lieu_naissance'=>$request->lieuNais,
            'sexe'=>$request->sexe,
            'type_permis'=>$request->typepermis
        ];
  
  
        $query1=$table->where('cin_candidat',$request->cin)->update($update);
        if($query1)
        {
          return back()
          ->with('successUpdate','data has been successfuly updated !');
        }
        else {
          return back()
          ->with('failUpdate','error!');
        }
      }
  

      public function updateReservation(Request $request){
  
        $table=new Reservation();
        $update = [
          'id_reservation'=>$request->id,
          'montant_payee' =>$request->prix,
          
          'reste'=>$request->prix,
          'date_reservation' =>	$request->date,
          'periode'=>$request->periode
        
      ];
   
      $query=$table->where('id_reservation',$request->id)->update($update);
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

     public function updateDocCandidat(){

        
    }
}
