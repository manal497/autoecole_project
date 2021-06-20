@extends('layout.layoutGestionCandidat')
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
    <a href="{{ route('vehicules.index')}}" class=" btn btn-primary me-md-2"  title="Revenir à la liste des candidats" style="color: rgb(233, 231, 238);" ><i class="fas fa-angle-left" style="margin-right:10px;"></i>Rotour</a>
               
   </div><br>
<div class="card" >
  <div class="card-body">

<form class="row g-3" method="POST" action="{{ route('vehicules.update',$vehicule->id) }}"> 
  {{ method_field('PUT')}}
  @csrf
  
    <input type="text" hidden class="col-sm-9 form-control" id ="idAdd" name ="idAdd" value="" />
    <div class="container">
                    
                
                        
                     <div class="col-12 ">
                         <label for="matricule" class=" col-sm-1 col-form-label"><h5>Matricule</h5></label>
                        
                         <input type="text" name="matricule" id="matricule"  class="form-control " value="{{$vehicule->matricule}}" required>
                     </div>
                    <div class="row">
                      
                                        
                      <div class="col-md-6">
                           <label for="marque" class="control-label  col-form-label"><h5>Marque</h5></label>
                         
                           <input type="text" name="marque" id="marque"  class="form-control " value="{{$vehicule->marque}}" required>
                     </div>
                     <div class="col-md-6">
                           <label for="type_véhicule" class="control-label  col-form-label"><h5>Type Véhicule</h5></label>
                         
                           <input type="text" name="type_véhicule" id="type_véhicule" class="form-control" value="{{$vehicule->type_véhicule}}"  required>
                     </div>
                        
                      
 
                     </div>
                     
                     <div class="col-12 form-group">
                        <label for="etat" class="control-label  col-form-label"><h5>Etat</h5></label>
                        
                        <select name="etat" class="form-control" value="{{$vehicule->etat}}">
                          
                            <option value="0">Faites votre choix</option>
                            <option value="interne">interne</option>
                            <option value="externe">externe</option>
                        </select>
                    </div>
                   
                    
                   
                    
                     

                     <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                      <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
</form>
@endsection