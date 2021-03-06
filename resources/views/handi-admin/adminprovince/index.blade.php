<?php $increment = 1; ?>
@extends('layouts.admin')
@section('header')
    Liste des   provinces
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/admin">Accueil</a></li>
    <li class="breadcrumb-item active">Liste des   provinces</li>

@endsection

@section('content')
<!--Header province-->
<div class="row no-gutters">
    <div class="col-sm-12 col-md-4">
        <div class="card card-primary text-center">
            <div class="card-header">
                <h3 class="card-title">
                    Nombre de type de province
                </h3>
                

            </div>
            <div class="card-body ">

                <h3>
                    {{$nbrItems}}
                </h3>

            </div>
            <div class="card-footer">
                <a href="{{route('provinces.create')}}" class="btn btn-info" title="Ajouter une province"><i class="fas fa-plus"></i> En créer</a>

            </div>

        </div>
       


    </div>
    <div class="col-sm-12 col-md-8 pl-3">
        <h2 >Indication sur les provinces</h2>
        <p>Les provinces du Burkina Faso sont subdivisées en communes. Nous avons des communes rurales et des communes urbaines.</p>
            <p>Les province font également partie des chef-lieux</p>
        


    </div>
        
</div>

    <!--Liste des provinces-->
    <div class="card">
        <div class="card-header">
            <h4 class="card-title">
                Liste des provinces
                {{$items->links()}}

            </h4>
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
        <div class="card-body">
            <table class="table" >
                <thead>
                    <th>
                        #
                    </th>
                    <th>
                        Libellé
                    </th>
                    <th>
                        Les communes
                    </th>
                    <th>
                        Actions
                    </th>
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
                                @forelse ($item->communes as $commune)
                                <li>
                                <a href="{{ route('communes.show',$commune->id) }}">
                                    {{ $commune->libelle }}
                                </a>
                                    
                                </li>
                                
                                @empty
                                    <p class="badge badge-danger">
                                        Pas de communes pour cette province
                                    </p>
                                
                                @endforelse

                            </ul>
                            
                        </td>
                        <td>
                            <a href="{{route('provinces.show',$item->id)}}" class="btn btn-info">
                                <i class="fas fa-eye"></i> Voir détails
                            </a>
                            <a href="{{route('provinces.edit',$item->id)}}" class="btn btn-warning">
                                <i class="fas fa-pencil-alt"></i> Modifier
                            </a>
                           
                              <form action="{{route('provinces.destroy',$item->id)}}" method="post" style="display:inline" onsubmit="return confirm('Vous êtes sûr?');">
                                {{csrf_field()}}
                                <input type="hidden" name="_method" value="DELETE">
                                <button class="btn btn-danger"><i class="fa fa-pencil"></i>  Supprimer</button>
                
                            </form>
                        </td>
                    </tr>
                    <?php $increment +=1; ?>
                        
                    @empty
                        
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
    @endsection
