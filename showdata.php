<?php
require '../TodoList/Class/post.php';
session_start();

    $post= new Post();
    echo $post->ShowTodoList($_SESSION['user']->id);
?>