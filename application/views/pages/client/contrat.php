<br><br><br><br>
<div class="ui main text container">
        <h1 class="ui center aligned blue segment header">Bienvenue sur le gestionnaire de vos Contrats</h1>
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
                    next($value);
                    echo "<tr><td name=".key($value)." id=".key($value).">".$value["nom_client"]."</td>";
                    next($value);
                    echo "<td name=".key($value)." id=".key($value).">".$value["descriptif_type"]."</td>";
                    next($value);
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
