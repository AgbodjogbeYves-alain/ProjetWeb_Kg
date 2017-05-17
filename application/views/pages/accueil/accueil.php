
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
           <a class="ui inverted blue button" href=""><i class="sign in icon"></i>Connexion</a>
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
          <img src="images/serrerlamain.jpg" class="ui large bordered rounded image">
        </div>
      </div>
      <div class="row">
          <a class="ui huge button page-scroll" href="#contact">Plus d'infos</a>
      </div>
    </div>
  </div>


  <div class="ui vertical stripe segment" id="activities" ng-controller="affichageDiv1">
    <div class="ui text container" style="text-align: center;">
      <h3 class="ui header">Nos activités</h3>
      <p>Nous aidons nos clients à développer leurs activités et obtenir des Financements auprès des investisseurs.</p>
      <div class="ui large buttons">
             <button class="ui basic button" ng-click="masquer_div1();">
              <img src="images/biz-plan-300x266.png" class="ui small circular image">
                 KG Business Plan
             </button>
               <button class="ui basic button"  ng-click="masquer_div2()">
                 <img src="images/consultancy-icon-27.png" class="ui small circular image">
                 KG Consulting
             </button>
      </div>
      </br>
      </br>
      <div id="a_masquer_1" ng-show='hideMe1' class="ui text container">
         <p> -  Conception de Business Plan </br></br>
             - Coaching du client et accompagnement à la présentation de Business Plan
        </p>

      </div>
      <div id="a_masquer_2"  ng-show='hideMe2' class="ui text inverted container">
        <p>- Assistance comptable (Saisie des pièces, analyse des comptes, Rapprochements bancaires, Paie) </br></br>
           - Assistance fiscale (Déclarations des différents impôts dus). </br></br>
           - Conseils</br>
        </p>
      </div>
    </div>
  </div>

  <div class="ui vertical stripe segment" id="team">
    <div class="ui text container">
      <h3 class="ui header">Notre équipe</h3>
      <div class="ui horizontal list">
      <div class="item right">
        <img class="ui small circular image" src="images/constant.jpg">
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
        <img class="ui small circular image" src="images/nathan.jpg">
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


  <div class="ui inverted vertical footer blue segment" id="contact">
  <h1 class="ui inverted center header">Contactez-nous</h1>
    <div class="ui inverted blue segment">

  <div class="ui inverted blue form">
    <div class="two fields">
      <div class="field">
        <label>First Name</label>
        <input placeholder="First Name" type="text">
      </div>
      <div class="field">
        <label>Last Name</label>
        <input placeholder="Last Name" type="text">
      </div>
    </div>
    <div class="field">
        <label>Company</label>
        <input placeholder="Company" type="text">
    </div>
    <div class="field">
        <label>Contact</label>
        <input placeholder="Contact" type="text">
    </div>
    <div class="field">
        <label>Mail</label>
        <input placeholder="Mail" type="text">
    </div>
    <div class="field">
      <label>Text</label>
      <textarea></textarea>
    </div>
    <div class="ui submit button">Submit</div>
  </div>
</div>
</div>

<script type="text/javascript">
    function masquer_div(id1,id2)
    {
      if (document.getElementById(id1).style.display == 'none')
      {
           document.getElementById(id1).style.display = 'block';
           document.getElementById(id2).style.display = 'none';
      }
      else
      {
           document.getElementById(id1).style.display = 'none';
      }
    }
</script>
