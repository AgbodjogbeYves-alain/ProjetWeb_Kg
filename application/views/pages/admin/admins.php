<br><br><br><br>
<div class="ui main text container">
        <h1 class="ui center aligned blue segment header">Bienvenue sur le gestionnaire des Administratrateurs
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

                echo '<form class="ui form" method="post" action="';
                echo base_url('admins/putdelete/'.$value['id_admin']);
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
                        <th></th>
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
                    echo '<td> <input class=ui fluid positive button type=submit name=selectButton value=Changerpasse></input>';
                echo<<<EOT
                </tbody>
                  <div>
                      <tfoot>
                        <tr>
                          <td></td>
                          <td>
                          <div class="ui buttons">
                            <i class="refresh icon"></i>
                            <input class="ui fluid positive button" type='submit' name='selectButton' value='Mise a jour'></input>
                          <div class="or" data-text="ou"></div>
                          <input type=submit class="ui negative fluid button" name='selectButton' value='Supprimer'>
                          </div>
                          </th>
                        </tr>
                      </tfoot>
                  </div>
                </table>
                </form>
                <br>
EOT;
            }
        ?>
<!---Modal ajout admin--->
        <div class="ui small modal"> <i class="close icon"></i>
          <div class="ui middle aligned center aligned grid">
            <div class="column">
              <h2 class="ui teal image header">
                <i class="add user icon"></i>
                <div class="content">
                  Ajout Client
                </div>
              </h2>
              <form class="ui large form" method="post" action='<?php echo base_url("clients/post")?>'>
                <div class="ui stacked segment">
                  <div class="field">
                    <div class="ui left icon input">
                      <i class="user icon"></i>
                      <input type="text" name="nom" placeholder="Nom de l'Entreprise ou du Particulier">
                    </div>
                  </div>
                  <div class="field">
                    <div class="ui left icon input">
                      <i class="user icon"></i>
                      <input type="text" name="email" placeholder="E-mail de l'Entreprise ou du Particulier">
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
                      <input type="text" name="descriptif" placeholder="Decrivez l'entreprise en quelques mots">
                    </div>
                  </div>
                  <div class="field">
                    <div class="ui left icon input">
                      <i class="lock icon"></i>
                      <input type="text" name="representant" placeholder="Representant">
                    </div>
                  </div>
                  <div class="ui fluid selection dropdown">
                      <input type="hidden" name="type">
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
                  <div class="ui fluid large teal submit button">Ajouter</div>
                </div>
                <div class="ui error message"></div>
              </form>
            </div>
    </div>
  </div>
</div>

<script>

$(document).ready(function() {
  $("#openmodal").click(function () {
      $('.ui.modal').modal('show');
})
    $('.ui.celled.table td').dblclick(function(){

        var current = $(this).text();
        var namePlace = $(this).attr("id");
        $(this).html('<input type=text name='+namePlace+' value='+current+'></input>');
        $(this).focus();
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
          }
        }
      })
    ;
});
</script>
