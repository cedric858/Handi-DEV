<?php $increment = 1 ?>
@extends('layouts.admin')
@section('header')
    Liste des handicaps
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/admin">Accueil</a></li>
    <li class="breadcrumb-item active">Liste des handicaps</li>

@endsection

@section('content')
<!--Header typeHandicap-->
<div class="row no-gutters">
    <div class="col-sm-12 col-md-4">
        <div class="card card-primary text-center">
            <div class="card-header">
                <h3 class="card-title">
                    Nombre de type de handicap 
                </h3>
                

            </div>
            <div class="card-body ">

                <h3>
                    {{$nbrItems}}
                </h3>

            </div>
            <div class="card-footer">
                <a href="{{route('typehandicaps.create')}}" class="btn btn-info" title="Ajouter un type de handicap"><i class="fas fa-plus"></i> En créer</a>

            </div>

        </div>
       


    </div>
    <div class="col-sm-12 col-md-8 pl-3">
        <h2 >Indication sur les types de handicaps</h2>
        <p>Selon la définition de l’Organisation Mondiale de la Santé (OMS), « est handicapée toute personne dont l’intégrité physique ou mentale est passagèrement ou définitivement diminuée, soit congénitalement, soit sous l’effet de l’âge ou d’un accident, en sorte que son autonomie, son aptitude à fréquenter l’école ou à occuper un emploi s’en trouvent compromises ».On peut en répertorier en plusieurs types</p>
        


    </div>
        
</div>
<!--/Header TypeHandicap-->
    <!--Liste des types de handicap-->
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">
               Liste des types de handicap
            </h4>

        </div>
        <div class="card-body" >
            <table class="table">
                <thead>
                    <tr>
                        <th>
                            #
                        </th>
                        <th>
                            Libellé du handicap
                        </th>
                        <th>
                            Actions
                        </th>

                    </tr>

                </thead>
                <tbody>
                    @forelse ($items as $item)
                    <tr>
                        <td>
                            {{ $increment }}
                        </td>
                        <td>
                            {{ $item->libelle }}
                        </td>
                        <td>
                            <a href="{{route('typehandicaps.show',$item->id)}}" class="btn btn-info">
                                <i class="fas fa-eye"></i> Voir détails
                            </a>
                            <a href="{{route('typehandicaps.edit',$item->id)}}" class="btn btn-warning">
                                <i class="fas fa-pencil-alt"></i> Modifier
                            </a>
                           
                              <form action="{{route('typehandicaps.destroy',$item->id)}}" method="post" style="display:inline" onsubmit="return confirm('Vous êtes sûr?');">
                                {{csrf_field()}}
                                <input type="hidden" name="_method" value="DELETE">
                                <button class="btn btn-danger"><i class="fa fa-pencil"></i>  Supprimer</button>
                
                            </form>
                        </td>
                    </tr>
                    <?php $increment +=1 ?>
                    @empty
                    <p class="badge badge-danger" >Pas de type de handicap</p>
                        
                    @endforelse


                </tbody>
                <tfoot>
                    {{$items->links()}}

                </tfoot>
            </table>
        </div>
    </div>
    <!--/Liste des types de handicap-->
@endsection
