<?php

namespace App\Http\Controllers;

use App\Models\Candidat;
use App\Models\Document;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CandidatController extends Controller
{
  
    public function select(){
        $table=new Candidat();
    
        $data= Candidat::join('documents','documents.cin_candidat','=','candidats.cin_candidat')
      ->get(['candidats.cin_candidat','candidats.nom','candidats.prenom','candidats.type_permis','documents.photo']);
        
      return view('viewCandidat.create', compact('data'));


    }

   
    //---------------------------formupdate---------------------------------------------
  


   /* $photo=$request->hasFile('photo');
    $carteRecto=$request->hasFile('carteRecto');
    $carteVerso=$request->hasFile('carteVerso');
    $certificatMed=$request->hasFile('certificatMed');
    $permis=$request->hasFile('permis');
    $recuPayer=$request->hasFile('recuPayer');
    $demmande=$request->hasFile('demmande');
   
    $cin=$request->input('cin');

    $location='images/documents/';
$attestationFin=$request->File('attestationFin');
   /* $image_name='Photo_'.$cin.'.'.$photo->extension();
    $carteRecto_name='CarteRecto_'.$cin.'.'.$carteRecto->extension();
    $carteVerso_name='CarteVerso_'.$cin.'.'.$carteVerso->extension();
    $certificatMed_name='certificatMedical_'.$cin.'.'.$certificatMed->extension();
    $permis_name='Permis_'.$cin.'.'.$permis->extension();
    $recuPayer_name='RecuPayer_'.$cin.'.'.$recuPayer->extension();
    $demmande_name='Demmande_'.$cin.'.'.$demmande->extension();*/

 /*  $photo->move($location,$image_name);
    $carteRecto->move($location,$carteRecto_name);
    $carteVerso->move($location,$carteVerso_name);
    $certificatMed->move($location,$certificatMed_name);
    $permis->move($location,$permis_name);
    $recuPayer->move($location,$recuPayer_name);
    $demmande->move($location,$demmande_name);
    
    $attestationFin_name='AttestationFin_'.$cin;
    $attestationFin->move($location,$attestationFin_name);
    

    $updateDocument=[
    /*  'photo'=>$request->photo,
     'carte_recto'=>$request->carteRecto,
      'carte_verso'=>$request->carteVerso,
     'certificat_medical'=>$request->certificatMed,
      'permis'=>$request->permis,
      'recu_paiement'=>$request->recuPayer,
      'demmande_etablit'=>$request->demmande,
     'attestation_fin_formation'=>$request->attestationFin,
      'cin_candidat'=>$request->cin
     
    ];
    $query1=$document->where('cin_candidat',$cin)->update(['attestation_fin_formation'=>$request->attestationFin,'cin_candidat'=>$request->cin]);
  
    $updateCandidat = [
      'cin_candidat' 		      =>	$request->cin,
      'nom'      =>	$request->nom,
      'prenom' 	          =>	$request->prenom,
      'sexe' 	          =>	$request->sexe,
      'adresse' 	          =>	$request->adresse,
      'telephone'           =>	$request->tel,
      'date_naissance'    =>	$request->dateNais,
      'lieu_naissance'    =>	$request->lieuNais,
      'type_permis'    =>	$request->typepermis
  ];
  // return dd($updateStudent);
  
  
 

    }
    }*/



      public function create(Request $request){
        //$test= ->guessExtension();
        //dd($test);
        $photo=$request->hasFile('photo');
     $oh=$request->file('photo');
      $carteRecto=$request->hasFile('carteRecto');
      $carte=$request->file('carteRecto');
      $carteVerso=$request->file('carteVerso');
      $certificatMed=$request->file('certificatMed');
      $permis=$request->file('permis');
      $recuPayer=$request->file('recuPayer');
      $demmande=$request->file('demmande');
      $attestationFin=$request->file('attestationFin');
      $cin=$request->input('cin');

      $request->validate([
        
        'cin'=>'required',
        'nom' =>'required',
        'prenom'=>'required',
        'adresse'=>'required',
        'tel' =>'required',
       
      
        'sexe'=>'required',
        
     /*   'photo'=>'mimes:jpg,jpeg,png',
        'carteRecto' =>'mimes:pdf',
        'carteVerso'=>'mimes:pdf',
        'certificatMed'=>'mimes:pdf',
        'permis'=>'mimes:pdf',
        'recuPayer'=>'mimes:pdf',
        'demmande'=>'mimes:pdf',
        'attestationFin'=>'mimes:pdf',*/
      ] );
        $image_name='Photo_'.$cin;
      $location='images/documents/';
        $carteRecto_name='CarteRecto_'.$cin.'.pdf';
     
      $carteVerso_name='CarteVerso_'.$cin.'.pdf';
      $certificatMed_name='certificatMedical_'.$cin.'.pdf';
      $permis_name='Permis_'.$cin.'.pdf';
      $recuPayer_name='RecuPayer_'.$cin.'.pdf';
      $demmande_name='Demmande_'.$cin.'.pdf';
      $attestationFin_name='AttestationFin_'.$cin.'.pdf';
     if($photo){
      
     $oh->move($location,$image_name);
     }
     if($carteRecto){
      
 $carte->move($location,$carteRecto_name);
     }
    /*  $carteVerso->move($location,$carteVerso_name);
      $certificatMed->move($location,$certificatMed_name);
      $permis->move($location,$permis_name);
      $recuPayer->move($location,$recuPayer_name);
      $demmande->move($location,$demmande_name);
      $attestationFin->move($location,$attestationFin_name);*/

     
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
$documment=new Document();
      $documment->photo=$image_name;
     $documment->carte_recto=$carteRecto_name;
     $documment->carte_verso=$carteVerso_name;
     $documment->certificat_medical=$certificatMed_name;
     $documment->permis=$permis_name;
     $documment->recu_paiement=$recuPayer_name;
     $documment->demmande_etablit=$demmande_name;
     $documment->attestation_fin_formation=$attestationFin_name;
     $documment->cin_candidat=$request->input('cin');
     $documment->save();
 
   
     if($query && $documment )
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
