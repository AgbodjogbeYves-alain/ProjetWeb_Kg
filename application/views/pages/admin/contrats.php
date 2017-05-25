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
                  echo base_url('contrats_upload/'.$value['liens_contrat']);
                  echo<<<EOT
                  download="contratT">Telecharger</a>
                </div>
                <br><br><br><br><br>
EOT;
            }
        ?>
<!---Modal ajout contrat--->

    </div>
  </div>
  <div class="ui small modal"> <i class="close icon"></i>
    <div class="ui middle aligned center aligned grid">
      <div class="column">
        <h2 class="ui teal image header">
          <i class="add user icon"></i>
          <div class="content">
            Ajout Contrat
          </div>
        </h2>
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
                <input type="hidden" name="MAX_FILE_SIZE" value="100000">
                <input type="file" name="upload" placeholder="Contrat a uploader">
              </div>
            </div>
            <div class="ui error message"></div>
              </div><br>
            <div class="ui fluid large teal submit button">Ajouter</div>
          </div>

        </form>
      </div>

<script>

$(document).ready(function() {
  $("#openmodal").click(function () {
      $('.ui.modal').modal('show');
});


    $('.ui.form')
      .form({
        fields: {
          email: {
            identifier  : 'email',
            rules: [
              {
                type   : 'empty',
                prompt : 'Entrez un email'
              },
              {
                type   : 'email',
                prompt : 'Entrez un e-mail valide'
              }
            ]
          },
          password: {
            identifier  : 'password',
            rules: [
              {
                type   : 'empty',
                prompt : 'Entrez un mot de passe'
              },
              {
                type   : 'length[3]',
                prompt : 'Votre mot de passe doit avoir plus de 3 caractères'
              }
            ]
          },
          nom: {
            identifier  : 'name',
            rules: [
              {
                type   : 'empty',
                prompt : 'Entrez un nom'
              },
              {
                type   : 'regExp[/^[a-zA-Z]+]',
                prompt : 'Entrer un nom valide sans caractères spéciaux'
              }
            ]
          },
          prenom: {
            identifier  : 'prenom',
            rules: [
              {
                type   : 'empty',
                prompt : 'Entrez un prenom'
              }
            ]
          },
        numero: {
            identifier  : 'numero',
            rules: [
              {
                type   : 'empty',
                prompt : 'Entrez un numero'
              }
            ]
          },
          privilege: {
            identifier  : 'privilege',
            rules: [
              {
                type   : 'empty',
                prompt : 'Chosissez un  privilege'
              }
            ]
          }
        }
      })
    ;
});
</script>
