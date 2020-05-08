@extends('layouts.admin')
@section('header')
    Liste des région-Ajout
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="admin/">Accueil</a></li>
    <li class="breadcrumb-item"><a href="{{route('regions.index')}}">Liste des régions</a></li>
    <li class="breadcrumb-item active">Liste des région-ajout</li>

@endsection

@section('content')
    <div class="row">
        <div class="col-md-8 col-offset-2">
            <div class="card">
                <div class="card-header">
                    <h3> <i class="fas fa-"></i> Nouvelle région</h3>

                </div>
                <div class="card-body">
                        <form action="{{route('regions.store')}}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="libelle">Libellé:</label> 
                                <input aria-describedby="errorlibelle" type="text" class="form-control @error('libelle') is-invalid @enderror " name="libelle" value="{{old('libelle')}}">
                                @error('libelle')
                                    <small class="form-text text-danger" id='errorlibelle'>
                                        {{$errors->first('libelle')}}

                                    </small>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary mb-2">Créer une région</button>
                        </form>


                </div>
            </div>
        </div>
    </div>
@endsection