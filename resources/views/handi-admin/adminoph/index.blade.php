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
    <div class="row">
        <div class=" col">
            <div class="card text-white bg-primary mb-3" style="max-width: 18rem;">
                <div class="card-header"><i class="fas fa-info-circle"></i></div>
                <div class="card-body">
                  <h5 class="card-title">Définition d'une OPH</h5>
                  <p class="card-text">On entends pas OPH l'ensemble des ONG et des associations qui interviennent dans le domaine du Handicap sur l'étendu du Burkina Faso. </p>
                  <p class="card-text">Elles sont reparties selon le type de handicap dont elles s'occupent </p>
                </div>
            </div>
    

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
            <td>{{route('ophs.show',$item->id)}}</td>
            <td>{{$item->sigle}}</td>
            <td>{{$item->responsable->prenom}}&nbsp;{{$item->responsable->Nom}}</td>
            <td>
            <a href="{{route('ophs.edit',$item->id)}}" class="btn btn-warning">
                <i class="fas fa-pencil-alt"></i>Modifier
            </a>
            <a href="{{route('ophs.delete',$item->id)}}" class="btn btn-danger">
                <i class="fa fa-pencil"></i>Supprimer
            </a>

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