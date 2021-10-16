<?php
class AddControllers
{

    
    private $_db;

    public function __construct($db){
        $this->_db = $db;
    }


    public function run()
    {
        $notification='';
        if(!empty($_POST)){
            $date = date("Y-m-j H:i:s");

            $this->_db->insertIdea();
        }


        require_once(VIEWS_PATH . 'add_idea.php');
    }
}
?>
