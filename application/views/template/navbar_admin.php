<!-- Sidebar Menu -->


<nav class="ui left vertical sidebar inverted menu">
    <a class="item header" href="#" >Dashboard</a>
    <div class="ui dropdown item">
      <div class="text">Gestion Clients</div>
        <i class="dropdown icon"></i>
        <div class="menu">
            <div class="item" href="<?php echo base_url("getclients")?>">Voir les clients</div>
            <div class="item" href="">Ajouter un client</div>
         </div>
    </div>
   <div class="ui dropdown item">
     <div class="text">Gestion contrats</div>
       <i class="dropdown icon"></i>
       <div class="menu">
           <div class="item" href="<?php echo base_url("getadmins")?>">Liste des administrateurs</div>
           <div class="item">Creer un nouvel administrateur</div>
        </div>
   </div>
   <div class="ui dropdown item">
     <div class="text">Gestion contrats</div>
       <i class="dropdown icon"></i>
       <div class="menu">
           <div class="item" href="<?php echo base_url("getcontrats")?>">Voir les contrats</div>
           <div class="item" >Creer un nouveau contrat</div>
        </div>
   </div>
    <a class="item" href="<?php echo base_url("deconnexion")?>"><i class="sign out icon"></i>Deconnexion</a>
</nav>



<nav class="ui top fixed inverted pointing menu blue ">
    <div class="ui container">
        <div class="ui compact icon large secondary inverted pointing menu">
            <a class="toc item">
                <i class="sidebar icon"></i>
                <span class="text">Menu</span>
            </a>
            <a class="item header" href="#" >Dashboard</a>
           <a class="ui item" href="<?php echo base_url("getclients")?>">Gestion Clients</a>
           <a class="ui dropdown item"  href="<?php echo base_url("getadmins")?>">Gestion Administrateurs</a>
           <div class="ui dropdown item">
             <div class="text">Gestion contrats</div>
               <i class="dropdown icon"></i>
               <div class="menu">
                   <div class="item" href="<?php echo base_url("getcontrats")?>">Voir les contrats</div>
                   <div class="item">Creer un nouveau contrat</div>
                </div>
           </div>
        </div>
        <div class="right menu">
           <a class="item" href='<?php echo base_url("deconnexion")?>'><i class="sign out icon" ></i>Deconnexion</a>
        </div>
    </div>

</nav>
<script>
$(document).ready(function() {
  // create sidebar and attach to menu open
   $('.ui.sidebar')
     .sidebar('attach events', '.toc.item');


     $('.dropdown')
  .dropdown({
    // you can use any ui transition
    transition: 'drop'
  })
;
});
</script>
