<?php
    require 'methode.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/todolist.css">
    <title>ToDoList</title>
</head>
<header>
    <form  method="get">
        <button type="submit" name="disconnect">Deconnexion</button>
    </form>
</header>
<body>
    <section>
        
            <h1>Kes Kon Fait ?</h1>
            <p id="erreur"></p>
        <div class="form">
            <form>
                    <div class="form-int">
                        <input type="text" id="add-todo">
                        <button type="button" id="submit-todo">Ajouter!</button>
                    </div>
                    <input type="date"  id="date">
                    
            </form>
        </div>
        <div class="full-todo">
        
        </div>
    </section>
</body>
</html>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="JS/todolist.js"></script>
<!-- <script src="JS/connect.js"></script> -->