<br><br><br><br>
<div class="ui main text container">
        <h1 class="ui center aligned blue segment header">Bienvenue sur le gestionnaire des Administrateurs
            <div class="sub header">Double cliquer sur les informations d'un Administrateur pour les modifier.</div>
        </h1>

        <div>
         <a class="ui fluid blue button" id="openmodal" <i class="sign in icon"></i>Ajout Administrateur</a>
        </div><br>
        <form class="ui fluid" method="post" action='<?php echo base_url("admins/get/search")?>'>
        <div class="ui fluid action input" >

          <input type="text" name='research' placeholder="Search...">
          <button class="ui blue button" type="submit">Search</button>
        </div><br>
        </form>

        <?php
            foreach ($listeC as $key => $value) {

                echo '<form class="ui form" form-data="x-www-form-urlencoded" method="post" action="';
                echo base_url('admins/put/'.$value['id_admin']);;
                echo '">';
                echo <<<EOT
                    <table class="ui celled table">
                    <thead class="center aligned"> <!-- En-tête du tableau -->
                    <tr>
                        <th>Nom Admin</th>
                        <th>Prenom Admin</th>
                        <th>Numero Admin</th>
                        <th>E-mail</th>
                        <th>Privilège</th>
                        <th> Changer le mot de passe</th>
                    </tr>
                    </thead>
                    <tbody> <!-- Corps du tableau -->
EOT;
                    next($value);
                    echo "<tr><td name=".key($value)." id=".key($value).">".$value["nom_admin"]."</td>";
                    next($value);
                    echo "<td name=".key($value)." id=".key($value).">".$value["prenom_admin"]."</td>";
                    next($value);
                    echo "<td name=".key($value)." id=".key($value).">".$value["numero_admin"]."</td>";
                    next($value);
                    echo "<td name=".key($value)." id=".key($value).">".$value["email_admin"]."</td>";
                    next($value);
                    echo "<td name=".key($value)." id=".key($value).">".$value["libelle"]."</td>";
                    echo '<td> <input class=ui button type=submit name=selectButton value=Changer></input>';
                echo<<<EOT
                </tbody>
                </table>
                  <div class='ui fluid container'>
                          <div class="ui fluid buttons">
                            <i class="refresh icon"></i>
                            <input class="ui positive button" type='submit' name='selectButton' value='Mise a jour'></input>
                          <div class="or" data-text="ou"></div>
                          <input type=submit class="ui negative button" name='selectButton' value='Supprimer'>
                          </div>
                  </div>
                </form>
                <br><br><br><br><br>
EOT;
            }
        ?>
<!---Modal ajout admin--->

    </div>
  </div>
  <div class="ui  modal"> <i class="close icon"></i>
    <div class="header">
        <h2 class="ui center aligned blue header">
          <i class="add user icon"></i>
            Ajout Administrateur
        </h2>
          </div>
        <form class="ui large form" method="post" action='<?php echo base_url("admins/post")?>'>
          <div class="ui stacked segment">
            <div class="field">
              <div class="ui left icon input">
                <i class="user icon"></i>
                <input type="text" name="nom" placeholder="Nom du nouvel admin">
              </div>
            </div>
            <div class="field">
              <div class="ui left icon input">
                <i class="user icon"></i>
                <input type="text" name="prenom" placeholder="Prenom du nouvel admin">
              </div>
            </div>
            <div class="field">
              <div class="ui left icon input">
                <i class="user icon"></i>
                <input type="text" name="email" placeholder="E-mail l'admin">
              </div>
            </div>
            <div class="field">
              <div class="ui left icon input">
                <i class="lock icon"></i>
                <input type="password" name="password" placeholder="Mot de passe temporaire">
              </div>
            </div>
            <div class="field">
              <div class="ui left icon input">
                <i class="lock icon"></i>
                <input type="text" name="numero" placeholder="Numero de l'admin">
              </div>
            </div>
            <div class="ui fluid selection dropdown">
                <input type="hidden" name="privilege">
                <i class="dropdown icon"></i>
                <div class="default text">C'est un?</div>
                <div class="menu">
                  <div class="item" data-value="0">
                    <i class="suitcase icon"></i>
                  Tous les droits
                  </div>
                  <div class="item" data-value="1">
                    <i class="user icon"></i>Commercial
                  </div>
                  <div class="item" data-value="2">
                    <i class="user icon"></i>Autre
                  </div>
                </div>
                </div>
                <div class="ui error message"></div>
              </div><br>
            <div class="ui fluid large blue submit button">Ajouter</div>

          </form>
          </div>

          <script>
          $('.ui.celled.table td').dblclick(function(){

                var current = $(this).text();
                var namePlace = $(this).attr("id");
                $(this).html('<input type=text name='+namePlace+' value='+current+'></input>');
                $(this).focus();
            });
          </script>
