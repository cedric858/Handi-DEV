@extends('layouts.admin')
@section('header')
    Accueil
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/">Accueil</a></li>
    @endsection
@section('content')

<?php
$increment = 1;
$increment0 = 1;
$increment1 = 1;
$increment2 = 1;
?>

<!--Row-->
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h5 class="card-title">Les indicateurs: <span class="badge badge-info">{{$indicateurs->count()}}</span> </h5>
                  
    
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                      <div class="btn-group">
                        <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                          <i class="fas fa-wrench"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" role="menu">
                          <a href="{{route('indicateurs.index')}}" class="dropdown-item">Voir les indicateurs</a>
                          <a href="{{route('indicateurs.create')}}" class="dropdown-item">Ajouter un indicateur</a>
                        </div>
                      </div>
                      
                    </div>
                  </div>
                  <!-- /.card-header -->
                  <div class="card-body">
                    <!--Card pour les indicateurs-->
                    <div class="row" >
                      <!--Card info stat-->
                      <div class="col-sm-4" >
                        <div class="card card-outline card-primary">
                            <div class="card-header">
                                 <h3 class="card-title">Nombre total d'indicateurs</h3>
                            </div>
                              <!-- /.card-header -->
                            <div class="card-body">
                                                 0
                             </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                              <a href="{{route('indicateurs.create')}}" class="btn btn-success">Ajouter un indicateur</a>
                               <a href="{{route('indicateurs.index')}}" class="btn btn-primary">Voir la liste de tous les indicateurs</a>
                            </div>
                          <!-- /.card-footer -->
                      </div>
                      
                    </div>

                      <!--/.Card info stat-->
                       <!--card info indicateur nbr handi--> 
                       <div class="col-sm-4" >
                         <div class="card card-primary">
                             <div class="card-header">
                                  <h3 class="card-title">Nombre total de personnes handicapé</h3>
                             </div>
                               <!-- /.card-header -->
                             <div class="card-body">
                                                  0
                              </div>
                             <!-- /.card-body -->
                             <div class="card-footer">
                                <a href="{{route('indicateurs.index')}}" class="btn btn-primary">Voir détails</a>
                             </div>
                                                <!-- /.card-footer -->
                       </div>
                       
                     </div>
                     <!--/card info indicateur nbr handi -->
                                          <!--card info indicateur 2-->
                                          <div class="col-sm-4" >
                                            <div class="card card-primary">
                                                <div class="card-header">
                                                     <h3 class="card-title">Nombre total de personnes handicapé</h3>
                                                </div>
                                                  <!-- /.card-header -->
                                                <div class="card-body">
                                                                     0
                                                 </div>
                                                <!-- /.card-body -->
                                                <div class="card-footer">
                                                   <a href="{{route('indicateurs.index')}}" class="btn btn-primary">Voir détails</a>
                                                </div>
                                                                   <!-- /.card-footer -->
                                          </div>
                                           <!--/.card info indicateur 2-->
                      
                   </div>
                    <!-- /.card -->
                   <!--/card info indicateur nbr handi -->
                  </div>
                  <!-- ./card-body --
                  <div class="card-footer">
                    <div class="row">
                      <div class="col-sm-3 col-6">
                        <div class="description-block border-right">
                          <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> </span>
                          <h5 class="description-header">0</h5>
                          <span class="description-text">TOTAL HANDICAPES MOTEURS</span>
                        </div>
                        <!-- /.description-block --
                      </div>
                      <!-- /.col --
                      <div class="col-sm-3 col-6">
                        <div class="description-block border-right">
                          <span class="description-percentage text-warning"><i class="fas fa-caret-left"></i> 0%</span>
                          <h5 class="description-header">$10,390.90</h5>
                          <span class="description-text">TOTAL COST</span>
                        </div>
                        <!-- /.description-block --
                      </div>
                      <!-- /.col --
                      <div class="col-sm-3 col-6">
                        <div class="description-block border-right">
                          <span class="description-percentage text-success"><i class="fas fa-caret-up"></i> 20%</span>
                          <h5 class="description-header">$24,813.53</h5>
                          <span class="description-text">TOTAL PROFIT</span>
                        </div>
                        <!-- /.description-block --
                      </div>
                      <!-- /.col --
                      <div class="col-sm-3 col-6">
                        <div class="description-block">
                          <span class="description-percentage text-danger"><i class="fas fa-caret-down"></i> 18%</span>
                          <h5 class="description-header">1200</h5>
                          <span class="description-text">GOAL COMPLETIONS</span>
                        </div>
                        <!-- /.description-block --
                      </div>
                    </div>
                    <!-- /.row --
                  </div>
                  <!-- /.card-footer -->
                </div>
                <!-- /.card -->
              </div>
              <!-- /.col -->

            </div>
          </div>
