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
        <a href="{{route('listeMoniteurs')}}" class=" btn btn-primary me-md-2"  title="Revenir à la liste des moniteurs" style="color: rgb(233, 231, 238);" ><i class="fas fa-angle-left" style="margin-right:10px;"></i>Retour</a>
                   
       </div><br>
    <div class="card" >
      <div class="card-body">
        <h4 class="card-title">Informations personnelles</h4>
    
    <form class="row g-3" method="POST" action="{{route('updateMoniteur')}}"> 
      {{ method_field('PUT')}}
      @csrf
      
        <input type="text" hidden class="col-sm-9 form-control" id ="idAdd" name ="idAdd" value="" />
        <div class="container">
           
            <div class="row">
                <div class="col-md-6">
                    <label for="cin" class=" col-sm-1 col-form-label"><h5>#</h5></label>
                   
                    <input type="text" name="id" id="id" placeholder="C123456" class="form-control " value="{{$id}} " required>
                    <span style="color:red;">@error ('id') {{$message}} @enderror</span>
                </div>
            <div class="col-md-6">
                <label for="cin" class=" col-sm-1 col-form-label"><h5>CIN</h5></label>
               
                <input type="text" name="cin" id="cin" placeholder="C123456" class="form-control " value="{{$data->cin_moniteur}}" required>
                <span style="color:red;">@error ('cin') {{$message}} @enderror</span>
            </div>
            
        </div>
           <div class="row">
             <div class="col-md-6">
                <label for="nom" class=" col-sm-1 col-form-label"><h5>Nom</h5></label>
                
                <input type="text" name="nom" id="nom"  placeholder="Entrer le nom" class="form-control" value="{{$data->nom}}" required>
               
              </div>
              <div class="col-md-6">
                <label for="prenom" class="control-label col-form-label"><h5>Prénom</h5></label>
          
                <input type="text" name="prenom" id="prenom"  placeholder="Entrer le prénom" class="form-control" value="{{$data->prenom}}" class=" form-control" required>
                <span style="color:red;">@error ('prenom') {{$message}} @enderror</span>
               
              </div>
            </div>
            <div class=" row">
                <div class="col-md-6">
                    <label for="dateNais" class="control-label  col-form-label"><h5>Date naissance</h5></label>
             
                    <input type="date" name="dateNais" id="dateNais" class="form-control" placeholder="Entrer la date de naissance" value="{{$data->date_naissance}}" required>
                    <span style="color:red;">@error ('nom') {{$message}} @enderror</span>
                </div>
           
                <div class="col-md-6">
                  <label for="lieuNais" class="control-label  col-form-label"><h5>Lieu naissance</h5></label>
                
                    <input type="text" name="lieuNais" id="lieuNais" class="form-control" value="{{$data->lieu_naissance}}" placeholder="Entrer le lieu de naissance" required>
                </div>
            </div>
            <div class=" row">
              <div class="col-md-6">
                <fieldset class="row mb-3">
               <legend class="col-form-label col-sm-2  sexe"><h5>Sexe</h5></legend>
               <div class="col-sm-10">
                 <div class="form-check form-check-inline radio">
                   <input class="form-check-input" type="radio" name="sexe"  id="sexe" value="Homme"{{$data->sexe  == "Homme" ? 'checked' : ''}}    @error('sexe')invalide!  @enderror>
                   <label class="form-check-label" for="sexe">
                   <h6>Homme</h6>
                   </label>
                 </div>
                 <div class="form-check form-check-inline radio">
                   <input class="form-check-input" type="radio" name="sexe" id="sexe"  value="Femme"{{$data->sexe == "Femme" ? 'checked' : ''}}  @error('sexe')invalide!  @enderror>
                   <label class="form-check-label" for="sexe">
                    <h6> Femme </h6>
                   </label>
                 </div>
                 
                </div>
                </fieldset>
               </div>
              
                <div class="col-md-6">
                    <label for="tel" class="control-label  col-form-label"><h5>Téléphone</h5></label>
              
                    <input type="tel" id="tel" name="tel" class="form-control" value="{{$data->telephone}}" placeholder="Entrer le numéro du téléphone" required>
                </div>
            </div>
            <div class="col-12 ">
                <label for="adresse" class="control-label  col-form-label"><h5>Adresse</h5></label>
               
                <input type="textarea" name="adresse" id="adresse" class="form-control" value="{{$data->adresse}}"  placeholder="Entrer l'adresse" required>
                @if ($errors->has('adresse'))
                    <span style="color:red;">
                        <strong>{{$errors->first('name')}}</strong>
                    </span>
                @endif
            </div>
         
            <div class="row">
            <div class="col-md-6 form-group" style="padding-bottom: 10px">
                <label for="typeMoniteur"  class="control-label  col-form-label"><h5> Type moniteur</h5></label>
                
                <select name="typeMoniteur" id="typeMoniteur" class="form-control" value="{{$data->type_moniteur}}">
                  
                    <option value="0">Faites votre choix</option>
                    <option value="Théorique"{{$data->type_moniteur == "Théorique" ? 'selected' : ''}}>Théorique</option>
                    <option value="Pratique"{{$data->type_moniteur == "Pratique" ? 'selected' : ''}}>Pratique</option>
                  
                </select>
            </div>
            <div class="col-md-6 form-group">
                    <label for="numPermis" class="control-label  col-form-label"><h5>Numero permis</h5></label>
                  
                    <input type="text" id="numPermis" name="numPermis" class="form-control" placeholder="DC7962" value="{{$data->numero_permis}}" required>
               
                </div>
            </div>
                    <div class="modal-footer">
                       
                        <button type="submit" id="update" name="update" class="btn btn-success  waves-light" onclick="errorMessage()">Modifier</button>
        
                    </div>
    </form>
    </div><br>
    </div><br>
    @endsection