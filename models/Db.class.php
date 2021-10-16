<?php
class Db
{
    private static $instance = null;
    private $_db;

    private function __construct()
    {
        try {
            $this->_db = new PDO('mysql:host=localhost;port=3306;dbname=webproject;charset=utf8','root','');
            $this->_db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			$this->_db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE,PDO::FETCH_OBJ);
        } 
		catch (PDOException $e) {
		    die('Erreur de connexion à la base de données : '.$e->getMessage());
        }
    }

	# Singleton Pattern
    public static function getInstance()
    {
        if (is_null(self::$instance)) {
            self::$instance = new Db();
        }
        return self::$instance;
    }

//    start register and login functions

    public function register($username,$email, $password) {
        $query = 'INSERT INTO members (username,password,mail,admin,disabled) values (:username,:password,:mail,0,0)';
        $ps = $this->_db->prepare($query);
        $ps->bindValue(':mail',$email);
        $ps->bindValue(':password',$password);
        $ps->bindValue(':username',$username);
        $ps->execute();
    }

    public function emailExist($email) {
        $query = 'SELECT * from members WHERE mail=:mail';
        $ps = $this->_db->prepare($query);
        $ps->bindValue(':mail',$email);
        $ps->execute();
        return ($ps->rowcount() != 0);
    }

    public function usernameExist($username) {
        $query = 'SELECT * from members WHERE username=:username';
        $ps = $this->_db->prepare($query);
        $ps->bindValue(':username',$username);
        $ps->execute();
        return ($ps->rowcount() != 0);
    }

    public function getUser($email, $password) {
        $query = 'SELECT * from members WHERE mail=:mail';
        $ps = $this->_db->prepare($query);
        $ps->bindValue(':mail',$email);
        $ps->execute();
        if ($ps->rowcount() != 0){
            $row = $ps->fetch();
            $hash = $row->password;
            if(password_verify($password, $hash)) return new Member($row->member_id,$row->username,$row->mail,$row->admin,$row->disabled);
        }

        return null;
    }

//    end register and login functions
//////////////////////////////////////
//    start part A functions

   # public function countVotes(){
        #$query = 'SELECT count(*) FROM votes '  #ATTENTION DANS LE SCRIPT SQL: la table s'appelle "vote" au lieu de "votes"
        #$ps = $this->_db->prepare($query);
       # $ps->execute();
    #}



    public function addComment($description){
        $query = 'INSERT INTO comments (description, deleted) values (:description, 0)';
        $ps = $this->_db->prepare($query);
        $ps->bindValue(':description',$description);
        $ps->execute();
    }

    public function deleteComment(){
        $query = 'INSERT INTO comments (deleted) values (1)';
        $ps = $this->_db->prepare($query);
        $ps->execute();
    }

    public function ideasStatusSubmitted(){
        $query = 'SELECT * FROM ideas WHERE status=:status ORDER BY votes DESC'; #CORRIGé: 'STATUT' EN FRANCAIS ALORS QU'IL DOIT ETRE EN ANGLAIS-> 'status'
        $ps = $this->_db->prepare($query);
        $status='submitted';
        $ps->bindValue(':status',$status);
        $ps->execute();

        $table = array();
        while ($row = $ps->fetch()){
            $table[] = new ideas($row->id_idea,$row->member_id,$row->description,$row->title,$row->status,$row->submitted_date);
        }
        if (empty($table)){
            $table[] = "Il n'y a pas encore d'idées dans cette catégorie !";
        }
        return $table;
    }

    public function ideasStatusAccepted(){
        $query = 'SELECT * FROM ideas WHERE status=:status ORDER BY votes DESC'; #corrigé: 'STATUT' EN FRANCAIS ALORS QU'IL DOIT ETRE EN ANGLAIS-> 'status'
        $ps = $this->_db->prepare($query);
        $status='accepted';
        $ps->bindValue(':status',$status);
        $ps->execute();

        $table = array();
        while ($row = $ps->fetch()){
            $table[] = new ideas($row->id_idea,$row->member_id,$row->description,$row->title,$row->status,$row->submitted_date,$row->accepted_date);
        }
        if (empty($table)){
            $table[] = "Il n'y a pas encore d'idées dans cette catégorie !";
        }
        return $table;
    }

    public function ideasStatusRefused(){
        $query = 'SELECT * FROM ideas WHERE status=:status ORDER BY votes DESC'; #corrigé: 'STATUT' EN FRANCAIS ALORS QU'IL DOIT ETRE EN ANGLAIS-> 'status'
        $ps = $this->_db->prepare($query);
        $status='refused';
        $ps->bindValue(':status',$status);
        $ps->execute();

        $table = array();
        while ($row = $ps->fetch()){
            $table[] = new ideas($row->id_idea,$row->member_id,$row->description,$row->title,$row->status,$row->submitted_date,$row->accepted_date,$row->refused_date);
        }
        if (empty($table)){
            $table[] = "Il n'y a pas encore d'idées dans cette catégorie !";
        }
        return $table;
    }

    public function ideasStatusClosed(){
        $query = 'SELECT * FROM ideas WHERE status=:status ORDER BY votes DESC'; #corrigé: 'STATUT' EN FRANCAIS ALORS QU'IL DOIT ETRE EN ANGLAIS-> 'status'
        $ps = $this->_db->prepare($query);
        $status='closed';
        $ps->bindValue(':status',$status);
        $ps->execute();

        $table = array();
        while ($row = $ps->fetch()){
            $table[] = new ideas($row->id_idea,$row->member_id,$row->description,$row->title,$row->status,$row->submitted_date,$row->accepted_date,$row->refused_date,$row->closed_date);
        }
        if (empty($table)){
            $table[] = "Il n'y a pas encore d'idées dans cette catégorie !";
        }
        return $table;
    }

    public function insertIdea(){
        $query = 'INSERT INTO ideas (title,description,submitted_date,status) values (:title,:description,:submitted_date,:status)';
        $ps = $this->_db->prepare($query);
        $ps->bindValue(':title',$title);
        $ps->bindValue(':description',$description);
        $ps->bindValue(':submitted_date',$date);
        
        $status = 'submitted';
        $ps->bindvalue(':status',$status);
        $ps->execute();
    
    
    }


