@extends('layouts.admin')
@section('header')
    Détails Organisations de Personnes Handicapées
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/admin">Accueil</a></li>
    <li class="breadcrumb-item"><a href="{{route('ophs.index')}}">Liste OPHs</a></li>
    <li class="breadcrumb-item active">Détails OPhs</li>

@endsection

@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title"> <i class="fas fa-"></i> Les détails</h5>

                </div>
                <div class="card-body">
                    <form action="">
                        <div class="row">
                            <div class="col">
                                <h5>Informations générales </h3>
                                    <div class="form-group">
                                        <label for="nomOph">Nom de l'OPH   <span class="text text-danger">*</span> </label>
                                        <input  disabled aria-describedby="errorNomOph" type="text" class="form-control @error('nomOph') is-invalid @enderror " name="nomOph" value="{{old('nomOph',$oph->nomOph)}}" placeholder="Entrez le nom de l'OPH" >
                                        @error('nomOph')
                                        <small class="form-text text-danger" id='errorNomOph'>
                                            {{$errors->first('nomOph')}}
                              
                                        </small>
                                    @enderror
                              
                                      </div>
                                        <!--Sigle-->
                              
                                      <div class="form-group">
                                          <label for="sigle">Sigle <span class="text text-danger">*</span> </label>
                                          <input  disabled aria-describedby="errorSigle" type="text" class="form-control @error('sigle') is-invalid @enderror " name="sigle" value="{{old('sigle',$oph->sigle)}}" placeholder="Entrez le sigle de l'OPH">
                                          @error('sigle')
                                          <small class="form-text text-danger" id='errorSigle'>
                                              {{$errors->first('sigle')}}
                                
                                          </small>
                                      @enderror
                                
                                        </div>
                              
                                        <!--/.Sigle-->
                                        <!--Téléphone OPH-->
                                        <div class="form-group">
                                          <label for="telephoneOph">Téléphone de la structure<span class="text text-danger">*</span> </label>
                                          <input  disabled aria-describedby="errorTelephoneOph" type="text" class="form-control @error('telephoneOph') is-invalid @enderror " name="telephoneOph" value="{{old('telephoneOph',$oph->phone)}}" placeholder="Téléphone  responsable">
                                          @error('telephoneOph')
                                          <small class="form-text text-danger" id='telephoneOph'>
                                              {{$errors->first('telephoneOph')}}
                                
                                          </small>
                                      @enderror
                                
                                        </div>
                              
                              
                              
                                        <!--/.Téléphone OPH-->
                              
                                        <!--Mission et objectifs-->
                                        <div class="form-group">
                                          <label for="missionObjectif">Mission et Objectif:</label>
                                  
                                          <textarea disabled aria-describedby="errorMissionObjectif" name="missionObjectif" class="form-control @error('missionObjectif') is-invalid @enderror " id="missionObjectif" cols="30" rows="10">{{old('missionObjectif',$oph->missionObjectif)}}</textarea>
                                          @error('missionObjectif')
                                              <small class="form-text text-danger" id='errorMissionObjectif'>
                                                  {{$errors->first('missionObjectif')}}
                              
                                              </small>
                                          @enderror
                              
                              
                              
                              
                                      </div>
                              
                                        
                                        <!--/.Mission et objectifs-->
                              
                                       <!--Type de handicap-->

                                      <div class="form-group">
                                        <label for="type_handicap_id">Type de handicap <span class="text text-danger">*</span> </label>
                                        @forelse($oph->type_handicaps as $type_handicap)
                                        {{ $type_handicap->libelle }}, &nbsp;
                            
                                        @empty
                                        <p>Pas de handicap</p>
                                        @endforelse
                                      </div>
                              
                              
                                       <!--/.Type de handicap-->
                                       <!--Date de création-->
                                       <div class="form-group">
                                          <label for="dateCreation">Date de création <span class="text text-danger">*</span> </label>
                                          <input  disabled type="date" name="dateCreation" id="dateCreation" value="{{old('dateCreation',$oph->dateCreation)}}">
                              
                              
                                       </div>
                                       <!--/.Date de création-->
                                       <!--domaine-->
                                       <label for="domaine_id">Domaines <span class="text text-danger">*</span> </label>
                                       @forelse($oph->domaines as $domaine)
            {{ $domaine->libelle }}, &nbsp;

            @empty
            <p>Pas de domaine</p>
            @endforelse
                              
                                       <!--/.domaine-->
                                       <!--Activité Menée-->
                                       <div class="form-group">
                                          <label for="activite">Activités menées <span class="text text-danger">*</span> </label>
                                          <input  disabled aria-describedby="errorActivite" type="text" class="form-control @error('activite') is-invalid @enderror " name="activite" value="{{old('activite',$oph->activite)}}" placeholder="Listez les activités séparées par des virguless">
                                          @error('activite')
                                          <small class="form-text text-danger" id='errorActivite'>
                                              {{$errors->first('activite')}}
                                
                                          </small>
                                      @enderror
                                
                                        </div>
                              
                                       <!--/.Activité Menée-->
                                       <!--Bénéficiaires-->
                                       <div class="form-group">
                                          <label for="beneficiaire">Bénéficiaires <span class="text text-danger">*</span> </label>
                                          <input  disabled aria-describedby="errorBeneficiare" type="text" class="form-control @error('beneficiaire') is-invalid @enderror " name="beneficiaire" value="{{old('beneficiaire',$oph->beneficiaire)}}" placeholder="Listez les bénéficiaire séparés par des virgules">
                                          @error('activite')
                                          <small class="form-text text-danger" id='errorActivite'>
                                              {{$errors->first('activite')}}
                                
                                          </small>
                                      @enderror
                                
                                        </div>
                              
                                       <!--/.Bénéficiaires-->
                                       <!--Accessibilité-->
                                       <div class="form-group">
                                          <label for="accessibilite">Accéssibilité <span class="text text-danger">*</span> </label>
                                          <input  disabled aria-describedby="errorAccessibilite" type="text" class="form-control @error('accessibilite') is-invalid @enderror " name="accessibilite" value="{{old('accessibilite',$oph->accessibilite)}}" placeholder="Séparez les différentes options par des virguless">
                                          @error('accessibilite')
                                          <small class="form-text text-danger" id='errorAccessibilite'>
                                              {{$errors->first('errorAccessibilite')}}
                                
                                          </small>
                                      @enderror
                                
                                        </div>
                                       <!--/.Accessibilité-->
                                       <!--Source de financement-->
                                       <div class="form-group">
                                          <label for="sourceFinancement">Source de Financement <span class="text text-danger">*</span> </label>
                                          <input  disabled aria-describedby="errorSourceFinancement" type="text" class="form-control @error('sourceFinancement') is-invalid @enderror " name="sourceFinancement" value="{{old('sourceFinancement',$oph->sourceFinancement)}}" placeholder="Renseignez les sources de financement séparées par des virgules">
                                          @error('sourceFinancement')
                                          <small class="form-text text-danger" id='errorSourceFinancement'>
                                              {{$errors->first('sourceFinancement')}}
                                
                                          </small>
                                      @enderror
                                
                                        </div>
                              
                                       <!--/.Source de financement-->
                                       <!--Partenaires-->
                                       <div class="form-group">
                                          <label for="partenaire">Partenaires <span class="text text-danger">*</span> </label>
                                          <input  disabled aria-describedby="errorPartenaire" type="text" class="form-control @error('partenaire') is-invalid @enderror " name="partenaire" value="{{old('partenaire',$oph->partenaire)}}" placeholder="Renseignez les partenaires séparés par des virgules">
                                          @error('partenaire')
                                          <small class="form-text text-danger" id='partenaire'>
                                              {{$errors->first('partenaire')}}
                                
                                          </small>
                                      @enderror
                                
                                        </div>

    
                            </div>
                            <div class="col">
                                <h5>Structuration</h5>
                                <!--Nombre adhérent Homme-->
         <div class="form-group">
            <label for="nbrAdherantHomme">Nombre d'adhérents homme <span class="text text-danger">*</span> </label>
            <input   disabled aria-describedby="errorNbrAdherantHomme" min="0"  type="number" class="form-control @error('nbrAdherantHomme') is-invalid @enderror " name="nbrAdherantHomme" value="{{old('nbrAdherantHomme',$oph->nbrAdherantHomme)}}">
            @error('nbrAdherantHomme')
            <small class="form-text text-danger" id='nbrAdherantHomme'>
                {{$errors->first('nbrAdherantHomme')}}
  
            </small>
        @enderror
  
          </div>


         <!--Nombre adhérent Homme-->
         <!--Nombre adhérent Femme-->
         <div class="form-group">
            <label for="nbrAdherantFemme">Nombre d'adhérents femme <span class="text text-danger">*</span> </label>
            <input  disabled aria-describedby="errorNbrAdherantFemme" min="0"  type="number" class="form-control @error('nbrAdherantFemme') is-invalid @enderror " name="nbrAdherantFemme" value="{{old('nbrAdherantFemme',$oph->nbrAdherantFemme)}}">
            @error('nbrAdherantFemme')
            <small class="form-text text-danger" id='nbrAdherantFemme'>
                {{$errors->first('nbrAdherantFemme')}}
  
            </small>
        @enderror
  
          </div>


