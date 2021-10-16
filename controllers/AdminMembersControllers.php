<?php
class   AdminMembersControllers{

    private $_db;

    public function __construct($db){
        $this->_db = $db;
    }

    public function run(){

//        var_dump($_POST);
//        var_dump($_POST['permissions']);


        $membersTable = $this->_db->selectMembers();

        if(isset($_POST['permissions'])){
            for ($i=0;$i<count($membersTable);$i++){
                $membersTable[$i]->setAdmin($_POST['permissions'][$i]['admin_select']);
                $this->_db->setAdmin($_POST['permissions'][$i]['member_id'],$_POST['permissions'][$i]['admin_select']);
                $membersTable[$i]->setDisabled($_POST['permissions'][$i]['disabled_select']);
                $this->_db->setDisabled($_POST['permissions'][$i]['member_id'],$_POST['permissions'][$i]['disabled_select']);
            }
        }


        require_once(VIEWS_PATH . 'admin_members.php');
    }
}
?>