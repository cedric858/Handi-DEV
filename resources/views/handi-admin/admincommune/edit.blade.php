@extends('layouts.admin')
@section('header')
Mise à jour de <strong>{{ $commune->libelle }}</strong>
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/admin">Accueil</a></li>
    <li class="breadcrumb-item"><a href="{{route('communes.index')}}">Liste des communes</a></li>
    <li class="breadcrumb-item active">Mise à jour de <strong>{{ $commune->libelle }}</strong></li>

@endsection

@section('content')
<div class="card">
        <div class="card-header">
            <h4 class="card-title">
                Mise à jour
                          </h4>

        </div>
        <div class="card-body" >
            <form action="{{route('communes.update',$commune->id)}}" method="post">
                @csrf
                @method('PUT')

                <!--Liste des provinces-->
                <div class="form-group">
                    <label for="province_id">Régions <span class="text text-danger">*</span> </label>
                    <select class="form-control" id="province_id" name="province_id">
        
                   
                        @forelse ($provinces as $province)
                            <option value="{{$province->id}}" <?php
                            if($province->libelle == $commune->province->libelle)
                            {
                                ?>
                                selected

                                <?php
                            }
                            ?> >{{$province->libelle}}</option>
                            
                        @empty
                            <p class="badge badge-danger">Pas de provinces</p>
                            
                        @endforelse 
                    </select>
        
                            
                       
                      
                      @error('province_id')
                    <p class="help is-danger">{{$message}}</p>
                        
                          
                      @enderror
                          
                  </div>
        
                <!--/.Liste des provinces-->
               

                <div class="form-group">
                    <label for="libelle">Libellé:</label> 
                    <input aria-describedby="errorlibelle" type="text" 
                    class="form-control "
                     name="libelle" value="{{ old('libelle',$commune->libelle) }}"   >
                </div>
                <input type="submit" value="Mettre à jour" class="btn btn-warning">
            </form>

        </div>
    </div>
@endsection