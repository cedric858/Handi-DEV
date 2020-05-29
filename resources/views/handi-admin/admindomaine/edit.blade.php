@extends('layouts.admin')
@section('header')
    Détails domaines
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/admin">Accueil</a></li>
    <li class="breadcrumb-item"><a href="{{route('domaines.index')}}">Liste des domaines</a></li>
    <li class="breadcrumb-item active">Détails domaine</li>

@endsection

@section('content')
<div class="card">
        <div class="card-header">
            <h4 class="">
                {{$item->libelle}}
            </h4>

        </div>
        <div class="card-body" >
            <div class="row ">
                <div class="col-sm-4 bg-success">
                    <p>
                        Nombre d'indicateurs du domaine:
                        {{$item->indicateurs()->count()}}
                    </p>  
                 </div>
                <div class="col-sm-8">
                    <h5 class="card-title">{{$item->description?$item->description:"Pas de description"}}</h5>
                    <p class="card-text">

                    </p>
                    <a href="{{route('indicateurs.index').'#'.$item->id}}" class="btn btn-info" title="Aller aux indicateurs"><i class="fas fa-arrow-circle-right"></i> Allez aux indicateurs</a>

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
                        <form action="{{route('domaines.update',$item->id)}}" method="POST">
                            @csrf
                            @method('PUT')

                            
                            <div class="form-group">
                                <label for="libelle">Libellé:</label> 
                                <input aria-describedby="errorlibelle" type="text" 
                                class="form-control @error('libelle') is-invalid @enderror "
                                 name="libelle" value="{{$item->libelle}}">
                                @error('libelle')
                                    <small class="form-text text-danger" id='errorlibelle'>
                                        {{$errors->first('libelle')}}

                                    </small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                        
                                <textarea aria-describedby="errordescription" name="description" 
                                class="form-control " 
                                id="" cols="30" rows="10">{{$item->description}}</textarea>




                            </div>
                            <input type="submit" value="Mettre à jour" class="btn btn-warning">

                            
                        </form>

                </div>
            </div>
        </div>
    </div>
@endsection