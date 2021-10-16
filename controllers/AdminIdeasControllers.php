<?php
class AdminIdeasControllers{

    private $_db;

    public function __construct($db){

        $this->_db = $db;

    }

    public function run(){

//        var_dump($_POST);
//        var_dump($_POST['ideaStatus']);

        $ideasTable = $this->_db->selectIdeas();

        if(isset($_POST['ideaStatus'])){
            for($i=0;$i<count($ideasTable);$i++){

                if($_POST['ideaStatus'][$i]['status_select']=="closed"){
                    $ideasTable[$i]->setStatus("closed");
                    $this->_db->setStatusToClosed($_POST['ideaStatus'][$i]['idea_id']);
                }elseif($_POST['ideaStatus'][$i]['status_select']=="accepted"){
                    $ideasTable[$i]->setStatus("accepted");
                    $this->_db->setStatusToAccepted($_POST['ideaStatus'][$i]['idea_id']);
                }elseif($_POST['ideaStatus'][$i]['status_select']=="refused"){
                    $ideasTable[$i]->setStatus("refused");
                    $this->_db->setStatusToRefused($_POST['ideaStatus'][$i]['idea_id']);
                }
            }
        }

        require_once(VIEWS_PATH . 'admin_ideas.php');
    }
}
