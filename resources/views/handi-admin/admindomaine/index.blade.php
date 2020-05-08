@extends('layouts.admin')
@section('header')
    Liste des domaines
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/admin">Accueil</a></li>
    <li class="breadcrumb-item active">Liste des domaines</li>

@endsection

@section('content')
 <div class="row no-gutters">
        <div class="col-sm-12 col-md-4 bg-gradient-primary">
            <h3>
                Nombre de domaines: {{$nbrItems}}
            </h3>


        </div>
        <div class="col-sm-12 col-md-8 pl-3">
            <h2 >Indication sur les domaines</h2>
            <p>Les domaines réunissent les structures étatiques, les entreprises prise qui partagent   des activités économiques similaires</p>
            <p >
                Les indicateurs définis par domaine permettent un suivi de la convention pour la promotion des personnes handicapées
            </p>
            <a href="{{route('domaines.create')}}" class="btn btn-info" title="Ajouter un domaine"><i class="fas fa-plus"></i> En créer</a>


        </div>
            
    </div>
    <!--/Header domaine-->
    <!--Liste des domaines-->
    <div class="row">
        <div class="col-sm-12 mt-3">
            <h3>
                Liste des domaines
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
                    {{$item->indicateurs()->count()}}
                 </div>
                <div class="col-sm-8">
                    <h5 class="card-title">{{$item->description?$item->description:"Pas de description"}}</h5>
                    <p class="card-text">

                    </p>
                    <a href="{{route('domaines.show',$item->id)}}" 
                        class="btn btn-info" 
                        title="Voir détails"><i class="fas fa-eye"></i> Voir détails</a>
                    <a href="{{route('domaines.edit',$item->id)}}" class="btn btn-warning" title="Modifier"><i class="fas fa-pencil"></i> Modifier</a>
                    <form action="{{route('domaines.destroy',$item->id)}}" method="post" style="display:inline" onsubmit="return confirm('Vous êtes sûr?');">
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
                       Pas de domaines
    </span>
                  <a href="{{route('domaines.create')}}" class="btn btn-info" title="Ajouter un domaine"><i class="fas fa-plus"></i>En créer</a>

@endforelse
{{$items->links()}}
    

        
        




@endsection
