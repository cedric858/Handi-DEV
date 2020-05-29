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
                    <a href="admin/indicateurs/#{{$item->id}}" class="btn btn-info" title="Aller aux indicateurs"><i class="fas fa-arrow-circle-right"></i> Allez aux indicateurs</a>

                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-8 col-offset-2">
            <div class="card">
                <div class="card-header">
                    <h3> <i class="fas fa-"></i> Les détails</h3>

                </div>
                <div class="card-body">
                        <form action="" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="libelle">Libellé:</label> 
                                <input aria-describedby="errorlibelle" type="text" 
                                class="form-control @error('libelle') is-invalid @enderror "
                                 name="libelle" value="{{$item->libelle}}" disabled>
                            </div>
                            <div class="form-group">
                                <label for="description">Description</label>
                        
                                <textarea disabled aria-describedby="errordescription" name="description" 
                                class="form-control @error('libelle') is-invalid @enderror " 
                                id="" cols="30" rows="10">{{$item->description}}</textarea>




                            </div>
                            
                        </form>
                        <a href="{{route('domaines.edit',$item->id)}}" class="btn btn-warning" title="Modifier"><i class="fas fa-pencil"></i> Modifier</a>

                </div>
            </div>
        </div>
    </div>
@endsection