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
    
    @if(Session::get('success'))
    <div>  
        {{ Session::get('success')}}
    </div>
    @endif
    @if(Session::get('fail'))
    <div>  
        {{ Session::get('fail')}}
    </div>
    @endif
    
    @if(Session::get('successAddM'))
    <div>  
        {{ Session::get('successAddM')}}
    </div>
    @endif
    @if(Session::get('failAddM'))
    <div>  
        {{ Session::get('failAddM')}}
    </div>
    @endif
    
    
    @if(Session::get('successUpdateM'))
    <div>  
    {{ Session::get('successUpdateM')}}
    </div>
    @endif
    @if(Session::get('failUpdateM'))
    <div>  
    {{ Session::get('failUpdateM')}}
    </div>
    @endif
<div class="container">
    <div class="card-header">
      <div class="row align-items-center">
          <div class="col-md-8">
              <h3 class="mb-0">Gestion des Moniteurs</h3>
          </div>
      </div>
    </div><br>
      
      <div>
        <input type="text" id="myInput" name="myInput" placeholder="Rechercher..." class="form-control">
      </div><br><br>
       <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class=" AddMoniteur btn btn-primary me-md-2"  title="Ajouter un moniteur" style="color: rgb(233, 231, 238);" data-toggle="modal"  data-target="#addMoniteur"><i class="fas fa-plus" style="margin-right:10px;"></i>Ajouter</a>
                   
       </div><br>
           
        <div class="container">
            <table border='1' class="table table-striped">
              <thead>
                <tr>
                    <td><h5>#</h5></td>
                    <td><h5>CIN</h5></td>
                    <td><h5>Nom</h5></td>
                    <td><h5>Prenom</h5></td>
                 
                    <td><h5>Numéro Permis</h5></td>
                    <td><h5>Type Du Moniteur</h5></td>
                    <td><h5>Téléphone</h5></td>
                    <td><h5>Operations</h5></td>
                </tr>
              </thead>
                <tbody id="myTable">
                @foreach ($data as $row)
                   
                <tr>
                <td>{{$row['id']}}</td>
                <td>{{$row['cin_moniteur']}}</td>
                <td>{{$row['nom']}}</td>
                <td>{{$row['prenom']}}</td>
          
                <td>{{$row['numero_permis']}}</td>
                <td>{{$row['type_moniteur']}}</td>
                 <td>{{$row['telephone']}}</td>
                <td>
                    <div class="gap-2 d-md-flex ">
                    
                     <a href="datailsMoniteur/{{$row['id']}}" class="btn btn-info" style="color: rgb(233, 231, 238);" role="button" title="Details"><i class="fas fa-file-alt"></i>  </a>
                     <a href="formulaireUpdateMoniteur/{{$row['id']}}"  class="btn btn-success" style="color: rgb(233, 231, 238);" role="button" title="Editer les informations"><i class="fas fa-edit"></i></a>
                   
                     <a  href="#" onclick="return confirm('Voulez vous supprimmer ce documment ?')" title="Supprimer" class="btn btn-danger" style="color: rgb(233, 231, 238);" ><i class="fas fa-trash"></i></a>
              
                    </div>
                </td>
                </tr>
    
                @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <div class="modal fade" id="addMoniteur" tabindex="-1" role="dialog" style="z-index: 1050; display: none;" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header text-write">
                    <h4 class="modal-title">Ajouter un candidat</h4>
              
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"> <i class="fas fa-times" aria-hidden="true" style="background-color:with;"></i></span>
                </button>
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
                        
                    <div class="modal-footer">
                       
                         <button type="submit" id="add" name="add" class="btn btn-success  waves-light" onclick="errorMessage()">Ajouter</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close"> Fermer</button>
                    </div>
                </form>
            </div>
        </div>
    
    </div>
    <script>
        $(document).ready(function(){
       $("#myInput").on("keyup",function(){
        var value = $(this).val().toLowerCase();
        $("#myTable tr").filter(function(){
       $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
    
        });
    
       });
    
        });
    </script>
    @endsection