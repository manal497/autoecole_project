
@extends('layout.layoutGestionCandidat')
@section('contentCandidat')
<form action="{{route('assisters.store')}}" method="POST" class="row g-3 container needs-validation">

    @csrf
     
    <input type="text" hidden class="col-sm-9 form-control" id ="idAdd" name ="idAdd" value="" />
    <div class="modal-body container">
       


        <div class=" row">
            <div class="col-md-6 form-group">
                <label for="candidat_id" class="control-label  col-form-label"><h5>Condidat</h5></label>
                
                <select name="candidat_id" class="form-control">
                  
                    <option value="0">Faites votre choix</option>
                    @foreach ($condidats as $row)
                    <option value="{{$row['id']}}">{{$row['cin_candidat ']}} - {{$row['nom']}} - {{$row['prenom']}}</option>
                    @endforeach
                   
                </select>
            </div>
            
             </div>
        
       
      
        <div class=" row">
        <div class="col-md-6 form-group">
            <label for="vehicule_id " class="control-label  col-form-label"><h5>Seance</h5></label>
            
            <select name="vehicule_id" class="form-control">
              
                <option value="0">Faites votre choix</option>
                @foreach ($seances as $row)
                <option value="{{$row['id']}}">{{$row['jour']}} - {{$row['heure_debut']}} - {{$row['heure_fin']}}</option>
                @endforeach
               
            </select>
        </div>
        
         </div>
           <!-- <input type="text" name="typepermis" id="typepermis" placeholder="Selectionner le le type du permis">
           -->
        
    <div class="modal-footer">
       
         <button type="submit" id="add" name="add" class="btn btn-success  waves-light" onclick="errorMessage()">Ajouter</button>
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal" aria-label="Close"> Fermer</button>
    </div>
</form>
</div>

@endsection