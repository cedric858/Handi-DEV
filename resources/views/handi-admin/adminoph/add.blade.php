@extends('layouts.admin')
@section('header')
    Ajout d'une OPH
@endsection
@section('breadcrumb')
    <li class="breadcrumb-item"><a href="/admin">Accueil</a></li>
    <li class="breadcrumb-item"><a href="{{route('ophs.index')}}">liste des OPH</a></li>
    <li class="breadcrumb-item active">Ajout d'une OPH</li>

@endsection

@section('content')

<div class="row">
  <form method="post" action="{{route('ophs.store')}}" >
    @csrf
  <ul class="nav nav-tabs" id="myTab" role="tablist">

    
    <li class="nav-item">
      <a class="nav-link active " id="info-tab" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="true">Informations générales</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="struct-tab" data-toggle="tab" href="#struct" role="tab" aria-controls="struct" aria-selected="false">Structuration</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="geo-tab" data-toggle="tab" href="#geo" role="tab" aria-controls="geo" aria-selected="false">Informations géographiques</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="resp-tab" data-toggle="tab" href="#resp" role="tab" aria-controls="resp" aria-selected="false">Responsable de la structure</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" id="juridique-tab" data-toggle="tab" href="#juridique" role="tab" aria-controls="juridique" aria-selected="false">Informations juridiques</a>
    </li>
  </ul>
  <div class="tab-content" id="myTabContent">
    <!--Info générales-->
    <div class="tab-pane fade show active" id="info" role="tabpanel" aria-labelledby="info-tab">
      <h4>Informations générales</h4>
        
        <div class="form-group">
          <label for="nomOph">Nom de l'OPH   <span class="text text-danger">*</span> </label>
          <input  required aria-describedby="errorNomOph" type="text" class="form-control @error('nomOph') is-invalid @enderror " name="nomOph" value="{{old('nomOph',"DOFINI Hanmou")}}" placeholder="Entrez le nom de l'OPH" >
          @error('nomOph')
          <small class="form-text text-danger" id='errorNomOph'>
              {{$errors->first('nomOph')}}

          </small>
      @enderror

        </div>
          <!--Sigle-->

        <div class="form-group">
            <label for="sigle">Sigle <span class="text text-danger">*</span> </label>
            <input  required aria-describedby="errorSigle" type="text" class="form-control @error('sigle') is-invalid @enderror " name="sigle" value="{{old('sigle',"DH")}}" placeholder="Entrez le sigle de l'OPH">
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
            <input  required aria-describedby="errorTelephoneOph" type="text" class="form-control @error('telephoneOph') is-invalid @enderror " name="telephoneOph" value="{{old('telephoneOph',"76 91 32 39")}}" placeholder="Téléphone  responsable">
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
    
            <textarea aria-describedby="errorMissionObjectif" name="missionObjectif" class="form-control @error('missionObjectif') is-invalid @enderror " id="missionObjectif" cols="30" rows="10">{{old('missionObjectif',"Assistance mutuelle des membres. Promouvoir le niveau de vie des membres de l'association. Sensibiliser les masses paysannes sur les méfaits des maladies sexuellement transmissibles. Sensibiliser les masses paysannes sur les méfaits de l'alcool, du tabac de la drogue")}}</textarea>
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
            <small id="ophHelp" class="form-text text-muted">Vous pouvez choisir plusieurs type de handicap.</small>
            <select class="form-control" id="type_handicap_id" name="type_handicap_id[]" multiple>
                @foreach ($typeHandicaps as $typeHandicap)
                    <option value="{{$typeHandicap->id}}">{{$typeHandicap->libelle}}</option>
                    
                @endforeach
              </select>
              
              @error('type_handicap_id')
            <p class="help is-danger">{{$message}}</p>
                
                  
              @enderror
        </div>


         <!--/.Type de handicap-->
         <!--Date de création-->
         <div class="form-group">
            <label for="dateCreation">Date de création <span class="text text-danger">*</span> </label>
            <input  required type="date" name="dateCreation" id="dateCreation" value="{{old('dateCreation')}}">


         </div>
         <!--/.Date de création-->
         <!--domaine-->
         <div class="form-group">
            <label for="domaine_id">Domaine <span class="text text-danger">*</span> </label>
            <small id="ophDomaine" class="form-text text-muted">Vous pouvez choisir plusieurs domaines.</small>
            <select class="form-control" id="domaine_id" name="domaine_id" multiple>
                @foreach ($domaines as $domaine)
                    <option value="{{$domaine->id}}">{{$domaine->libelle}}</option>
                    
                @endforeach
              </select>
              @error('domaine_id')
            <p class="help is-danger">{{$message}}</p>
                
                  
              @enderror
        </div>

         <!--/.domaine-->
         <!--Activité Menée-->
         <div class="form-group">
            <label for="activite">Activités menées <span class="text text-danger">*</span> </label>
            <input  required aria-describedby="errorActivite" type="text" class="form-control @error('activite') is-invalid @enderror " name="activite" value="{{old('activite',"Santé, Sensibilisation des masses sur les méfaits des MST, Sensibilisation sur les méfaits de l'alcool, du tabac et de la drogue, Couture, Tissage, Artisanat")}}" placeholder="Listez les activités séparées par des virguless">
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
            <input  required aria-describedby="errorBeneficiare" type="text" class="form-control @error('beneficiaire') is-invalid @enderror " name="beneficiaire" value="{{old('beneficiaire',"Hommes, Femmes, Garçons, Filles")}}" placeholder="Listez les bénéficiaire séparés par des virgules">
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
            <input  required aria-describedby="errorAccessibilite" type="text" class="form-control @error('accessibilite') is-invalid @enderror " name="accessibilite" value="{{old('accessibilite',"Communication accessible aux personnes déficientes visuelles, Communication accessible aux personnes déficientes auditives")}}" placeholder="Séparez les différentes options par des virguless">
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
            <input  required aria-describedby="errorSourceFinancement" type="text" class="form-control @error('sourceFinancement') is-invalid @enderror " name="sourceFinancement" value="{{old('sourceFinancement',"Cotisations des membres, Ministère de l'action sociale et de la solidarité nationale, Correspondants.")}}" placeholder="Renseignez les sources de financement séparées par des virgules">
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
            <input  required aria-describedby="errorPartenaire" type="text" class="form-control @error('partenaire') is-invalid @enderror " name="partenaire" value="{{old('partenaire',"Partenaires Italiens")}}" placeholder="Renseignez les partenaires séparés par des virgules">
            @error('partenaire')
            <small class="form-text text-danger" id='partenaire'>
                {{$errors->first('partenaire')}}
  
            </small>
        @enderror
  
          </div>


         <!--/.Partenaires-->
    </div>
    <!--/.Info génénrales-->
    <!--Structuration-->
    <div class="tab-pane fade" id="struct" role="tabpanel" aria-labelledby="struct-tab">
      <h4>Structuration</h4>

         <!--Nombre adhérent Homme-->
         <div class="form-group">
            <label for="nbrAdherantHomme">Nombre d'adhérents homme <span class="text text-danger">*</span> </label>
            <input   required aria-describedby="errorNbrAdherantHomme" min="0"  type="number" class="form-control @error('nbrAdherantHomme') is-invalid @enderror " name="nbrAdherantHomme" value="{{old('nbrAdherantHomme',3)}}">
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
                    <input  required aria-describedby="errorNbrAdherantFemme" min="0"  type="number" class="form-control @error('nbrAdherantFemme') is-invalid @enderror " name="nbrAdherantFemme" value="{{old('nbrAdherantFemme',12)}}">
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
                  <input  required aria-describedby="errornNrMembreFemme" min="0"  type="number" class="form-control @error('nbrAdherantFemme') is-invalid @enderror " name="nbrMembreFemme" value="{{old('nbrMembreFemme',2)}}">
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
                  <input  required aria-describedby="errorNbrMembreHomme" min="0"  type="number" class="form-control @error('nbrMembreHomme') is-invalid @enderror " name="nbrMembreHomme" value="{{old('nbrMembreHomme',4)}}">
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
            <input  required aria-describedby="errorNbrMembreAlphabetise" min="0"  type="number" class="form-control @error('nbrMembreAlphabetise') is-invalid @enderror " name="nbrMembreAlphabetise" value="{{old('nbrMembreAlphabetise',12)}}">
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
                    <input  required aria-describedby="errorNbrMembreScolarise" min="0"  type="number" class="form-control @error('nbrMembreScolarise') is-invalid @enderror " name="nbrMembreScolarise" value="{{old('nbrMembreScolarise',6)}}">
                    @error('nbrMembreScolarise')
                    <small class="form-text text-danger" id='nbrMembreScolarise'>
                        {{$errors->first('nbrMembreScolarise')}}
          
                    </small>
                @enderror
          
        </div>
        
        <!--/.Nombre de membre alphabétisé-->
        <!--Langue-->
                 <div class="form-group">
                    <label for="langue_id">Langue utilisée <span class="text text-danger">*</span> </label>
                    <small id="ophLangue" class="form-text text-muted">Vous pouvez choisir plusieurs langues.</small>
                    <select class="form-control" id="langue_id" name="langue_id[]" multiple>
                        @foreach ($langues as $langue)
                            <option value="{{$langue->id}}">{{$langue->libelle}}</option>
                            
                        @endforeach
                      </select>
                      @error('langue_id')
                    <p class="help is-danger">{{$message}}</p>
                        
                          
                      @enderror
                </div>
        
        
         <!--/.Langue-->
         <!--Structure organisation-->
        <div class="form-group">
            <label for="structure">Structure de l'organisation <span class="text text-danger">*</span> </label>
            <input  required aria-describedby="errorStructure" type="text" class="form-control @error('structure') is-invalid @enderror " name="structure" value="{{old('structure')}}" placeholder="Bureau exécutif">
            @error('structure')
            <small class="form-text text-danger" id='structure'>
                {{$errors->first('structure')}}
  
            </small>
        @enderror
  
          </div>


        <!--/.Structure Organisation-->

    </div>
    <!--/.Structuration-->
    <!--Informations géographiques-->
    <div class="tab-pane fade" id="geo" role="tabpanel" aria-labelledby="geo-tab">
      <h4>Information Géoraphique</h4>
        <!--Région-->
                         <div class="form-group">
                            <label for="region_id">Région <span class="text text-danger">*</span> </label>
                            
                            <select class="form-control" id="region_id" name="region_id">
                                @foreach ($regions as $region)
                                    <option value="{{$region->id}}">{{$region->libelle}}</option>
                                    
                                @endforeach
                              </select>
                              @error('region_id')
                            <p class="help is-danger">{{$message}}</p>
                                
                                  
                              @enderror
                                  
                          </div>
                
                
        <!--/.Région-->
        <!--Province-->
                <div class="form-group">
                    <label for="province_id">Province <span class="text text-danger">*</span> </label>
                    
                    <select class="form-control" id="province_id" name="province_id">
                      @forelse ($provinces as $province)
                            <option value="{{$province->id}}">{{$province->libelle}}</option>
                            
                        @empty
                        <p>Pas de provinces pour le moment</p>
                            
                        @endforelse 
                      </select>
                            
                        
                      
                      @error('province_id')
                    <p class="help is-danger">{{$message}}</p>
                        
                          
                      @enderror
                          
                  </div>
        
        
        <!--/.Province-->
        <!--Communes-->
        <div class="form-group">
            <label for="commune_id">Commune <span class="text text-danger">*</span> </label>
            
            <select class="form-control" id="commune_id" name="commune_id">
              @forelse ($communes as $commune)
                    <option value="{{$commune->id}}">{{$commune->libelle}}</option>
                    
                @empty
                    <p>Pas de communes pour le moment</p>
                    
                @endforelse 
              </select>
                    
               
              
              @error('commune_id')
            <p class="help is-danger">{{$message}}</p>
                
                  
              @enderror
                  
          </div>


