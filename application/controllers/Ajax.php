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
                $this->load->helper('download');
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
            $res = $this->AjaxModel->saveUser($_POST);
            var_dump($res);
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
        var_dump($ins);
        //echo $ins;
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
    
    public function showCluberTrainers()
    {   
        $cluber_id=$this->session->id;
        echo $this->CabinetModel->htmlCluberTrainers($cluber_id);
    }
    
    public function trainerInfo()
    {
        $id=$_POST['id'];
        $res=$this->AjaxModel->getTrainer($id);
        echo json_encode($res[0]);
    }

    public function deactivateTrainer()
    {   
        $id=$_POST['id'];
        echo $this->AjaxModel->deactivateTrainer($id);
    }
    
    public function activateTrainer()
    {   
        $id=$_POST['id'];
        echo $this->AjaxModel->activateTrainer($id);
    }
    
    public function saveTrainer()
    {
        $data=$_POST;
        $ins=$this->AjaxModel->updateTrainer($data);
        var_dump($ins);
        //echo $ins;
    }
    
    public function IUser(){
        $id=$this->session->id;
        $user=$this->CabinetModel->showUser($id);
        //var_dump($user);
        echo json_encode($user);
    }
    
    public function selectOrg()
    {
        echo $this->AjaxModel->selectOrg($_POST['city']);
    }
    
    public function addCompetition()
    {
        echo $this->AjaxModel->addCompetition($_POST);
    }
    
    public function updateCompetition()
    {
        
        echo $this->AjaxModel->updateCompetition($_POST);
    }
    
    public function showCompetitions()
    {
        echo $this->CabinetModel->htmlCompetitions($_POST['role']);
    }
    
    public function compInfo()
    {
        $res = $this->AjaxModel->compInfo($_POST['id']);
        echo json_encode($res);
    }
    
    public function addDancer()
    {
        $trainer_id=$this->AjaxModel->getTrainerId($this->session->id);
        echo $this->AjaxModel->addDancer($_POST,$trainer_id);
    }
    
    public function selectLigs()
    {
        echo $this->AjaxModel->selectLigs($_POST['way_id']);
    }
    
    public function showExp()
    {
        $exp = $this->CabinetModel->dancerExpHtml($_POST['id']);
        echo $exp['exp'];
    }
    
    public function saveExp()
    {
        echo $ins=$this->AjaxModel->saveExp($_POST);
    }
    
    public function addSummCats()
    {
        $ins= $this->AjaxModel->addSummCats($_POST);
        echo $ins;
        
    }
    
    public function getCompListTrainer()
    {
        $trainer_id = $this->AjaxModel->getTrainerId($this->session->id);
        $comp_id = $_POST['comp_id'];
        $list = $this->AjaxModel->getCompListHtml($comp_id, 'trainer', $trainer_id);
        echo $list;
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
        //$trainer_id = $this->AjaxModel->getTrainerId($this->session->id);
        $link=$this->AjaxModel->getCompListCsv(3,'trainer',1);
        //echo '<a href="'.base_url().$link.'">скачать</a>';
        //echo '<a href="/csv/1.csv">скачать</a>';
        
    }
      
}
