<?php
class ProfileController{

    private $_db;

    public function __construct($db){
        $this->_db = $db;
    }

    public function run(){

//        var_dump($_SESSION['member_id']);


        $tableIdeas = $this->_db->getIdeas($_SESSION['member_id']);
            var_dump($tableIdeas);

        require_once(VIEWS_PATH . 'profile.php');
    }
}
?>