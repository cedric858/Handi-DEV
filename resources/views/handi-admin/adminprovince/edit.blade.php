@extends('layouts.admin')
@section('header')
    Modification province
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/admin">Accueil</a></li>
    <li class="breadcrumb-item"><a href="{{route('provinces.index')}}">Liste provinces</a></li>
    <li class="breadcrumb-item active">Modification province</li>

@endsection

@section('content')
<div class="card">
        <div class="card-header">
            <h4 class="card-title">
                {{$province->libelle}}
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
                <form action="{{route('provinces.update',$province->id)}}" method="post">
                            @csrf
                            @method('PUT')

                            <!--Liste des régions-->
                            <div class="form-group">
                                <label for="cheflieu_id">Régions <span class="text text-danger">*</span> </label>
                                <select class="form-control" id="cheflieu_id" name="cheflieu_id">
                    
                               
                                    @forelse ($cheflieus as $cheflieu)
                                        <option value="{{$cheflieu->id}}" <?php
                                        if($cheflieu->libelle == $province->cheflieu->libelle)
                                        {
                                            ?>
                                            selected

                                            <?php
                                        }
                                        ?> >{{$cheflieu->libelle}}</option>
                                        
                                    @empty
                                        <p class="badge badge-danger">Pas de chef-lieu</p>
                                        
                                    @endforelse 
                                </select>
                    
                                        
                                   
                                  
                                  @error('cheflieu_id')
                                <p class="help is-danger">{{$message}}</p>
                                    
                                      
                                  @enderror
                                      
                              </div>
                    
                            <!--/.Liste des régions-->
                           

                            <div class="form-group">
                                <label for="libelle">Libellé:</label> 
                                <input aria-describedby="errorlibelle" type="text" 
                                class="form-control "
                                 name="libelle" value="{{$province->libelle}}"   >
                            </div>
                            <input type="submit" value="Mettre à jour" class="btn btn-warning">



                        </form>

                </div>
            </div>
        </div>
    </div>
@endsection