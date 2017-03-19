<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cabinet extends CI_Controller
{
    
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('CabinetModel');
        $this->load->library('session');
        $this->load->library('pagination');    
    }

    public function index()
    {
        $this->load->view('main');
    }

    public function user()
    {
        $this->load->view('user/index');
    }

    public function dancer()
    {
        if ($this->session->dancer != 2) {
            $this->load->view('errors/error_access');
        }
        else {
            $dancer = $this->CabinetModel->is_dancer($this->session->id);
            if ($dancer) {
                $this->load->view('dancer/index');
            }
            else {
                $regions = $this->CabinetModel->regions_html();
                $belly = $this->CabinetModel->bellyHtml();
                $this->load->view('dancer/regform',['regions' => $regions,'belly' => $belly]);
            }
        }
    }
    
    public function trainer()
    {
        if ($this->session->trainer != 2) {
            $this->load->view('errors/error_access');
        }
        else {
            $trainer = $this->CabinetModel->is_trainer($this->session->id);
            if ($trainer) {
                $this->load->view('trainer/index');
            }
            else {
                $regions = $this->CabinetModel->regions_html();
                $this->load->view('trainer/regform',['regions' => $regions]);
            }
        }
    }

    public function cluber()
    {
        if ($this->session->cluber != 2) {
            $this->load->view('errors/error_access');
        }
        else {
            $cluber = $this->CabinetModel->is_cluber($this->session->id);
            if ($cluber) {
                $this->load->view('cluber/index');
            }
            else {
                $regions = $this->CabinetModel->regions_html();
                $this->load->view('cluber/regform',['regions' => $regions]);
            }
        }
    }

    public function organizer()
    {
        if ($this->session->organizer != 2) {
            $this->load->view('errors/error_access');
        }
        else {
            $org = $this->CabinetModel->is_organizer($this->session->id);
            if ($org) {
                $this->load->view('organizer/index');
            }
            else {
                $regions = $this->CabinetModel->regions_html();
                $this->load->view('organizer/regform',['regions'=>$regions]);
            }
        }
    }

   public function admin()
    {
        if ($this->session->admin != 2) $this->load->view('errors/error_access');
        else {
            $this->load->view('admin/index');
        }
    }

    public function adminUsers($id = 0)
    {
        if ($this->session->admin != 2){
            $this->load->view('errors/error_access');
        }
        else {
            $config = $this->CabinetModel->paginate('users','index.php/cabinet/adminusers');
            $users = $this->CabinetModel->getUsers($id);
            $this->pagination->initialize($config);
            $this->load->view('admin/users',['users' => $users]);
        }
    }

    public function adminways() {
        if ($this->session->admin != 2){
            $this->load->view('errors/error_access');
        }
        else {
            $ways=$this->CabinetModel->htmlWays();
            $this->load->view('admin/ways',['ways' => $ways]);
        }
    }
    
    public function adminstyles() {
        if ($this->session->admin != 2){
            $this->load->view('errors/error_access');
        }
        else {
            $ways=$this->CabinetModel->selectWays();
            $this->load->view('admin/styles',['ways' => $ways]);
        }
    }
    
    public function admincounts() {
        if ($this->session->admin != 2){
            $this->load->view('errors/error_access');
        }
        else {
            $counts=$this->CabinetModel->HtmlCounts();
            $this->load->view('admin/counts',['counts' => $counts]);
        }
    }
    
    public function adminligs() {
        if ($this->session->admin != 2){
            $this->load->view('errors/error_access');
        }
        else {
            $ways=$this->CabinetModel->selectWays();
            $this->load->view('admin/ligs',['ways' => $ways]);
        }
    }
    
    public function adminages() {
        if ($this->session->admin != 2){
            $this->load->view('errors/error_access');
        }
        else {
            $ages=$this->CabinetModel->htmlAges();
            $this->load->view('admin/ages',['ages' => $ages]);
        }
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
    }
}
