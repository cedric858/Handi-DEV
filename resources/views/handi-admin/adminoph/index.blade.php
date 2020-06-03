<?php
$increment = 1;
?>

@extends('layouts.admin')
@section('header')
    Liste des Organisations des Personnes Handicapées(OPH)
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/admin">Accueil</a></li>
    <li class="breadcrumb-item active">Organisations des Personnes Handicapées(OPH)</li>

@endsection

@section('content')
<!--Card-->
<div class="row no-gutters">
  <div class="col-sm-12 col-md-4">
      <div class="card card-primary text-center">
          <div class="card-header">
              <h3 class="card-title">
                  Nombre d'organisations de personnes handicapées 
              </h3>


          </div>
          <div class="card-body ">

              <h3>
                  {{$nbrItems}}
              </h3>

          </div>
          <div class="card-footer">
              <a href="{{route('ophs.create')}}" class="btn btn-info" title="Ajouter une OPH"><i class="fas fa-plus"></i> En créer</a>

          </div>

      </div>
     


  </div>
  <div class="col-sm-12 col-md-8 pl-3">
      <h2 >Indication sur les OPHs</h2>
      <p>Les organisations de personnes handicapées sont des associations de personnes qui fédèrent 
        la communauté des personnes handicapées. Repartis en type de handicaps, ces OPHs mènent des actions sur le terrain afin de promouvoir aux droits des personnes handicapées et veillent à ce qu'ils soient respectés.
      </p>
      
      


  </div>
      
</div>
<!--/Card-->
<!--List des OPHs-->
<div class="row">
    <div class="col-sm-12 mt-3">
        <h3>
            Tableau des OPHs
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
    {{$items->links()}}
    <table class="table table-hover table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Nom de l'OPH</th>
            <th scope="col">SIGLE</th>
            <th scope="col">Type de handicap</th>
            <th scope="col">Responsable</th>
            <th scope="col">Actions</th>
          </tr>
        </thead>
        <tbody>
            @forelse($items as $item)

          <tr>
            <th  scope="row">
                {{$increment}}
            </th>
            <td>{{ $item->nomOph }}</td>
            <td>{{$item->sigle}}</td>
            <td>
              <ul>
                @forelse($item->type_handicaps as $type_handicap)
                <li>
                  {{ $type_handicap->libelle }}

                </li>
                

                
                

                @empty
                <p class="badge badge-danger">Pas de handicap</p>
                @endforelse
              </ul>
          </td>
            
            <td>{{$item->responsable->prenom}}&nbsp;{{$item->responsable->nom}}</td>
            <td>
              <a href="{{route('ophs.show',$item->id)}}" class="btn btn-info">
                <i class="fas fa-eye"></i> Voir détails
            </a>
            <a href="{{route('ophs.edit',$item->id)}}" class="btn btn-warning">
                <i class="fas fa-pencil-alt"></i> Modifier
            </a>
           
              <form action="{{route('ophs.destroy',$item->id)}}" method="post" style="display:inline" onsubmit="return confirm('Vous êtes sûr?');">
                {{csrf_field()}}
                <input type="hidden" name="_method" value="DELETE">
                <button class="btn btn-danger"><i class="fa fa-pencil"></i>  Supprimer</button>

            </form>
                
            

            </td>
          </tr>
          <?php
              $increment +=1; 
          ?>
          @empty
          <a href="{{route('ophs.create')}}" class="btn btn-danger" title="Ajouter OPH">

            Cliquer pour ajouter OPH            
            <span class="badge badge-danger">
                Pas d'OPHs
           </span>

        </a>

              
          @endforelse

        </tbody>
      </table>
    

</div>
<!--/Liste des OPH-->
@endsection