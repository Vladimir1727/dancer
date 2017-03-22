<?php
class AjaxModel extends CI_Model{
    function __construct(){
            parent::__construct();
            $this->load->database();
            $this->load->library('session');
    }

    function getUserInfo($id){
            $query = $this->db->query('select * from users where id='.$id);
            $users=$query->result_array();
            return $users[0];
    }

    function saveUser($user){
            /*$data= array(
                    'first_name' => $user['first_name'], 
                    'last_name' => $user['last_name'],
                    'father_name' => $user['father_name'],
                    'email' => $user['email'],
                    'password' => $user['password'],
                    'phone' => $user['phone'],
                    'dancer' => $user['dancer'],
                    'trainer' => $user['trainer'],
                    'cluber' => $user['cluber'],
                    'organizer' => $user['organizer'],
                    'admin' => $user['admin'],
                    'id' => $user['id'],
                    );
            $update='update users set 
            first_name=?,
            last_name=?,
            father_name=?,
            email=?,
            password=?,
            phone=?,
            dancer=?,
            trainer=?,
            cluber=?,
            organizer=?,
            admin=?
            where id=?
            ';
            return $this->db->query($update,$data);*/
        $this->db->where('id', $user['id']);
        return $this->db->update('users', $user);
    }

    public function filterUsers($filter)
    {
            $one=true;
            $select='select * from users where';
            if ($filter['filter_admin']>-1){
                    $select.=' admin='.$filter['filter_admin'];
                    $one=false;
            }
            if ($filter['filter_organizer']>-1){
                    $select.=($one==false) ? ' and':'';
                    $select.=' organizer='.$filter['filter_organizer'];
                    $one=false;
            }
            if ($filter['filter_cluber']>-1){
                    $select.=($one==false) ? ' and':'';
                    $select.=' cluber='.$filter['filter_cluber'];
                    $one=false;
            }
            if ($filter['filter_trainer']>-1){
                    $select.=($one==false) ? ' and':'';
                    $select.=' trainer='.$filter['filter_trainer'];
                    $one=false;
            }
            if ($filter['filter_dancer']>-1){
                    $select.=($one==false) ? ' and':'';
                    $select.=' dancer='.$filter['filter_dancer'];
                    $one=false;
            }

            if (strlen($filter['filter_text'])>0){
                    $txt=$filter['filter_text'];
                    $select.=($one==false) ? ' and':'';
                    $select.=" ( first_name LIKE '%".$txt."%'";
                    $select.=" or last_name LIKE '%".$txt."%'";
                    $select.=" or father_name LIKE '%".$txt."%'";
                    $select.=" or phone LIKE '%".$txt."%'";
                    $select.=" or email LIKE '%".$txt."%')";
                    $one=false;
            }
            $query=$this->db->query($select);
            $users=$query->result_array();
            return $users;
    }

    public function delRole($role)
    {
        $id=$this->session->id;
        $update='update users set '.$role.'=0 where id='.$id;
        $this->db->query($update);
        $id=$this->session->set_userdata($role,0);
        return 'deleted';
    }

    public function addRole($role)
    {
        $id=$this->session->id;
        $update='update users set '.$role.'=1 where id='.$id;
        $this->db->query($update);
        $id=$this->session->set_userdata($role,1);
        return 'added';
    }

    public function getRow($table, $id)
    {
        $q = $this->db->query('select * from '.$table.' where id='.$id);
        $res = $q->result_array();
        return $res[0];
    }

    public function update($table,$id,$data)
    {
        $this->db->where('id', $id);
        return $this->db->update($table, $data);
    }

    public function insert($table,$data)
    {
        return $this->db->insert($table, $data);
    }

    public function delete($table,$id)
    {
        $this->db->where('id', $id);
        return $this->db->update($table, array('deleted'=>1));
    }
    
