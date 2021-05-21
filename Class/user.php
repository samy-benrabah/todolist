<?php
require 'config.php';
class User extends Database
{
    
    private $username;
    private $password;
    private $confirm;
    protected $pdo;
    private $id;

    

    
    public function inscription($username,$password,$confirm)
    {
        
        $this->username = htmlspecialchars(trim($username));
        $this->password = htmlspecialchars(trim($password));
        $this->confirm = htmlspecialchars(trim($confirm));
        
        if (!empty($this->username)) {
            
            if (!empty($this->password) && !empty($this->confirm)) {

                if ($password == $confirm) {
                    
                    $stmt_select=$this->pdo->prepare("SELECT name FROM user WHERE name=?");
                    $stmt_select->execute([$this->username]);
                    $fetch=$stmt_select->fetch(PDO::FETCH_OBJ);
                    
                    
                    if (isset($fetch->name)!=true) {
                        
                        $crypted=password_hash($this->password,PASSWORD_BCRYPT);
                        $stmt=$this->pdo->prepare("INSERT INTO user( name, password) VALUES (?,?) ");
                        $stmt->bindParam(1,$this->username);
                        $stmt->bindParam(2,$crypted);
                        $stmt->execute();
                        
                        return 200;
                        
                        
                    }
                    else {
                        return 401;
                    }

                    
                }
                else {
                    return 402;
                }
                
            }
            else {
                return 403;
            }
        }
        else {
            return 404;
        }
        
        
    }

    public function connexion($username,$password)
    {
        $this->username = htmlspecialchars(trim($username));
        $this->password = htmlspecialchars(trim($password));

        $stmt_select=$this->pdo->prepare("SELECT * FROM user WHERE name=?  ");
        $stmt_select->execute([$this->username]);
        $fetch=$stmt_select->fetch(PDO::FETCH_OBJ);
        
        if (!empty($this->username)) {
           
            if (!empty($this->password)) {
                    
                if (isset($fetch->name)!=false && isset($fetch->password)!=false) {
                    $verif=password_verify($this->password,$fetch->password);
                    
                    if ($this->username == $fetch->name) {
                        
                        if ($this->password == $verif) {
                            $this->id=$fetch->id;
                            $_SESSION['user']=$fetch;
                            return 200;
                        }
                        else {
                            
                            return 401;
                        }
                    }
                    else{
                        
                        return 402;
                        
                    }
                }
                else {
                    
                    return 403;
                }
            }
            else {
                
                return 405;
            }
            
        }
        else {
            return 406;
        }
        
    }

    public function getId(){
        $this->id;
        return $this->pdo;
    }
            
}
    


?>