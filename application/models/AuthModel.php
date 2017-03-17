<?php
class AuthModel extends CI_Model{
	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
	}

	function getUsers()
	{
		$res=$this->db->get('users');
		$users=$res->result_array();
		return $users;
	}

	function addUser($data)
	{
		$this->db->insert('users', $data);
	}

	function login($email, $password)
	{
		$query=$this->db->query('select * from users where email=? and password=?',array($email,$password));
		if (count($query->result())>0){
			$user=array(
				'id'=>$query->result()[0]->id,
				'email'=>$query->result()[0]->email,
				'name'=>$query->result()[0]->first_name.' '.$query->result()[0]->last_name,
				'dancer'=>$query->result()[0]->dancer,
				'trainer'=>$query->result()[0]->trainer,
				'cluber'=>$query->result()[0]->cluber,
				'organizer'=>$query->result()[0]->organizer,
				'admin'=>$query->result()[0]->admin,
				);
			$this->session->set_userdata($user);
			return true;
		}
		else return false;
	}
        
    public function addorganizer($id, $city)
    {
        $this->db->insert('organizers', ['user_id' => $id, 'city_id' => $city]);
    }

    public function addcluber($id, $city, $title)
    {
        $this->db->insert('clubers', ['user_id' => $id, 'city_id' => $city, 'title' => $title]);
    }

    public function addTrainer($id, $club)
    {
        $this->db->insert('trainers', ['user_id' => $id, 'club_id' => $club]);
    }

    public function addDancer($id, $trainer, $birth, $belly)
    {
        $this->db->insert('dancers', ['user_id' => $id, 'trainer_id' => $trainer, 'birthdate' => $birth, 'bell_id' => $belly]);
    }
}