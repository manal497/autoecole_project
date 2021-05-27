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

@if(Session::get('successAddC'))
<div>  
    {{ Session::get('successAddC')}}
</div>
@endif
@if(Session::get('failAddC'))
<div>  
    {{ Session::get('failAddC')}}
</div>
@endif


@if(Session::get('successUpdate'))
<div>  
{{ Session::get('successUpdate')}}
</div>
@endif
@if(Session::get('failUpdate'))
<div>  
{{ Session::get('failUpdate')}}
</div>
@endif

<div class="card-header">
  <div class="row align-items-center">
      <div class="col-md-8">
          <h3 class="mb-0">Gestion des Candidats</h3>
      </div>
  </div>
</div><br>
  <div>
    <input type="text" id="myInput" name="myInput" placeholder="Rechercher..." class="form-control">
  </div><br><br>
   <div class="d-grid gap-2 d-md-flex justify-content-md-end">
    <a class=" AddCandidat btn btn-primary me-md-2"  title="Ajouter un candidat" style="color: rgb(233, 231, 238);" data-toggle="modal"  data-target="#addCandidat"><i class="fas fa-plus" style="margin-right:10px;"></i>Ajouter</a>
               
   </div><br>
       
    <div>
        <table border='1' class="table table-striped">
          <thead>
            <tr>
                <td>CIN</td>
                <td>Nom</td>
                <td>Prenom</td>
                <td>Type permis</td>
                <td>Photo</td>
                <td>Operations</td>
            </tr>
          </thead>
            <tbody id="myTable">
            @foreach ($data as $row)
               
            <tr>
            <td>{{$row['cin_candidat']}}</td>
            <td>{{$row['nom']}}</td>
            <td>{{$row['prenom']}}</td>
           
            <td>{{$row['type_permis']}}</td>
           
             <td><img src="{{asset('images/documents/'.$row['photo'])}}" style="height: :50px; width:70px" alt="pas de photo"> </td>
            <td>
                <div class="gap-2 d-md-flex ">
                
                 <a href="datailsCandidat/{{$row['cin_candidat']}}" class="btn btn-info" style="color: rgb(233, 231, 238);" role="button" title="Details"><i class="fas fa-file-alt"></i>  </a>
                 <a href="formulaireUpdate/{{$row['cin_candidat']}}"  class="btn btn-success" style="color: rgb(233, 231, 238);" role="button" title="Editer les informations"><i class="fas fa-edit"></i></a>
                 <a class=" addReservetion btn btn-secondary"  title="Ajouter une réservation" style="color: rgb(233, 231, 238);" data-toggle="modal" data-idUpdate="'.$row->cin_candidats.'" data-target="#addRes"><i class="fas fa-money-check-alt"></i></a>
                 <a  href="#" onclick="return confirm('Voulez vous supprimmer ce documment ?')" title="Supprimer" class="btn btn-danger" style="color: rgb(233, 231, 238);" ><i class="fas fa-trash"></i></a>
          
                </div>
            </td>
            </tr>

            @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-----------------------------------------ajouter reservation----------------------------------->

<div class="modal fade" id="addRes" tabindex="-1" role="dialog" style="z-index: 1050; display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header text-write">
                <h4 class="modal-title">Ajouter une résérvation</h4>
          
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="border: none;">
                  <i class="fas fa-times"></i>
              </button>
            </div>
            <form action="{{route('ajoutReservation')}}" method="POST" >
   
                @csrf
                
                <input type="text" hidden class="col-sm-9 form-control" id ="idUpdate" name ="idUpdate" value="" />
                <div class="modal-body">
                   
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">CIN</label>
                        <div class="col-sm-9">
                            <input type="text" id="cinRes" name="cinRes" class="form-control"  readonly/>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="prix" class="col-sm-3 col-form-label">Montant</label>
                        <div class="col-sm-9">
                            <input type="number" name="prix" id="prix" class="form-control" required>
                       
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="date" class="col-sm-3 col-form-label">Date Réservation</label>
                            <div class="col-sm-9">
                              <input type="date" name="date" id="date" class="form-control  custom-file-input" required>
                            </div>
                        
                    </div>
                    <div class="form-group row">
                        <label for="periode" class="col-sm-3 col-form-label">Heures totale</label>
                        <div class="col-sm-9">
                            <input type="text" name="periode" id="periode" class="form-control  custom-file-input" required>
                        </div>
                    </div>
                      <div class="row form-group">
                        <label for="typePermis" class="control-label  col-form-label"><h5>Type permis</h5></label>
                        
                        <select name="typePermis" class="form-control">
                          
                            <option value="0">Faites votre choix</option>
                            <option value="A">A</option>
                            <option value="A1">A1</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            <option value="EB">EB</option>
                            <option value="EC">EC</option>
                            <option value="ED">ED</option>
                        </select>
                    </div>
                   
                   
                </div>
                <div class="modal-footer">
                   
                    <button type="submit" id="add" name="add" class="btn btn-success  waves-light" onclick="errorMessage()">Ajouter</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close"> Fermer</button>
                </div>
            </form>
        </div>
    </div>

</div>

