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

  .profile-userpic img {
  float: none;
  margin: 0 auto;
  width: 50%;
  height: 50%;
  -webkit-border-radius: 50% !important;
  -moz-border-radius: 50% !important;
  border-radius: 50% !important;
}

.profile-usertitle {
  text-align: center;
  margin-top: 20px;
}

.profile-usertitle-name {
  color: #5a7391;
  font-size: 16px;
  font-weight: 600;
  margin-bottom: 7px;
}

.profile-usertitle-job {
  text-transform: uppercase;
  color: #5b9bd1;
  font-size: 12px;
  font-weight: 600;
  margin-bottom: 15px;
}

.profile-userbuttons {
  text-align: center;
  margin-top: 10px;
}

.profile-userbuttons .btn {
  text-transform: uppercase;
  font-size: 11px;
  font-weight: 600;
  padding: 6px 15px;
  margin-right: 5px;
}

.profile-userbuttons .btn:last-child {
  margin-right: 0px;
}

.profile-usermenu {
  margin-top: 30px;
}

.profile-usermenu ul li {
  border-bottom: 1px solid #f0f4f7;
}

.profile-usermenu ul li:last-child {
  border-bottom: none;
}

.profile-usermenu ul li a {
  color: #93a3b5;
  font-size: 14px;
  font-weight: 400;
}

.profile-usermenu ul li a i {
  margin-right: 8px;
  font-size: 14px;
}

.profile-usermenu ul li a:hover {
  background-color: #fafcfd;
  color: #5b9bd1;
}

.profile-usermenu ul li.active {
  border-bottom: none;
}

.profile-usermenu ul li.active a {
  color: #5b9bd1;
  background-color: #f6f9fb;
  border-left: 2px solid #5b9bd1;
  margin-left: -2px;
}

/* Profile Content */
.profile-contents {
    margin: 2%;
  padding: 20px;
  background: #fff;
  /* min-height: 460px; */
  border-radius:20px;
  height: 570px;
  overflow: hidden;

}
  
  </style>
<div class="container">


<div class="row">
  
    <div class="row align-items-center">
        <div class="col-md-8">
            <h3 class="mb-0">Details du Candidat</h3>
        </div>
    </div>

</div>

<div class="col-md-3 ">

  <div class="profile-sidebar" style=" justify-content: center; ">
      <!-- SIDEBAR USERPIC -->

      <div class="profile-userpic " style="justify-content: center; margin:auto;">
          <div  class="image-preview" id="imagePreview" style="height: 130px; width:130px; border-radius:150px; border: 1px solid #5b9bd1; display:flex; align-items:center; justify-content: center; font-weight:bold; color:#cccccc; margin:auto;">
            <img src="{{asset('images/documents/'.$dataDocumentPhoto->photo)}}" alt="Image preview" class="image-prewiew__image img-responsive"  style="width:200px;  height: 130px; border-radius:150px; margin-right:10px;">


           
               <span class="image-prewiew__default-text"> Voir l'image </span>
          </div>
           {{-- <img src="" class="img-responsive" alt=""> --}}
      </div>
   

  </div>
<div>
  <h3>Informations</h3><br>

<label>Cin: </label>
<label>{{$dataCandidat->cin_candidat}}</label><br>
<label>Nom: </label>
<label>{{$dataCandidat->nom}}</label><br>
<label>Prénom: </label>
<label>{{$dataCandidat->prenom}}</label><br>
<label>Date naissance: </label>
<label>{{$dataCandidat->date_naissance}}</label><br>
<label>Lieu naissance: </label>
<label>{{$dataCandidat->lieu_naissance}}</label><br>
<label>Sexe: </label>
<label>{{$dataCandidat->sexe}}</label><br>
<label>Téléphone: </label>
<label>{{$dataCandidat->telephone}}</label><br>
<label>Adresse: </label>
<label>{{$dataCandidat->adresse}}</label><br>
<label>Type permis: </label>
<label>{{$dataCandidat->type_permis}}</label><br>
<hr>

<h3>Reservation</h3><br>
<table>
  <tr>
    <td>#</td>
    <td>date</td>
    <td>Montant</td>
    <td>Reste</td>
    <td>Periode</td>
  </tr>@foreach ($dataReservation as $row)
  <td>{{$row['id_reservation']}}</td>
  <td>{{$row['date_reservation']}}</td>
  <td>{{$row['montant_payee']}}</td>
  <td>{{$row['reste']}}</td>
  <td>{{$row['periode']}}</td>
</tr>
  @endforeach
</table>

<hr><br>


</div>
    
    <div class="modal-footer">
       
       
        <a href="{{route('candidatlist')}}" class="  btn btn-success"  title="Anuler la modification" style="color: rgb(233, 231, 238);" >Retour</a>
                
      </div>


</div>

      <!-- END SIDEBAR BUTTONS -->

</div>
@endsection