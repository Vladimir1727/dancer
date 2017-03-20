<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ajax extends CI_Controller {
	
	function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->model('AjaxModel');
		$this->load->model('CabinetModel');
		$this->load->library('session');
		$this->load->library('pagination');
	}
	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
      
	public function getUserInfo(){
		$id=$_POST['id'];
		$user=$this->AjaxModel->getUserInfo($id);
		echo json_encode($user);
	}

	public function saveUser()
	{
		echo $this->AjaxModel->saveUser($_POST);
	}

	public function filterUser(){
		$users=$this->AjaxModel->filterUsers($_POST);
		echo json_encode($users);
	}

	public function delRole()
	{
		var_dump($this->AjaxModel->delRole($_POST['role']));
	}

	public function addRole()
	{
		var_dump($this->AjaxModel->addRole($_POST['role']));
	}

	public function getRoles()
	{
		$roles= array(
			'admin' => $this->session->admin,
			'organizer' => $this->session->organizer,
			'cluber' => $this->session->cluber,
			'trainer' => $this->session->trainer,
			'dancer' => $this->session->dancer,
			);
		echo json_encode($roles);
	}

    public function getClubesHtml()
    {
        echo $this->CabinetModel->clubesHtml($_POST['city']);
    }

    public function getCitiesHtml()
    {
        echo $this->CabinetModel->citiesHtml($_POST['region']);
    }

    public function getTrainersHtml()
    {
        echo $this->CabinetModel->trainersHtml($_POST['club']);
    }

    public function edit() 
    {
        $id=$_POST['id'];
        $table=$_POST['table'];
        $res=$this->AjaxModel->getRow($table,$id);
        echo json_encode($res);
    }
    
    public function save()
    {
        $table=$_POST['table'];
        $id=$_POST['id'];
        $data=[];
        $d=$_POST;
        foreach ($d as $k => $v){
            if ($k != 'id' && $k != 'table'){
                $data[$k]=$v;
            }
        }
        $ins=$this->AjaxModel->update($table,$id,$data);
        echo $ins;
        //var_dump($data);
    }
    
    public function delete()
    {
        $table=$_POST['table'];
        $id=$_POST['id'];
        $res=$this->AjaxModel->delete($table,$id);
        echo $res;
    }
    
    public function insert()
    {
        $table=$_POST['table'];
        $data=[];
        $d=$_POST;
        foreach ($d as $k => $v){
            if ($k != 'table'){
                $data[$k]=$v;
            }
        }
        $ins=$this->AjaxModel->insert($table,$data);
        echo $ins;
    }
    
    public function showWays()
    {
        echo $this->CabinetModel->htmlWays();
    }
    
    public function showStyles()
    {
        echo $this->AjaxModel->htmlStyles($_POST['way']);
    }
    
    public function showCounts()
    {
        echo $this->CabinetModel->HtmlCounts();
    }

    public function showLigs()
    {
        echo $this->AjaxModel->htmlLigs($_POST['way']);
    }
    
    public function showAges()
    {
        echo $this->CabinetModel->htmlAges();
    }
	
    public function showAgeLig()
    {
        echo $this->AjaxModel->htmlAgeLig($_POST['way']);
    }
    
    public function dancerInfo() 
    {
        $id=$_POST['id'];
        $res=$this->AjaxModel->getDancer($id);
        echo json_encode($res[0]);
    }
    
    public function saveDancer()
    {
        $data=$_POST;
        $ins=$this->AjaxModel->updateDancer($data);
        echo $ins;
    }
    
    public function showTrainerDancers()
    {   
        $trainer_id=$this->session->id;
        echo $this->CabinetModel->htmlTrainerDancers($trainer_id);
    }
    
    public function deactivateDancer()
    {   
        $id=$_POST['id'];
        echo $this->AjaxModel->deactivateDancer($id);
    }
    
    public function activateDancer()
    {   
        $id=$_POST['id'];
        echo $this->AjaxModel->activateDancer($id);
    }
    
    public function test()
    {
    echo "TEST <br>";
    /*$rows=6;
    $in_page=5;
    $tall=$rows%$in_page;
    $rows-=$tall;
    $pages=round($rows/$in_page);
    if ($tall>0) $pages+=1;
    echo 'pages= '.$pages.'<br>';*/
    /*$user=$this->AjaxModel->getUserInfo(1);
    echo json_encode($user);*/
    
    }
}
