<?php
require 'Class/user.php';
require 'Class/post.php';
$user=new User();
$post=new Post();
session_start();
if (isset($_POST['buttonInscription'])) {
    $usernameInscription=htmlspecialchars(trim($_POST['usernamePHP']));
    $passwordInscription=htmlspecialchars(trim($_POST['passwordPHP']));
    $confirmInscription=htmlspecialchars(trim($_POST['confirmPHP']));
    echo $user->inscription($usernameInscription,$passwordInscription,$confirmInscription);
}
    
        
if (isset($_POST['buttonConnexion'])) {
    
    $usernameConnexion=htmlspecialchars(trim($_POST['usernameConnexion']));
    $passwordConnexion=htmlspecialchars(trim($_POST['passwordConnexion']));
    echo $user->connexion($usernameConnexion,$passwordConnexion);
    
} 

if (isset($_POST['buttonAddTodo'])) {
    
   $addTodo=htmlspecialchars(trim($_POST['addTodoPHP']));
   $today=htmlspecialchars(trim($_POST['datePHP']));
   $id=$_SESSION['user']->id;
   echo $post->AddTodoList($id,$addTodo,$today);

}

if (isset($_POST['buttonDeletePHP'])) {
    $post->DeleteTodoList($_POST['post_id']);
    // var_dump($_SESSION['user']);
    // die();

}

if (isset($_GET['disconnect'])) {
   session_destroy();
   header("Location:index.php");
}
// if (isset ($_SESSION['user']) != true )  {
//     return 402;
// }
    
    
    
     
?>