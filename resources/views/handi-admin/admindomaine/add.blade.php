@extends('layouts.admin')
@section('header')
    Liste des domaines-Ajout
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/admin">Accueil</a></li>
    <li class="breadcrumb-item"><a href="{{route('domaines.index')}}">Liste des domaines</a></li>
    <li class="breadcrumb-item active">Liste des domaines-ajout</li>

@endsection

@section('content')
    <div class="row">
        <div class="col-md-8 col-offset-2">
            <div class="card">
                <div class="card-header">
                    <h3> <i class="fas fa-"></i> Nouveau domaine</h3>

                </div>
                <div class="card-body">
                        <form action="{{route('domaines.store')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="libelle">Libellé:</label> 
                                <input aria-describedby="errorlibelle" type="text" class="form-control @error('libelle') is-invalid @enderror " name="libelle" value="{{old('libelle')}}" required>
                                @error('libelle')
                                    <small class="form-text text-danger" id='errorlibelle'>
                                        {{$errors->first('libelle')}}

                                    </small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                        
                                <textarea aria-describedby="errordescription" name="description" class="form-control @error('libelle') is-invalid @enderror " id="description" cols="30" rows="10">{{old('description')}}</textarea>
                                @error('description')
                                    <small class="form-text text-danger" id='errordescription'>
                                        {{$errors->first('description')}}

                                    </small>
                                @enderror




                            </div>
                            <button type="submit" class="btn btn-primary mb-2">Créer un domaine</button>
                        </form>


                </div>
            </div>
        </div>
    </div>
@endsection