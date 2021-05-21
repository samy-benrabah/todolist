$(document).ready(function() {
    $("#inscription").on('click', function(e) {
        e.preventDefault();
        let username = $("#username").val();
        let password = $("#password").val();
        let confirm = $("#confirm").val();


        $.ajax({
            type: "POST",
            url: "../../../ProjectPool3/TodoList/methode.php",
            data: {
                buttonInscription: 1,
                usernamePHP: username,
                passwordPHP: password,
                confirmPHP: confirm
            },

            success: function(response) {
                console.error(response);
                switch (response) {
                    case '200':

                        $(location).attr('href', 'http://localhost/ProjectPool3/TodoList/index.php');

                        break;

                    case '401':
                        $("#message").text("L'identifiant existe déjà");
                        $("#message").css('color', 'red');
                        break;

                    case '402':
                        $("#message").text("Les mots de passe ne sont pas identiques");
                        $("#message").css('color', 'red');
                        break;

                    case '403':
                        $("#message").text("Entrez votre mot de passe");
                        $("#message").css('color', 'red');
                        break;

                    case '404':
                        $("#message").text("Entrez un identifiant");
                        $("#message").css('color', 'red');
                        break;
                }

            }
        });

    });

    $("#connexion").click(function(e) {
        e.preventDefault();

        let username = $("#username").val();
        let password = $("#password").val();

        $.ajax({
            type: "POST",
            url: "../../../ProjectPool3/TodoList/methode.php",
            data: {
                buttonConnexion: 2,
                usernameConnexion: username,
                passwordConnexion: password
            },
            success: function(response) {
                console.error(response);
                switch (response) {
                    case '200':

                        $(location).attr('href', 'http://localhost/ProjectPool3/TodoList/todolist.php');


                        break;
                    case '401':
                        $("#message").text("Mot de passe incorrect");
                        $("#message").css("color", "red");
                        break;
                    case '402':
                        $("#message").text("Identifiant inconnu");
                        $("#message").css("color", "red");
                        break;
                    case '403':
                        $("#message").text("Ces informations ne correspondent pas");
                        $("#message").css("color", "red");
                        break;
                    case '405':
                        $("#message").text("Entrez votre mot de passe");
                        $("#message").css("color", "red");
                        break;
                    case '406':
                        $("#message").text("Entrez votre identifiant ");
                        $("#message").css("color", "red");
                        break;


                }
            }
        });

    });





});