<!--Nombre adhérent Femme-->
<!--Nombre membre Femme-->
<div class="form-group">
    <label for="nbrMembreFemme">Nombre de membres femme <span class="text text-danger">*</span> </label>
    <input  disabled aria-describedby="errornNrMembreFemme" min="0"  type="number" class="form-control @error('nbrAdherantFemme') is-invalid @enderror " name="nbrMembreFemme" value="{{old('nbrMembreFemme',$oph->nbrMembreFemme)}}">
    @error('nbrMembreFemme')
    <small class="form-text text-danger" id='nbrMembreFemme'>
        {{$errors->first('nbrMembreFemme')}}

    </small>
@enderror

  </div>


<!--Nombre adhérent Femme-->
<!--Nombre membre Homme-->
<div class="form-group">
    <label for="nbrMembreHomme">Nombre de membres homme <span class="text text-danger">*</span> </label>
    <input  disabled aria-describedby="errorNbrMembreHomme" min="0"  type="number" class="form-control @error('nbrMembreHomme') is-invalid @enderror " name="nbrMembreHomme" value="{{old('nbrMembreHomme',$oph->nbrMembreHomme)}}">
    @error('nbrMembreHomme')
    <small class="form-text text-danger" id='nbrMembreHomme'>
        {{$errors->first('nbrMembreHomme')}}

    </small>