//    end part A functions
//////////////////////////////////////
///   start part B functions

    //members functions

    public function isAdmin($mail){
        $query = 'SELECT admin from members WHERE mail=:mail';
        $ps = $this->_db->prepare($query);
        $ps->bindValue(':mail',$mail);
        $ps->execute();
        return $ps->fetch()->admin==1;
    }

    public function setAdmin($id,$admin){
        $query = 'UPDATE members SET admin = :admin WHERE member_id=:id';
        $ps = $this->_db->prepare($query);
        $ps->bindValue(':id',$id);
        $ps->bindValue(':admin',$admin);
        $ps->execute();
    }

    public function isDisabled($mail){
        $query = 'SELECT disabled from members WHERE mail=:mail';
        $ps = $this->_db->prepare($query);
        $ps->bindValue(':mail',$mail);
        $ps->execute();
        return $ps->fetch()->disabled==1;
    }

    public function setDisabled($id,$disabled){
        $query = 'UPDATE members SET disabled = :disabled WHERE member_id=:id';
        $ps = $this->_db->prepare($query);
        $ps->bindValue(':id',$id);
        $ps->bindValue(':disabled',$disabled);
        $ps->execute();
    }

    public function selectMembers(){
        $query = 'SELECT member_id,username,mail,admin,disabled FROM members ORDER BY username';
        $ps = $this->_db->prepare($query);
        $ps->execute();

        $table = array();
        while ($row = $ps->fetch()){
            $table[] = new Member($row->member_id,$row->username,$row->mail,$row->admin,$row->disabled);
        }
        return $table;
    }

    public function getId($mail){
        $query = 'SELECT member_id from members WHERE mail=:mail';
        $ps = $this->_db->prepare($query);
        $ps->bindValue(':mail',$mail);
        $ps->execute();
        return $ps->fetch()->id;
    }

    //ideas functions

    public function selectIdeas(){
        $query = 'SELECT * FROM ideas ORDER BY status';
        $ps = $this->_db->prepare($query);
        $ps->execute();

        $table = array();
        while ($row = $ps->fetch()){
            $table[] = new Idea($row->id_idea,$row->member_id,$row->description,$row->title,$row->status,$row->submitted_date,$row->accepted_date,$row->refused_date,$row->closed_date);
        }
        return $table;
    }

    public function getAuthor($member_id){
        $query = 'SELECT username FROM members WHERE member_id=:member_id';
        $ps = $this->_db->prepare($query);
        $ps->bindValue(':member_id',$member_id);
        $ps->execute();
        return $ps->fetch()->username;
    }

    public function setStatusToAccepted($id){
        $query = 'UPDATE ideas SET accepted_date = :time,status = "accepted" WHERE id_idea=:id';
        $ps = $this->_db->prepare($query);
        $ps->bindValue(':id',$id);
        $ps->bindValue(':time',date("Y-m-d H:i:s"));
        $ps->execute();
    }

    public function setStatusToRefused($id){
        $query = 'UPDATE ideas SET refused_date = :time,status = "refused" WHERE id_idea=:id';
        $ps = $this->_db->prepare($query);
        $ps->bindValue(':id',$id);
        $ps->bindValue(':time',date("Y-m-d H:i:s"));
        $ps->execute();
    }

    public function setStatusToClosed($id){
        $query = 'UPDATE ideas SET closed_date = :time,status = "closed" WHERE id_idea=:id';
        $ps = $this->_db->prepare($query);
        $ps->bindValue(':id',$id);
        $ps->bindValue(':time',date("Y-m-d H:i:s"));
        $ps->execute();
    }

    public function getIdeas($member_id){
        $query = 'SELECT * FROM ideas WHERE member_id=:member_id';
        $ps = $this->_db->prepare($query);
        $ps->bindValue(':member_id',$member_id);
        $ps->execute();
        $table = array();
        while ($row = $ps->fetch()){
            $table[] = new Idea($row->id_idea,$row->member_id,$row->description,$row->title,$row->status,$row->submitted_date,$row->accepted_date,$row->refused_date,$row->closed_date);
        }
        return $table;
    }

///   end part B functions

}