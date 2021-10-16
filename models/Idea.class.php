<?php
Class Idea{
    private $_idIdea ;
    private $_memberId ;
    private $_description ;
    private $_title ;
    private $_status ;
    private $_submitterDate ;
    private $_acceptedDate ;
    private $_refusedDate ;
    private $_closedDate ;

    public function __construct($idIdea,$memberId,$description,$title,$status,$submitterDate){
        $this->_idIdea=$idIdea;
        $this->_memberId=$memberId;
        $this->_description=$description;
        $this->_title=$title;
        $this->_status=$status;
        $this->_submitterDate=$submitterDate;
    }

    /**
     * @return mixed
     */
    public function getIdIdea()
    {
        return $this->_idIdea;
    }

    /**
     * @return mixed
     */
    public function getMemberId()
    {
        return $this->_memberId;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->_description;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->_title;
    }

    /**
     * @return mixed
     */
    public function getStatus()
    {
        return $this->_status;
    }

    /**
     * @return mixed
     */
    public function getAcceptedDate()
    {
        return $this->_acceptedDate;
    }

    /**
     * @return mixed
     */
    public function getClosedDate()
    {
        return $this->_closedDate;
    }

    /**
     * @return mixed
     */
    public function getRefusedDate()
    {
        return $this->_refusedDate;
    }

    /**
     * @return mixed
     */
    public function getSubmitterDate()
    {
        return $this->_submitterDate;
    }

    /**
     * @param mixed $acceptedDate
     */
    public function setAcceptedDate($acceptedDate): void
    {
        $this->_acceptedDate = $acceptedDate;
    }

    /**
     * @param mixed $closedDate
     */
    public function setClosedDate($closedDate): void
    {
        $this->_closedDate = $closedDate;
    }

    /**
     * @param mixed $refusedDate
     */
    public function setRefusedDate($refusedDate): void
    {
        $this->_refusedDate = $refusedDate;
    }

    /**
     * @param mixed $submitterDate
     */
    public function setSubmitterDate($submitterDate): void
    {
        $this->_submitterDate = $submitterDate;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status): void
    {
        $this->_status = $status;
    }

}
