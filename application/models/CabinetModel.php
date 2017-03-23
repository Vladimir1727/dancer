<?php
class CabinetModel extends CI_Model{
	function __construct(){
		parent::__construct();
		$this->load->database();
		$this->load->library('session');
	}

	public function getUsers($next){
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
		$q=$this->db->query('select id from organizers where user_id='.$id);
		if ($q->result()){
			return true;
		}
		else{
			return false;
		}
	}

    public function is_cluber($id)
    {
        $q = $this->db->query('select id from clubers where user_id='.$id);
        if ($q->result()) {
            return true;
        }
        else {
            return false;
        }
    }

    public function is_trainer($id)
    {
        $q = $this->db->query('select id from trainers where user_id='.$id);
        if ($q->result()) {
            return true;
        }
        else {
            return false;
        }
    }

    public function is_dancer($id)
    {
        $q = $this->db->query('select id from dancers where user_id='.$id);
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
        $html='';
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
    
    public function getWays()
    {
        $q=$this->db->query('select * from ways where deleted=0');
        return $q->result_array();
    }

    public function htmlWays()
    {
        $data=$this->getways();
        $html="";
        foreach ($data as $d) {
            $html.='<tr>';
            $html.='<td class="hidden">'.$d['id'].'</td>';
            $html.='<td>'.$d['way'].'</td>';
            $html.='<td><button class="btn btn-warning btn-sm edit" id="e'.$d['id']
                    .'" data-toggle="modal" data-target="#editmodal">edit</button> ';
            $html.='<button class="btn btn-danger btn-sm del" id="d'.$d['id'].'">delete</button></td>';
            $html.='</tr>';
        }
        return $html;
    }
    
    public function selectWays()
    {
        $data=$this->getways();
        $html='<option value="0">Выберите направление</option>';
        foreach ($data as $d) {
            $html.='<option value="'.$d['id'].'">';
            $html.=$d['way'].'</option>';
        }
        return $html;
    }
    
    public function getCounts()
    {
        $q=$this->db->query('select * from cat_count where deleted=0');
        return $q->result_array();
    }

    public function htmlCounts()
    {
        $data=$this->getCounts();
        $html="";
        foreach ($data as $d) {
            $html.='<tr>';
            $html.='<td class="hidden">'.$d['id'].'</td>';
            $html.='<td>'.$d['name'].'</td>';
            $html.='<td>'.$d['min_count'].'</td>';
            $html.='<td>'.$d['max_count'].'</td>';
            $html.='<td><button class="btn btn-warning btn-sm edit" id="e'.$d['id']
                    .'" data-toggle="modal" data-target="#editmodal">edit</button> ';
            $html.='<button class="btn btn-danger btn-sm del" id="d'.$d['id'].'">delete</button></td>';
            $html.='</tr>';
        }
        return $html;
    }
    
    public function getAges()
    {
        $q=$this->db->query('select * from cat_age where deleted=0');
        return $q->result_array();
    }

    public function htmlAges()
    {
        $data=$this->getAges();
        $html="";
        foreach ($data as $d) {
            $html.='<tr>';
            $html.='<td class="hidden">'.$d['id'].'</td>';
            $html.='<td>'.$d['name'].'</td>';
            $html.='<td>'.$d['min_age'].'</td>';
            $html.='<td>'.$d['max_age'].'</td>';
            switch ($d['dancers_count']) {
            case 0:
                $html.='<td>все</td>';
                break;
            case 1:
                $html.='<td>соло</td>';
                break;
            case 2:
                $html.='<td>два и более</td>';
                break;
            }
            $html.='<td><button class="btn btn-warning btn-sm edit" id="e'.$d['id']
                    .'" data-toggle="modal" data-target="#editmodal">edit</button> ';
            $html.='<button class="btn btn-danger btn-sm del" id="d'.$d['id'].'">delete</button></td>';
            $html.='</tr>';
        }
        return $html;
    }
	
    public function selectAges()
    {
        $data=$this->getAges();
        $html="";
        foreach ($data as $d) {
            $html.='<option value='.$d['id'].'>'.$d['name'].'</option>';
        }
        return $html;
    }
    
    public function trainerContact()
    {
        $q=$this->db->query('select u.first_name, u.last_name, u.father_name, u.email, u.phone '
                . 'from users u, trainers t '
                . 'where u.id=t.user_id and t.user_id='.$this->session->id);
        $t=$q->result_array();
        $q=$this->db->query('select u.first_name, u.last_name, u.father_name, u.email, u.phone, c.title'
                . ' from users u, trainers t , clubers c'
                . ' where u.id=c.user_id and t.club_id=c.id and t.user_id='.$this->session->id);
        $c=$q->result_array();
        $data=array(
            'trainer_name'=>$t[0]['last_name'].' '.$t[0]['first_name'].' '.$t[0]['father_name'],
            'trainer_email'=>$t[0]['email'],
            'trainer_phone'=>$t[0]['phone'],
            'club_name'=>$c[0]['last_name'].' '.$c[0]['first_name'].' '.$c[0]['father_name'],
            'club_email'=>$c[0]['email'],
            'club_phone'=>$c[0]['phone'],
            'club_title'=>$c[0]['title'],
        );
        return $data;
    }
    
    public function htmlTrainerDancers($trainer_id) {
        $q = $this->db->query('select u.first_name, u.last_name, u.phone, u.email, u.dancer,'
                . ' d.id, d.birthdate'
                . ' from users u, dancers d'
                . ' where u.id=d.user_id and d.trainer_id='
                . '(select id from trainers where user_id='.$trainer_id.')');
        $html='';
        foreach ($q->result() as $r)
        {
            $html .= '<tr>';
            $html .= '<td class="hidden">'.$r->id.'</td>';
            $html .= '<td>'.$r->last_name.' '.$r->first_name.'</td>';
            $birth =  strtotime($r->birthdate);
            $ytime = time() - $birth;
            $year = ($ytime - $ytime % 31556926) / 31556926;
            $html .= '<td>'.$year.'</td>';
            if ($r->dancer == 0) $html .= '<td> нет </td>';
            if ($r->dancer == 1) $html .= '<td> запрошен </td>';
            if ($r->dancer == 2) $html .= '<td> активный </td>';
            if ($r->dancer == 3) $html .= '<td> заблокирован </td>';
            $html .= '<td>'.$r->email.' '.$r->phone.'</td>';
            $html.='<td><button class="btn btn-info btn-sm info" id="i'.$r->id
                    .'" data-toggle="modal" data-target="#infomodal">info</button> ';
            $html.='<button class="btn btn-warning btn-sm edit" id="e'.$r->id
                    .'" data-toggle="modal" data-target="#editmodal">edit</button> ';
            if ($r->dancer != 2 ){
                $html.='<button class="btn btn-success btn-sm activate" id="a'.
                        $r->id.'">activate</button></td>';
            }
            if ($r->dancer == 1 ||  $r->dancer == 2){
                $html.='<button class="btn btn-danger btn-sm deactivate" id="d'.
                        $r->id.'">delactivate</button></td>';
            }
            $html .= '</tr>';
        }
        return $html;
    }
    
    public function dancerContact()
    {
        $q=$this->db->query('select u.first_name, u.last_name, u.father_name, u.email, u.phone '
                . 'from users u, trainers t '
                . 'where u.id=t.user_id and t.user_id='.$this->session->id);
        $t=$q->result_array();
        $q=$this->db->query('select u.first_name, u.last_name, u.father_name, u.email, u.phone, c.title'
                . ' from users u, trainers t , clubers c'
                . ' where u.id=c.user_id and t.club_id=c.id and t.user_id='.$this->session->id);
        $c=$q->result_array();
        $q=$this->db->query('select u.first_name, u.last_name, u.father_name, u.email, u.phone, '
                . 'd.birthdate, d.id'
                . ' from users u, dancers d'
                . ' where u.id=d.user_id and d.user_id='.$this->session->id);
        $d=$q->result_array();
        $data=array(
            'trainer_name'=>$t[0]['last_name'].' '.$t[0]['first_name'].' '.$t[0]['father_name'],
            'trainer_email'=>$t[0]['email'],
            'trainer_phone'=>$t[0]['phone'],
            'club_name'=>$c[0]['last_name'].' '.$c[0]['first_name'].' '.$c[0]['father_name'],
            'club_email'=>$c[0]['email'],
            'club_phone'=>$c[0]['phone'],
            'club_title'=>$c[0]['title'],
            'dancer_id'=>$d[0]['id'],
            'dancer_name'=>$d[0]['last_name'].' '.$c[0]['first_name'].' '.$c[0]['father_name'],
            'dancer_email'=>$d[0]['email'],
            'dancer_phone'=>$d[0]['phone'],
            'dancer_birthdate'=>$d[0]['birthdate'],
        );
        return $data;
    }

    public function htmlCluberTrainers($cluber_id) {
        $q = $this->db->query('select u.first_name, u.last_name, u.father_name, u.phone, u.email, u.trainer, t.id'
                . ' from users u, trainers t'
                . ' where u.id=t.user_id and t.club_id='
                . '(select id from clubers where user_id='.$cluber_id.')');
        $html='';
        foreach ($q->result() as $r)
        {
            $html .= '<tr>';
            $html .= '<td class="hidden">'.$r->id.'</td>';
            $html .= '<td>'.$r->last_name.' '.$r->first_name.' '.$r->father_name.'</td>';
            if ($r->trainer == 0) $html .= '<td> нет_ </td>';
            if ($r->trainer == 1) $html .= '<td> запрошен </td>';
            if ($r->trainer == 2) $html .= '<td> активный </td>';
            if ($r->trainer == 3) $html .= '<td> заблокирован </td>';
            $html .= '<td>'.$r->email.' '.$r->phone.'</td>';
            $html.='<td><button class="btn btn-info btn-sm info" id="i'.$r->id
                    .'" data-toggle="modal" data-target="#infomodal">info</button> ';
            $html.='<button class="btn btn-warning btn-sm edit" id="e'.$r->id
                    .'" data-toggle="modal" data-target="#editmodal">edit</button> ';
            if ($r->trainer != 2 ){
                $html.='<button class="btn btn-success btn-sm activate" id="a'.
                        $r->id.'">activate</button>';
            }
            if ($r->trainer == 1 ||  $r->trainer == 2){
                $html.='<button class="btn btn-danger btn-sm deactivate" id="d'.
                        $r->id.'">delactivate</button>';
            }
            $html.=' <a href="../cabinet/trainerdancers/'.$this->user('trainer',$r->id).'" class="btn btn-default btn-sm dancers" id="t'.$r->id.'">танцоры</a></td>';
            $html .= '</tr>';
        }
        return $html;
    }
    
    public function user($role, $role_id){
        switch ($role){
            case 'dancer':
                $table='dancers';
                break;
            case 'trainer':
                $table='trainers';
                break;
            case 'cluber':
                $table='clubers';
                break;
            case 'organizer':
                $table='organizers';
                break;
        }
        $q=$this->db->query('select user_id from '.$table.' where id='.$role_id);
        $res=$q->result_array();
        return $res[0]['user_id'];
    }
    
    public function cluberContact()
    {
        $q=$this->db->query('select u.first_name, u.last_name, u.father_name, u.email, u.phone, c.title'
                . ' from users u, clubers c'
                . ' where u.id=c.user_id and c.user_id='.$this->session->id);
        $c=$q->result_array();
        $data=array(
            'club_name'=>$c[0]['last_name'].' '.$c[0]['first_name'].' '.$c[0]['father_name'],
            'club_email'=>$c[0]['email'],
            'club_phone'=>$c[0]['phone'],
            'club_title'=>$c[0]['title'],
        );
        return $data;
    }
    
    public function showUser($id){
        $q=$this->db->query('select first_name, last_name, father_name, email, password, phone, id'
                . ' from users'
                . ' where id='.$id);
        $res=$q->result();
        return $res[0];
    }
    
    public function htmlCompetitions($role) 
    {
        $q = $this->db->query('select c.name, c.id, ci.city,'
                . ' c.date_reg_open, c.date_reg_close, c.date_open, c.date_close, s.status'
                . ' from competitions c, statuses s, cities ci'
                . ' where c.city_id=ci.id and c.status_id=s.id');
        $html='';
        foreach ($q->result() as $r)
        {
            $html .= '<tr>';
            $html .= '<td class="hidden">'.$r->id.'</td>';
            $html .= '<td>'.$r->name.'</td>';
            $html .= '<td>'.$r->city.'</td>';
            $html .= '<td>с '.$r->date_reg_open.' по '.$r->date_reg_close.'</td>';
            $html .= '<td>с '.$r->date_open.' по '.$r->date_close.'</td>';
            $html .= '<td>'.$r->status.'</td>';
            $html.='<td><button class="btn btn-info btn-sm info" id="i'.$r->id
                    .'" data-toggle="modal" data-target="#infomodal">info</button> ';
            
            if ($role=="admin"){
            $html.='<button class="btn btn-warning btn-sm edit" id="e'.$r->id
                    .'" data-toggle="modal" data-target="#editmodal">edit</button> ';    
                $html.=' <a href="../cabinet/competition/'.$r->id.'" class="btn btn-default btn-sm comp" id="c'.$r->id.'">управление</a>';
            }
            if ($role=="trainer"){
                $html.=' <a href="../cabinet/traineraddtocomp/'.$r->id.'" class="btn btn-success btn-sm comp" id="c'.$r->id.'">регистрация участников</a>';
            }
            
            $html .= '</td></tr>';
        }
        return $html;
    }
    
    public function selectStatuses()
    {
        $q = $this->db->query('select * from statuses');
        $html='';
        $row = $q->result_array();
        foreach ($row as $r){
            $html .= '<option value="'.$r['id'].'">'.$r['status'].'</option>';
        }
        return $html;
    }
    
    public function allDancersToComp($role)
    {
        if ($role == 'trainer'){
            $select='select u.last_name, u.first_name, d.birthdate, d.id'
                    . ' from users u, dancers d'
                    . ' where d.user_id=u.id and trainer_id=(select id from trainers where user_id='.$this->session->id.')';
        }
        $q = $this->db->query($select);
        $row = $q->result_array();
        $html='';
        foreach ($row as $r){
            
            $html .= '<tr>';
            $html .='<td><input type="checkbox" name="dancer[]" value='.$r['id'].'>'
                    .$r['last_name'].' '.$r['first_name'].'</td>';
            $html .= '</tr>';
        }
        return $html;
    }
    
    public function getCatList($data)
    {
        $dancers = $data['dancer'];
        $comp_id = $data['comp_id'];
        //находим количесвов группе
        $d_count=count($dancers);
        //получаем массив возрастов
        $ages = array();
        $q = $this->db->query('select birthdate from dancers where id in ('.implode(',', $dancers).')');
        $res = $q->result_array();
        foreach ($res as $r){
            $birth =  strtotime($r['birthdate']);
            $ytime = time() - $birth;
            $ages[] = ($ytime - $ytime % 31556926) / 31556926;
        }
        //получаем массив стилей
        $s_count = ($d_count > 1) ? 2: 1;
        $q = $this->db->query('select id, style from styles'
                . ' where dancers_count in(0,'.$s_count.')'
                . ' and way_id=(select way_id from competitions where id='.$comp_id.') and deleted=0');
        $styles = $q->result_array();
        //получаем массив возрастных групп(категорий)
        $q = $this->db->query('select id, name, min_age, max_age'
                . ' from cat_age'
                . ' where dancers_count in (0,'.$comp_id.') and deleted=0');
        $res = $q->result_array();
        $age_cat = array();
        foreach ($res as $r){
            $f = TRUE;
            foreach($ages as $age){
                if ($age > $r['max_age'] || $age+5 < $r['min_age']){
                    $f = FALSE;
                }
            }
            if ($f) $age_cat[] = $r;
        }
        //получаем массив категорий по количеству
        $q = $this->db->query('select id, name from cat_count'
                . ' where min_count>='.$d_count.' and max_count<='.$d_count.' and deleted=0');
        $count_cat = $q->result_array();
        //получаем список лиг
        if ($d_count > 1){
            $q = $this->db->query('select id, name from ligs'
                    . ' where name in ("Дебют","Открытая лига")'
                    . ' and way_id=(select way_id from competitions where id='.$comp_id.') and deleted=0');
            $ligs = $q->result_array();
        }
        else {//соло
            $ages_str='';
            $i=FALSE;
            foreach($age_cat as $age){
                $ages_str.= ($i) ? ',':'';
                $i=TRUE;
                $ages_str.= $age['id'];
            }
            $q = $this->db->query('select DISTINCT l.id, l.name'
                    . ' from ligs l, show_ligs s'
                    . ' where s.lig_id=l.id and s.age_id in ('.$ages_str.')'
                    . ' and l.way_id=(select way_id from competitions where id='.$comp_id.') and deleted=0');
            $ligs = $q->result_array();
            $q = $this->db->query('select l.id, l.name, l.number'
                    . ' from ligs l, dancers d, experience e'
                    . ' where l.deleted=0 and l.id in (select lig_id from experience'
                    . ' where dancer_id='.$dancers[0].')'
                    . ' and l.way_id=(select way_id from competitions where id='.$comp_id.')'
                    . ' and e.lig_id=l.id and e.dancer_id=d.id');
            $dan_lig= $q->result_array();
            if (count($dan_lig) == 0){
                $q= $this->db->query('select id, name, number from ligs'
                    . ' where number=1 and way_id=(select way_id from competitions where id='.$comp_id.')');
                $dan_lig = $q->result_array();
                }
            if ($dan_lig[0]['name']!='Профессионалы'){
                $q = $this->db->query('select id, name, number from ligs'
                    . ' where number='.($dan_lig[0]['number']+1).' and way_id=(select way_id from competitions where id='.$comp_id.')');
                $res = $q->result_array();
                $dan_lig[1]=$res[0];
            }
        }
        //генерируем суммарные категории
        $html='';
        $i=1;
        foreach ($styles as $style){
            foreach ($age_cat as $age){
                foreach ($count_cat as $count){
                    foreach ($ligs as $dl){
                        $html.=$i++.' '.$style['style'].' '.$age['name'].' '.$count['name'].' '.$dl['name'].'<br>';
                    }
                }
            }
        }
        
        return $html;
    }
}