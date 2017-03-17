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
		$data= array(
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
		$this->db->cache_on();
		return $this->db->query($update,$data);
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
        
        public function delete($table,$id)
        {
            $this->db->where('id', $id);
            return $this->db->update($table, array('deleted'=>1));
        }
}