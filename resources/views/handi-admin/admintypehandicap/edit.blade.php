@extends('layouts.admin')
@section('header')
    Détails régions
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/admin">Accueil</a></li>
    <li class="breadcrumb-item"><a href="{{route('typehandicaps.index')}}">Liste des handicaps</a></li>
    <li class="breadcrumb-item active">Détails des handicaps</li>

@endsection

@section('content')
<div class="card">
        <div class="card-header">
            <h4 class="card-title">
                {{$item->libelle}}
            </h4>

        </div>
        <div class="card-body" >
            <div class="row ">
                
                <div class="col-sm-8">
                    <h5 class="card-title">{{$item->description?$item->description:"Pas de description"}}</h5>

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-offset-2">
            <div class="card">
                <div class="card-header">
                    <h3> <i class="fas fa-"></i> Mise à jour des détails</h3>

                </div>
                <div class="card-body">
                        <form action="{{route('typehandicaps.update',$item->id)}}" method="POST">
                            @csrf
                            @method('PUT')

                            
                            <div class="form-group">
                                <label for="libelle">Libellé:</label> 
                                <input aria-describedby="errorlibelle" type="text" 
                                class="form-control @error('libelle') is-invalid @enderror "
                                 name="libelle" value="{{old('libelle',$item->libelle)}}">
                                @error('libelle')
                                    <small class="form-text text-danger" id='errorlibelle'>
                                        {{$errors->first('libelle')}}

                                    </small>
                                @enderror
                            </div>
                            <!--Description-->
                            <div class="form-group">
                                <label for="description">Description</label>
                        
                                <textarea aria-describedby="errordescription" name="description" class="form-control @error('description') is-invalid @enderror " id="" cols="30" rows="10">{{old('description',$item->description)}}</textarea>
                                @error('description')
                                    <small class="form-text text-danger" id='errordescription'>
                                        {{$errors->first('description')}}

                                    </small>
                                @enderror




                            </div>

                            <!--/.Description-->
                            <input type="submit" value="Mettre à jour" class="btn btn-warning">

                            
                        </form>

                </div>
            </div>
        </div>
    </div>
@endsection