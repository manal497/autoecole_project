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

<form class="row g-3" method="POST" action="{{route('updateInfoCandidat')}}"> 
  {{ method_field('PUT')}}
  @csrf
  
    <input type="text" hidden class="col-sm-9 form-control" id ="idAdd" name ="idAdd" value="" />
    <div class="container">
       
           
        <div class="col-12 ">
            <label for="cin" class=" col-sm-1 col-form-label"><h5>CIN</h5></label>
           
            <input type="text" name="cin" id="cin" placeholder="C123456" class="form-control " value="{{$cin}} " required>
            <span style="color:red;">@error ('cin') {{$message}} @enderror</span>
        </div>
       <div class="row">
         <div class="col-md-6">
            <label for="nom" class=" col-sm-1 col-form-label"><h5>Nom</h5></label>
            
            <input type="text" name="nom" id="nom"  placeholder="Entrer le nom" class="form-control" value="{{$dataCandidatUpdate->nom}}" required>
           
          </div>
          <div class="col-md-6">
            <label for="prenom" class="col-sm-1 col-form-label"><h5>Prénom</h5></label>
      
            <input type="text" name="prenom" id="prenom"  placeholder="Entrer le prénom" class="form-control" value="{{$dataCandidatUpdate->prenom}}" class=" form-control" required>
            <span style="color:red;">@error ('prenom') {{$message}} @enderror</span>
           
          </div>
        </div>
        <div class=" row">
            <div class="col-md-6">
                <label for="dateNais" class="control-label  col-form-label"><h5>Date naissance</h5></label>
         
                <input type="date" name="dateNais" id="dateNais" class="form-control" placeholder="Entrer la date de naissance" value="{{$dataCandidatUpdate->date_naissance}}" required>
                <span style="color:red;">@error ('nom') {{$message}} @enderror</span>
            </div>
       
            <div class="col-md-6">
              <label for="lieuNais" class="control-label  col-form-label"><h5>Lieu naissance</h5></label>
            
                <input type="text" name="lieuNais" id="lieuNais" class="form-control" value="{{$dataCandidatUpdate->lieu_naissance}}" placeholder="Entrer le lieu de naissance" required>
            </div>
        </div>
        <div class=" row">
          <div class="col-md-6">
            <fieldset class="row mb-3">
           <legend class="col-form-label col-sm-2  sexe"><h5>Sexe</h5></legend>
           <div class="col-sm-10">
             <div class="form-check form-check-inline radio">
               <input class="form-check-input" type="radio" name="sexe"  id="sexe" value="Homme"{{$dataCandidatUpdate->sexe  == "Homme" ? 'checked' : ''}}    @error('sexe')invalide!  @enderror>
               <label class="form-check-label" for="sexe">
               <h6>Homme</h6>
               </label>
             </div>
             <div class="form-check form-check-inline radio">
               <input class="form-check-input" type="radio" name="sexe" id="sexe"  value="Femme"{{$dataCandidatUpdate->sexe == "Femme" ? 'checked' : ''}}  @error('sexe')invalide!  @enderror>
               <label class="form-check-label" for="sexe">
                <h6> Femme </h6>
               </label>
             </div>
             
            </div>
            </fieldset>
           </div>
          
            <div class="col-md-6">
                <label for="tel" class="control-label  col-form-label"><h5>Téléphone</h5></label>
          
                <input type="tel" id="tel" name="tel" class="form-control" value="{{$dataCandidatUpdate->telephone}}" placeholder="Entrer le numéro du téléphone" required>
            </div>
        </div>
        <div class="col-12 ">
            <label for="adresse" class="control-label  col-form-label"><h5>Adresse</h5></label>
           
            <input type="textarea" name="adresse" id="adresse" class="form-control" value="{{$dataCandidatUpdate->adresse}}"  placeholder="Entrer l'adresse" required>
            @if ($errors->has('adresse'))
                <span style="color:red;">
                    <strong>{{$errors->first('name')}}</strong>
                </span>
            @endif
        </div>
       
      
       
        <div class="col-12 form-group" style="padding-bottom: 10px">
            <label for="typrpermis"  class="control-label  col-form-label"><h5> Type permis</h5></label>
            
            <select name="typepermis" class="form-control" value="{{$dataCandidatUpdate->type_permis}}">
              
                <option value="0">Faites votre choix</option>
                <option value="A"{{$dataCandidatUpdate->type_permis == "A" ? 'selected' : ''}}>A</option>
                <option value="A1"{{$dataCandidatUpdate->type_permis == "A1" ? 'selected' : ''}}>A1</option>
                <option value="B"{{$dataCandidatUpdate->type_permis == "B" ? 'selected' : ''}}>B</option>
                <option value="C"{{$dataCandidatUpdate->type_permis == "C" ? 'selected' : ''}}>C</option>
                <option value="D"{{$dataCandidatUpdate->type_permis == "D" ? 'selected' : ''}}>D</option>
                <option value="EB"{{$dataCandidatUpdate->type_permis == "EB" ? 'selected' : ''}}>EB</option>
                <option value="EC"{{$dataCandidatUpdate->type_permis == "EC" ? 'selected' : ''}}>EC</option>
                <option value="ED"{{$dataCandidatUpdate->type_permis == "ED" ? 'selected' : ''}}>ED</option>
            </select>