<!--/.Commune-->

        <!--Zone d'intervention-->
                 <div class="form-group">
                    <label for="zoneInt">Zone d'intervention <span class="text text-danger">*</span> </label>
                    <input  required aria-describedby="errorZoneInt" type="text" class="form-control @error('zoneInt') is-invalid @enderror " name="zoneInt" value="{{old('zoneInt',"Kéra")}}" placeholder="Listez les zones d'intervention séparées par des virguless">
                    @error('zoneInt')
                    <small class="form-text text-danger" id='errorActivite'>
                        {{$errors->first('zoneInt')}}
          
                    </small>
                @enderror
          
                  </div>
        
       <!--/.Zone d'intervention-->
    </div>
    <!--Informations géographiques-->
    <!--Responsable de la structure-->
    <div class="tab-pane fade" id="resp" role="tabpanel" aria-labelledby="resp-tab">
      <h4>Responsable de la structure</h4>
       <!--Nom du responsable-->
                <div class="form-group">
                    <label for="nom">Nom <span class="text text-danger">*</span> </label>
                    <input  required aria-describedby="errorNom" type="text" class="form-control @error('nom') is-invalid @enderror " name="nom" value="{{old('nom',"TAMINI")}}" placeholder="Nom de famille  responsable">
                    @error('nom')
                    <small class="form-text text-danger" id='nom'>
                        {{$errors->first('nom')}}
          
                    </small>
                @enderror
          
                  </div>
        
        
       <!--/.Nom du responsable-->
       <!--Prénom du responsable-->
              <div class="form-group">
                <label for="prenom">Prénom <span class="text text-danger">*</span> </label>
                <input  required aria-describedby="errorPrenom" type="text" class="form-control @error('prenom') is-invalid @enderror " name="prenom" value="{{old('prenom',"K. Roger")}}" placeholder="Prénom  responsable">
                @error('prenom')
                <small class="form-text text-danger" id='prenom'>
                    {{$errors->first('prenom')}}
      
                </small>
            @enderror
      
              </div>
    
    
   <!--/.Prénom du responsable-->
   <!--Téléphone-->
          <div class="form-group">
            <label for="phone">Téléphone <span class="text text-danger">*</span> </label>
            <input  required aria-describedby="errorPhone" type="text" class="form-control @error('phone') is-invalid @enderror " name="phone" value="{{old('phone',"76913239")}}" placeholder="Téléphone  responsable">
            @error('phone')
            <small class="form-text text-danger" id='phone'>
                {{$errors->first('phone')}}
  
            </small>
        @enderror
  
          </div>


