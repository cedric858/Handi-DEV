@extends('layouts.admin')
@section('header')
    Modification Chef lieu
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/admin">Accueil</a></li>
    <li class="breadcrumb-item"><a href="{{route('cheflieus.index')}}">Liste chef-lieux</a></li>
    <li class="breadcrumb-item active">Modification Chef lieu</li>

@endsection

@section('content')
<div class="card">
        <div class="card-header">
            <h4 class="">
                {{$cheflieu->libelle}}
                          </h4>

        </div>
        <div class="card-body" >
        </div>
    </div>
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
                                        <p>Pas de régions</p>
                                        
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