@extends('layouts.admin')
@section('header')
    Détails de <strong>{{$item->libelle}}</strong> 
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/admin">Accueil</a></li>
    <li class="breadcrumb-item"><a href="{{route('domaines.index')}}">Liste des domaines</a></li>
    <li class="breadcrumb-item active">Détails de {{$item->libelle}}</li>

@endsection

@section('content')
<!--Header domaine details-->
<div class="row no-gutters">
    <div class="col-sm-12 col-md-4">
        <div class="card card-primary text-center">
            <div class="card-header">
                <h3 class="card-title">
                    Nombre d'indicateurs de ce domaine
                </h3>


            </div>
            <div class="card-body ">

                <h3>
                    {{$item->indicateurs->count()}}
                </h3>

            </div>
            <div class="card-footer">
                @if ($item->indicateurs->count() == 0)
                    <a href="{{route('indicateurs.create')}}" class="btn btn-info" title="Créer un indicateur"><i class="fas fa-plus"></i> En créer</a>
                    
                @else
                <a href="{{route('indicateurs.index')}}" class="btn btn-info" title="Voir les indicateurs de ce domaine"><i class="fas fa-plus"></i> Aller aux indicateurs</a>
                    
                @endif
                

            </div>

        </div>
       


    </div>
    <div class="col-sm-12 col-md-8 pl-3">
        <h2 >Description</h2>
        <p>{{$item->description}}</p>
        
        


    </div>
        
</div>
<!--/Header domaine details-->
    <div class="row">
        <div class="col-md-8 col-offset-2">
            <div class="card">
                <div class="card-header">
                    <h3> <i class="fas fa-"></i>Affichage des détails</h3>

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