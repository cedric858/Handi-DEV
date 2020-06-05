@extends('layouts.admin')
@section('header')
Détails de <strong>{{ $commune->libelle }}</strong>
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/admin">Accueil</a></li>
    <li class="breadcrumb-item"><a href="{{route('communes.index')}}">Liste des communes</a></li>
    <li class="breadcrumb-item active">Détails de <strong>{{ $commune->libelle }}</strong></li>

@endsection

@section('content')

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
                                <label for="region_id">Province:</label> 
                                <input aria-describedby="errorregion_id" type="text" 
                                class="form-control @error('cheflieu_id') is-invalid @enderror "
                                 name="region_id" value="{{$commune->province->libelle}}" disabled>
                            </div>
                           

                            <div class="form-group">
                                <label for="libelle">Libellé:</label> 
                                <input aria-describedby="errorlibelle" type="text" 
                                class="form-control "
                                 name="libelle" value="{{$commune->libelle}}" disabled>
                            </div>


                        </form>
                        <a href="{{route('communes.edit',$commune->id)}}" class="btn btn-warning" title="Modifier"><i class="fas fa-pencil"></i> Modifier</a>

                </div>
            </div>
        </div>
    </div>
@endsection