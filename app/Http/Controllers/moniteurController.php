<?php

namespace App\Http\Controllers;
use App\Models\Moniteur;
use Illuminate\Http\Request;

class moniteurController extends Controller
{
    public function liste(){
      //  
    
        $data=Moniteur::get();
        
      return view('viewMoniteurs.listeMoniteurs', compact('data'));
    }
    public function addMoniteur(Request $request){
     
        $request->validate([
        
          'cin'=>'required',
          'nom' =>'required',
          'prenom'=>'required',
          'adresse'=>'required',
          'tel' =>'required',
         
          'typeMoniteur'=>'required',
          'numPermis'=>'required',
  
        ] );
  
        $query=Moniteur::insert([
          'cin_moniteur'=>$request->input('cin'),
          'nom' =>$request->input('nom'),
          'prenom'=>$request->input('prenom'),
          'adresse'=>$request->input('adresse'),
          'telephone' =>$request->input('tel'),
          'date_naissance'=>$request->input('dateNais'),
          'lieu_naissance'=>$request->input('lieuNais'),
          'type_moniteur'=>$request->input('typeMoniteur'),
          'numero_permis'=>$request->input('numPermis'),
          'sexe'=>$request->input('sexe'),

        ] );
    
       if($query)
        {
          return back()->with('successADDM','data has been successfuly inserted !');
        }
        else {
          return back()->with('failADDM','error!');
        }
       
      }
      public function formupdate($id){
       
          $data= Moniteur::get()->where('id',$id)->first();
        
          return view('viewMoniteurs.updateMoniteur',compact('data','id'));
         
      }
      
      public function updateMoniteur(Request $request){
        $table=new Moniteur();
        $update = [
          'id'=>$request->id,
          'cin_moniteur'=>$request->cin,
          'nom' =>$request->nom,
          'prenom'=>$request->prenom,
          'adresse'=>$request->adresse,
          'telephone' =>$request->tel,
          'date_naissance'=>$request->dateNais,
          'lieu_naissance'=>$request->lieuNais,
          'type_moniteur'=>$request->typeMoniteur,
          'numero_permis'=>$request->numPermis,
          'sexe'=>$request->sexe,
        
      ];
   
  

      $query=$table->where('id',$request->id)->update($update);
      if($query )
      {
        return back()
        ->with('successUpdateM','data has been successfuly updated !');
      }
      else {
        return back()
        ->with('failUpdateM','error!');
      }
      
      }
      public function details($id){
        $data=Moniteur::get()->where('id',$id)->first();
        return view('viewMoniteurs.detailsMoniteur',compact('data','id'));
        
      }
    
}
