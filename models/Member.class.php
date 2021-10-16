<?php
Class Member{

    private $_username;
    private $_mail;
    private $_admin;
    private $_disabled;
    private $_id;

    public function __construct($id,$username,$mail,$admin,$disabled){
        $this->_username=$username;
        $this->_mail=$mail;
        $this->_admin=$admin;
        $this->_disabled=$disabled;
        $this->_id=$id;
    }

    /**
     * @return mixed
     */
    public function isAdmin(){
        return $this->_admin;
    }

    /**
     * @return mixed
     */
    public function getMail(){
        return $this->_mail;
    }

    /**
     * @return mixed
     */
    public function getUsername(){
        return $this->_username;
    }

    /**
     * @param mixed $admin
     */
    public function setAdmin($admin){
        $this->_admin = $admin;
    }

    /**
     * @return mixed
     */
    public function isDisabled()
    {
        return $this->_disabled;
    }

    /**
     * @param mixed $disabled
     */
    public function setDisabled($disabled){
        $this->_disabled = $disabled;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->_id;
    }

    public function html_username(){
        return htmlspecialchars($this->_username);
    }

    public function html_mail(){
        return htmlspecialchars($this->_mail);
    }

    public function html_admin(){
        return htmlspecialchars($this->_admin);
    }

    public function html_disabled(){
        return htmlspecialchars($this->_disabled);
    }
}