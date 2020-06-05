@extends('layouts.admin')
@section('header')
    Liste des provinces-ajout
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/admin">Accueil</a></li>
    <li class="breadcrumb-item"><a href="{{route('provinces.index')}}">Liste des provinces</a></li>
    <li class="breadcrumb-item active">Liste des provinces-ajout</li>

@endsection

@section('content')
    <div class="row">
        <div class="col-md-8 col-offset-2">
            <div class="card">
                <div class="card-header">
                    <h3> <i class="fas fa-"></i> Nouveau provinces</h3>

                </div>
                <div class="card-body">
                        <form action="{{route('provinces.store')}}" method="post">
                            @csrf
                                                        <!--Chef-lieu-->
        <div class="form-group">
            <label for="cheflieu_id">Chef-lieu <span class="text text-danger">*</span> </label>
            <select class="form-control" id="cheflieu_id" name="cheflieu_id">

           
                @forelse ($cheflieus as $cheflieu)
                    <option value="{{$cheflieu->id}}">{{$cheflieu->libelle}}</option>
                    
                @empty
                    <p class="badge badge-danger">Pas de chef-lieu</p>
                    
                @endforelse 
            </select>

                    
               
              
              @error('cheflieu_id')
            <p class="help is-danger">{{$message}}</p>
                
                  
              @enderror
                  
          </div>


<!--/.chef-lieu-->

                            <div class="form-group">
                                <label for="libelle"  >Libellé:<span class="text text-danger">*</span></label> 
                                <input aria-describedby="errorlibelle" type="text" class="form-control @error('libelle') is-invalid @enderror " name="libelle" value="{{old('libelle')}}">
                                @error('libelle')
                                    <small class="form-text text-danger" id='errorlibelle'>
                                        {{$errors->first('libelle')}}

                                    </small>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-primary mb-2">Créer une province</button>
                        </form>


                </div>
            </div>
        </div>
    </div>
@endsection