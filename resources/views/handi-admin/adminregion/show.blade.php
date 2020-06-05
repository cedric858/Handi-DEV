@extends('layouts.admin')
@section('header')
    Détails de <strong>{{ $item->libelle }}</strong> 
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/admin">Accueil</a></li>
    <li class="breadcrumb-item"><a href="{{route('regions.index')}}">Liste régions</a></li>
    <li class="breadcrumb-item active">Détails de {{ $item->libelle }}</li>

@endsection

@section('content')
<div class="col-sm-4 text-center">
    <div class="card card-primary">
        <div class="card-header">
            <h4 class="card-title">
                {{$item->libelle}}
            </h4>

        </div>
        <div class="card-body" >
            
               
                    <p>
                        Nombre de chef-lieux de cette région:
                    </p>
                    <h3>{{$item->cheflieu()->count()}}</h3>
                        
                     
                    <a href="{{route('cheflieus.index',['region'=>$item->id])}}" class="btn btn-info" title="Aller au chef-lieux"><i class="fas fa-arrow-circle-right"></i> Allez aux chef-lieux</a>

                
            
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
                        </form>
                        <a href="{{route('regions.edit',$item->id)}}" class="btn btn-warning" title="Modifier"><i class="fas fa-pencil"></i> Modifier</a>

                </div>
            </div>
        </div>
    </div>
@endsection