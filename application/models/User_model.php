<?php
  class User_model extends CI_Model {
    public function cek_perusahaan($username,$password){
        //$this->db->where("username",$username);
        //$this->db->where("password",$password);
        //return $this->db->get("tb_d_costumer");
     $this->db->select("a.*,b.*")->where("a.password",$password)->where("b.username", $username)->join("tb_costumer a","a.kd_costumer = b.kd_costumer");
     return $this->db->get('tb_d_costumer b');
    }

     public function cek($username, $password) {
        $this->db->select("a.*,b.*,c.*");
        $this->db->where("a.username", $username);
        $this->db->where("a.password", $password);
        $this->db->where("a.status_email", '1');
        $this->db->join("tb_d_user b","a.kd_user = b.kd_user");
        $this->db->join("tb_verifikasi c","b.kd_user = c.kd_user");
        return $this->db->get("tb_user a");
      }
    public function getLoginData($usr,$psw){
        $u=$usr;
        $p=$psw;
        $q_cek_login=$this->db->get_where('tb_user',array('username' => $u,'password' => $p));
        if(count($q_cek_login->result())>0){
            foreach ($q_cek_login->result as $qck) {
                foreach ($q_cek_login->result as $qad) {
                $sess_data['logged_in'] = TRUE;
                $sess_data['kd_user'] =  $qad->kd_user;
                $sess_data['username'] = $qad->username;
                $sess_data['password'] = $qad->password;
                $sess_data['email'] = $qad->email;
                $sess_data['hak']=    $qad->hak;
                $this->session->set_userdata($sess_data);
                }
                redirect('dashboard');
            }
        }
        else{
            $this->session->set_flasdata('result_login','Username atau Password yang anda masukan salah');
            header('location:' . base_url() . 'login');
        }
    }
    public function tampil_data_lengkap($where = array()){
        $query = $this->db->select("a.*,b.*,c.*")->where("a.kd_user",$where)->join("tb_user a","a.kd_user = b.kd_user")->join("tb_verifikasi c","a.kd_user = c.kd_user")->get('tb_d_user b');
        $data = array(
            'rows' => $query->result(),
            'total' => $query->num_rows()
        );
        return $data;
    }

    public function tampil_data_perusahaan_lengkap($where = array()){
        $query = $this->db->select("a.*,b.*")->where("a.kd_costumer",$where)->join("tb_costumer a","a.kd_costumer = b.kd_costumer")->get('tb_d_costumer b');
        $data = array(
            'rows' => $query->result(),
            'total' => $query->num_rows()
        );
        return $data;
    }

    public function tampil_data_ktp($where = array()){
        $query = $this->db->select("a.*,b.*,c.*,c.status as aktif,d.*")->where($where)->join("tb_user a","a.kd_user = b.kd_user")->join("tb_verifikasi c","a.kd_user = c.kd_user")->join("tb_ktp d","c.NIK = d.NIK")->get('tb_d_user b');
        $data = array(
            'rows' => $query->result(),
            'total' => $query->num_rows()
        );
        return $data;
    }
    public function tampil_data_sim($where = array()){
        $query = $this->db->select("a.*,b.*,c.*,c.status as aktif,d.*")->where($where)->join("tb_user a","a.kd_user = b.kd_user")->join("tb_verifikasi c","a.kd_user = c.kd_user")->join("tb_sim d","c.no_sim = d.no_sim")->get('tb_d_user b');
        $data = array(
            'rows' => $query->result(),
            'total' => $query->num_rows()
        );
        return $data;
    }
    public function tampil_data_passport($where = array()){
        $query = $this->db->select("a.*,b.*,c.*,c.status as aktif,d.*")->where($where)->join("tb_user a","a.kd_user = b.kd_user")->join("tb_verifikasi c","a.kd_user = c.kd_user")->join("tb_passport d","c.passport = d.passport")->get('tb_d_user b');
        $data = array(
            'rows' => $query->result(),
            'total' => $query->num_rows()
        );
        return $data;
    }
    public function tampil_data_user($where = array()){
        $query = $this->db->select("a.*,b.*,c.*")->where($where)->join("tb_user a","a.kd_user = b.kd_user")->join("tb_verifikasi c","a.kd_user = c.kd_user")->get('tb_d_user b');
        $data = array(
            'rows' => $query->result(),
            'total' => $query->num_rows()
        );
        return $data;
    }
    public function leaderboard($where = array()){
        $query = $this->db->where($where)->order_by('score','desc')->limit('30')->join("tb_user a","a.kd_user = b.kd_user")->get('tb_d_user b');
        $data = array(
            'rows' => $query->result(),
            'total' => $query->num_rows()
        );
        return $data;
    }
    function insert_cos($data){
        return $this->db->insert('tb_costumer',$data);
    }
    function insert($data){
        return $this->db->insert('tb_user', $data);
    }
	function update($data,$where = array()){
		return $this->db->where($where)->update('tb_d_user',$data);
	}
    function update_d_cos($data,$where = array()){
        return $this->db->where($where)->update('tb_d_costumer',$data);
    }

	function update_user($data,$where = array()){
		return $this->db->where($where)->update('tb_user',$data);
	}
    function update_program_submit($data, $where = array()){
        return $this->db->where($where)->update('tb_program_submit', $data);
    }
    function insert_detail_cos($data){
        return $this->db->insert('tb_d_costumer', $data);
    }
    function insert_detail($data){
        return $this->db->insert('tb_d_user', $data);
    }
    public function cek_email($email){
        $query = $this->db->where("email",$email);
        return $this->db->get('tb_user');
    }
    public function cek_email_ct($email){
        $query = $this->db->where("email",$email);
        return $this->db->get('tb_costumer');
    }
    public function cek_username($username){
        $query = $this->db->where("username",$username);
        return $this->db->get('tb_user');
    }
    public function cek_username_ct($username){
        $query = $this->db->where("username",$username);
        return $this->db->get('tb_costumer');
    }
    public function sendMail($email,$username) {
        $from_email = 'admfixbug@gmail.com'; // ganti dengan email kalian
        $subject = 'Verify Your Email Address';
        $message = 'Dear '. $username .',<br /><br />
                    Please click on the below activation link to verify your email address.<br /><br />
                    http://192.168.0.13/fixBug/index.php/user/verify/' . md5($email) . '<br /><br /><br />
                    Thanks<br />
                    Admin FIX BUG';
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = 'ssl://smtp.gmail.com'; // sesuaikan dengan host email
        $config['smtp_timeout'] = '7';
        $config['smtp_port'] = '465'; // sesuaikan
        $config['smtp_user'] = $from_email;
        $config['smtp_pass'] = 'admin1234560'; // ganti dengan password email
        $config['mailtype'] = 'html';
        $config['charset'] = 'iso-8859-1';
        $config['wordwrap'] = TRUE;
        $config['newline'] = "\r\n";
        $config['crlf'] = "\r\n";
        $this->email->initialize($config);
        $this->email->from($from_email, 'Admin');
        $this->email->to($email);
        $this->email->subject($subject);
        $this->email->message($message);
        // gunakan return untuk mengembalikan nilai yang akan selanjutnya diproses ke verifikasi email
        return $this->email->send();
      }
    
      public function verifyEmail($key) {
        // nilai dari status yang berawal dari Tidak Aktif akan diubah menjadi Aktif disini
        $data = array('status_email' => '1');
        $this->db->where('md5(email)', $key);
        return $this->db->update('tb_user', $data);
      }
}