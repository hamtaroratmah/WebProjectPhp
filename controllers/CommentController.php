<?php
class CommentController{

    public function __construct(){

    }

    public function run(){

        #Add a comment
        if(!empty($_POST['description'] && !empty($_POST['title']))){
            $description = htmlspecialchars($_POST['description']);
            $title = htmlspecialchars($_POST['title']);
            
            Db::getInstance()->addComment();
        }
        else{
            echo $message = "Vous devez completer tous les champs!";
        }


        require_once(VIEWS_PATH . 'comment.php');

    }
}
?>