    public function getStyles($way)
    {
        $q=$this->db->query('select * from styles where deleted=0 and way_id='.$way);
        return $q->result_array();
    }

    public function htmlStyles($way)
    {
        //return $way;
        $data=$this->getStyles($way);
        $html="";
        foreach ($data as $d) {
            $html.='<tr>';
            $html.='<td class="hidden">'.$d['id'].'</td>';
            $html.='<td>'.$d['style'].'</td>';
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
    
    public function getLigs($way)
    {
        $q=$this->db->query('select * from ligs where deleted=0 and way_id='.$way);
        return $q->result_array();
    }

    public function htmlLigs($way)
    {
        $data=$this->getLigs($way);
        $html="";
        foreach ($data as $d) {
            $html.='<tr>';
            $html.='<td class="hidden">'.$d['id'].'</td>';
            $html.='<td>'.$d['number'].'</td>';
            $html.='<td>'.$d['name'].'</td>';
            $html.='<td>'.$d['points'].'</td>';
            if ($d['days'] > 0){
                $html.='<td>'.$d['days'].'</td>';
            } 
            else {
                $html.='<td>нет</td>';
            }
            $html.='<td><button class="btn btn-warning btn-sm edit" id="e'.$d['id']
                    .'" data-toggle="modal" data-target="#editmodal">edit</button> ';
            $html.='<button class="btn btn-danger btn-sm del" id="d'.$d['id'].'">delete</button></td>';
            $html.='</tr>';
        }
        return $html;
    }
	
    public function htmlAgeLig($way)
    {
		$q=$this->db->query('select s.id, a.name as age, a.min_age, a.max_age, l.name as lig
		from ligs l, cat_age a, show_ligs s
		where s.lig_id=l.id and s.age_id=a.id and l.way_id='.$way.'
		order by s.age_id');
        $data = $q->result_array();
        $html="";
        foreach ($data as $d) {
            $html.='<tr>';
            $html.='<td class="hidden">'.$d['id'].'</td>';
            $html.='<td>'.$d['age'].' ('.$d['min_age'].'-'.$d['max_age'].' лет)</td>';
            $html.='<td>'.$d['lig'].'</td>';
            $html.='<td><button class="btn btn-danger btn-sm del" id="d'.$d['id'].'">delete</button></td>';
            $html.='</tr>';
        }
        return $html;
    }
	
    public function selectLigs($way)
    {
        $data=$this->getLigs($way);
        $html="";
        foreach ($data as $d) {
            $html.='<option value='.$d['id'].'>'.$d['name'].'</option>';
        }
        return $html;
    }
    
    public function getDancer($id) {
        $q=$this->db->query('select u.first_name, u.last_name, u.father_name, u.email, u.password,'
                . ' d.birthdate, u.dancer, u.phone, d.id, d.user_id, b.name as bell, d.bell_id'
                . ' from users u, dancers d, bellydance b'
                . ' where d.user_id=u.id and d.bell_id=b.id and d.id='.$id);
        $res=$q->result_array();
        $ytime = time() - strtotime($res[0]['birthdate']);
        $res[0]['year'] = ($ytime - $ytime % 31556926) / 31556926;
        return $res;
    }
    
    public function updateDancer($data)
    {
        $dancer=array();
        if (isset($data['birthdate'])){
            $dancer['birthdate'] = $data['birthdate'];
        }
        if (isset($data['bell_id'])){
            $dancer['bell_id'] = $data['bell_id'];
        }
        if (count($dancer)>0){
            $this->db->where('id', $data['id']);
            $this->db->update('dancers', $dancer);
        }
        $user=array(
            'last_name'=>$data['last_name'],
            'first_name'=>$data['first_name'],
            'father_name'=>$data['father_name'],
            'password'=>$data['password'],
            'email'=>$data['email'],
            'phone'=>$data['phone'],
        );
        if (isset($data['dancer'])){
            $user['dancer'] = $data['dancer'];
        }
        if (isset($data['user_id'])){
            $user_id=$data['user_id'];
        }else{
            $q=$this->db->query('select user_id from dancers where id='.$data['id']);
            $res=$q->result_array();
            $user_id=$res[0]['user_id'];
        }
        $this->db->where('id', $user_id);
        $this->db->update('users', $user);
        return true;
    }
    
    public function deactivateDancer($id)
    {
        $this->db->query('update users'
                . ' set dancer=3'
                . ' where id=(select user_id from dancers where id='.$id.')');
        return true;
    }
    
    public function activateDancer($id)
    {
        $this->db->query('update users'
                . ' set dancer=2'
                . ' where id=(select user_id from dancers where id='.$id.')');
        return true;
    }
    
    public function getTrainer($id) {
        $q=$this->db->query('select u.first_name, u.last_name, u.father_name, u.email, u.password,'
                . ' u.trainer, u.phone, t.id, t.user_id'
                . ' from users u, trainers t'
                . ' where t.user_id=u.id and t.id='.$id);
        $res=$q->result_array();
        return $res;
    }
    
    public function deactivateTrainer($id)
    {
        $this->db->query('update users'
                . ' set trainer=3'
                . ' where id=(select user_id from trainers where id='.$id.')');
        return true;
    }
    
    public function activateTrainer($id)
    {
        $this->db->query('update users'
                . ' set trainer=2'
                . ' where id=(select user_id from trainers where id='.$id.')');
        return true;
    }
    
    public function updateTrainer($data)
    {
        $user=array(
            'last_name'=>$data['last_name'],
            'first_name'=>$data['first_name'],
            'father_name'=>$data['father_name'],
            'password'=>$data['password'],
            'email'=>$data['email'],
            'phone'=>$data['phone'],
        );
        if (isset($data['trainer'])){
            $user['trainer'] = $data['trainer'];
        }
        if (isset($data['user_id'])){
            $user_id=$data['user_id'];
        }else{
            $q=$this->db->query('select user_id from dancers where id='.$data['id']);
            $res=$q->result_array();
            $user_id=$res[0]['user_id'];
        }
        $this->db->where('id', $user_id);
        $this->db->update('users', $user);
    }
    
    public function selectOrg($city_id)
    {
        $q = $this->db->query('select u.last_name, u.first_name, u.father_name, o.id'
                . ' from users u, organizers o'
                . ' where o.user_id=u.id and o.city_id='.$city_id);
        $res = $q->result_array();
        $select='<option value=0>Выберите организатора</option>';
        foreach ($res as $r){
            $select .= '<option value="'.$r['id'].'">';
            $select .= $r['last_name'].' '.$r['first_name'].' '.$r['father_name'];
            $select .= '</option>';
        }
        return $select;
    }
    
    public function statusId($status_name){
        $q = $this->db->query('select id from statuses where status="'.$status_name.'"');
        $res = $q->result();
        return $res[0]->id;
    }

    public function addCompetition($data)
    {
        $data['status_id']= $this->statusId("ON");
        return $this->db->insert('competitions', $data);
    }
    
    public function compInfo($id) {
        $q=$this->db->query('select co.name, co.comment, co.city_id, co.way_id, '
                . ' co.date_reg_open, co.date_reg_close, co.date_open, co.date_close, co.status_id, co.org_id,'
                . ' ci.city, ci.region_id, w.way, s.status, u.first_name, u.last_name, u.father_name, u.phone, u.email'
                . ' from competitions co, cities ci, ways w, statuses s, users u, organizers o'
                . ' where co.city_id=ci.id and co.status_id=s.id and co.way_id=w.id and co.org_id=o.id and o.user_id=u.id and co.id='.$id);
        $res=$q->result_array();
        return $res[0];
    }
    
    public function updateCompetition($data)
    {
        $this->db->where('id', $data['id']);
        return $this->db->update('competitions', $data);
    }
}