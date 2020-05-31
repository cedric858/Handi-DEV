@extends('layouts.admin')
@section('header')
    Liste des chefs lieux-Ajout
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/admin">Accueil</a></li>
    <li class="breadcrumb-item"><a href="{{route('cheflieus.index')}}">Liste des chefs-lieux</a></li>
    <li class="breadcrumb-item active">Liste des chefs lieux-ajout</li>

@endsection

@section('content')
    <div class="row">
        <div class="col-md-8 col-offset-2">
            <div class="card">
                <div class="card-header">
                    <h3> <i class="fas fa-"></i> Nouveau chefs-lieux</h3>

                </div>
                <div class="card-body">
                        <form action="{{route('cheflieus.store')}}" method="post">
                            @csrf
                                                        <!--Région-->
        <div class="form-group">
            <label for="region_id">Régions <span class="text text-danger">*</span> </label>
            <select class="form-control" id="region_id" name="region_id">

           
                @forelse ($regions as $region)
                    <option value="{{$region->id}}">{{$region->libelle}}</option>
                    
                @empty
                    <p class="badge badge-danger">Pas de régions</p>
                    
                @endforelse 
            </select>

                    
               
              
              @error('region_id')
            <p class="help is-danger">{{$message}}</p>
                
                  
              @enderror
                  
          </div>
<!--Région-->

<!--/.Chef lieu-->

                            <div class="form-group">
                                <label for="libelle"  >Libellé:<span class="text text-danger">*</span></label> 
                                <input aria-describedby="errorlibelle" type="text" class="form-control @error('libelle') is-invalid @enderror " name="libelle" value="{{old('libelle')}}">
                                @error('libelle')
                                    <small class="form-text text-danger" id='errorlibelle'>
                                        {{$errors->first('libelle')}}

                                    </small>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary mb-2">Créer un chef-lieu</button>
                        </form>


                </div>
            </div>
        </div>
    </div>
@endsection