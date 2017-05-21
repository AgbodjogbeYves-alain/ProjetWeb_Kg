<!-- Sidebar Menu -->


<nav class="ui left vertical sidebar inverted menu">
    <a class="item page-scroll" href="#back" >Accueil</a>
   <a class="item page-scroll" href="#presentationKG">Qui sommes nous?</a>
   <a class="item page-scroll" href="#activities">Nos activités</a>
   <a class="item page-scroll"  href="#team">Notre équipe</a>
   <a class="item page-scroll" href="#contact">Contact</a>
    <a  id="connexion" class="item page-scroll" href="#contact">Connexion</a>
</nav>
<nav class="ui top fixed inverted pointing hidden menu blue ">
    <div class="ui container">
        <div class="ui compact icon large secondary inverted pointing menu">
            <a class="toc item">
                <i class="sidebar icon"></i>
                <span class="text">Menu</span>
            </a>
             <a class="active item page-scroll" href="#back" >Accueil</a>
             <a class="item page-scroll" href="#presentationKG">Qui sommes nous?</a>
             <a class="item page-scroll" href="#activities">Nos activités</a>
             <a class="item page-scroll"  href="#team">Notre équipe</a>
        </div>
        <div class="right menu">
           <a class="contact icon item page-scroll" href="#contact">Contact</a>
           <a class="item" id="connexion" href=""><i class="sign in icon"></i>Connexion</a>
        </div>
    </div>

</nav>

<script>
$('.ui.left.fixed.vertical.inverted.menu').first().sidebar('attach events', '.toc.item');
</script>
  <script>
  $(document)
    .ready(function() {

      // fix menu when passed
      $('.masthead')
        .visibility({
          once: false,
          onBottomPassed: function() {
            $('.fixed.menu').transition('fade in');
          },
          onBottomPassedReverse: function() {
            $('.fixed.menu').transition('fade out');
          }
        })

    })
      ;

  $(document).ready(function() {
    $('.page-scroll').on('click', function() { // Au clic sur un élément
      var page = $(this).attr('href'); // Page cible
      var speed = 1000; // Durée de l'animation (en ms)
      $('.ui.sidebar')
        .sidebar('hide');

      $('html,body').animate( { scrollTop: $(page).offset().top }, speed ); // Go


      return false;
    });

     // create sidebar and attach to menu open
      $('.ui.sidebar')
        .sidebar('attach events', '.toc.item');
  });
</script>