<!-- ----------------------------------------model pour ajouter un candidat-------------------------------------------->

<div class="modal fade" id="addCandidat" tabindex="-1" role="dialog" style="z-index: 1050; display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header text-write">
                <h4 class="modal-title">Ajouter un candidat</h4>
          
               <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="border: none;">
                    <i class="fas fa-times"></i>
                </button>
            </div>

           

            <form action="{{route('ajoutCandidat')}}" method="POST" class="row g-3 container needs-validation" enctype="multipart/form-data">
   
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
                     
                            <input type="date" name="dateNais" id="dateNais" class="form-control" placeholder="Entrer la date de naissance" required>
                            <span style="color:red;">@error ('nom') {{$message}} @enderror</span>
                        </div>
                   
                        <div class="col-md-6">
                          <label for="lieuNais" class="control-label  col-form-label"><h5>Lieu naissance</h5></label>
                        
                            <input type="text" name="lieuNais" id="lieuNais" class="form-control" placeholder="Entrer le lieu de naissance" required>
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
                   
                  
                   
                    <div class="col-12 form-group">
                        <label for="typrpermis" class="control-label  col-form-label"><h5>Type permis</h5></label>
                        
                        <select name="typepermis" class="form-control">
                          
                            <option value="0">Faites votre choix</option>
                            <option value="A">A</option>
                            <option value="A1">A1</option>
                            <option value="B">B</option>
                            <option value="C">C</option>
                            <option value="D">D</option>
                            <option value="EB">EB</option>
                            <option value="EC">EC</option>
                            <option value="ED">ED</option>
                        </select>
                    </div>
                       <!-- <input type="text" name="typepermis" id="typepermis" placeholder="Selectionner le le type du permis">
                       -->
                       <hr>
                       <h3>Documents </h3>
                       
                       <div class=" row">
                         <div class="col-md-6">
                           <div class="mb-3">
                             <label for="formFile" class="form-label"> <h5> Photo </h5> </label>
                             <input class="form-control" type="file" name="photo" id="photo" accept=".jpg,.jpeg,.png">
                           </div>
                         </div>
                       
                         <div class="col-md-6">
                           <div class="mb-3">
                             <label for="carteRecto" class="form-label"><h5>Demmande etablit</h5></label>
                         
                             <input class="form-control" type="file" name="demmande" id="demmande" accept=".pdf">
                         </div>
                     </div>
                   </div>
                 
                   <div class=" row">
                     <div class="col-md-6">
                       <div class="mb-3">
                         <label for="formFile" class="form-label"><h5>Carte nationale verso</h5></label>
                         <input class="form-control" type="file" name="carteVerso" id="carteVerso" accept=".pdf">
                       </div>
                     </div>
                   
                     <div class="col-md-6">
                       <div class="mb-3">
                         <label for="carteRecto" class="form-label"><h5>Carte nationale recto</h5></label>
                     
                         <input class="form-control" type="file" name="carteRecto" id="carteRecto" accept=".pdf">
                       </div>
                      </div>
                   </div>
                 
                 
                 <div class=" row">
                   <div class="col-md-6">
                     <div class="mb-3">
                       <label for="formFile" class="form-label"><h5>Permis</h5></label>
                       <input class="form-control" type="file" name="permis" id="permis" accept=".pdf">
                     </div>
                   </div>
                 
                   <div class="col-md-6">
                     <div class="mb-3">
                       <label for="carteRecto" class="form-label"><h5>Certificat médicale</h5></label>
                   
                       <input class="form-control" type="file" name="certificatMed" id="certificatMed" accept=".pdf">
                     </div>
                   </div>
                 </div>
                    
                 <div class=" row">
                   <div class="col-md-6">
                     <div class="mb-3">
                       <label for="formFile" class="form-label"><h5>Recu paiement</h5></label>
                       <input class="form-control" type="file" name="recuPayer" id="recuPayer" accept=".pdf">
                     </div>
                   </div>
                 
                   <div class="col-md-6">
                     <div class="mb-3">
                       <label for="carteRecto" class="form-label"> <h5> Attestation fin de formation </h5></label>
                   
                       <input class="form-control" type="file" name="attestationFin" id="attestationFin" accept=".pdf">
                     </div>
                   </div>
                 </div>
                   
                    
                 
                <div class="modal-footer">
                   
                    <button type="submit" id="add" name="add" class="btn btn-success  waves-light" title="Ajouter un candidat" onclick="errorMessage()">Ajouter</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal" aria-label="Close" title="Fermer"> Fermer</button>
                </div>
            </form>
        </div>
    </div>

</div>


<script>
    var form=document.querySelector('.needs-validation');
    form.addEventListener('submit',function(event){
        id(form.checkValidity()== false){
            event.preventDefault();
            event.stopPropagation();
        }
        form.classList.add('was-validated');
    })
</script>

<script>
  
    $(document).ready(function(){
    $('.addReservetion').on('click', function(){
    $('#addRes').modal('show');
    $tr=$(this).closest('tr');
    var data=$tr.children("td").map(function(){
    return $(this).text();
    }).get();
    console.log(data); 
   
    $('#cinRes').val(data[0]);
   
    })
    })
    </script>

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