</div>
  </div>
                <div class="modal-footer">
                   
                    <button type="submit" id="update" name="update" class="btn btn-success  waves-light" onclick="errorMessage()">Modifier</button>
    
                </div>
</form>
</div><br>
</div><br>

<div class="col">
<div class="card" >
  <div class="card-body">
    <h4 class="card-title">Reservation</h4>


<table border='1' class="table table-striped table-hover">
  <tr>
    <td>#</td>
    <td>date</td>
    <td>Montant</td>
    <td>Reste</td>
    <td>Periode</td>
    <td>Editer</td>
  </tr>
  @foreach ($dataReservationUpdate as $row)
  <td>{{$row['id_reservation']}}</td>
  <td>{{$row['date_reservation']}}</td>
  <td>{{$row['montant_payee']}}</td>
  <td>{{$row['reste']}}</td>
  <td>{{$row['periode']}}</td>
  <td>
    <a class=" updateReservetions btn btn-success"  title="Modifier une réservation" style="color: rgb(233, 231, 238);" data-toggle="modal" data-idUpdate="'.$row->id_reservation.'" data-target="#updateReservation"><i class="fas fa-edit"></i></a>  
  </td>
</tr>
  @endforeach
</table>
</div>
</div>
</div>

<br>
<div class="col">
<div class="card"  >
  <div class="card-body table-responsive">
    <h4 class="card-title">Documments</h4>
      <table border='1' class="table table-striped ">
        <tr>
            <td>#</td>
            
            <td>Photo</td>
            <td>Carte_Recto</td>
            <td>Carte_Verso</td>
            <td>Certificat médical</td>
            <td>Permis</td>
            <td>Recu Paiement</td>
            <td>Demmande</td>
            <td>Attestation Fin</td>
            <td>Action</td>
        </tr>
        @foreach ($dataDocUpdate as $row)
           
        <tr>
        <td>{{$row['id_dossier']}}</td>
 
        <td><img src="{{asset('images/documents/'.$row['photo'])}}" style="height: :50px; width:70px"> </td>
        <td>{{$row['carte_recto']}}</td>
         
        
        <td><a>{{$row['carte_verso']}}</a></td>
        <td>{{$row['certificat_medical']}}</td>
        <td>{{$row['permis']}}</td>
       
        <td>{{$row['recu_paiement']}}</td>
        <td>{{$row['demmande_etablit']}}</td>
        <td>{{$row['attestation_fin_formation']}}</td>
        <td>
            <a class="nav-link candidatEdits btn btn-success"  title="modifier" style="color: brown;" data-toggle="modal" data-idUpdate="'.$row1->id_dossier.'" data-target="#DocUpdate"><i class="fas fa-edit"></i></a>
          
        </td>
        </tr>
    
        @endforeach
    </table>

</div>
</div></div></div>



<!-------------documments-->

