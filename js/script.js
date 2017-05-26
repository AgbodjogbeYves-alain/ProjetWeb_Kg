$(document).ready(function() {
  $("#openmodal").click(function () {
      $('.ui.modal').modal('show');
})


    $('.ui.dropdown')
    .dropdown()
  ;

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
})
