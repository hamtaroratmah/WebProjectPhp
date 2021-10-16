<?php
class LoginController{

    private $_db;

    public function __construct($db){
        $this->_db =$db;
    }

    public function run(){

//        $test = $this->_db->isAdmin("nonadmin@gmail.com");
//        var_dump($test);
//        var_dump($this->_db->isAdmin("souli@gmail.com"));

        $_SESSION['admin'] = false;
        $_SESSION['authenticated'] = false;

        $notification_login='';

        if(!empty($_SESSION['authenticated'])){
            header("Location: index.php?action=profile");
            die();
        }


        if(!empty($_POST['mail']) && !empty($_POST['password'])){
            $_SESSION['user']=$this->_db->getUser($_POST['mail'],$_POST['password']);
            if($_SESSION['user']!=null && $_SESSION['user']->isDisabled()){
                $notification_login="Votre compte a été désactivé, veuillez prendre contact avec un administrateur";
            }elseif ($_SESSION['user']!=null){
                $_SESSION['authenticated'] = true;
                if($_SESSION['user']->isAdmin()){
                    $_SESSION['admin'] = true;
                }header("Location: index.php?action=profile");
            }else{
                $notification_login="Adresse mail ou mot de passe incorrecte";
            }
        }else{
            if(empty($_POST['mail']) || empty($_POST['password'])){
                $notification_login ="Veuillez remplir tout les champs.";
            }
        }

        require_once(VIEWS_PATH . 'login.php');
    }
}
?>