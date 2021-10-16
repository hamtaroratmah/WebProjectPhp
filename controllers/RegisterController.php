<?php
class RegisterController{

    private $_db;

    public function __construct($db){
        $this->_db =$db;
    }

    public function run(){
        $notification_register="";
        if(!empty($_POST['username_register']) && !empty($_POST['mail_register']) && !empty($_POST['password_register'])){
            $email_exist = $this->_db->emailExist($_POST['mail_register']);
            $username_exist = $this->_db->usernameExist($_POST['username_register']);
            if($email_exist || $username_exist){
                if($email_exist) $notification_register+="Cette adresse mail est déjà utilisée.";
                if($username_exist) $notification_register+="Cet username est déjà utilisé.";
            }else{
                $this->_db->register($_POST['username_register'],$_POST['mail_register'],password_hash($_POST['password_register'],PASSWORD_BCRYPT));
                $notification_register='Inscription réussie !';
            }
        } else{
            $notification_register="Veuillez remplir tous les champs.";

        }

        require_once(VIEWS_PATH . 'register.php');
    }
}
?>
