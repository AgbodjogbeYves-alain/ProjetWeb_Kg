<br><br><br><br>
<div class="ui main text container">
        <h1 class="ui center aligned blue segment header">Bienvenue sur votre fiche d'informations
            <div class="sub header">Double cliquer sur les informations que vous souhaitez modifier.</div>
        </h1>
        <?php
            foreach ($listeC as $key => $value) {

                echo '<form class="ui form" method="post" action="';
                echo base_url('client/put/'.$id);
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
                        <th>Nombre de contrats</th>
                    </tr>
                    </thead>
                    <tbody> <!-- Corps du tableau -->
EOT;
                    echo "<tr><td name=".key($value)." id=".key($value).">".$value["nom_client"]."</td>";
                    next($value);
                    echo "<td name=".key($value)." id=".key($value).">".$value["descriptif_client"]."</td>";
                    next($value);
                    echo "<td name=".key($value)." id=".key($value).">".$value["representant"]."</td>";
                    next($value);
                    echo "<td name=".key($value)." id=".key($value).">".$value["email_client"]."</td>";
                    next($value);
                    echo "<td name=".key($value)." id=".key($value).">".$value["libelle"]."</td>";
                    echo "<td>".$count."</td>";
                echo<<<EOT
                </tbody>
                </table>
                    <input class="ui fluid positive button" type='submit' name='selectButton' value='Mise a jour'></input>
                </form>
                <br>
EOT;
            }


        ?>
        <div>
         <a class="ui fluid blue button" id="openmodal" <i class="sign in icon"></i>Changer de mot de passe</a>
        </div><br>

        <div class="ui modal"> <i class="close icon"></i>
              <h2 class="ui center blue aligned image header">
                <div class="center aligned content">
                  Changer le mot de passe
                </div>
              </h2>
              <form class="ui large form" method="post" action='<?php echo base_url("client/put/mdp")?>'>
                <div class="ui stacked segment">
                  <div class="field">
                    <div class="ui left icon input">
                      <i class="chevron circle right icon"></i>
                      <input type="password" name="old" placeholder="Ancien mot de passe">
                    </div>
                  </div>
                  <div class="field">
                    <div class="ui left icon input">
                      <i class="chevron circle right icon icon"></i>
                      <input type="password" name="new" placeholder="Nouveau mot de passe">
                    </div>
                  </div>
                </div>
                <div class="ui fluid blue submit button">Connexion</div>
              </form>
        </div>
</div>
</div>
