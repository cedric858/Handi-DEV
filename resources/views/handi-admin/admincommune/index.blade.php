<?php $increment = 1; ?>
@extends('layouts.admin')
@section('header')
    Liste des communes
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/admin">Accueil</a></li>
    <li class="breadcrumb-item active">Liste des communes</li>

@endsection

@section('content')
<!--Header commune-->
<div class="row no-gutters">
    <div class="col-sm-12 col-md-4">
        <div class="card card-primary text-center">
            <div class="card-header">
                <h3 class="card-title">
                    Nombre de communes
                </h3>
                

            </div>
            <div class="card-body ">

                <h3>
                    {{$nbrItems}}
                </h3>

            </div>
            <div class="card-footer">
                <a href="{{route('communes.create')}}" class="btn btn-info" title="Ajouter une commune"><i class="fas fa-plus"></i> En créer</a>

            </div>

        </div>
       


    </div>
    <div class="col-sm-12 col-md-8 pl-3">
        <h2 >Indication sur les communes</h2>
        <p>Les communes du Burkina Faso sont de deux types. Nous avons les communes urbaines et les communes rurales.</p>
    </div>
        
</div>
<!--/.Header commune-->
 
    <!--Liste des domaines-->
    
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">
                        Liste des communes
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
                                    <a href="{{route('communes.show',$item->id)}}" class="btn btn-info">
                                        <i class="fas fa-eye"></i> Voir détails
                                    </a>
                                    <a href="{{route('communes.edit',$item->id)}}" class="btn btn-warning">
                                        <i class="fas fa-pencil-alt"></i> Modifier
                                    </a>
                                   
                                      <form action="{{route('communes.destroy',$item->id)}}" method="post" style="display:inline" onsubmit="return confirm('Vous êtes sûr?');">
                                        {{csrf_field()}}
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button class="btn btn-danger"><i class="fa fa-pencil"></i>  Supprimer</button>
                        
                                    </form>
                                </td>
                            </tr>
    
                                <?php $increment +=1; ?>
                            @empty
                            <p class="badge badge-danger">Pas communes</p>
                                
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

        </div>
        
        
@endsection
