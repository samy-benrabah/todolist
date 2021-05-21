$(document).ready(function() {

    function showData() {
        $.ajax({
            type: "POST",
            url: "../../../ProjectPool3/TodoList/showdata.php",

            success: function(result) {

                data = JSON.parse(result);
                $(".full-todo").empty();

                data.forEach(result => {
                    let div_cover = $('<div class="todo"></div>');
                    let div_text = $(`<div class="text"><p id="message">${result.post}</p><p id="date">Pour le ${result.date}</p></div>`);
                    let div_symbol = $('<div class="symbol"></div>');
                    let button_delete = $(`<button name="delete" data-id=${result.id} type="button"><img src="Images/x-mark.png" alt="cross" ></button>`);
                    let button_edit = $('<button name="edit" type="button"><img src="Images/edit.png" alt="edit" ></button>');
                    button_delete.on('click', e => {
                        deletePost(e);
                    });
                    button_edit.on('click', e => {
                        // editPost(e);
                        alert('Edit');
                    });

                    div_symbol.append(button_delete);
                    div_symbol.append(button_edit);
                    div_cover.append(div_text);
                    div_cover.append(div_symbol);

                    $(".full-todo").append(div_cover);




                });

            }
        });
    }
    showData();

    $("#submit-todo").click(function(e) {

        let addTodo = $("#add-todo").val();
        let date = $("#date").val();
        $.ajax({
            type: "POST",
            url: "../../../ProjectPool3/TodoList/methode.php",
            data: {
                buttonAddTodo: 1,
                addTodoPHP: addTodo,
                datePHP: date
            },

            success: function(response) {
                console.log(response);
                switch (response) {
                    case '200':
                        showData();


                        break;

                    case '400':
                        $("#erreur").text("La date n'est pas valide");
                        $("#erreur").css("color", "red");
                        break;

                    case '401':
                        $("#erreur").text("Remplisssez le champ");
                        $("#erreur").css("color", "red");
                        break;
                }
            }
        });

    });

    function deletePost(e) {


        let id = $(e.target).attr('data-id');

        $.ajax({
            type: "POST",
            url: "../../../ProjectPool3/TodoList/methode.php",
            data: {
                buttonDeletePHP: 2,
                post_id: id

            },
            success: function(response) {
                console.log(response);
                showData()
                switch (response) {
                    case '200':
                        alert("Etes vous sur de supprimer cette élement ?");
                        console.log(response);
                        break;

                    default:
                        break;
                }
            }
        });
    };
});