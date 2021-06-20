<?php

namespace App\Http\Controllers;
use App\Models\Candidat;
use App\Models\Document;
use App\Models\Reservation;
use Illuminate\Http\Request;

class updateCandidat extends Controller
{
  //--------------------------------------afficher details----------------------------------------//
    public function detailsCandidat($cin){
        $dataCandidat= Candidat::get()->where('cin_candidat',$cin)->first();
        $dataReservation=Reservation::get()->where('cin_candidat',$cin);
        $dataDocument=Document::get()->where('cin_candidat',$cin)->last();
        $dataDocumentPhoto=Document::get()->where('cin_candidat',$cin)->last();
      
      return view('viewCandidat.details',compact('dataCandidat','dataReservation','dataDocument','dataDocumentPhoto','cin'));
      }
//-----------------------------------------form de modification------------------------------------//
      public function formupdate($cin){

        $dataCandidatUpdate= Candidat::get()->where('cin_candidat',$cin)->first();
        $dataReservationUpdate=Reservation::get()->where('cin_candidat',$cin);
        $dataDocUpdate=Document::get()->where('cin_candidat',$cin)->last();
        return view('viewCandidat.updateInfoCandidat',compact('dataCandidatUpdate','dataReservationUpdate','dataDocUpdate','cin'));
       }
//-----------------------------------------la modification  des informations-------------------------------//
       
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
          ->with('successUpdateI','data has been successfuly updated !');
        }
        else {
          return back()
          ->with('failUpdateI','error!');
        }
      }
  
//--------------------------------------modification des reservations------------------------------------------//
      public function updateReservation(Request $request){
  
        $table=new Reservation();
        $update = [
          'id_reservation'=>$request->idRes,
          'montant_payee' =>$request->prix,
          
          'reste'=>$request->prix,
          'date_reservation' =>	$request->date,
          'heures_etudes'=>$request->periode,
          'reste_heures'=>$request->periode,
          'typePermis'=>$request->type
        
      ];
   
      $query=$table->where('id_reservation',$request->idRes)->update($update);
      if($query )
      {
        return back()
        ->with('successUpdateR','data has been successfuly updated !');
      }
      else {
        return back()
        ->with('failUpdateR','error!');
      }
      
  }
  //---------------------------------------UPDATE DOCUMMENT---------------------------------------//

     public function updateDoc(Request $request)
     {
       $table=new Document();

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

      $cin=$request->cin;

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
       $update= [
        'id_dossier'=>$request->id,
         'photo'=>$image_name,
       
       ] ;
       $query=$table->where('id_dossier',$request->id)->update($update);
     }
     if($hascarteRecto){ 
       $carteRecto->move($location,$carteRecto_name);
       $update= [
        'id_dossier'=>$request->id,
      
        'carte_recto'=>$carteRecto_name,
        
       ] ;
       $query=$table->where('id_dossier',$request->id)->update($update);
     }
     if($hascarteVerso){
      
        $carteVerso->move($location,$carteVerso_name);
        $update= [
          'id_dossier'=>$request->id,
          
          'carte_verso'=>$carteVerso_name,
         
         ] ;
         $query=$table->where('id_dossier',$request->id)->update($update);
      }
      if($hascertificatMed){
      
          $certificatMed->move($location,$certificatMed_name);
          $update= [
            'id_dossier'=>$request->id,
            
             'certificat_medical'=>$certificatMed_name,
          
           ] ;
           $query=$table->where('id_dossier',$request->id)->update($update);
       }
       if($haspermis){
      
        $permis->move($location,$permis_name);
        $update= [
          'id_dossier'=>$request->id,
          
           'permis'=>$permis_name
           
         ] ;
         $query=$table->where('id_dossier',$request->id)->update($update);
      }
      if($hasrecuPayer){
      
        $recuPayer->move($location,$recuPayer_name);
        $update= [
          'id_dossier'=>$request->id,
          
           'recu_paiement'=>$recuPayer_name
     
         ] ;
         $query=$table->where('id_dossier',$request->id)->update($update);
      }
      if($hasdemmande){
      
        $demmande->move($location,$demmande_name);
        $update= [
          'id_dossier'=>$request->id,
          
       'demmande_etablit'=>$demmande_name
      
         ] ;
         $query=$table->where('id_dossier',$request->id)->update($update);
      }
      if($hasattestationFin){
      
        $attestationFin->move($location,$attestationFin_name);
        $update= [
          'id_dossier'=>$request->id,
          
          'attestation_fin_formation'=>$attestationFin_name 
         ] ;
         $query=$table->where('id_dossier',$request->id)->update($update);
        }

     
    /*  $update= [
       'id_dossier'=>$request->id,
        'photo'=>$image_name,
       'carte_recto'=>$carteRecto_name,
       'carte_verso'=>$carteVerso_name,
        'certificat_medical'=>$certificatMed_name,
        'permis'=>$permis_name,
        'recu_paiement'=>$recuPayer_name,
    'demmande_etablit'=>$demmande_name,
       'attestation_fin_formation'=>$attestationFin_name 
      ] ;
      $query=$table->where('id_dossier',$request->id)->update($update);

 */
   
     if($query)
      {
        return back()->with('successUpdateD','data has been successfuly updated !');
      }
      else {
        return back()->with('failUpdateD','error!');
      }
     
        
    }
}