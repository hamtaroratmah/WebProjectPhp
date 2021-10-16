<?php
class HomeController{
 
    private $_db;

    public function __construct($db){
        $this->_db = $db;
    }

    public function run(){
        $table= array();
        var_dump($_POST);
        if(!empty($_POST)){
            if ($_POST['value'] == $_POST['submitted']){
                $table[] = $this->_db->ideasStatusSubmitted();
            }elseif($_POST['value'] == $_POST['accepted'] ) {
                $table[] = $this->_db->ideasStatusAccepted();
            } elseif($_POST['value'] == $_POST['refused'] ) {
                $table[] = $this->_db->ideasStatusRefused();
            }elseif($_POST['value'] == $_POST['closed'] ){
                $table[] = $this->_db->ideasStatusClosed();
            }
        }
        else{
            $table[] = $this->_db->ideasStatusSubmitted();
        }




        


        require_once(VIEWS_PATH . 'home.php');

    }
}
?>