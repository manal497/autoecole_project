@extends('viewCandidat.layoutGestionCandidat')
@section('contentCandidat')

<style>

  .col-sm-9{
      margin-top: 5px;
       padding: 5px
  }
  .radio{
      margin-top: 30px;
       padding: 10px
  }
  
  </style>
<div class="container">



<h3>La modification des données</h3>
<div class="d-grid gap-2 d-md-flex justify-content-md-end">
    <a href="{{route('candidatlist')}}" class=" btn btn-primary me-md-2"  title="Revenir à la liste des candidats" style="color: rgb(233, 231, 238);" ><i class="fas fa-angle-left" style="margin-right:10px;"></i>Rotour</a>
               
   </div><br>
<div class="card" >
  <div class="card-body">
    <h4 class="card-title">Informations personnelles</h4>

<form class="row g-3" method="POST" action="{{ route('seances.update',$seance->id) }}"> 
  {{ method_field('PUT')}}
  @csrf
  
    <input type="text" hidden class="col-sm-9 form-control" id ="idAdd" name ="idAdd" value="" />
    <div class="container">
                    
                
                        
                     <div class="col-12 ">
                         <label for="cin" class=" col-sm-1 col-form-label"><h5>Jour</h5></label>
                        
                         <input type="date" name="jour" id="jour"  class="form-control " value="{{$seance->jour}}" required>
                         <span style="color:red;">@error ('cin') {{$message}} @enderror</span>
                     </div>
                    <div class="row">
                      
                                        
                      <div class="col-md-6">
                           <label for="heure_debut" class="control-label  col-form-label"><h5>Heure Debut</h5></label>
                         
                             <input type="time" name="heure_debut" id="heure_debut" value="{{$seance->heure_debut}}" class="form-control" min="09:00" max="00:00" required>
                     </div>
                     <div class="col-md-6">
                           <label for="heure_fin" class="control-label  col-form-label"><h5>Heure Fin</h5></label>
                         
                             <input type="time" name="heure_fin" id="heure_fin" value="{{$seance->heure_fin}}" class="form-control" min="09:00" max="00:00" required>
                     </div>
                        
                      
 
                     </div>
                     <div class="row">
                      
                                        
                         <label for="id_moniteur" class="control-label  col-form-label"><h5>Moniteur</h5></label>
                         
                         <input type="hidden" name="id_moniteur" id="id_moniteur"  class="form-control" value="1" required>
                 
 
                     </div>
                    
                   
                    
                   
                    
                     <div class="col-12 form-group">
                         <label for="type_seance" class="control-label   col-form-label"><h5>Type seance</h5></label>
                         
                         <select name="type_seance" class="form-control" value="{{$seance->type_seance}}">
                           
                             <option value="0">Faites votre choix</option>
                             <option value="séance_théorique">séance théorique</option>
                             <option value="séance_pratique">séance pratique</option>
                             <option value="séance_pratique_supplémentaire">séance pratique supplémentaire</option>
                         </select>
                     </div>

                     <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
</form>
@endsection