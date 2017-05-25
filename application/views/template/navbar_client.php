<!-- Sidebar Menu -->


<nav class="ui left vertical sidebar inverted menu">
    <a class="item header" href="#" >Dashboard</a>
    <a class="ui item" href='<?php echo base_url("client/get/").$id?>'>Voir les informations sur l'entreprise</a>
    <a class="ui item" href='<?php echo base_url("contrat/get/").$id?>'>Voir les contrats de l'entreprise</a>
    <a class="ui item" href="<?php echo base_url("client/deconnexion")?>"><i class="sign out icon"></i>Deconnexion</a>
</nav>



<nav class="ui top fixed inverted pointing menu blue ">
    <div class="ui container">
        <div class="ui compact icon large secondary inverted pointing menu">
            <a class="toc item">
                <i class="sidebar icon"></i>
                <span class="text">Menu</span>
            </a>
            <a class="item header" href="#" >Dashboard</a>
            <a class="ui item" href='<?php echo base_url("client/get/").$id?>'>Voir les informations sur l'entreprise</a>
            <a class="ui item" href='<?php echo base_url("contrat/get/").$id?>'>Voir les contrats de l'entreprise</a>
          </div>
        <div class="right menu">
           <a class="item" href='<?php echo base_url("client/deconnexion")?>'><i class="sign out icon" ></i>Deconnexion</a>
        </div>
    </div>
</nav>
<script>
$(document).ready(function() {
  // create sidebar and attach to menu open
   $('.ui.sidebar')
     .sidebar('attach events', '.toc.item');
});
</script>
