@extends('layouts.admin')
@section('header')
    Ajout d'un type de handicap
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/admin">Accueil</a></li>
    <li class="breadcrumb-item"><a href="{{route('typehandicaps.index')}}">Liste des type de handicaps</a></li>
    <li class="breadcrumb-item active">Ajout d'un type de handicap</li>

@endsection

@section('content')
    <div class="row">
        <div class="col-md-8 col-offset-2">
            <div class="card">
                <div class="card-header">
                    <h3> <i class="fas fa-"></i> Nouvel Handicap</h3>

                </div>
                <div class="card-body">
                        <form action="{{route('typehandicaps.store')}}" method="post">
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
                            <!--Description-->
                            <div class="form-group">
                                <label for="description">Description</label>
                        
                                <textarea aria-describedby="errordescription" name="description" class="form-control @error('description') is-invalid @enderror " id="" cols="30" rows="10">{{old('description')}}</textarea>
                                @error('description')
                                    <small class="form-text text-danger" id='errordescription'>
                                        {{$errors->first('description')}}

                                    </small>
                                @enderror




                            </div>

                            <!--/.Description-->
                            <button type="submit" class="btn btn-primary mb-2">Créer un handicap </button>
                        </form>


                </div>
            </div>
        </div>
    </div>
@endsection