@extends('layouts.admin')
@section('header')
    Détails province
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/admin">Accueil</a></li>
    <li class="breadcrumb-item"><a href="{{route('provinces.index')}}">Liste provinces</a></li>
    <li class="breadcrumb-item active">Détails province</li>

@endsection

@section('content')
<div class="card">
        <div class="card-header">
            <h4 class="">
                {{$province->libelle}}
                          </h4>

        </div>
        <div class="card-body" >
            <div class="row ">
                <div class="col-sm-4 bg-success">
                    <p>
                        Nombre de communes:
                        
                        {{$province->communes->count()}}
                    </p>  
                 </div>
                <div class="col-sm-8">

                    <p class="card-text">

                    </p>
                    <a href="admin/provinces/{{$province->id}}" class="btn btn-info" title="Aller au provincex"><i class="fas fa-arrow-circle-right"></i> Allez aux communes</a>

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
                                <label for="region_id">Chef lieu:</label> 
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