@enderror

  </div>


<!--Nombre adhérent Homme-->
<!--Nombre de membre alphabétisé-->
<div class="form-group">
    <label for="nbrMembreAlphabetise">Nombre membres alphabétisés <span class="text text-danger">*</span> </label>
    <input  disabled aria-describedby="errorNbrMembreAlphabetise" min="0"  type="number" class="form-control @error('nbrMembreAlphabetise') is-invalid @enderror " name="nbrMembreAlphabetise" value="{{old('nbrMembreAlphabetise',$oph->nbrMembreAlphabetise)}}">
    @error('nbrMembreAlphabetise')
    <small class="form-text text-danger" id='nbrMembreAlphabetise'>
        {{$errors->first('nbrMembreAlphabetise')}}

    </small>
@enderror

  </div>

<!--/.Nombre de membre alphabétisé-->
<!--Nombre de membre alphabétisé-->
<div class="form-group">
    <label for="nbrMembreScolarise">Nombre membres scolarisé <span class="text text-danger">*</span> </label>
    <input  disabled aria-describedby="errorNbrMembreScolarise" min="0"  type="number" class="form-control @error('nbrMembreScolarise') is-invalid @enderror " name="nbrMembreScolarise" value="{{old('nbrMembreScolarise',$oph->nbrMembreScolarise)}}">
    @error('nbrMembreScolarise')
    <small class="form-text text-danger" id='nbrMembreScolarise'>
        {{$errors->first('nbrMembreScolarise')}}

    </small>
@enderror

</div>

<!--/.Nombre de membre alphabétisé-->
  <!--Langue-->

  <div class="form-group">
    <label for="langue_id">Langue <span class="text text-danger">*</span> </label>
    @forelse($oph->langues as $langue)
    {{ $langue->libelle }}, &nbsp;

    @empty
    <p>Pas de langues</p>
    @endforelse
  </div>


   <!--/.Langue-->
   <!--Structure organisation-->
   <div class="form-group">
    <label for="structure">Structure de l'organisation <span class="text text-danger">*</span> </label>
    <input  disabled aria-describedby="errorStructure" type="text" class="form-control @error('structure') is-invalid @enderror " name="structure" value="{{old('structure',$oph->structure)}}" placeholder="Bureau exécutif">
    @error('structure')
    <small class="form-text text-danger" id='structure'>
        {{$errors->first('structure')}}

    </small>
@enderror

  </div>


<!--/.Structure Organisation-->

                                
                            </div>
                            <div class="col">
                                <h5>Informations géographiques</h5>
                                <!--Région-->
                         <div class="form-group">
                            <label for="region_id">Région <span class="text text-danger">*</span> </label>
                            <input  disabled aria-describedby="errorRegion_id" type="text" class="form-control @error('region_id') is-invalid @enderror " name="region_id" value="{{old('region_id',$oph->region->libelle)}}" placeholder=Région">
                            
                                  
                          </div>
                
                
        <!--/.Région-->
                                
                            </div>
                            <div class="col">
                                <h5>Responsable de la structure</h5>
                                
                            </div>
                            <div class="col">
                                <h5>Informations juridiques</h5>
                                
                            </div>
                        </div>

                    </form>
                    
                        

                </div>
            </div>

        </div>
        
            
        
    </div>
@endsection