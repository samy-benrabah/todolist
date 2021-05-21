$(document).ready(function() {

    $.ajax({
        type: "POST",
        url: "../../../ProjectPool3/TodoList/methode.php",

        success: function(response) {
            switch (response) {
                case '402':
                    $(location).attr('href', 'http://localhost/ProjectPool3/TodoList/index.php');
                    break;


            }
        }
    });
});