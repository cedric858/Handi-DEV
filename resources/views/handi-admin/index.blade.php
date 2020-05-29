@extends('layouts.admin')
@section('header')
    Accueil
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/">Accueil</a></li>
    @endsection
@section('content')
<!--Row-->
            <div class="row">
              <div class="col-md-12">
                <div class="card">
                  <div class="card-header">
                    <h5 class="card-title">Les indicateurs</h5>
    
                    <div class="card-tools">
                      <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                      </button>
                      <div class="btn-group">
                        <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                          <i class="fas fa-wrench"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" role="menu">
                          <a href="#" class="dropdown-item">Action</a>
                          <a href="#" class="dropdown-item">Another action</a>
                          <a href="#" class="dropdown-item">Something else here</a>
                          <a class="dropdown-divider"></a>
                          <a href="#" class="dropdown-item">Separated link</a>
                        </div>
                      </div>
                      <div class="btn-group">
                        <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
                          <i class="fas fa-exclamation-circle"></i>
                        </button>
                        <div class="dropdown-menu dropdown-menu-right" role="menu">
                          <div class="card bg-primary">
                            <div class="card-header">
                              <h3 class="card-title">
                                Information sur les indicateurs
                              </h3>

                            </div>
                            <div class="card-body">
                              <p>
                                Un indicateur est un outil d'évaluation et d'aide à la décision.
                              </p>
                              


                            </div>
                          </div>
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
<!--Row OPH-->
<div class="row">
  <div class="col-sm-12">
    <div class="card">
      <div class="card-header">
        <h5 class="card-title">Les Organisations de Personnes Handicapées(OPH)</h5>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
          </button>
          <div class="btn-group">
            <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
              <i class="fas fa-wrench"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-right" role="menu">
              <a href="#" class="dropdown-item">Action</a>
              <a href="#" class="dropdown-item">Another action</a>
              <a href="#" class="dropdown-item">Something else here</a>
              <a class="dropdown-divider"></a>
              <a href="#" class="dropdown-item">Separated link</a>
            </div>
          </div>
          <div class="btn-group">
            <button type="button" class="btn btn-tool dropdown-toggle" data-toggle="dropdown">
              <i class="fas fa-exclamation-circle"></i>
            </button>
            <div class="dropdown-menu dropdown-menu-right" role="menu">
              <div class="card bg-primary">
                <div class="card-header">
                  <h3 class="card-title">
                    Information sur les OPH
                  </h3>

                </div>
                <div class="card-body">
                  <p>
                    Les organisations de personnes handicapées sont mises sur pied pour promouvoir les droits des personnes handicapées par la participation à part entière, l'égalisation des chances, et le développement.
                  </p>
                  


                </div>
              </div>
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
                       <h3>OPH</h3>
                       <p>
                         0
                       </p>
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
          <a href="#" class="dropdown-item">Action</a>
          <a href="#" class="dropdown-item">Another action</a>
          <a href="#" class="dropdown-item">Something else here</a>
          <a class="dropdown-divider"></a>
          <a href="#" class="dropdown-item">Separated link</a>
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
            0
    
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
            0
    
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
            0
    
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
            0
    
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
                1

              </th>
              <td>
                {{$region->libelle}}
              </td>
              <td>
                <?php
                  $cheflieux = $region->cheflieu;
                  ?>
                  {{ $cheflieux->libelle }}
              </td>
              <td>
                <?php

                $provinces = $cheflieux->provinces;
                
                  ?>
                  @forelse($provinces as $province)
                  {{ $province->libelle }}
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
                  {{ $commune->libelle }}
                  @empty
                  <p>Pas de communes</p>
                  @endforelse


                @empty
                <p>Pas de communes</p>
                @endforelse
              </td>

            </tr>
            
        @empty
           <p>Rien à afficher</p>
            
        @endforelse
        <tr>
          <th scope="row">1</th>
          <td>Mark</td>
          <td>Otto</td>
          <td>@mdo</td>
        </tr>
        <tr>
          <th scope="row">2</th>
          <td>Jacob</td>
          <td>Thornton</td>
          <td>@fat</td>
        </tr>
        <tr>
          <th scope="row">3</th>
          <td>Larry</td>
          <td>the Bird</td>
          <td>@twitter</td>
        </tr>
      </tbody>
    </table>
    <!--/.tableau-->

  </div>
  <div class="card-footer">

  </div>
</div>

<!--/.row les régions -->

@endsection