<!--/.ROw indicateur-->

<!--Row les domaines-->
<div class="card">
  <div class="card-header">
    <h3 class="card-title">
      Les différents domaines: <span class="badge badge-info">{{$domaines->count()}}</span>
    </h3>
    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse">
        <i class="fas fa-minus"></i>
      </button>
      <div class="btn-group">
        <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
          <i class="fas fa-wrench"></i>
        </button>
        <div class="dropdown-menu dropdown-menu-right" role="menu">
          <a href="{{route('domaines.index')}}" class="dropdown-item">Voir tous les domaine</a>
          <a href="{{route('domaines.create')}}" class="dropdown-item">Ajouter un domaine</a>
          
        </div>
      </div>
    </div>

  </div>
  <div class="card-body">
    <!--tableau-->
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Libellé du domaine</th>
          <th scope="col">description</th>
          <th scope="col">Action</th>
        </tr>
        <?php
        
        
        

        ?>
      </thead>
      <tbody>
        @forelse ($domaines as $domaine)
            <tr>
              <th>
                {{$increment0}}

              </th>
              <td>
                {{$domaine->libelle}}
              </td>
              <td>
                  @if ($domaine->description)
                  {{$domaine->description}}
                      
                  @else
                  <p>Pas de description</p>
                      
                  @endif
                  
              </td>
              <td>
                <a href="{{route('domaines.show',$domaine->id)}}" class="btn btn-info">
                  Voir détails
                </a>
                <a href="{{route('domaines.edit',$domaine->id)}}" class="btn btn-warning">
                  Modifier
                </a>
                <form action="{{route('domaines.destroy',$domaine->id)}}" method="post" style="display:inline" onsubmit="return confirm('Vous êtes sûr?');">
                  {{csrf_field()}}
                  <input type="hidden" name="_method" value="DELETE">
                  <button class="btn btn-danger">Supprimer</button>

              </form>
              </td>

              


            </tr>
            <?php
            $increment0 +=1; 
            ?>
            
        @empty
           <p>Pas de région</p>
            
        @endforelse
       
      </tbody>
    </table>
    <!--/.tableau-->

  </div>
  <div class="card-footer">

  </div>
</div>
<!--/.Row les domaines-->

<!--Row OPH-->
<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-header">
        <h5 class="card-title">Les Organisations de Personnes Handicapées(OPH) : <span class="badge badge-info">{{$ophs->count()}}</span> </h5>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
          </button>
          <div class="btn-group">
            <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
              <i class="fas fa-wrench"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-right" role="menu">
              <a href="{{route('ophs.index')}}" class="dropdown-item">Voir les OPHs</a>
              <a href="{{route('ophs.create')}}" class="dropdown-item">Ajouter une OPH </a>
              
            </div>
          </div>
          
        </div>
      </div>
      <!-- /.card-header -->
      <!--Card body-->
      <div class="card-body">
        

           <!--card association--> 
             <div class="card card-primary">
                 <div class="card-header">
                      <h3 class="card-title">Nombre total d'OPH</h3>
                 </div>
                   <!-- /.card-header -->
                 <div class="card-body">
                   <div class="row">
                     <div class="col-sm-12 col-md-4">
                      
                      <i class="fas fa-globe fa-7x"></i>
                     </div>
                     <div class="col-sm-12 col-md-8">
                       <h3>{{ $ophs->count() }}</h3>
                      
                     </div>
                   </div>
                  </div>
                 <!-- /.card-body -->
                 <div class="card-footer">
                  <a href="{{route('ophs.index')}}" class="btn btn-primary">
                    Voir les OPHs
                  </a>

                 </div>
              <!-- /.card-footer -->
             </div>
         <!--/.Card Association-->
         <!--card ONG--> 
    <!--/.Card ONG-->
        <!-- /.card -->
       <!--/card info indicateur nbr handi -->
      <!--/.row-->
    </div>
      <!-- ./card-body -->
      <div class="card-footer">
        
      </div>
      <!-- /.card-footer -->
    </div>
    <!----/.Card body-------->
    <!-- /.card -->
  </div>
  <!-- /.col -->

