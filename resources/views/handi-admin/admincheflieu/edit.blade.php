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
                <form action="{{route('cheflieus.update',$cheflieu->id)}}" method="post">
                            @csrf
                            @method('PUT')

                            <!--Liste des régions-->
                            <div class="form-group">
                                <label for="region_id">Régions <span class="text text-danger">*</span> </label>
                                <select class="form-control" id="region_id" name="region_id">
                    
                               
                                    @forelse ($regions as $region)
                                        <option value="{{$region->id}}" <?php
                                        if($region->libelle == $cheflieu->region->libelle)
                                        {
                                            ?>
                                            selected

                                            <?php
                                        }
                                        ?> >{{$region->libelle}}</option>
                                        
                                    @empty
                                        <p class="badge badge-danger">Pas de régions</p>
                                        
                                    @endforelse 
                                </select>
                    
                                        
                                   
                                  
                                  @error('region_id')
                                <p class="help is-danger">{{$message}}</p>
                                    
                                      
                                  @enderror
                                      
                              </div>
                    
                            <!--/.Liste des régions-->
                           

                            <div class="form-group">
                                <label for="libelle">Libellé:</label> 
                                <input aria-describedby="errorlibelle" type="text" 
                                class="form-control "
                                 name="libelle" value="{{$cheflieu->libelle}}"   >
                            </div>
                            <input type="submit" value="Mettre à jour" class="btn btn-warning">



                        </form>

                </div>
            </div>
        </div>
    </div>
@endsection