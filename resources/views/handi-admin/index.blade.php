@extends('layouts.admin')
@section('header')
    Accueil
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/">Accueil</a></li>
    @endsection
@section('content')
            <!-- row title indicateurs -->
            <div class="row">
          <div class="col-12 col-sm-12">
              <h3>
                  Indicateurs: <span class="badge badge-info">{{DB::Table('indicateurs')->count()}}</span> 
                  <a href="{{route('indicateurs.create')}}" title="Ajouter un indicateur"><i class="fas fa-plus"></i></a>
                  
              </h3>
        </div>
        <!-- /.row -->
        <!--row content indicateur-->
        <div class="row">
            <div class="col-sm-12 col-md-8">
                <div class="row">

                @forelse($indicateurs as $indicateur)

                <div class="col-12 col-sm-6 col-md-3">
               
               <div class="card card-primary card-outline">
                 <div class="card-header">
                   <h5 class="m-0">{{$indicateur->libelle}}</h5>
                 </div>
                 <div class="card-body">
                      <h6 class="card-title">{{$indicateur->description}}</h6>

                       <p class="card-text">{{ $indicateur->valeurindicateurs()->latest('id')->first()
               
               }}
           
                     </p>
                   <a href="{{route('indicateurs.show',$indicateur->id)}}" class="btn btn-primary">Voir détail</a>
                </div>
              </div>

               
           @empty
           <span class="badge badge-danger">
                       Pas d'indicateurs
                  </span>
                  <a href="{{route('indicateurs.create')}}" title="Ajouter un indicateur"><i class="fas fa-plus"></i>En créer</a>


          
       </div>
       @endforelse

                </div>
            

            </div>


        </div>


@endsection