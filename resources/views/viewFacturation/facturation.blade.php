@extends('layout.layoutGestionCandidat')
@section('contentCandidat')
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


@if(Session::get('successDelete'))
<div>  
    {{ Session::get('successDelete')}}
</div>
@endif
@if(Session::get('failDelete'))
<div>  
    {{ Session::get('failDelete')}}
</div>
@endif
   <div class="container">
<div>
    <h4>Liste Vehicules</h4>
    <label></label>
   
</div>
<div>
 
    <input type="text" id="myInput" name="myInput" placeholder="Rechercher..." class="form-control">
</div><br><br>
<div class="d-grid gap-2 d-md-flex justify-content-md-end">

    <a class=" ajoutFact btn btn-primary me-md-2"  title="Ajouter une facturation" style="color: rgb(233, 231, 238);" data-toggle="modal"  data-target="#addFact"><i class="fas fa-plus" style="margin-right:10px;"></i>Ajouter</a><br>
    <a href="{{route('listRes')}}" class=" btn btn-primary me-md-2"  title="Revenir à la liste des candidats" style="color: rgb(233, 231, 238);" ><i class="fas fa-angle-left" style="margin-right:10px;"></i>Retour</a>
               
   </div><br>
<div>
    <table border='1' class="table table-striped">
        <thead >
        <tr>
            <td><h5>#</h5></td>
            <td><h5>Montant à payer</h5></td>
            <td><h5>Date du paiement</h5></td>
          
          
            <td><h5>Action</h5></td>
        </tr>
        </thead>
        <tbody id="myTable">
        @foreach ($dataAdd as $row)
           
        <tr>
        <td>{{$row['id_fact']}}</td>
   
        <td>{{$row['montant_paye']}}</td>
        <td>{{$row['date_fact']}}</td>

       
        <td>
            <div class="gap-2 d-md-flex ">
            
             <a href="RecuDownload/{{$row['id_fact']}}" class="btn btn-danger" style="color: rgb(233, 231, 238);" >Télécharger</a>
             <a   class="updateFacturation btn btn-primary" style="color: rgb(233, 231, 238);" role="button"  data-bs-toggle="modal" data-bs-target="#updateFact" >Modifier</a>
           <!--  <a class="addFACT btn btn-success"  title="Ajouter une facturation" style="color: rgb(233, 231, 238);" data-toggle="modal" data-idUpdate="'.$row->id_facturation.'" data-target="#addFact">Ajouter</a>
           -->
            </div>
        </td>
        </tr>
    
        @endforeach
        </tbody>
    </table>
</div>
</div>>
<!-- ---------------------------------------------------ajouter facturation--------------------------------------->

<div class="modal fade" id="addFact" tabindex="-1" role="dialog" style="z-index: 1050; display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header text-write">
                <h4 class="modal-title">Ajouter une facturation</h4>
          
               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"> <i class="fas fa-times" aria-hidden="true"></i></span>
                </button>
            </div>
            <form action="{{route('ajoutFacturation')}}" method="POST" >
   
                @csrf
                
                <input type="text" hidden class="col-sm-9 form-control" id ="idUpdate" name ="idUpdate" value="" />
                <div class="modal-body">
                   
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Numéro d'inscription </label>
                        <div class="col-sm-9">
                  
                            <input type="number" id="num" name="num" class="form-control" value="{{$id}}" readonly/>
                        </div>
                    </div>
                    
                    <div class="form-group row">
                        <label for="prix" class="col-sm-3 col-form-label">Montant à payer</label>
                        <div class="col-sm-9">
                            <input type="number" name="prix" id="prix" class="form-control" required>
                       
                        </div>
                    </div>
                
                    <div class="form-group row">
                        <label for="date" class="col-sm-3 col-form-label">Date du paiement</label>
                            <div class="col-sm-9">
                              <input type="text" name="date" id="date" class="form-control  custom-file-input"  readonly>
                            </div>
                        
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

<!-- ---------------------------------------------------  modifier facturation   --------------------------------------->

<div class="modal fade" id="updateFact" tabindex="-1"  role="dialog" style="z-index: 1050; display: none;" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header text-write">
                <h4 class="modal-title">Modifier une facturation</h4>
          
               <button  class="close" data-bs-target="#updateFact" data-bs-toggle="modal" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">    <i class="fas fa-times" aria-hidden="true"></i></span>
                </button>
            </div>
            <form action="{{route('updateFacturations')}}" method="POST" >
              {{ method_field('PUT')}}
                @csrf
                  
                <input type="text" hidden class="col-sm-9 form-control" id ="idUpdate" name ="idUpdate" value="" />
                <div class="modal-body">
                   
                    
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">#</label>
                        <div class="col-sm-9">
                  
                            <input type="number" id="numF" name="numF" class="form-control"  readonly/>
                        </div>
                    </div>
                     
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">Montant</label>
                        <div class="col-sm-9">
                  
                            <input type="number" id="prixF" name="prixF" class="form-control"  required />
                        </div>
                    </div>
                    
                    
                
                    <div class="form-group row">
                        <label for="date" class="col-sm-3 col-form-label">Date du paiement</label>
                            <div class="col-sm-9">
                              <input type="text" name="dateU" id="dateU" class="form-control  custom-file-input"   readonly>
                            </div>
                    </div>
                    
                </div>
                <div class="modal-footer">
                   
    
                    <button type="submit" id="add" name="add" class="btn btn-success  waves-light" onclick="errorMessage()">Modifier</button>
                    <button type="button" class="btn btn-danger" class="close" data-bs-target="#updateFact" data-bs-toggle="modal" data-bs-dismiss="modal" aria-label="Close">Fermer</button>
                </div>
            </form>
        </div>
    </div>

</div>
<script>
    // select edit user
    
    
    $(document).ready(function(){
    $('.updateFacturation').on('click', function(){
    $('#updateFact').modal('show');
    $tr=$(this).closest('tr');
    var data=$tr.children("td").map(function(){
    return $(this).text();
    }).get();
    console.log(data); 
    $('#numF').val(data[0]);
    $('#prixF').val(data[1]);
   
    })
    })
    </script>
    <script>
        var today = new Date();
        var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
        document.getElementById("date").value = date;
      </script>

<script>
    var today = new Date();
    var date = today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
    document.getElementById("dateU").value = date;
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
