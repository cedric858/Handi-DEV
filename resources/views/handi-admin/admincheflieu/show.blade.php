@extends('layouts.admin')
@section('header')
    Détails de <strong>{{ $cheflieu->libelle }}</strong> 
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/admin">Accueil</a></li>
    <li class="breadcrumb-item"><a href="{{route('cheflieus.index')}}">Liste chefs-lieux</a></li>
    <li class="breadcrumb-item active">Détails de {{ $cheflieu->libelle }}</li>

@endsection

@section('content')
<!--Header de chef-lieu-->
<div class="row no-gutters">
    <div class="col-sm-12 col-md-4">
        <div class="card card-primary text-center">
            <div class="card-header">
                <h3 class="card-title">
                    Nombre de provinces dans ce chef-lieu
                </h3>


            </div>
            <div class="card-body ">

                <h3>
                    {{$cheflieu->provinces->count()}}
                </h3>

            </div>
            <div class="card-footer">
                @if ($cheflieu->provinces->count() == 0)
                    <a href="{{route('provinces.create')}}" class="btn btn-info" title="Créer un indicateur"><i class="fas fa-plus"></i> En créer</a>
                    
                @else
                <a href="{{route('provinces.index',['cheflieu'=>$cheflieu->id])}}" class="btn btn-info" title="Voir les provinces de ce domaine"><i class="fas fa-plus"></i> Aller aux provinces</a>
                    
                @endif
                

            </div>

        </div>
       


    </div>

        
</div>
<!--/.header de chef lieu-->

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
                                <label for="region_id">Région:</label> 
                                <input aria-describedby="errorregion_id" type="text" 
                                class="form-control @error('region_id') is-invalid @enderror "
                                 name="region_id" value="{{$cheflieu->region->libelle}}" disabled>
                            </div>
                           

                            <div class="form-group">
                                <label for="libelle">Libellé:</label> 
                                <input aria-describedby="errorlibelle" type="text" 
                                class="form-control "
                                 name="libelle" value="{{$cheflieu->libelle}}" disabled>
                            </div>


                        </form>
                        <a href="{{route('cheflieus.edit',$cheflieu->id)}}" class="btn btn-warning" title="Modifier"><i class="fas fa-pencil"></i> Modifier</a>

                </div>
            </div>
        </div>
    </div>
@endsection