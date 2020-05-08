@extends('layouts.admin')
@section('header')
    Liste des chefs-lieux
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="admin/">Accueil</a></li>
    <li class="breadcrumb-item active">Liste des chefs-lieux</li>

@endsection

@section('content')
 <div class="row no-gutters">
        <div class="col-sm-12 col-md-4 bg-gradient-primary">
            <h3>
                Nombre de chefs-lieux: {{$nbrItems}}
            </h3>


        </div>
        <div class="col-sm-12 col-md-8 pl-3">
            <h2 >Indication sur les chefs-lieux du Burkina Faso</h2>
            <p>Chaque chef-lieu du Burkina Faso font partie d'une région et possèdent chacune une ou plusieurs provinces</p>
            <a href="{{route('cheflieus.create')}}" class="btn btn-info" title="Ajouter un chefs-lieux"><i class="fas fa-plus"></i> En créer</a>


        </div>
            
    </div>
    <!--/Header domaine-->
    <!--Liste des domaines-->
    <div class="row">
        <div class="col-sm-12 mt-3">
            <h3>
                Liste des chefs-lieux
            </h3>
            @if ($message = Session::get('success'))
              <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>    
                    <strong>{{ $message }}</strong>
              </div>
            @endif
            @if ($message = Session::get('error'))
              <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>    
                    <strong>{{ $message }}</strong>
              </div>
            @endif

        </div>
    </div>
    {{$items->links()}}
    
    
@forelse($items as $item)

    <div class="card">
        <div class="card-header">
            <h4 class="">
                {{$item->libelle}}
            </h4>

        </div>
        <div class="card-body" >
            <div class="row ">
                <div class="col-sm-4 bg-success">
                    <p>Nombre de provinces dans ce chef-lieu: {{$item->provinces()->count()}}</p> 
                 </div>
                <div class="col-sm-8">
                    <a href="{{route('cheflieus.show',$item->id)}}" 
                        class="btn btn-info" 
                        title="Voir détails"><i class="fas fa-eye"></i> Voir détails</a>
                    <a href="{{route('cheflieus.edit',$item->id)}}" class="btn btn-warning" title="Modifier"><i class="fas fa-pencil"></i> Modifier</a>
                    <form action="{{route('cheflieus.destroy',$item->id)}}" method="post" style="display:inline" onsubmit="return confirm('Vous êtes sûr?');">
                                                {{csrf_field()}}
                                                <input type="hidden" name="_method" value="DELETE">
                                                <button class="btn btn-danger">Supprimer</button>

                                            </form>

                </div>
            </div>
        </div>
    </div>
        
        @empty
    <span class="badge badge-danger">
                       Pas de chefs-lieux
    </span>
                  <a href="{{route('cheflieus.create')}}" class="btn btn-info" title="Ajouter une région"><i class="fas fa-plus"></i>En créer</a>

@endforelse
{{$items->links()}}
    

        
        




@endsection
