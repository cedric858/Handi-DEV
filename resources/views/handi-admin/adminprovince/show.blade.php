@extends('layouts.admin')
@section('header')
    Détails de <strong>{{ $province->libelle }}</strong> 
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/admin">Accueil</a></li>
    <li class="breadcrumb-item"><a href="{{route('provinces.index')}}">Liste provinces</a></li>
    <li class="breadcrumb-item active">Détails de {{ $province->libelle }}</li>

@endsection

@section('content')
<div class="col-sm-4 text-center">
    <div class="card card-primary">
        <div class="card-header">
            <h4 class="card-title">
                {{$province->libelle}}
            </h4>

        </div>
        <div class="card-body" >
            
               
                    <p>
                        Nombre de communes de cette province:
                    </p>
                    <h3>{{$province->communes()->count()}}</h3>
                        
                     
                    <a href="{{route('communes.index',['region'=>$province->id])}}" class="btn btn-info" title="Aller aux communes"><i class="fas fa-arrow-circle-right"></i> Allez aux communes</a>

                
            
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
                                <label for="region_id">chef-lieu:</label> 
                                <input aria-describedby="errorregion_id" type="text" 
                                class="form-control @error('cheflieu_id') is-invalid @enderror "
                                 name="region_id" value="{{$province->cheflieu->libelle}}" disabled>
                            </div>
                           

                            <div class="form-group">
                                <label for="libelle">Libellé:</label> 
                                <input aria-describedby="errorlibelle" type="text" 
                                class="form-control "
                                 name="libelle" value="{{$province->libelle}}" disabled>
                            </div>


                        </form>
                        <a href="{{route('provinces.edit',$province->id)}}" class="btn btn-warning" title="Modifier"><i class="fas fa-pencil"></i> Modifier</a>

                </div>
            </div>
        </div>
    </div>
@endsection