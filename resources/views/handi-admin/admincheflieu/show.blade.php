@extends('layouts.admin')
@section('header')
    Détails Chef lieu
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/admin">Accueil</a></li>
    <li class="breadcrumb-item"><a href="{{route('cheflieus.index')}}">Liste chefs-lieux</a></li>
    <li class="breadcrumb-item active">Détails province</li>

@endsection

@section('content')
<div class="card">
        <div class="card-header">
            <h4 class="card-title">
                {{$cheflieu->libelle}}
                          </h4>

        </div>
        <div class="card-body" >
            <div class="row ">
                <div class="col-sm-4 bg-success">
                    <p>
                        Nombre de Province:
                        
                        {{-- {{$cheflieu->provinces->count()}} --}}
                    </p>  
                 </div>
                <div class="col-sm-8">

                    <p class="card-text">

                    </p>
                    <a href="admin/cheflieus/#{{$cheflieu->id}}" class="btn btn-info" title="Aller au chef lieux"><i class="fas fa-arrow-circle-right"></i> Allez aux chef-lieux</a>

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