</div>
<!--/.ROW OPH-->
<!--row les régions-->
<div class="card">
  <div class="card-header">
    <h3 class="card-title">
      Les régions, chefs-lieux, provinces, communes
    </h3>
    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse">
        <i class="fas fa-minus"></i>
      </button>
      <div class="btn-group">
        <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
          <i class="fas fa-wrench"></i>
        </button>
        <div class="dropdown-menu dropdown-menu-right" role="menu">
          <a href="{{route('regions.index')}}" class="dropdown-item">Aller aux régions</a>
          <a href="{{route('cheflieus.index')}}" class="dropdown-item">Aller aux chefs lieux</a>
          <a href="{{route('provinces.index')}}" class="dropdown-item">Aller aux provinces</a>
          <a href="{{route('communes.index')}}" class="dropdown-item">Aller aux communes</a>
          
        </div>
      </div>
    </div>

  </div>
  <div class="card-body">
    <!--Les region chef lieux -->
    <div class="row">
      <!--col région-->
      <div class="col-sm-12 col-md-6 col-lg-3">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">
              Les régions
    
            </h3>
    
          </div>
          <div class="card-body">

            <h2>
              {{ $regions->count() }}


            </h2>
    
          </div>
          <div class="card-footer">
          <a href="{{route('regions.index')}}" class="btn btn-primary">
            Voir les régions
          </a>
    
          </div>
        </div>
    
      </div>
      <!--/.col région-->
      <!--col chef lieux-->
      <div class="col-sm-12 col-md-6 col-lg-3">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">
              Les chef-lieux
    
            </h3>
    
          </div>
          <div class="card-body">
            <h2>
              {{ $cheflies->count() }}


            </h2>
    
          </div>
          <div class="card-footer">
          <a href="{{route('cheflieus.index')}}" class="btn btn-primary">
            Voir les chef-lieux
          </a>
    
          </div>
        </div>
    
      </div>
      <!--/.col chef lieu-->
      <!--col provinces-->
      <div class="col-sm-12 col-md-6 col-lg-3">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">
              Les provinces
    
            </h3>
    
          </div>
          <div class="card-body">
            <h2>
              {{ $provinces->count() }}


            </h2>

    
          </div>
          <div class="card-footer">
          <a href="{{route('provinces.index')}}" class="btn btn-primary">
            Voir les provinces
          </a>
    
          </div>
        </div>
    
      </div>
      <!--/.col province-->
      <!--col communes-->
      <div class="col-sm-12 col-md-6 col-lg-3">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">
              Les communes
    
            </h3>
    
          </div>
          <div class="card-body">
            <h2>
              {{ $communes->count() }}


            </h2>

    
          </div>
          <div class="card-footer">
          <a href="{{route('communes.index')}}" class="btn btn-primary">
            Voir les communes
          </a>
    
          </div>
        </div>
    
      </div>
      <!--/.col chef lieu-->
      
    </div>
    <!--Les region chef lieux-->
    <!--tableau-->
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Région</th>
          <th scope="col">Chef-lieux</th>
          <th scope="col">Provinces</th>
          <th scope="col">Communes</th>
        </tr>
        <?php

        ?>
      </thead>
      <tbody>
        @forelse ($regions as $region)
            <tr>
              <th>
                {{$increment}}

              </th>
              <td>
                {{$region->libelle}}
              </td>
              
                <?php
                  $cheflieux = $region->cheflieu;
                  ?>
                  @if ( $region->cheflieu !== null)
                  <?php 
                  $cheflieux = $region->cheflieu;
                  ?>
                  <td>
                  {{ $cheflieux->libelle }}
                </td>
                <td>
                  <?php
                     $provinces = $cheflieux->provinces;
                  ?>
                    @forelse($provinces as $province)
                    {{ $province->libelle }} <br>
                    @empty
                    <p>Pas de provinces</p>
                    @endforelse
                  </td>
                <td>
                  @forelse($provinces as $province)
                    <?php
                    $communes = $province->communes
                    ?>
  
                    @forelse($communes as $commune)
                    {{ $commune->libelle }} --> {{ $commune->province->libelle }} 
                    <br>
                    @empty
                    <p>Pas de communes</p>
                    @endforelse
  
                    
  
                  @empty
                  <p>Pas de province</p>
                  @endforelse
                </td>
                  @else
                  <td>
                    <p>Pas de chef-lieu, province, commune pour cette région</p>
                    
                  </td>
                  
                      
                  @endif
                  
                  
              
              


            </tr>
            <?php
            $increment +=1; 
            ?>
            
        @empty
           <p>Pas de région</p>
            
        @endforelse
       
      </tbody>
    </table>
    <!--/.tableau-->

  </div>
  <div class="card-footer">

  </div>
