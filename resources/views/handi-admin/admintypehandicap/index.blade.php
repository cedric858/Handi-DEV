@extends('layouts.admin')
@section('header')
    Liste des handicaps
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="admin/">Accueil</a></li>
    <li class="breadcrumb-item active">Liste des handicaps</li>

@endsection

@section('content')
 <div class="row no-gutters">
        <div class="col-sm-12 col-md-4 bg-gradient-primary">
            <h3>
                Nombre de handicaps: {{$nbrItems}}
            </h3>


        </div>
        <div class="col-sm-12 col-md-8 pl-3">
            <h2 >Indication sur les types de handicaps</h2>
            <p>Selon la définition de l’Organisation Mondiale de la Santé (OMS), « est handicapée toute personne dont l’intégrité physique ou mentale est passagèrement ou définitivement diminuée, soit congénitalement, soit sous l’effet de l’âge ou d’un accident, en sorte que son autonomie, son aptitude à fréquenter l’école ou à occuper un emploi s’en trouvent compromises ».On peut en répertorier en plusieurs types</p>
            <a href="{{route('typehandicaps.create')}}" class="btn btn-info" title="Ajouter une région"><i class="fas fa-plus"></i> Ajouter</a>


        </div>
            
    </div>
    <!--/Header domaine-->
    <!--Liste des domaines-->
    <div class="row">
        <div class="col-sm-12 mt-3">
            <h3>
                Liste des handicaps
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
                <div class="col-sm-8">
                    <a href="{{route('typehandicaps.show',$item->id)}}" 
                        class="btn btn-info" 
                        title="Voir détails"><i class="fas fa-eye"></i> Voir détails</a>
                    <a href="{{route('typehandicaps.edit',$item->id)}}" class="btn btn-warning" title="Modifier"><i class="fas fa-pencil"></i> Modifier</a>
                    <form action="{{route('typehandicaps.destroy',$item->id)}}" method="post" style="display:inline" onsubmit="return confirm('Vous êtes sûr?');">
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
                       Pas de handicaps
    </span>
                  <a href="{{route('typehandicaps.create')}}" class="btn btn-info" title="Ajouter une région"><i class="fas fa-plus"></i>En créer</a>

@endforelse
{{$items->links()}}
    

        
        




@endsection