<div class="modal fade" id="DocUpdate" tabindex="-1" role="dialog" style="z-index: 1050; display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header text-write">
                <h4 class="modal-title">Modification des données</h4>
          
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"><i class="fa " aria-hidden="true"></i></span>
                </button>
            </div>
            <div class="modal-body">
            
            <form action="{{route('updateDocCandidat')}}" method="POST" enctype="multipart/form-data" >
          {{ method_field('PUT')}}
                @csrf
                
                <input type="text" hidden class="col-sm-9 form-control" id ="idUpdate" name ="idUpdate" value="" />
                <div class="modal-body">
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">#</label>
                        <div class="col-sm-9">
                            <input type="text" id="id" name="id" class="form-control" value="" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">CIN</label>
                        <div class="col-sm-9">
                            <input type="text" id="cin" name="cin" class="form-control" value="" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="photo" class="col-sm-3 col-form-label">Photo</label>
                        <div class="col-sm-9">
                            <input type="file" name="photo" id="photo" class="form-control" >
                       
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="carteRecto" class="col-sm-3 col-form-label">Carte nationale recto</label>
                            <div class="col-sm-9">
                              <input type="file" name="carteRecto" id="carteRecto" class="form-control  custom-file-input" >
                            </div>
                        
                    </div>
                    <div class="form-group row">
                        <label for="carteVerso" class="col-sm-3 col-form-label">Carte nationale Verso</label>
                        <div class="col-sm-9">
                            <input type="file" name="carteVerso" id="carteVerso" class="form-control  custom-file-input">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="certificatMed" class="col-sm-3 col-form-label">Certificat médical</label>
                        <div class="col-sm-9">
                            <input type="file" name="certificatMed" id="certificatMed" class="form-control  custom-file-input">
                   
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="permis" class="col-sm-3 col-form-label">Permis</label>
                        <div class="col-sm-9">
                            <input type="file" name="permis" id="permis" class="form-control  custom-file-input">
                        
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="recuPayer" class="col-sm-3 col-form-label">Recu paiement</label>
                        <div class="col-sm-9">
                           
                            <input type="file" name="recuPayer" id="recuPayer" class="form-control  custom-file-input">
                          
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="demmande" class="col-sm-3 col-form-label">Demmande</label>
                        <div class="col-sm-9">
                            <input type="file" name="demmande" id="demmande" class="form-control  custom-file-input">
                       
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="attestationFin" class="col-sm-3 col-form-label">Attestation fin de formation</label>
                        <div class="col-sm-9">
                      
                           <input type="file" name="attestationFin" id="attestationFin" class="form-control  custom-file-input">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                   
                    <button type="submit" id="update" name="update" class="btn btn-success  waves-light" onclick="errorMessage()">Modifier</button>
                    <button type="submit" class="btn btn-danger" data-dismiss="modal" aria-label="Close"> Fermer</button>
                </div>
            </form><!-- form delete end -->
        </div>
    </div>

</div>

<script>
// select edit user


$(document).ready(function(){
$('.candidatEdits').on('click', function(){
$('#DocUpdate').modal('show');
$tr=$(this).closest('tr');
var data=$tr.children("td").map(function(){
return $(this).text();
}).get();
console.log(data); 
$('#id').val(data[0]);
$('#cin').val(data[1]);
$('#photo').val(data[2]);
$('#carteRecto').val(data[3]);
$('#carteVerso').val(data[4]);
$('#certificatMed').val(data[5]);
$('#permis').val(data[6]);
$('#recuPayer').val(data[7]);
$('#demmande').val(data[8]);
$('#attestationFin').val(data[9]);
})
})
</script>



<script>
  
    $(document).ready(function(){
    $('.updateReservetions').on('click', function(){
    $('#updateReservation').modal('show');
    $tr=$(this).closest('tr');
    var data=$tr.children("td").map(function(){
    return $(this).text();
    }).get();
    console.log(data); 
  
   $('#id').val(data[0]);
   $('#prix').val(data[2]);
   $('#date').val(data[1]);
   $('#periode').val(data[4]);
    $('#reste').val(data[3]);
    })
    })
    </script>

@endsection