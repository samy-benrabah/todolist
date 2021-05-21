<?php
require_once 'config.php';

class Post extends Database
{

    protected $pdo;
    private $today;
    private $id;
    private $id_user;
    private $post;
    
    
    public function AddTodoList($id,$post,$date){
        $this->post=htmlspecialchars(trim($post));
        $today=date("Y-m-d");
        if (!empty($post) && !empty($date)) {
            if ($date>=$today) {
                $stmt_insert=$this->pdo->prepare("INSERT INTO tache( id_user, post,date) VALUES (?,?,?)");
                $stmt_insert->execute([$id,$this->post,$date]);
                return 200;
            }
            else {
                return 400;
            }
        
        }else {
            return 401;
        }
    }

    public function ShowTodoList($id_user){
    
    
    $stmt_select=$this->pdo->prepare("SELECT * FROM tache WHERE id_user=?");
    $stmt_select->execute([$id_user]);
    $fetch=$stmt_select->fetchAll(PDO::FETCH_OBJ);
    return json_encode($fetch);
}

    public function DeleteTodoList($id){
       
        $stmt_delete=$this->pdo->prepare("DELETE FROM tache WHERE id=? ");
        $stmt_delete->execute([$id]);
        
        return 200;
    }
}
?>