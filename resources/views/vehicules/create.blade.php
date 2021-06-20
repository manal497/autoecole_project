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

<div class="row">

<div class="col-md-9">
    <input type="text" id="myInput" name="myInput" placeholder="Rechercher..." class="form-control" >
</div>
 
<div class="d-grid gap-2 d-md-flex justify-content-md-end col-md-3">
    <a class=" AddSection btn btn-primary me-md-2"  title="Ajouter une vheicule" style="color: rgb(233, 231, 238);" data-toggle="modal"  data-target="#addSection"><i class="fas fa-plus" style="margin-right:10px;"></i>Ajouter</a>           
</div>

</div>
<br>



       
    <div>
    <h4>Liste Vehicules</h4>

        <table border='1' class="table table-striped">

          <thead>
            <tr>
                <td>Matricule</td>
                <td>type Véhicule</td>
                <td>Marque</td>
                <td>Etat</td>
                <td>Operations</td>
            </tr>
          </thead>
            <tbody id="myTable">
            @foreach ($vehicules as $row)
               
            <tr>
            <td>{{$row['matricule']}}</td>
            <td>{{$row['type_véhicule']}}</td>
            <td>{{$row['marque']}}</td>
            <td>{{$row['etat']}}</td>
           
            
           
            <td>
                <div class="gap-2 d-md-flex ">
                
                 <!--<a href="datailsCandidat/{{$row['id']}}" class="btn btn-info" style="color: rgb(233, 231, 238);" role="button" title="Details"><i class="fas fa-file-alt"></i>  </a>-->
                 <a href="{{ route('vehicules.edit',$row->id) }}"  class="btn btn-success" style="color: rgb(233, 231, 238);" role="button" title="Editer les informations"><i class="fas fa-edit"></i></a>

                 <form action="{{ route('vehicules.destroy',$row->id) }}" method="POST">
                    @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger"><i class="fas fa-trash"></i></button>
                                    </form>          
                </div>          
                </div>
            </td>
            </tr>

            @endforeach
            </tbody>
        </table>
    </div>
</div>




<!-- ---------------------------------------- ajouter une vehicule-------------------------------------------->

<div class="modal fade" id="addSection" tabindex="-1" role="dialog" style="z-index: 1050; display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header text-write">
                <h4 class="modal-title">Ajouter vehicule</h4>
          
               <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="border: none;">
                    <i class="fas fa-times"></i>
                </button>
            </div>

           

            <form action="{{ route('vehicules.store') }}" method="POST" class="row g-3 container needs-validation" enctype="multipart/form-data">
   
                @csrf
                 
                <input type="text" hidden class="col-sm-9 form-control" id ="idAdd" name ="idAdd" value="" />
                <div class="modal-body container">
                   
               
                       
                    <div class="col-12 ">
                        <label for="cin" class=" col-sm-1 col-form-label"><h5>Matricule</h5></label>
                       
                        <input type="text" name="matricule" id="matricule"  class="form-control " required>
                        <span style="color:red;">@error ('matricule') {{$message}} @enderror</span>
                    </div>
                   <div class="row">
                     
                                       
                     <div class="col-md-6">
                          <label for="heure_debut" class="control-label  col-form-label"><h5>Marque</h5></label>
                        
                            <input type="text" name="marque" id="marque" class="form-control" required>
                    </div>
                    <div class="col-md-6">
                          <label for="type_véhicule" class="control-label  col-form-label"><h5>Type Véhicule</h5></label>
                        
                            <input type="text" name="type_véhicule" id="type_véhicule" class="form-control"  required>
                    </div>
                       
                     

                    </div>
                    
                   
                  
                   
                  
                   
                    <div class="col-12 form-group">
                        <label for="etat" class="control-label  col-form-label"><h5>Etat</h5></label>
                        
                        <select name="etat" class="form-control">
                          
                            <option value="0">Faites votre choix</option>
                            <option value="interne">interne</option>
                            <option value="externe">externe</option>
                        </select>
                    </div>
                      
                 
                   
                 
                 
                 
                    
                 
                 </div>
                   
                    
                 
                <div class="modal-footer">
                   
                    <button type="submit" id="add" name="add" class="btn btn-success  waves-light" title="Ajouter vehicule" onclick="errorMessage()">Ajouter</button>
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