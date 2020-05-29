@extends('layouts.admin')
@section('header')
    Liste des langues
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/admin">Accueil</a></li>
    <li class="breadcrumb-item active">Liste des langues</li>

@endsection

@section('content')
 <div class="row no-gutters">
        <div class="col-sm-12 col-md-4 bg-gradient-primary">
            <h3>
                Nombre de langues: {{$nbrItems}}
            </h3>


        </div>
        <div class="col-sm-12 col-md-8 pl-3">
            <h2 >Indication sur les langues parlées au Burkina Faso</h2>
            <p>La langue officielle du Burkina Faso est le français. Le nom même du pays est métissé de deux langues différentes : "burkina" en mooré veut dire "intègre" et "faso" en bambara signife "patrie", d'où son surnom de Pays des hommes intègres.
Le nombre de peuples et d’ethnies au Burkina révèle le nombre de langues ou de dialectes pratiqués.Il existe tout de même plus de 60 langues et dialectes dont les principales sont: le mooré langue parlée par l’ethnie Mossi, le san parlé par les Samos, le fulfuldé parlé par les Peuls, le gulmancéma parlé par les Gourmantché dans l'Est du Burkina Faso, le dagara parlé par les Dagaris, le Dioula qui est une langue commune à plusieurs pays d’Afrique de l’ouest (la Côte d’Ivoire, le Mali, la Guinée etc…), le lobiri parlé par les lobis, le marka, le bobo, le bwamu parlé par les bwabas, le senoufo, le Toussian parlé par les Toussians, le kassena et le lyélé (langues parlées par le peuple dit Gourounsi qui en réalité s'appelle lui-même "NOUN", sud-est et centre ouest) et le bissa qui est la langue parlée par l’ethnie des Boussancé appelé couramment Bissas.</p>
            <a href="{{route('langues.create')}}" class="btn btn-info" title="Ajouter une langue"><i class="fas fa-plus"></i> Ajouter</a>


        </div>
            
    </div>
    <!--/Header domaine-->
    <!--Liste des domaines-->
    <div class="row">
        <div class="col-sm-12 mt-3">
            <h3>
                Liste des langues
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
                    <a href="{{route('langues.show',$item->id)}}" 
                        class="btn btn-info" 
                        title="Voir détails"><i class="fas fa-eye"></i> Voir détails</a>
                    <a href="{{route('langues.edit',$item->id)}}" class="btn btn-warning" title="Modifier"><i class="fas fa-pencil"></i> Modifier</a>
                    <form action="{{route('langues.destroy',$item->id)}}" method="post" style="display:inline" onsubmit="return confirm('Vous êtes sûr?');">
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
                       Pas de langues
    </span>
                  <a href="{{route('langues.create')}}" class="btn btn-info" title="Ajouter une région"><i class="fas fa-plus"></i>En créer</a>

@endforelse
{{$items->links()}}
    

        
        




@endsection
