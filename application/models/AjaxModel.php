<?php
class AjaxModel extends CI_Model{
    function __construct(){
            parent::__construct();
            $this->load->database();
            $this->load->library('session');
            $this->load->helper('file');
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
    
    public function getTrainerId($user_id) {
        $q = $this->db->query('select id from trainers where user_id='.$user_id);
        if ($res = $q->result_array()) {
            return $res[0]['id'];
        }
        else {
            return false;
        }
    }
    
    public function getClubId($user_id) {
        $q = $this->db->query('select id from clubers where user_id='.$user_id);
        if ($res = $q->result_array()) {
            return $res[0]['id'];
        }
        else {
            return false;
        }
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
                . ' co.pay_iude, pay_other, pay_not,'
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
    
    public function addDancer($data, $trainer_id)
    {
        $user = array(
            'first_name'=>$data['first_name'],
            'last_name'=>$data['last_name'],
            'father_name'=>$data['father_name'],
            'phone'=>$data['phone'],
            'email'=>$data['email'],
            'password'=>$data['password'],
            'first_name'=>$data['first_name'],
            'dancer'=>2,
            );
         $this->db->insert('users', $user);
        $user_id = $this->db->insert_id();
        $dancer = array(
            'user_id'=>$user_id,
            'birthdate'=>$data['birthdate'],
            'bell_id'=>$data['bell_id'],
            'trainer_id'=>$trainer_id,
        );
        $this->db->insert('dancers', $dancer);
        return "OK";
    }
    
    public function saveExp($data)
    {
        $data['create_at'] = date('Y-m-d',time());
        return $this->db->insert('experience', $data);
    }
    
    public function addSummCats($data)
    {
        $dancers=$data['dancers'];
        $cats=$data['cats'];
        $comp_id=$data['competition'][0]['value'];
        
        foreach ($cats as $cat){
            $q = $this->db->query('select MAX(part) as max_part from comp_list');
            $res = $q->result();
            $prev_part = $res[0]->max_part;
            if (is_null($prev_part)){
                $next_part = 1;
            }else{
                $next_part = $prev_part + 1;
            }
            foreach ($dancers as $dancer){
                $ins=array(
                    'dancer_id'=>$dancer['value'],
                    'lig_id'=>$cat['lig_id'],
                    'style_id'=>$cat['style_id'],
                    'age_id'=>$cat['age_id'],
                    'count_id'=>$cat['count_id'],
                    'comp_id'=>$comp_id,
                    'part'=>$next_part
                        );
                $this->db->insert('comp_list',$ins);
            }
        }
        
        $q = $this->db->query('select count_id, lig_id'
                . ' from pays'
                . ' where comp_id='.$comp_id);
        $pay_list = $q->result_array();
        $insert=array();
        foreach ($cats as $c){
            $find = FALSE;
            foreach ($pay_list as $p){
                if ($c['count_id'] == $p['count_id'] && $c['lig_id'] == $p['lig_id']){
                    $find = TRUE;
                }
            }
            if ($find == FALSE){
                $insert[]=[
                    'count_id'=>$c['count_id'],
                    'lig_id'=>$c['lig_id'],
                    'comp_id'=>$comp_id
                        ];
            }
        }
        if (count($insert) > 0) $q= $this->db->insert_batch('pays',$insert);
        return true;
    }
    
    public function getCompListHtml($comp_id, $role, $role_id = 0)
    {
        $rows = $this->getCompList($comp_id, $role, $role_id);
        $html='';
        foreach ($rows as $row){
            $html.='<tr>';
            $html.='<td>'.$row['last_name'].' '.$row['first_name'].'</td>';
            $html.='<td>'.$row['style'].' '.$row['age_cat'].' '.$row['count_cat'].' '.$row['lig'].'</td>';
            if ($row['type']==1) $html.='<td>'.$row['pay_iude'].'</td>';
            if ($row['type']==2) $html.='<td>'.$row['pay_other'].'</td>';
            if ($row['type']==3) $html.='<td>'.$row['pay_not'].'</td>';
            $html.='</tr>';
        }
        return $html;
    }
    
    public function getCompList($comp_id, $role, $role_id)
    {
        switch ($role){
            case 'trainer':
                $q = $this->db->query('select u.first_name, u.last_name,'
                        . ' b.type, p.pay_iude, p.pay_other, p.pay_not,'
                        . ' l.name as lig, s.style, cc.name as count_cat, ca.name as age_cat'
                        . ' from ligs l, styles s, cat_count cc, cat_age ca, users u, dancers d,'
                        . ' comp_list cl, bellydance b, pays p'
                        . ' where cl.dancer_id=d.id and cl.lig_id=l.id and cl.style_id=s.id'
                        . ' and cl.age_id=ca.id and cl.count_id=cc.id and d.user_id=u.id'
                        . ' and p.comp_id=cl.comp_id and p.lig_id=cl.lig_id and p.count_id=cl.count_id'
                        . ' and cl.comp_id='.$comp_id.' and d.trainer_id='.$role_id.''
                        . ' and d.bell_id=b.id'
                        . ' order by cl.part asc');
                $res = $q->result_array();
                break;
            case 'admin':
                $q = $this->db->query('select u.first_name, u.last_name,'
                        . ' b.type, p.pay_iude, p.pay_other, p.pay_not,'
                        . ' l.name as lig, s.style, cc.name as count_cat, ca.name as age_cat'
                        . ' from ligs l, styles s, cat_count cc, cat_age ca, users u, dancers d,'
                        . ' comp_list cl, bellydance b, pays p'
                        . ' where cl.dancer_id=d.id and cl.lig_id=l.id and cl.style_id=s.id'
                        . ' and cl.age_id=ca.id and cl.count_id=cc.id and d.user_id=u.id'
                        . ' and p.comp_id=cl.comp_id and p.lig_id=cl.lig_id and p.count_id=cl.count_id'
                        . ' and d.bell_id=b.id and cl.comp_id='.$comp_id.' '
                        . ' order by cl.part asc');
                $res = $q->result_array();
                break;
            case 'cluber':
                $q = $this->db->query('select u.first_name, u.last_name,'
                        . ' b.type, p.pay_iude, p.pay_other, p.pay_not,'
                        . ' l.name as lig, s.style, cc.name as count_cat, ca.name as age_cat'
                        . ' from ligs l, styles s, cat_count cc, cat_age ca, users u, dancers d,'
                        . ' comp_list cl, bellydance b, pays p, trainers t'
                        . ' where cl.dancer_id=d.id and cl.lig_id=l.id and cl.style_id=s.id'
                        . ' and cl.age_id=ca.id and cl.count_id=cc.id and d.user_id=u.id'
                        . ' and p.comp_id=cl.comp_id and p.lig_id=cl.lig_id and p.count_id=cl.count_id'
                        . ' and cl.comp_id='.$comp_id.' and t.club_id='.$role_id.''
                        . ' and d.bell_id=b.id and d.trainer_id=t.id'
                        . ' order by cl.part asc');
                $res = $q->result_array();
                break;
        }
        return $res;
    }
    
    public function getCompListCsv($comp_id, $role, $role_id)
    {
        $rows = $this->getCompList($comp_id, $role, $role_id);
        $html='';
        foreach ($rows as $row){
            $html.=$row['last_name'].' '.$row['first_name'].',';
            $html.=$row['style'].' '.$row['age_cat'].' '.$row['count_cat'].' '.$row['lig'];
            if ($row['type']==1) $html.=','.$row['pay_iude'];
            if ($row['type']==2) $html.=','.$row['pay_other'];
            if ($row['type']==3) $html.=','.$row['pay_not'];
            $html.="\r\n";
        }
        force_download('list.csv',$html);
        return $name;
    }
    
    public function getResultCsv($comp_id, $role, $role_id = 0)
    {
        $rows = $this->getCompResult($comp_id, $role, $role_id);
        $html='';
        foreach ($rows as $row){
            $html.=$row['last_name'].' '.$row['first_name'].',';
            $html.=$row['city'].',';
            $html.=$row['title'].',';
            $html.=$row['tr_last_name'].' '.$row['tr_first_name'].',';
            $html.=substr($row['birthdate'],0,4).',';
            $ytime = time() - strtotime($row['birthdate']);
            $year = ($ytime - $ytime % 31556926) / 31556926;
            $html.=$year.',';
            $html.=$row['style'].',';
            $html.=$row['count'].',';
            $html.=$row['lig'].',';
            $html.=$row['place'];
            $html.="\r\n";
        }
        $file='csv/list'.$this->session->id.'.csv';
        $h=fopen($file,"w");
        fwrite($h, $html);
        fclose($h);
        return $file;
    }
    
    public function getCompResult($comp_id, $role, $role_id)
    {
        switch ($role){
            case 'trainer':
                break;
            case 'admin':
                $q = $this->db->query('select comp_list.id, users.last_name, users.first_name, cities.city, clubers.title,'
                        . ' (select u.last_name from users u, trainers t where t.user_id=u.id and dancers.trainer_id=t.id) as tr_last_name,'
                        . ' (select u.first_name from users u, trainers t where t.user_id=u.id and dancers.trainer_id=t.id) as tr_first_name,'
                        . ' dancers.birthdate, styles.style, cat_count.name as count, ligs.name as lig, comp_list.place'
                        . ' from dancers, users, trainers, comp_list, cities, clubers, styles,'
                        . ' cat_count, ligs'
                        . ' where comp_list.dancer_id=dancers.id and dancers.user_id=users.id'
                        . ' and dancers.trainer_id=trainers.id and trainers.club_id=clubers.id'
                        . ' and clubers.city_id=cities.id and comp_list.count_id=cat_count.id'
                        . ' and comp_list.lig_id=ligs.id and comp_list.style_id=styles.id and comp_id='.$comp_id);
                $res = $q->result_array();
                break;
        }
        return $res;
    }
    
    public function savePays($data)
    {
        for ($i=0;$i<count($data['id']);$i++){
            $ins=[
                'pay_iude'=>$data['pay_iude'][$i],
                'pay_other'=>$data['pay_other'][$i],
                'pay_not'=>$data['pay_not'][$i]
            ];
            $this->db->where('id',$data['id'][$i]);
            $this->db->update('pays',$ins);
        }
        return true;
    }
    
    public function getCompReward($comp_id)
    {
        $sum_medal1=0;
        $sum_medal2=0;
        $sum_medal3=0;
        $sum_kub1=0;
        $sum_kub2=0;
        $sum_kub3=0;
        $q = $this->db->query('select count(cl.id) as solo'
                . ' from comp_list cl, ligs l, cat_count cc'
                . ' where cl.lig_id=l.id and cl.count_id=cc.id'
                . ' and cc.name="Соло" and l.name="Дебют" and cl.comp_id='.$comp_id);
        $res = $q->result_array();
        $html='<tr><td>Дебют Соло</td><td>'.$res[0]['solo'].'</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td><td>-</td></tr>';
        
        $q = $this->db->query('select DISTINCT l.name as lig_name, cc.name as count_name,'
                . ' cl.lig_id, cl.style_id, cl.age_id, cl.count_id, cl.part'
                . ' from comp_list cl, ligs l, cat_count cc'
                . ' where cl.lig_id=l.id and cl.count_id=cc.id and cl.comp_id='.$comp_id.' '
                . '  order by cl.style_id, cl.age_id ASC');
        $data= $q->result_array();
        
        $q = $this->db->query('select DISTINCT cc.max_count, l.name as lig_name, cc.name as count_name,'
                . ' cl.lig_id, cl.count_id'
                . ' from comp_list cl, cat_count cc, ligs l'
                . ' where cl.lig_id=l.id and cl.count_id=cc.id'
                . ' and not (l.name="Дебют" and cc.name="Соло")'
                . ' and cl.comp_id='.$comp_id);
        $cats= $q->result_array();
           
        $data_sum = [];
        $data_sum[0] = [];
        $data_sum[0]['lig_id'] = $data[0]['lig_id'];
        $data_sum[0]['style_id'] = $data[0]['style_id'];
        $data_sum[0]['age_id'] = $data[0]['age_id'];
        $data_sum[0]['count_id'] = $data[0]['count_id'];
        $data_sum[0]['count']=0;
        
        foreach($data as $d){
            $new = TRUE;
            foreach ($data_sum as $k => $ds){
                if ($ds['lig_id'] == $d['lig_id'] && $ds['style_id'] == $d['style_id'] 
                    && $ds['count_id'] == $d['count_id'] && $ds['age_id'] == $d['age_id']){
                    $new=FALSE;
                    $data_sum[$k]['count']++;
                }
            }
            if ($new){
                $index=count($data_sum);
                $data_sum[$index]['lig_id'] = $d['lig_id'];
                $data_sum[$index]['style_id'] = $d['style_id'];
                $data_sum[$index]['age_id'] = $d['age_id'];
                $data_sum[$index]['count_id'] = $d['count_id'];
                $data_sum[$index]['count']=1;
            }
        }
        
        $sum_medal1=0;
        $sum_medal2=0;
        $sum_medal3=0;
        $sum_kub1=0;
        $sum_kub2=0;
        $sum_kub3=0;
        foreach ($cats as $cat){
            $medal1=0;
            $medal2=0;
            $medal3=0;
            $kub1=0;
            $kub2=0;
            $kub3=0;
            $count=0;
            foreach ($data_sum as $d){
                if ($cat['lig_id'] == $d['lig_id'] && $cat['count_id'] == $d['count_id']){
                    if ($cat['max_count']<4){
                        $medal1++;
                        if ($d['count']>1){
                            $medal2++;
                        }
                        if ($d['count']>2){
                            $medal3++;
                        }
                    }else{
                        $kub1++;
                        if ($d['count']>1){
                            $kub2++;
                        }
                        if ($d['count']>2){
                            $kub3++;
                        }
                    }
                }
            }
            $sum_medal1+=$medal1;
            $sum_medal2+=$medal2;
            $sum_medal3+=$medal3;
            $sum_kub1+=$kub1;
            $sum_kub2+=$kub2;
            $sum_kub3+=$kub3;
            $html.='<tr><td>'.$cat['count_name'].' '.$cat['lig_name'].'</td><td>-</td>'
                    .'<td>'.$medal1.'</td><td>'.$medal2.'</td><td>'.$medal3.'</td>'
                    . '<td>'.$kub1.'</td><td>'.$kub2.'</td><td>'.$kub3.'</td></tr>';
        }
        $html.='<tr class="success"><td>ИТОГО</td><td>-</td>'
                    .'<td>'.$sum_medal1.'</td><td>'.$sum_medal2.'</td><td>'.$sum_medal3.'</td>'
                    . '<td>'.$sum_kub1.'</td><td>'.$sum_kub2.'</td><td>'.$sum_kub3.'</td></tr>';
        return $html;   
    }
    
    public function uploadResult($file, $comp_id)
    {
        $data=[];
        $handle = fopen("csv/".$file, "r");
        while($str = fgets($handle)){
            $res = explode(",",$str);
            $data[] = [
                'name'=>trim($res[0]),
                'city'=>trim($res[1]),
                'club'=>trim($res[2]),
                'trainer'=>trim($res[3]),
                'year'=>trim($res[4]),
                'age'=>trim($res[5]),
                'style'=>trim($res[6]),
                'count_name'=>trim($res[7]),
                'lig'=>trim($res[8]),
                'place'=>trim($res[9]),
            ];
        }
        fclose($handle);
        unlink("csv/".$file);
        $comp_list = $this->getCompResult($comp_id, 'admin', 0);
        $lost_arr=[];
        foreach ($data as $d){
            $lost=true;
            foreach ($comp_list as $c){
                $ytime = time() - strtotime($c['birthdate']);
                $year = ($ytime - $ytime % 31556926) / 31556926;
                if ($d['name']==($c['last_name'].' '.$c['first_name']) && $d['city']==$c['city']
                        && $d['club']==$c['title'] && $d['trainer']==($c['tr_last_name'].' '.$c['tr_first_name'])
                        && $d['year']==substr($c['birthdate'],0,4) && $d['style']==$c['style']
                        && $d['count_name']==$c['count'] && $c['lig']==$d['lig']){
                    $lost=false;
                    $this->db->where('id',$c['id']);
                    $this->db->update('comp_list',['place'=>$d['place']]);
                }
            }
            if ($lost){
                $lost_arr[]=$d;
            }
        }
        $html = '';
        foreach ($lost_arr as $l){
            $html.='<tr>';
            $html.='<td>'.$l['name'].'</td>';
            $html.='<td>'.$l['city'].'</td>';
            $html.='<td>'.$l['club'].'</td>';
            $html.='<td>'.$l['trainer'].'</td>';
            $html.='<td>'.$l['year'].'</td>';
            $html.='<td>'.$l['age'].'</td>';
            $html.='<td>'.$l['style'].'</td>';
            $html.='<td>'.$l['count_name'].'</td>';
            $html.='<td>'.$l['lig'].'</td>';
            $html.='<td>'.$l['place'].'</td>';
            $html.='</tr>';
        }
        return $html;
    }
    
    public function doneComp($comp_id)
    {
        $q = $this->db->query('select s.status'
                . ' from competitions c, statuses s'
                . ' where c.status_id=s.id and c.id='.$comp_id);
        $res = $q->result();
        //if ($res[0]->status == 'DONE') return 'NO';
        $this->db->query('update competitions'
                . ' set status_id=(select id from statuses where status="DONE")'
                . ' where id='.$comp_id);
        $q = $this->db->query('select id, part, place'
                . ' from comp_list'
                . ' where comp_id='.$comp_id);
        $dancers = $q->result_array();
        $q = $this->db->query('SELECT part, count(part) as num FROM comp_list
                                where comp_id='.$comp_id.'
                                group by part');
        $parts = $q->result_array();
        $q = $this->db->query('SELECT minn, maxn, reight, points FROM reight');
        $reight = $q->result_array();
        $lost = FALSE;
        $mess='OK';
        foreach ($dancers as $d){
            foreach ($parts as $p){
                if ($p['part']==$d['part']){
                    $num=$p['num'];
                }
            }
            $lost_one = TRUE;
            foreach ($reight as $r){
                if ($d['place']==$r['reight'] && $num>=$r['minn'] && $num<=$r['maxn']){
                    $lost_one=FALSE;
                    $points=$r['points']+1;
                    $this->db->where('id',$d['id']);
                    $this->db->update('comp_list',['points'=>$points]);
                }
            }
            if ($lost_one) {
                $lost = TRUE;
            }
        }
        if ($lost){
            $mess='ERROR';
        }
        $q = $this->db->query('select way_id from competitions where id='.$comp_id);
        $res= $q->result();
        $way_id= $res[0]->way_id;
        $q = $this->db->query('select dancer_id, sum(points) as point'
                . ' from comp_list where comp_id='.$comp_id
                . ' group by dancer_id');
        $comp_points = $q->result_array();
        foreach($comp_points as $c){
            if ($c['point']==0){
                continue;
            }
            $q = $this->db->query('select e.id, e.points, l.points as next_p, l.number, e.create_at, l.days'
                    . ' from experience as e, ligs as l, dancers d '
                    . ' where e.dancer_id='.$c['dancer_id']
                    . ' and e.way_id='.$way_id.' and e.lig_id=l.id and e.dancer_id=d.id');
            $res = $q->result();
            if (count($res)==0){
                $time=date('Y-m-d',time());
                $ins=$this->db->query('insert into experience (dancer_id, lig_id, points, way_id, create_at)'
                        . ' values ('
                        . $c['dancer_id']
                        . ',(select id from ligs where way_id='.$way_id.' and name="Дебют")'
                        . ','.$c['point']
                        . ','.$way_id
                        . ',"'.$time
                        . '")');
            } else{
                $prev = strtotime($res[0]->create_at);
                $del = $prev + $res[0]->days*24*60*60 - time();
                if ($res[0]->days>0 && $del<0){
                    $q= $this->db->query('select id '
                            . ' from ligs'
                            . ' where number='.($res[0]->number+1).' and way_id='.$way_id);
                    $r=$q->result();
                    $lig_id=$r[0]->id;
                    $ins=[
                        'lig_id' => $lig_id,
                        'points' => $res[0]->points
                    ];
                    $this->db->where('id',$res[0]->id);
                    $this->db->update('experience',$ins);
                }else{
                    $sum=$res[0]->points+$c['point'];
                    if ($sum<$res[0]->next_p){
                        $this->db->where('id',$res[0]->id);
                        $this->db->update('experience',['points'=>$sum]);
                    } else{
                        $q= $this->db->query('select id '
                                . ' from ligs'
                                . ' where number='.($res[0]->number+1).' and way_id='.$way_id);
                        $r=$q->result();
                        $lig_id=$r[0]->id;
                        $sum = $sum - $res[0]->next_p;
                        $ins=[
                            'lig_id' => $lig_id,
                            'points' => $sum
                        ];
                        $this->db->where('id',$res[0]->id);
                        $this->db->update('experience',$ins);
                    }
                }
            }
        }
        return $mess;
    }
    
    public function getYearPay($type)
    {
        switch ($type){
            case "all":
                $sel='select u.last_name, u.first_name, u.father_name, d.id,'
                    . ' u.phone, u.email, c.title, d.pay'
                    . ' from users u, dancers d, trainers t, clubers c'
                    . ' where d.user_id=u.id and d.trainer_id=t.id and t.club_id=c.id';
                break;
            case "yes":
                $now=date('Y',time());
                $sel='select u.last_name, u.first_name, u.father_name, d.id, '
                    . ' u.phone, u.email, c.title, d.pay'
                    . ' from users u, dancers d, trainers t, clubers c'
                    . ' where d.user_id=u.id and d.trainer_id=t.id and t.club_id=c.id'
                    . ' and d.pay>='.$now;
                break;
            case "no":
                $now=date('Y',time());
                $sel='select u.last_name, u.first_name, u.father_name,'
                    . ' u.phone, u.email, c.title, d.pay, d.id'
                    . ' from users u, dancers d, trainers t, clubers c'
                    . ' where d.user_id=u.id and d.trainer_id=t.id and t.club_id=c.id'
                    . ' and (ISNULL(d.pay) or d.pay<'.$now.')';
                break;
        }
        $q = $this->db->query($sel);
        $res = $q->result_array();
        $html='';
        foreach ($res as $r){
            if ($r['pay']==null) $r['pay']=0;
            $html.='<tr>';
            $html.='<td><input type="hidden" name="id[]" value='.$r['id'].'>';
            $html.=$r['last_name'].' '.$r['first_name'].' '.$r['father_name'].'</td>';
            $html.='<td>'.$r['email'].' '.$r['phone'].'</td>';
            $html.='<td>'.$r['title'].'</td>';
            $html.='<td><input type="number" name="year[]" value='.$r['pay'].' class="col-xs-5"></td>';
            $html.='</tr>';
        }
        return $html;
    }
    
    public function saveYearPays($data)
    {
        for ($i=0;$i<count($data['id']);$i++){
            $ins=['pay'=>$data['year'][$i]];
            $this->db->where('id',$data['id'][$i]);
            $this->db->update('dancers',$ins);
        }
        return true;
    }
}