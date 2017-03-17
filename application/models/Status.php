<?php
class Status extends CI_Model
{
    function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    function statusId($statusName) {
        $q=$this->db->query('select id from statuses where status="'.$statusName.'"');
        $res=$q->result();
        return $res[0]->id;
    }
    
    function statusName($statusId) {
        $q=$this->db->query('select status from statuses where id='.$statusId);
        $res=$q->result();
        return $res[0]->status;
    }
	
}