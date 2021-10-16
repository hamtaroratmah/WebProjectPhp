<?php
class LogoutController{

    public function __construct() {

    }

    public function run(){
        # (ré)Initialiser le tableau des variables de session
        $_SESSION['authenticated'] = false;
        $_SESSION['admin'] = false;

        # Ce contrôleur n'affiche pas de vue, il redirige à l'accueil
        header("Location: index.php?action=login");
        die();
    }

}
?>