@extends('layout.layoutGestionCandidat')
@section('contentCandidat')


<div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header text-write">
            <h4 class="modal-title">Ajouter un moniteur</h4>
      
      
        </div>

        <form action="{{route('ajoutMoniteur')}}" method="POST" class="row g-3 container needs-validation">

            @csrf
             
            <input type="text" hidden class="col-sm-9 form-control" id ="idAdd" name ="idAdd" value="" />
            <div class="modal-body container">
               
           
                    <h4>Informations personnelles</h4>
                   
                <div class="col-12 ">
                    <label for="cin" class=" col-sm-1 col-form-label"><h5>CIN</h5></label>
                   
                    <input type="text" name="cin" id="cin" placeholder="C123456" class="form-control " required>
                    <span style="color:red;">@error ('cin') {{$message}} @enderror</span>
                </div>
               <div class="row">
                 <div class="col-md-6">
                    <label for="nom" class=" col-sm-1 col-form-label"><h5>Nom</h5></label>
                    
                    <input type="text" name="nom" id="nom" placeholder="Entrer le nom" class="form-control" required>
                   
                  </div>
                  <div class="col-md-6">
                    <label for="prenom" class="col-sm-1 col-form-label"><h5>Prénom</h5></label>
              
                    <input type="text" name="prenom" id="prenom" placeholder="Entrer le prénom" class=" form-control" required>
                    <span style="color:red;">@error ('prenom') {{$message}} @enderror</span>
                   
                  </div>
                </div>
                <div class=" row">
                    <div class="col-md-6">
                        <label for="dateNais" class="control-label  col-form-label"><h5>Date naissance</h5></label>
                 
                        <input type="date" name="dateNais" id="dateNais" class="form-control" placeholder="Entrer la date de naissance" >
                        <span style="color:red;">@error ('nom') {{$message}} @enderror</span>
                    </div>
               
                    <div class="col-md-6">
                      <label for="lieuNais" class="control-label  col-form-label"><h5>Lieu naissance</h5></label>
                    
                        <input type="text" name="lieuNais" id="lieuNais" class="form-control" placeholder="Entrer le lieu de naissance" >
                    </div>
                </div>
                <div class=" row">
                   <div class="col-md-6">
                     <fieldset class="row mb-3">
                    <legend class="col-form-label col-sm-2  sexe"><h5>Sexe</h5></legend>
                    <div class="col-sm-10">
                      <div class="form-check form-check-inline radio">
                        <input class="form-check-input" type="radio" name="sexe" id="sexe" value="Homme"    @error('sexe')invalide!  @enderror>
                        <label class="form-check-label" for="sexe">
                          Homme
                        </label>
                      </div>
                      <div class="form-check form-check-inline radio">
                        <input class="form-check-input" type="radio" name="sexe" id="sexe" value="Femme"    @error('sexe')invalide!  @enderror>
                        <label class="form-check-label" for="sexe">
                          Femme
                        </label>
                      </div>
                      
                     </div>
                     </fieldset>
                    </div>
                    
                    <div class="col-md-6">
                        <label for="tel" class="control-label  col-form-label"><h5>Téléphone</h5></label>
                  
                        <input type="tel" id="tel" name="tel" class="form-control" placeholder="Entrer le numéro du téléphone" required>
                    </div>
                </div>
                <div class="col-12 ">
                    <label for="adresse" class="control-label  col-form-label"><h5>Adresse</h5></label>
                   
                    <input type="textarea" name="adresse" id="adresse" class="form-control"  placeholder="Entrer l'adresse" required>
                    @if ($errors->has('adresse'))
                        <span style="color:red;">
                            <strong>{{$errors->first('name')}}</strong>
                        </span>
                    @endif
                </div>
               
              
                <div class=" row">
                <div class="col-md-6 form-group">
                    <label for="typeMoniteur" class="control-label  col-form-label"><h5>Type moniteur</h5></label>
                    
                    <select name="typeMoniteur" class="form-control">
                      
                        <option value="0">Faites votre choix</option>
                        <option value="Théorique">Théorique</option>
                        <option value="Pratique">Pratique</option>
                       
                    </select>
                </div>
                <div class="col-md-6 form-group">
                    <label for="tel" class="control-label  col-form-label"><h5>Numero permis</h5></label>
                  
                    <input type="text" id="numPermis" name="numPermis" class="form-control" placeholder="DC7962" required>
               
                </div>
                 </div>
                   <!-- <input type="text" name="typepermis" id="typepermis" placeholder="Selectionner le le type du permis">
                   -->
                
               
                 <button type="submit" id="add" name="add" class="btn btn-success  waves-light" onclick="errorMessage()">Ajouter</button>
            
        </form>
    </div>
</div>


@endsection