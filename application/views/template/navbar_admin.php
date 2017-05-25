<!-- Sidebar Menu -->


<nav class="ui left vertical sidebar inverted menu">
    <a class="item header" href="#" >Dashboard</a>
    <a class="ui item" href="<?php echo base_url("clients/get/0")?>">Gestion Clients</a>
    <a class="ui item"  href="<?php echo base_url("admins/get/0")?>">Gestion Administrateurs</a>
    <a class="ui item" href="<?php echo base_url("contrats/get/0")?>">Gestion Contrats</a>
    <a class="ui item" href="<?php echo base_url("admin/deconnexion")?>"><i class="sign out icon"></i>Deconnexion</a>
</nav>



<nav class="ui top fixed inverted pointing menu blue ">
    <div class="ui container">
        <div class="ui compact icon large secondary inverted pointing menu">
            <a class="toc item">
                <i class="sidebar icon"></i>
                <span class="text">Menu</span>
            </a>
            <a class="item header" href="#" >Dashboard</a>
           <a class="ui item" href="<?php echo base_url("clients/get/0")?>">Gestion Clients</a>
           <a class="ui item"  href="<?php echo base_url("admins/get/0")?>">Gestion Administrateurs</a>
           <a class="ui item" href="<?php echo base_url("contrats/get/0")?>">Gestion Contrats</a>
        </div>
        <div class="right menu">
           <a class="item" href='<?php echo base_url("admins/deconnexion")?>'><i class="sign out icon" ></i>Deconnexion</a>
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
