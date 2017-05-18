
<!-- Page Contents -->
  <div class="ui inverted vertical masthead center aligned segment" id="back">
    <div class="ui large secondary inverted pointing menu">
        <a class="toc item">
          <i class="sidebar icon"></i>
        </a>
         <a class="item page-scroll" href="#back" >Accueil</a>
         <a class="item page-scroll" href="#presentationKG">Qui sommes nous?</a>
         <a class="item page-scroll" href="#activities">Nos activités</a>
         <a class="item page-scroll"  href="#team">Notre équipe</a>
        <div class="right item">
          <div>
           <a class="ui contact icon green inverted button page-scroll" href="#contact">Contact</a>
          </div>
          <div>
           <a class="ui inverted blue button" id="openmodal" <i class="sign in icon"></i>Connexion</a>
          </div>
        </div>
      </div>
    <div class="ui text container" id="container-site">
      <h1 class="ui inverted header" >KG Entreprise</h1>
       <h2 >Bienvenue sur notre site </h2>
    </div>

  </div>



  <div class="ui vertical stripe segment" id="presentationKG">
    <div class="ui middle aligned stackable grid container">
      <div class="row">
        <div class="eight wide column">
          <h3 class="ui header">Qui sommes-nous ?</h3>
          <p>KG Entreprise est spécialisée dans la conception de Business plan et la consultance.
          Notre mission principale est de faciliter l’accès au financement pour les start-up et TPE/PME de la région d’Abidjan, en leur offrant  des services à des tarifs adaptés à leurs profils.
          </p>
        </div>
        <div class="six wide right floated column">
          <img src="element_design/images/serrerlamain.jpg" class="ui large bordered rounded image">
        </div>
      </div>
      <div class="row">
          <a class="ui huge button page-scroll" href="#contact">Plus d'infos</a>
      </div>
    </div>
  </div>


  <div class="ui vertical stripe segment" id="activities" ng-controller="affichageDiv" >
    <div class="ui text container" style="text-align: center;">
      <h3 class="ui header">Nos activités</h3>
      <p>Nous aidons nos clients à développer leurs activités et obtenir des Financements auprès des investisseurs.</p>
      <div class="ui large buttons">
             <button class="ui basic button" ng-click="fermer_div2(); masquer_div1()">
              <img src="element_design/images/biz-plan-300x266.png" class="ui small circular image">
                 KG Business Plan
             </button>
               <button class="ui basic button"  ng-click="fermer_div1(); masquer_div2()">
                 <img src="element_design/images/consultancy-icon-27.png" class="ui small circular image">
                 KG Consulting
             </button>
      </div>
      </br>
      </br>
      <div ng-show='hideMe1' class="ui text container">
         <p>  Conception de Business Plan </br></br>
              Coaching du client et accompagnement à la présentation de Business Plan
        </p>

      </div>
      <div  ng-show='hideMe2' class="ui text inverted container">
        <p> Assistance comptable (Saisie des pièces, analyse des comptes, Rapprochements bancaires, Paie) </br></br>
            Assistance fiscale (Déclarations des différents impôts dus). </br></br>
            Conseils</br>
        </p>
      </div>
    </div>
  </div>

  <div class="ui vertical stripe segment" id="team">
    <div class="ui text container">
      <h3 class="ui header">Notre équipe</h3>
      <div class="ui horizontal list">
      <div class="item right">
        <img class="ui small circular image" src="element_design/images/constant.jpg">
        <div class="content" >
          <div class="ui sub header" >Goly Constant</div>
          Co-fondateur KG-Entreprise
           <div class="content">
              Voir son profil LinkedIn
                <a class="circular ui blue icon button" href="https://www.linkedin.com/in/constant-amany-goli-65553899/" target="_blank">
                    <i class="icon linkedin" ></i>
                  </a>
            </div>
        </div>
      </div>
      <div class="item right">
        <img class="ui small circular image" src="element_design/images/nathan.jpg">
        <div class="content">
          <div class="ui sub header">Kouamé Nathan</div>
          Co-fondateur KG-Entreprise
            <div class="text content">
              Voir son profil LinkedIn
                <a class="circular ui icon blue button" href="https://www.linkedin.com/in/nathan-michel-kouam%C3%A9-573b41100/" target="_blank">
                  <i class="icon linkedin" ></i>
                </a>
            </div>
        </div>
      </div>
</div>
    </div>
  </div>

<div class="ui small modal" ng-controller="logCtrl"> <i class="close icon"></i>
<div class="ui middle aligned center aligned grid">
  <div class="column">
    <h2 class="ui teal image header">
      <div class="content">
        Connexion
      </div>
    </h2>
    <div class="alert alert-danger" ng-show="error">
        There was a problem logging in. Please try again.
    </div>
    <form class="ui large form" id="logForm" ng-submit="login()">
      <div class="ui stacked segment form-group" >
        <div class="field">
          <div class="ui left icon input">
            <i class="user icon"></i>
            <input type="text" id="usermail" ng-model="credentials.usermail" class="form-control" name="email" placeholder="E-mail">
          </div>
        </div>
        <div class="field">
          <div class="ui left icon input">
            <i class="lock icon"></i>
            <input type="password" class="form-control" id="password" name="password" ng-model="credentials.role" placeholder="Mot de passe">
          </div>
        </div>
        <div class="field">
          <div class="ui left icon input">
            <div class="ui selection dropdown">
                <input type="hidden" name="role" class="form-control" id="role" ng-model="credentials.role">
                <i class="dropdown icon"></i>
                <div class="default text">Vous êtes un :</div>
                <div class="menu">
                  <div class="item" data-value="0">Administrateur</div>
                  <div class="item" data-value="1">Client</div>
                </div>
              </div>
          </div>
        </div>
        <div class="ui fluid large teal submit button">Connexion</div>
      </div>

      <div class="ui error message"></div>

    </form>

    <div class="ui message">
      Vous n'avez pas de compte? Contactez nous :) <a href="">Contact</a>
    </div>
  </div>
</div>
</div>

<script type="text/javascript">

$(document).ready(function() {
  $("#openmodal").click(function () {
      $('.ui.modal').modal('show');
  });

  $('.ui.dropdown')
  .dropdown()
;
});

</script>
