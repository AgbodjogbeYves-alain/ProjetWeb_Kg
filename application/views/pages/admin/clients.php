<br><br><br><br>
<div class="ui main text container">
        <h1 class="ui center aligned blue segment header">Bienvenue sur le gestionnaire de Clients
            <div class="sub header">Double cliquer sur les informations d'un client pour les modifier.</div>
        </h1>

        <div>
         <a class="ui fluid blue button" id="openmodal" <i class="sign in icon"></i>Ajout Client</a>
        </div><br>
        <form class="ui fluid" method="post" action='<?php echo base_url("clients/get/search")?>'>
        <div class="ui fluid action input" >

          <input type="text" name='research' placeholder="Search...">
          <button class="ui blue button" type="submit">Search</button>
        </div><br>
        </form>

        <?php
            foreach ($listeC as $key => $value) {

                echo '<form class="ui form" method="post" action="';
                echo base_url('clients/put/'.$value['id_client']);
                echo '">';
                echo <<<EOT
                    <table class="ui celled table">
                    <thead class="center aligned"> <!-- En-tête du tableau -->
                    <tr>
                        <th>Nom Client</th>
                        <th>Descriptif</th>
                        <th>Représentant</th>
                        <th>E-mail</th>
                        <th>Type Client</th>
                    </tr>
                    </thead>
                    <tbody> <!-- Corps du tableau -->
EOT;
                    next($value);
                    echo "<tr><td name=".key($value)." id=".key($value).">".$value["nom_client"]."</td>";
                    next($value);
                    echo "<td name=".key($value)." id=".key($value).">".$value["descriptif_client"]."</td>";
                    next($value);
                    echo "<td name=".key($value)." id=".key($value).">".$value["representant"]."</td>";
                    next($value);
                    echo "<td name=".key($value)." id=".key($value).">".$value["email_client"]."</td>";
                    next($value);
                    echo "<td name=".key($value)." id=".key($value).">".$value["libelle"]."</td>";
                echo<<<EOT
                </tbody>
                </table>
                      <div class="ui container">
                          <div class="ui fluid buttons">
                            <i class="refresh icon"></i>
                            <input class="ui positive button" type='submit' name='selectButton' value='Mise a jour'></input>
                          <div class="or" data-text="ou"></div>
                          <input type=submit class="ui negative button" name='selectButton' value='Supprimer'>
                          </div>
                        </div>
                </form>
                <br>
EOT;
            }
        ?>

        <div class="ui modal" id="openmodalform"> <i class="close icon"></i>
            <div class="header">
              <h2 class="ui center aligned blue header">
                <i class="add user icon"></i>
                  Ajout Client
              </h2>
              </div>
              <form class="ui large form" method="post" action='<?php echo base_url("clients/post")?>'>
                <div class="ui stacked segment">
                  <div class="field">
                    <div class="ui left icon input">
                      <i class="user icon"></i>
                      <input type="text" name="nom" placeholder="Nom de l'Entreprise ou du Particulier"></input>
                    </div>
                  </div>
                  <div class="field">
                    <div class="ui left icon input">
                      <i class="user icon"></i>
                      <input type="text" name="email" placeholder="E-mail de l'Entreprise ou du Particulier"></input>
                    </div>
                  </div>
                  <div class="field">
                    <div class="ui left icon input">
                      <i class="lock icon"></i>
                      <input type="password" name="password" placeholder="Mot de passe temporaire"></input>
                    </div>
                  </div>
                  <div class="field">
                    <div class="ui left icon input">
                      <i class="lock icon"></i>
                      <input type="text" name="descriptif" placeholder="Decrivez l'entreprise en quelques mots"></input>
                    </div>
                  </div>
                  <div class="field">
                    <div class="ui left icon input">
                      <i class="lock icon"></i>
                      <input type="text" name="representant" placeholder="Representant"></input>
                    </div>
                  </div>
                  <div class="ui fluid selection dropdown">
                      <input type="hidden" name="type"></input>
                      <i class="dropdown icon"></i>
                      <div class="default text">Particulier ou Entreprise?</div>
                      <div class="menu">
                        <div class="item" data-value="particulier">
                          <i class="suitcase icon"></i>
                        Particulier
                        </div>
                        <div class="item" data-value="entreprise">
                          <i class="user icon"></i>Entreprise
                        </div>
                      </div>
                    </div><br>
                  <div class="ui fluid large blue submit button">Ajouter</div>
                </div>
                <div class="ui error message"></div>
              </form>
            </div>
    </div>

<script>
$('.ui.celled.table td').dblclick(function(){

      var current = $(this).text();
      var namePlace = $(this).attr("id");
      $(this).html('<input type=text name='+namePlace+' value='+current+'></input>');
      $(this).focus();
  });
</script>
