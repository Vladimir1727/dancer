<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Service extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('ServiceModel');
	}

	     
    public function CreateTables()
    {
        $res=$this->ServiceModel->CreateTables();
        if ($res==true) echo "tables created"; else echo "creation error";
    }
        
    public function Seed()
    {
    	$res=$this->ServiceModel->Seed();
        if ($res==true) echo "values seeded"; else echo "seed error";
    }
}