</div>

<!--/.row les régions -->
<!--row les handicaps-->
<div class="card">
  <div class="card-header">
    <h3 class="card-title">
      Les différent types de handicaps: <span class="badge badge-info">{{$handicaps->count()}}</span>
    </h3>
    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse">
        <i class="fas fa-minus"></i>
      </button>
      <div class="btn-group">
        <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
          <i class="fas fa-wrench"></i>
        </button>
        <div class="dropdown-menu dropdown-menu-right" role="menu">
          <a href="{{route('typehandicaps.index')}}" class="dropdown-item">Voir les types de handicap</a>
          <a href="{{route('typehandicaps.create')}}" class="dropdown-item">Ajouter un type de handicap</a>
         
        </div>
      </div>
    </div>

  </div>
  <div class="card-body">
    <!--tableau-->
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Libellé du handicap</th>
          <th scope="col">description</th>
          <th scope="col">Action</th>
        </tr>
        <?php
        
        
        

        ?>
      </thead>
      <tbody>
        @forelse ($handicaps as $handicap)
            <tr>
              <th>
                {{$increment1}}

              </th>
              <td>
                {{$handicap->libelle}}
              </td>
              <td>
                
                  {{ $handicap->description }}
              </td>
              <td>

                <a href="{{route('typehandicaps.show',$handicap->id)}}" class="btn btn-info">
                  Voir détails
                </a>
                <a href="{{route('typehandicaps.edit',$handicap->id)}}" class="btn btn-warning">
                  Modifier
                </a>
                <form action="{{route('typehandicaps.destroy',$handicap->id)}}" method="post" style="display:inline" onsubmit="return confirm('Vous êtes sûr?');">
                  {{csrf_field()}}
                  <input type="hidden" name="_method" value="DELETE">
                  <button class="btn btn-danger">Supprimer</button>

              </form>
  
              </td>
              


            </tr>
            <?php
            $increment1 +=1; 
            ?>
            
        @empty
           <p>Pas de région</p>
            
        @endforelse
       
      </tbody>
    </table>
    <!--/.tableau-->

  </div>
  <div class="card-footer">

  </div>
</div>

<!--/.row les handicaps-->
<!--Row les langues-->
<div class="card">
  <div class="card-header">
    <h3 class="card-title">
      Les différents langues parlées au burkina faso: <span class="badge badge-info">{{$langues->count()}}</span>
    </h3>
    <div class="card-tools">
      <button type="button" class="btn btn-tool" data-card-widget="collapse">
        <i class="fas fa-minus"></i>
      </button>
      <div class="btn-group">
        <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
          <i class="fas fa-wrench"></i>
        </button>
        <div class="dropdown-menu dropdown-menu-right" role="menu">
          <a href="{{route('langues.index')}}" class="dropdown-item">Voir toutes les langues</a>
          <a href="{{route('langues.create')}}" class="dropdown-item">Ajouter une langue</a>
          
        </div>
      </div>
    </div>

  </div>
  <div class="card-body">
    <!--tableau-->
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">Libellé de la langue</th>
          <th scope="col">description</th>
          <th scope="col">Action</th>
        </tr>
        <?php
        
        
        

        ?>
      </thead>
      <tbody>
        @forelse ($langues as $langue)
            <tr>
              <th>
                {{$increment2}}

              </th>
              <td>
                {{$langue->libelle}}
              </td>
              <td>
                  @if ($langue->description)
                  {{$langue->description}}
                      
                  @else
                  <p>Pas de description</p>
                      
                  @endif
                  
              </td>
              <td>
                <a href="{{route('langues.show',$handicap->id)}}" class="btn btn-info">
                  Voir détails
                </a>
                <a href="{{route('langues.edit',$handicap->id)}}" class="btn btn-warning">
                  Modifier
                </a>
                <form action="{{route('langues.destroy',$handicap->id)}}" method="post" style="display:inline" onsubmit="return confirm('Vous êtes sûr?');">
                  {{csrf_field()}}
                  <input type="hidden" name="_method" value="DELETE">
                  <button class="btn btn-danger">Supprimer</button>

              </form>
              </td>

              


            </tr>
            <?php
            $increment2 +=1; 
            ?>
            
        @empty
           <p>Pas de région</p>
            
        @endforelse
       
      </tbody>
    </table>
    <!--/.tableau-->

  </div>
  <div class="card-footer">

  </div>
</div>


<!--/.Row les langues-->

@endsection