<!--/.Téléphone-->

<!--/.Sexe-->
<div class="form-group">
    <label for="sexe">Sexe <span class="text text-danger">*</span> </label>
    <select class="form-control" id="sexe" name="sexe">
        
            <option value="Homme">Homme</option>
            <option value="Femme">Femme</option>
            
        
      </select>
      @error('sexe')
    <p class="help is-danger">{{$message}}</p>
        
          
      @enderror
</div>


 <!--/.Sexe-->
<!--Profession-->
    <div class="form-group">
        <label for="profession">Profession <span class="text text-danger">*</span> </label>
        <input  required aria-describedby="errorProfession" type="text" class="form-control @error('profession') is-invalid @enderror " name="profession" value="{{old('profession',"Particulier")}}" placeholder="Profession  responsable">
        @error('profession')
        <small class="form-text text-danger" id='profession'>
            {{$errors->first('profession')}}

        </small>
    @enderror

      </div>
<!--/.Profession-->
    </div>
    <!--Responsable de la structure-->
    <!--Informations juriques-->
    <div class="tab-pane fade" id="juridique" role="tabpanel" aria-labelledby="juridique-tab">
      <h4>Informations juridiques</h4>
 <!--Récipissé-->
          <div class="form-group">
              <label for="numbRecipisse">REF. DU RECEPISSE <span class="text text-danger">*</span> </label>
              <input  required aria-describedby="errorNumbRecipisse" type="text" class="form-control @error('numbRecipisse') is-invalid @enderror " name="numbRecipisse" value="{{old('numbRecipisse',"N°97-038/MATS/PHMHN/HC/DDG")}}" placeholder="Numéros de référence du récipissé">
              @error('numbRecipisse')
              <small class="form-text text-danger" id='numbRecipisse'>
                  {{$errors->first('numbRecipisse')}}
    
              </small>
          @enderror
    
            </div>
  
  
 <!--/.Récipissé-->
 <!--Statut juridique-->
 <div class="form-group">
    <label for="statut">Statut jurique <span class="text text-danger">*</span> </label>
    <input  required aria-describedby="errorStatut" type="text" class="form-control @error('statut') is-invalid @enderror " name="statut" value="{{old('statut',"Association")}}" placeholder="Statut juridique">
    @error('statut')
    <small class="form-text text-danger" id='statut'>
        {{$errors->first('statut')}}

    </small>
@enderror

  </div>


<!--/.Statut-->
 <!--Type d'OPH-->
 <div class="form-group">
    <label for="type">Type d'OPH <span class="text text-danger">*</span> </label>
    <input  required aria-describedby="errorType" type="text" class="form-control @error('type') is-invalid @enderror " name="type" value=" {{old('type', "Organisations de personne handicapées")}}" placeholder="Organisation de personnes handicapées">
    @error('type')
    <small class="form-text text-danger" id='type'>
        {{$errors->first('type')}}

    </small>
@enderror

  </div>
  <!--/.Type d'OPH-->
    </div>
    <!--/.Informations juriques-->
    
  </div>
<!--/.Type d'OPH-->
 <button type="submit" class="btn btn-primary">Ajouter OPH</button>
      </form>
</div>
@endsection