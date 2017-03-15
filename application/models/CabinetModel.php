<?php
class CabinetModel extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
	}

	function getUsers($next){
		$query = $this->db->query('select * from users LIMIT '.$next.',20');
		$users=$query->result_array();
		return $users;
	}

	public function paginate($table,$path='')
	{

		$q = $this->db->query('select count(id) as count from '.$table);
		$count=$q->result()[0]->count;
		$config['base_url'] = base_url().$path;
		$config['total_rows'] = $count;
		$config['per_page'] = 20;
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';
		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';
		$config['cur_tag_open'] = '<li  class="active"><a>';
		$config['cur_tag_close'] = '</a></li>';
		return $config;
	}

	public function is_organizer($id)
	{
		$q=$this->db->query('select id from organizers');
		if ($q->result()){
			return true;
		}
		else{
			return false;
		}
	}

    public function is_cluber($id)
    {
        $q = $this->db->query('select id from clubers');
        if ($q->result()) {
            return true;
        }
        else {
            return false;
        }
    }

    public function is_trainer($id)
    {
        $q = $this->db->query('select id from trainers');
        if ($q->result()) {
            return true;
        }
        else {
            return false;
        }
    }

    public function is_dancer($id)
    {
        $q = $this->db->query('select id from dancers');
        if ($q->result()) {
            return true;
        }
        else {
            return false;
        }
    }


	public function get_regions()
	{
		$q=$this->db->query('select * from regions');
		return $q->result_array();
	}

	public function regions_html()
	{
		$regions=$this->get_regions();
		$html="";
		foreach ($regions as $region) {
			$html.='<option value="'.$region['id'].'">'.$region['region'].'</option>';
		}
		return $html;
	}

	public function getCities($region)
	{
		$q=$this->db->query('select id,city from cities where region_id='.$region);
		return $q->result_array();
	}

	public function citiesHtml($region)
	{
		$cities=$this->getCities($region);
		$html='<option value="0">выберите город...</option>';
		foreach ($cities as $city) {
			$html.='<option value="'.$city['id'].'">'.$city['city'].'</option>';
		}
		return $html;
	}	

	public function getClubes($city)
	{
		$q=$this->db->query('select id,title from clubers where city_id='.$city);
		return $q->result_array();
	}

	public function clubesHtml($city)
	{
		$clubes=$this->getClubes($city);
		$html='<option value="0">выберите клуб...</option>';
		foreach ($clubes as $club) {
			$html.='<option value="'.$club['id'].'">'.$club['title'].'</option>';
		}
		return $html;
	}

    public function getBelly()
    {
        $q=$this->db->query('select * from bellydance');
        return $q->result_array();
	}

    public function bellyHtml()
    {
        $belly=$this->getBelly();
        $html="";
        foreach ($belly as $b) {
            $html.='<option value="'.$b['id'].'">'.$b['name'].'</option>';
        }
        return $html;
    }

    public function getTrainers($club)
	{
		$q=$this->db->query('select t.id,u.last_name,u.first_name,u.father_name 
			from trainers t, users u
			where t.user_id=u.id and club_id='.$club);
		return $q->result_array();
	}

	public function trainersHtml($club)
	{
		$trainers=$this->getTrainers($club);
		$html='<option value="0">выберите тренера...</option>';
		foreach ($trainers as $trainer) {
			$name=$trainer['last_name'].' '.$trainer['first_name'].' '.$trainer['father_name'];
			$html.='<option value="'.$trainer['id'].'">'.$name.'</option>';
		}
		return $html;
	}
}