<?php
$increment = 1;
?>
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
        <div class="col-sm-12 col-md-4">
            <div class="card card-primary text-center">
                <div class="card-header">
                    <h3 class="card-title">
                        Nombre de domaines 
                    </h3>
                    

                </div>
                <div class="card-body ">

                    <h3>
                        {{$nbrItems}}
                    </h3>

                </div>
                <div class="card-footer">
                    <a href="{{route('domaines.create')}}" class="btn btn-info" title="Ajouter un domaine"><i class="fas fa-plus"></i> En créer</a>

                </div>

            </div>
           


        </div>
        <div class="col-sm-12 col-md-8 pl-3">
            <h2 >Indication sur les domaines</h2>
            <p>Les domaines réunissent les structures étatiques, les entreprises prise qui partagent   des activités économiques similaires</p>
            <p >
                Les indicateurs définis par domaine permettent un suivi de la convention pour la promotion des personnes handicapées
            </p>
            


        </div>
            
    </div>
    <!--/Header domaine-->
    <!--Liste des domaines-->
    <div class="row">
        <div class="col-sm-12 mt-3">
            
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

    
<div class="card">
        <div class="card-header">
            <h4 class="card-title">
               Liste des domaines
            </h4>

        </div>
        <div class="card-body" >
            <table>
                <thead>
                    <tr>
                        <th>
                            #
                        </th>
                        <th>
                            Libellé du domaine
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
                            <a href="{{route('domaines.show',$item->id)}}" class="btn btn-info">
                                <i class="fas fa-eye"></i> Voir détails
                            </a>
                            <a href="{{route('domaines.edit',$item->id)}}" class="btn btn-warning">
                                <i class="fas fa-pencil-alt"></i> Modifier
                            </a>
                           
                              <form action="{{route('domaines.destroy',$item->id)}}" method="post" style="display:inline" onsubmit="return confirm('Vous êtes sûr?');">
                                {{csrf_field()}}
                                <input type="hidden" name="_method" value="DELETE">
                                <button class="btn btn-danger"><i class="fa fa-pencil"></i>  Supprimer</button>
                
                            </form>
                        </td>
                    </tr>
                    <?php $increment +=1 ?>
                    @empty
                    <p class="badge badge-danger" >Pas de domaine</p>
                        
                    @endforelse


                </tbody>
                <tfoot>
                    {{$items->links()}}

                </tfoot>
            </table>
        </div>
    </div>
        


    

        
        




@endsection
