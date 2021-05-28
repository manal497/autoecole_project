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

</div><br>
 
   <div class="d-grid gap-2 d-md-flex justify-content-md-end">
    <a class=" AddSection btn btn-primary me-md-2"  title="Ajouter une seance" style="color: rgb(233, 231, 238);" data-toggle="modal"  data-target="#addSection"><i class="fas fa-plus" style="margin-right:10px;"></i>Ajouter</a>           
   </div>
   <br>
       
    <div>
    <h4>Séance Théorique</h4>

        <table border='1' class="table table-striped">

          <thead>
            <tr>
                <td>Jour</td>
                <td>Date Debut</td>
                <td>Date Fin</td>
                <td>Operations</td>
            </tr>
          </thead>
            <tbody id="myTable">
            @foreach ($seancesa as $row)
               
            <tr>
            <td>{{$row['jour']}}</td>
            <td>{{$row['heure_debut']}}</td>
            <td>{{$row['heure_fin']}}</td>
           
            
           
            <td>
                <div class="gap-2 d-md-flex ">
                
                 <a href="datailsCandidat/{{$row['id']}}" class="btn btn-info" style="color: rgb(233, 231, 238);" role="button" title="Details"><i class="fas fa-file-alt"></i>  </a>
                 <a href="formulaireUpdate/{{$row['id']}}"  class="btn btn-success" style="color: rgb(233, 231, 238);" role="button" title="Editer les informations"><i class="fas fa-edit"></i></a>
                 <a  href="#" onclick="return confirm('Voulez vous supprimmer ce documment ?')" title="Supprimer" class="btn btn-danger" style="color: rgb(233, 231, 238);" ><i class="fas fa-trash"></i></a>
          
                </div>
            </td>
            </tr>

            @endforeach
            </tbody>
        </table>
    </div>
</div>


<div>
<h4>Séance Pratique</h4>

        <table border='1' class="table table-striped">
          <thead>
            <tr>
                <td>Jour</td>
                <td>Date Debut</td>
                <td>Date Fin</td>
                <td>Operations</td>
            </tr>
          </thead>
            <tbody id="myTable">
            @foreach ($seancesb as $row)
               
            <tr>
            <td>{{$row['jour']}}</td>
            <td>{{$row['heure_debut']}}</td>
            <td>{{$row['heure_fin']}}</td>
           
            
           
            <td>
                <div class="gap-2 d-md-flex ">
                
                 <a href="datailsCandidat/{{$row['id']}}" class="btn btn-info" style="color: rgb(233, 231, 238);" role="button" title="Details"><i class="fas fa-file-alt"></i>  </a>
                 <a href="formulaireUpdate/{{$row['id']}}"  class="btn btn-success" style="color: rgb(233, 231, 238);" role="button" title="Editer les informations"><i class="fas fa-edit"></i></a>
                 <a  href="#" onclick="return confirm('Voulez vous supprimmer ce documment ?')" title="Supprimer" class="btn btn-danger" style="color: rgb(233, 231, 238);" ><i class="fas fa-trash"></i></a>
          
                </div>
            </td>
            </tr>

            @endforeach
            </tbody>
        </table>
    </div>
</div>


<div>
<h4>Séance Pratique Supplémentaire</h4>

        <table border='1' class="table table-striped">
          <thead>
          
            <tr>
                <td>Jour</td>
                <td>Date Debut</td>
                <td>Date Fin</td>
                <td>Operations</td>
            </tr>
          </thead>
            <tbody id="myTable">
            @foreach ($seancesc as $row)
               
            <tr>
            <td>{{$row['jour']}}</td>
            <td>{{$row['heure_debut']}}</td>
            <td>{{$row['heure_fin']}}</td>
           
            
           
            <td>
                <div class="gap-2 d-md-flex ">
                
                 <a href="datailsCandidat/{{$row['id']}}" class="btn btn-info" style="color: rgb(233, 231, 238);" role="button" title="Details"><i class="fas fa-file-alt"></i>  </a>
                 <a href="formulaireUpdate/{{$row['id']}}"  class="btn btn-success" style="color: rgb(233, 231, 238);" role="button" title="Editer les informations"><i class="fas fa-edit"></i></a>
                 <a  href="#" onclick="return confirm('Voulez vous supprimmer ce documment ?')" title="Supprimer" class="btn btn-danger" style="color: rgb(233, 231, 238);" ><i class="fas fa-trash"></i></a>
          
                </div>
            </td>
            </tr>

            @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- ---------------------------------------- ajouter une Seance-------------------------------------------->

<div class="modal fade" id="addSection" tabindex="-1" role="dialog" style="z-index: 1050; display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header text-write">
                <h4 class="modal-title">Ajouter une seance</h4>
          
               <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="border: none;">
                    <i class="fas fa-times"></i>
                </button>
            </div>

           

            <form action="{{ route('seances.store') }}" method="POST" class="row g-3 container needs-validation" enctype="multipart/form-data">
   
                @csrf
                 
                <input type="text" hidden class="col-sm-9 form-control" id ="idAdd" name ="idAdd" value="" />
                <div class="modal-body container">
                   
               
                        <h4>Informations personnelles</h4>
                       
                    <div class="col-12 ">
                        <label for="cin" class=" col-sm-1 col-form-label"><h5>Jour</h5></label>
                       
                        <input type="date" name="jour" id="jour"  class="form-control " required>
                        <span style="color:red;">@error ('cin') {{$message}} @enderror</span>
                    </div>
                   <div class="row">
                     
                                       
                     <div class="col-md-6">
                          <label for="heure_debut" class="control-label  col-form-label"><h5>Heure Debut</h5></label>
                        
                            <input type="time" name="heure_debut" id="heure_debut" class="form-control" min="09:00" max="00:00" required>
                    </div>
                    <div class="col-md-6">
                          <label for="heure_fin" class="control-label  col-form-label"><h5>Heure Fin</h5></label>
                        
                            <input type="time" name="heure_fin" id="heure_fin" class="form-control" min="09:00" max="00:00" required>
                    </div>
                       
                     

                    </div>
                    <div class="row">
                     
                                       
                        <label for="id_moniteur" class="control-label  col-form-label"><h5>Moniteur</h5></label>
                        
                        <input type="hidden" name="id_moniteur" id="id_moniteur" class="form-control" value="1" required>
                

                    </div>
                   
                  
                   
                  
                   
                    <div class="col-12 form-group">
                        <label for="type_seance" class="control-label  col-form-label"><h5>Type seance</h5></label>
                        
                        <select name="type_seance" class="form-control">
                          
                            <option value="0">Faites votre choix</option>
                            <option value="séance_théorique">séance théorique</option>
                            <option value="séance_pratique">séance pratique</option>
                            <option value="séance_pratique_supplémentaire">séance pratique supplémentaire</option>
                        </select>
                    </div>
                      
                 
                   
                 
                 
                 
                    
                 
                 </div>
                   
                    
                 
                <div class="modal-footer">
                   
                    <button type="submit" id="add" name="add" class="btn btn-success  waves-light" title="Ajouter une seance" onclick="errorMessage()">Ajouter</button>
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