<br><br><br><br>
<div class="ui main text container">
        <h1 class="ui center aligned blue segment header">Bienvenue sur le gestionnaire des Contrats</h1>
        <div>
         <a class="ui fluid blue button" id="openmodal" <i class="sign in icon"></i>Ajouter Contrat</a>
        </div><br>
        <form class="ui fluid" method="post" action='<?php echo base_url("contrats/get/search")?>'>
        <div class="ui fluid action input" >

          <input type="text" name='research' placeholder="Search...">
          <button class="ui blue button" type="submit">Search</button>
        </div><br>
      </form>
        <?php
            foreach ($listeC as $key => $value) {

                echo <<<EOT
                    <table class="ui celled table">
                    <thead class="center aligned"> <!-- En-tête du tableau -->
                    <tr>
                        <th>Nom Client</th>
                        <th>Type Contrat</th>
                        <th>Reférence Contrat</th>
                        <th>E-mail Client</th>
                        <th>Representant</th>
                    </tr>
                    </thead>
                    <tbody> <!-- Corps du tableau -->
EOT;

                    echo "<tr><td name=".key($value)." id=".key($value).">".$value["nom_client"]."</td>";
                    next($value);
                    echo "<td name=".key($value)." id=".key($value).">".$value["descriptif_type"]."</td>";
                    next($value);
                    echo "<td name=".key($value)." id=".key($value).">".$value["id_contrat"]."</td>";
                    next($value);
                    echo "<td name=".key($value)." id=".key($value).">".$value["email_client"]."</td>";
                    next($value);
                    echo "<td name=".key($value)." id=".key($value).">".$value["representant"]."</td>";
                echo<<<EOT
                </tbody>
                </table>
                <div>
EOT;
                  echo "<a class='ui fluid positive button' type='submit' href=";
                  echo $value['liens_contrat'];
                  echo<<<EOT
                  download="contratT">Telecharger</a>
                </div>
                <br><br><br><br><br>
EOT;
            }
        ?>
<!---Modal ajout contrat--->



  <div class="ui modal"> <i class="close icon"></i>
      <div class="header">
        <h2 class="ui blue center aligned header">
          <i class="add user icon"></i>
            Ajout Contrat
        </h2>
      <div>
        <form class="ui large form" enctype="multipart/form-data" method="post" action='<?php echo base_url("contrats/post")?>'>
          <div class="ui stacked segment">
            <div class="field">
              <div class="ui left icon input">
                <i class="user icon"></i>
                <input type="email" name="email" placeholder="E-mail de l'Entreprise">
              </div>
            </div>
            <div class="ui fluid selection dropdown">
                <input type="hidden" name="type_contrat">
                <i class="dropdown icon"></i>
                <div class="default text">Type de contrat</div>
                <div class="menu">
                  <div class="item" data-value="0">
                    <i class="suitcase icon"></i>
                Business-Plan
                  </div>
                  <div class="item" data-value="1">
                    <i class="user icon"></i>Consulting
                  </div>
                </div>
            </div>
            <div class="field">
              <div class="ui left icon input">
                <i class="user icon"></i>
                <input type="hidden" name="MAX_FILE_SIZE" value="100000000000">
                <input type="file" name="upload" placeholder="Contrat a uploader">
              </div>
            </div>
            <div class="ui error message"></div>
              </div><br>
            <div class="ui fluid large blue submit button">Ajouter</div>
          </div>

        </form>
      </div>
    </div>
    </div>
