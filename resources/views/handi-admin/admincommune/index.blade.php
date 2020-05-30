@extends('layouts.admin')
@section('header')
    Liste des   communes
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/admin">Accueil</a></li>
    <li class="breadcrumb-item active">Liste des   communes</li>

@endsection

@section('content')
 <div class="row no-gutters">
        <div class="col-sm-12 col-md-4 bg-gradient-primary">
            <h3>
                Nombre de   communes: {{$nbrItems}}
            </h3>


        </div>
        <div class="col-sm-12 col-md-8 pl-3">
            <h2 >Indication sur les   communes du Burkina Faso</h2>
            <p>Les communes du Burkina Faso sont de deux types. Nous avons les communes urbaines et les communes rurales.</p>
            <a href="{{route('communes.create')}}" class="btn btn-info" title="Ajouter une   commune"><i class="fas fa-plus"></i> En créer</a>


        </div>
            
    </div>
    <!--/Header domaine-->
    <!--Liste des domaines-->
    <div class="row">
        <div class="col-sm-12 mt-3">
            <h3>
                Liste des   communes
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
    <?php if(!isset($province))
    {
        ?>
        {{$items->links()}}
        <?php
    } 
    ?>
    
    
    
@forelse($items as $item)

  
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">
                {{$item->libelle}}
            </h4>

        </div>
        <div class="card-body" >
            <div class="row ">

                <div class="col-sm-8">
                    <a href="{{route('communes.show',$item->id)}}" 
                        class="btn btn-info" 
                        title="Voir détails"><i class="fas fa-eye"></i> Voir détails</a>
                    <a href="{{route('communes.edit',$item->id)}}" class="btn btn-warning" title="Modifier"><i class="fas fa-pencil"></i> Modifier</a>
                    <form action="{{route('communes.destroy',$item->id)}}" method="post" style="display:inline" onsubmit="return confirm('Vous êtes sûr?');">
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
                       Pas de   communes
    </span>
                  <a href="{{route('communes.create')}}" class="btn btn-info" title="Ajouter un chef-lieu"><i class="fas fa-plus"></i>En créer</a>

@endforelse
<?php if(!isset($province))
{
    ?>
    {{$items->links()}}

    <?php
} 

?>


        
        




@endsection
