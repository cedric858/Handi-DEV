@extends('layouts.admin')
@section('header')
    Liste des communes-ajout
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/admin">Accueil</a></li>
    <li class="breadcrumb-item"><a href="{{route('communes.index')}}">Liste des communes</a></li>
    <li class="breadcrumb-item active">Liste des communes-ajout</li>

@endsection

@section('content')
    <div class="row">
        <div class="col-md-8 col-offset-2">
            <div class="card">
                <div class="card-header">
                    <h3> <i class="fas fa-"></i> Nouveau communes</h3>

                </div>
                <div class="card-body">
                        <form action="{{route('communes.store')}}" method="post">
                            @csrf
                                                        <!--Chef-lieu-->
        <div class="form-group">
            <label for="province_id">Provinces <span class="text text-danger">*</span> </label>
            <select class="form-control" id="province_id" name="province_id">

           
                @forelse ($provinces as $province)
                    <option value="{{$province->id}}">{{$province->libelle}}</option>
                    
                @empty
                    <p class="badge badge-danger">Pas de province</p>
                    
                @endforelse 
            </select>

                    
               
              
              @error('province_id')
            <p class="help is-danger">{{$message}}</p>
                
                  
              @enderror
                  
          </div>


<!--/.provinces-->

                            <div class="form-group">
                                <label for="libelle"  >Libellé:<span class="text text-danger">*</span></label> 
                                <input aria-describedby="errorlibelle" type="text" class="form-control @error('libelle') is-invalid @enderror " name="libelle" value="{{old('libelle')}}">
                                @error('libelle')
                                    <small class="form-text text-danger" id='errorlibelle'>
                                        {{$errors->first('libelle')}}

                                    </small>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary mb-2">Créer une commune</button>
                        </form>


                </div>
            </div>
        </div>
    </div>
@endsection