@extends('layout.layoutGestionCandidat')
@section('contentCandidat')
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

<div>
    <table border='1' class="table table-striped">
    <thead>
        <tr>
            <td><h5>#</h5></td>
            <td><h5>CIN</h5></td>
            <td><h5>Type permis</h5></td>
            <td><h5>Date d'inscription</h5></td>
            <td><h5>Montant</h5></td>
            
           <td><h5> Reste</h5></td>
           
            <td><h5>Durée</h5></td>
            <td><h5>Reste Durée</h5></td>
          
            <td><h5>Action</h5></td>
        </tr>
        </thead>
         <tbody id="myTable">
        @foreach ($data as $row)
           
        <tr>
            <td>{{$row['id_reservation']}}</td>
            <td>{{$row['cin_candidat']}}</td>
            <td>{{$row['typePermis']}}</td>
            <td>{{$row['date_reservation']}}</td>
        <td>{{$row['montant_payee']}}</td>
        <td>{{$row['reste']}}</td>
        
        
        <td>{{$row['heures_etudes']}}</td>
        <td>{{$row['reste_heures']}}</td>
   <td>
            <div class="gap-2 d-md-flex ">
                    <a class="nav-link  btn btn-success"  title="Gestion des facturations" style="color: brown;"  href="facturation/{{$row['id_reservation']}}">Facturation</a>
            </div>
                </td>
        </tr>
    
        @endforeach
        </tbody>
    </table>
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
