<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cabinet extends CI_Controller
{
    
    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('CabinetModel');
        $this->load->model('AjaxModel');
        $this->load->library('session');
        $this->load->library('pagination');    
    }

    public function index()
    {
        $this->load->view('main');
    }

    public function user()
    {
        $id=$this->session->id;
        $user=$this->CabinetModel->showUser($id);
        $this->load->view('user/index',['user'=>$user]);
    }

    public function dancer()
    {
        if ($this->session->dancer != 2) {
            $this->load->view('errors/error_access');
        }
        else {
            $dancer = $this->CabinetModel->is_dancer($this->session->id);
            if ($dancer) {
                $contact=$this->CabinetModel->dancerContact();
                $this->load->view('dancer/index',['contact'=>$contact]);
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

    public function adminagelig() {
        if ($this->session->admin != 2){
            $this->load->view('errors/error_access');
        }
        else {
                        $ages=$this->CabinetModel->selectAges();
            $ways=$this->CabinetModel->selectWays();
            $this->load->view('admin/ligage',['ways'=>$ways,'ages'=>$ages]);
        }
    }
    
    public function trainercontact() {
        if ($this->session->trainer != 2){
            $this->load->view('errors/error_access');
        }
        else {
            $contact=$this->CabinetModel->trainerContact();
            $this->load->view('trainer/contact',['contact'=>$contact]);
        }
    }
    
    public function trainerdancers($trainer_id = 0) {
        
        if ($this->session->trainer != 2){
            $this->load->view('errors/error_access');
        }
        else {
            $belly = $this->CabinetModel->bellyHtml();
            if ($trainer_id == 0){
                $trainer_id=$this->session->id;
                $dancers=$this->CabinetModel->htmlTrainerDancers($trainer_id);
                $this->load->view('trainer/dancers',['dancers'=>$dancers,'belly'=>$belly]);
            } else {
                $dancers=$this->CabinetModel->htmlTrainerDancers($trainer_id);
                $this->load->view('cluber/dancers',['dancers'=>$dancers,'belly'=>$belly]);
            }
        }
    }
    
    public function clubtrainers()
    {
        if ($this->session->cluber != 2){
            $this->load->view('errors/error_access');
        }
        else {
            //$belly = $this->CabinetModel->bellyHtml();
            $organiser_id=$this->session->id;
            $trainers=$this->CabinetModel->htmlCluberTrainers($organiser_id);
            $this->load->view('cluber/trainers',['trainers'=>$trainers]);
        }
    }
    
    public function clubcontact()
    {
        if ($this->session->trainer != 2){
            $this->load->view('errors/error_access');
        }
        else {
            $contact=$this->CabinetModel->cluberContact();
            $this->load->view('cluber/contact',['contact'=>$contact]);
        }
    }
    
    public function admincompetitions(){
        if ($this->session->admin != 2){
            $this->load->view('errors/error_access');
        }
        else {
            $statuses = $this->CabinetModel->selectStatuses();
            $regions = $this->CabinetModel->regions_html();
            $ways=$this->CabinetModel->selectWays();
            $competitions=$this->CabinetModel->htmlCompetitions('admin');
            $data=array(
                'regions'=>$regions,
                'ways'=>$ways,
                'competitions'=>$competitions,
                'statuses'=>$statuses,
            );
            $this->load->view('admin/competitions',$data);
        }
    }
    
    public function trainercompetitions(){
        if ($this->session->trainer != 2){
            $this->load->view('errors/error_access');
        }
        else {
            $statuses = $this->CabinetModel->selectStatuses();
            $regions = $this->CabinetModel->regions_html();
            $ways=$this->CabinetModel->selectWays();
            $competitions=$this->CabinetModel->htmlCompetitions('trainer');
            $data=array(
                'regions'=>$regions,
                'ways'=>$ways,
                'competitions'=>$competitions,
                'statuses'=>$statuses,
            );
            $this->load->view('trainer/competitions',$data);
        }
    }
    
    public function traineraddtocomp($id){
        if ($this->session->trainer != 2){
            $this->load->view('errors/error_access');
        }
        else {
            $trainer_id = $this->AjaxModel->getTrainerId($this->session->id);
            $comp_list=$this->AjaxModel->getCompListHtml($id, 'trainer', $trainer_id);
            $dancers = $this->CabinetModel->allDancersToComp('trainer');
            $data=array(
                'dancers'=>$dancers,
                'comp_id'=>$id,
                'comp_list'=>$comp_list
            );
            $this->load->view('trainer/adddancerstocomp',$data);
        }
    }
    
    public function compreglist()
    {
        $list = $this->CabinetModel->getCatList($_POST);
        $dancers = $this->CabinetModel->getDancersList($_POST['dancer']);
        $data=array(
            'list'=>$list,
            'comp_id'=>$_POST['comp_id'],
            'dancers'=>$dancers,
        );
        $this->load->view('trainer/select_summ_cat',$data);
    }

    public function experience($id)
    {
        if ($this->session->trainer == 2 || $this->session->cluber == 2){
            $exp = $this->CabinetModel->dancerExpHtml($id);
            $this->load->view('trainer/experience',$exp);
        }
        else {
            $this->load->view('errors/error_access');
        }
    }
    
    public function admincompetition($id){
        if ($this->session->admin != 2){
            $this->load->view('errors/error_access');
        }
        else {
            $comp_list=$this->AjaxModel->getCompListHtml($id, 'admin');
            $data=array(
                'comp_id'=>$id,
                'comp_list'=>$comp_list
            );
            $this->load->view('admin/competition',$data);
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
