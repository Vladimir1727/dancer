<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Auth extends CI_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('AuthModel');
		$this->load->library('session');
	}

	public function index()
	{
		echo "index login";
	}
        
    public function login(){
        $this->load->view('header');
    	$this->load->view('auth/logform');
        $this->load->view('footer');
    }
        
    public function registration(){
        $this->load->view('header');
        $this->load->view('auth/regform');
        $this->load->view('footer');
    }

    public function adduser()
    {
    	$trainer=(isset($_POST['trainer'])) ? 1:0;
    	$dancer=(isset($_POST['dancer'])) ? 1:0;
    	$cluber=(isset($_POST['cluber'])) ? 1:0;
    	$organizer=(isset($_POST['organizer'])) ? 1:0;
    	$data=array(
			'first_name'=>$_POST['first_name'],
			'last_name'=>$_POST['last_name'],
			'father_name'=>$_POST['father_name'],
			'email'=>$_POST['email'],
			'phone'=>$_POST['phone'],
			'password'=>$_POST['pass1'],
			'trainer'=>$trainer,
			'dancer'=>$dancer,
			'organizer'=>$organizer,
			'cluber'=>$cluber,
		);
    	$this->AuthModel->addUser($data);
    	$this->load->view('header');
    	$user=array('email'=>$_POST['email'],'password'=>$_POST['pass1']);
        $this->load->view('auth/logform',$user);
        $this->load->view('footer');
    }

    public function enter(){
    	$user=$this->AuthModel->login($_POST['email'],$_POST['pass']);
    	if ($user==true){
    		$this->load->view('main');
        }
    	else{
    		$error="Неправильный логин/пароль";
    		$this->load->view('header');
    		$this->load->view('auth/logform',['error'=>$error,'email'=>$_POST['email']]);
        	$this->load->view('footer');
    	}
    }

    public function logout()
    {
    	$this->session->unset_userdata(['email','name','dancer','trainer','cluber','organizer','admin']);
    	$this->load->view('header');
    	$this->load->view('auth/logform');
        $this->load->view('footer');
    }

    public function addorganizer()
    {
        $this->AuthModel->addorganizer($this->session->id,$_POST['city']);
        redirect('/cabinet/organizer');
    }

    public function addcluber()
    {
        $this->AuthModel->addcluber($this->session->id, $_POST['city'], $_POST['name']);
        redirect('/cabinet/cluber');
    }

    public function addTrainer()
    {
        $this->AuthModel->addTrainer($this->session->id, $_POST['club']);
        redirect('/cabinet/trainer');
    }

    public function addDancer()
    {
        $this->AuthModel->addDancer($this->session->id, $_POST['trainer'] ,$_POST['birth'], $_POST['belly']);
        redirect('/cabinet/dancer');
    }
}
