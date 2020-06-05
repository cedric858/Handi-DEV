<?php
  $increment = 1;
?>
@extends('layouts.admin')
@section('header')
    Liste des chefs-lieux
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/admin">Accueil</a></li>
    <li class="breadcrumb-item active">Liste des chefs-lieux</li>

@endsection

@section('content')
<!--Header chef-lieu-->
<div class="row no-gutters">
    <div class="col-sm-12 col-md-4">
        <div class="card card-primary text-center">
            <div class="card-header">
                <h3 class="card-title">
                    Nombre de chef-lieux
                </h3>
                

            </div>
            <div class="card-body ">

                <h3>
                    {{ $nbrItems }}
                </h3>

            </div>
            <div class="card-footer">
                <a href="{{route('cheflieus.create')}}" class="btn btn-info" title="Ajouter un chef-lieu"><i class="fas fa-plus"></i> En créer</a>

            </div>

        </div>
    </div>
    <div class="col-sm-12 col-md-8 pl-3">
        <h2 >Indication sur les chefs-lieux</h2>
        <p>Chaque chef-lieu du Burkina Faso fait partie d'une région et possède chacune une ou plusieurs provinces</p>
        


    </div>
        
</div>

    <!--Liste des domaines-->
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">
                Liste des chefs-lieux:
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

            </h3>
            {{$items->links()}}

        </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th>
                            #
                        </th>
                        <th>
                            Libellé
                        </th>
                        <th>
                            Provinces
                        </th>
                        <th>
                            Actions
                        </th>
                    </tr>

                </thead>
                <tbody>
                    @forelse ($items as $item)
                    <tr>
                        <th>
                            {{ $increment }}
                        </th>
                        <td>
                            {{ $item->libelle }}
                        </td>
                        <td>
                            <ul>
                                @forelse ($item->provinces as $province)
                                <li>
                                <a href="{{ route('provinces.show',$province->id) }}">
                                    {{ $province->libelle }}
                                </a>
                                    
                                </li>
                                    
                                @empty
                                <p class="badge badge-danger" >Pas de provinces pour ce chef-lieu</p>
                                    
                                @endforelse

                            </ul>
                            
                        </td>
                        <td>
                            <a href="{{route('cheflieus.show',$item->id)}}" class="btn btn-info">
                                <i class="fas fa-eye"></i> Voir détails
                            </a>
                            <a href="{{route('cheflieus.edit',$item->id)}}" class="btn btn-warning">
                                <i class="fas fa-pencil-alt"></i> Modifier
                            </a>
                           
                              <form action="{{route('cheflieus.destroy',$item->id)}}" method="post" style="display:inline" onsubmit="return confirm('Vous êtes sûr?');">
                                {{csrf_field()}}
                                <input type="hidden" name="_method" value="DELETE">
                                <button class="btn btn-danger"><i class="fa fa-pencil"></i>  Supprimer</button>
                
                            </form>
                        </td>
                    </tr>
                        <?php $increment +=1;  ?>
                    @empty
                    <p class="badge badge-danger">
                        Pas de chef-lieu

                    </p>
                        
                    @endforelse

                </tbody>
                <tfoot>
                    

                </tfoot>
            </table>

        </div>
        <div class="card-footer">
            {{$items->links()}}

        </div>

    </div>
    <div class="row">
        <div class="col-sm-12 mt-3">
            <h3>
                Liste des chefs-lieux
            </h3>
            

        </div>
    </div>
@endsection
