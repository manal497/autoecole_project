<?php

namespace App\Http\Controllers;

use App\Models\Candidat;
use App\Models\Document;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CandidatController extends Controller
{
  //----------------------------------------------liste des candidats------------------------------//
    public function select(){
        $table=new Candidat();
    
        $data= Candidat::get(['cin_candidat','nom','prenom','type_permis','telephone']);
        
      return view('viewCandidat.create', compact('data'));


    }
//----------------------------ajouter documents------------------------------------------------------//
   
  public function createDocumment(Request $request)
  {

    $documment=new Document();
    $cin=$request->input('cin');
    $hasphoto=$request->hasFile('photo');
      $photo=$request->file('photo');

      $hascarteRecto=$request->hasFile('carteRecto');
      $carteRecto=$request->file('carteRecto');

      $hascarteVerso=$request->hasFile('carteVerso');
      $carteVerso=$request->file('carteVerso');

      $certificatMed=$request->file('certificatMed');
      $hascertificatMed=$request->hasFile('certificatMed');

      $permis=$request->file('permis');
      $haspermis=$request->hasFile('permis');

      $hasrecuPayer=$request->hasFile('recuPayer');
      $recuPayer=$request->File('recuPayer');

      $hasdemmande=$request->hasFile('demmande');
      $demmande=$request->File('demmande');

      $hasattestationFin=$request->hasFile('attestationFin');
      $attestationFin=$request->File('attestationFin');

      $image_name='Photo_'.$cin;
      $location='images/documents/';
      $carteRecto_name='CarteRecto_'.$cin.'.pdf';
      $carteVerso_name='CarteVerso_'.$cin.'.pdf';
      $certificatMed_name='certificatMedical_'.$cin.'.pdf';
      $permis_name='Permis_'.$cin.'.pdf';
      $recuPayer_name='RecuPayer_'.$cin.'.pdf';
      $demmande_name='Demmande_'.$cin.'.pdf';
      $attestationFin_name='AttestationFin_'.$cin.'.pdf';

     if($hasphoto){
      
       $photo->move($location,$image_name);
       $documment->photo=$image_name;
       $documment->cin_candidat=$cin;
        $documment->save();
    
     }
     if($hascarteRecto){ 

       $carteRecto->move($location,$carteRecto_name);
       
        $documment->carte_recto=$carteRecto_name;
  
        $documment->cin_candidat=$cin;
        $documment->save();
    
     }
     if($hascarteVerso){

        $carteVerso->move($location,$carteVerso_name);
        
        $documment->carte_verso=$carteVerso_name;
        $documment->cin_candidat=$cin;
        $documment->save();
    
      }

     if($hascertificatMed){
          $certificatMed->move($location,$certificatMed_name);
       
        $documment->certificat_medical=$certificatMed_name;
        
        $documment->cin_candidat=$cin;
        $documment->save();
    
       }

       if($haspermis){
        $permis->move($location,$permis_name);
      
        $documment->permis=$permis_name;
     
        $documment->cin_candidat=$cin;
        $documment->save();
    
      }

      if($hasrecuPayer){
        $recuPayer->move($location,$recuPayer_name);
       
        $documment->recu_paiement=$recuPayer_name;
      
        $documment->cin_candidat=$cin;
        $documment->save();
    
      }
      if($hasdemmande){
        $demmande->move($location,$demmande_name);
        $documment->demmande_etablit=$demmande_name;
      
        $documment->cin_candidat=$cin;
        $documment->save();
      }

      if($hasattestationFin){
      
        $documment->attestation_fin_formation=$attestationFin_name;
        $documment->cin_candidat=$cin;
        $documment->save();
    
        $attestationFin->move($location,$attestationFin_name);
        }

        
    /*    $documment->photo=$image_name;
        $documment->carte_recto=$carteRecto_name;
        $documment->carte_verso=$carteVerso_name;
        $documment->certificat_medical=$certificatMed_name;
        $documment->permis=$permis_name;
        $documment->recu_paiement=$recuPayer_name;
        $documment->demmande_etablit=$demmande_name;
        $documment->attestation_fin_formation=$attestationFin_name;
        $documment->cin_candidat=$cin;
        $documment->save();*/
    
        if( $documment )
        {
          return redirect()->route('candidatlist')->with('successADDDoc','data has been successfuly inserted !');
        }
        else {
          return redirect()->route('candidatlist')->with('failADDDoc','error!');
        }
       


  }
//-------------------------ajouter des candidats(informations) ------------------------------//

      public function create(Request $request)
      {
  
      $request->validate([
        
        'cin'=>'required',
        'nom' =>'required',
        'prenom'=>'required',
        'adresse'=>'required',
        'tel' =>'required',
        'sexe'=>'required',

      ] );

      $query=Candidat::insert([
        'cin_candidat'=>$request->input('cin'),
        'nom' =>$request->input('nom'),
        'prenom'=>$request->input('prenom'),
        'adresse'=>$request->input('adresse'),
        'telephone' =>$request->input('tel'),
        'date_naissance'=>$request->input('dateNais'),
        'lieu_naissance'=>$request->input('lieuNais'),
        'type_permis'=>$request->input('typepermis'),
        'sexe'=>$request->input('sexe')
      ] );
  
     if($query)
      {
        return redirect()->route('candidatlist')->with('successADDc','data has been successfuly inserted !');
      }
      else {
        return redirect()->route('candidatlist')->with('failADDc','error!');
      }
     
    }
   /* public function destroy(Candidat $candidat){
      $candidat->delete();
      return redirect()->route('viewCandidat.create')
      ->with('success','la suppression est effctuée!');
    }*/

//------------------------------------ajouter reservation-----------------------------------------//
    public function createReservation(Request $request){
      $table=new Reservation();
  
    $request->validate([
      'cinRes'=>'required',
      'prix'=>'required',
      'date' =>'required',
      'periode'=>'required',
      'typePermis'=>'required',
    ]);

    $query=$table::insert([
        'cin_candidat'=>$request->cinRes,
        'date_reservation' =>$request->date,
      'montant_payee'=>$request->prix,
      'reste'=>$request->prix,
     
      'heures_etudes'=>$request->periode,
      'reste_heures'=>$request->periode,
      'typePermis'=>$request->typePermis
    ]);
  
   if($query )
    {
      return redirect()->route('candidatlist')
      ->with('success','data has been successfuly inserted !');
    }
    else {
      return redirect()->route('candidatlist')
      ->with('fail','error!');
    }
   
  }

}
