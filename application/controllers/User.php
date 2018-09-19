<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		// load user_model,verifikasi_model
		$this->load->model(array('user_model','verifikasi_model'));
		// load helper captcha
		$this->load->helper('captcha');
	}
	public function index()
	{
		if($this->session->userdata('kd_user')){
            redirect('dashboard','refresh');
		}
		$this->load->helper('captcha');
		$vals = array(
			'img_path'	 => './captcha/',
			'img_url'	 => base_url().'captcha/',
			'img_width'	 => '200',
			'img_height' => 30,
			'border' => 0, 
			'expiration' => 7200
		);
		// create captcha image
		$cap = create_captcha($vals);
		// store image html code in a variable
		$data['image'] = $cap['image'];
		// store the captcha word in a session
		$this->session->set_userdata('captchaWord', $cap['word']);
		$this->load->view('login',$data);
	}
	// memanggil view login researcher
	public function sign_in(){
		if($this->session->userdata('kd_user')){
            redirect('dashboard','refresh');
		}
		// $this->load->helper('captcha');
		/* $vals = array(
			'img_path'	 => './captcha/',
			'img_url'	 => base_url().'captcha/',
			'img_width'	 => '200',
			'img_height' => 30,
			'border' => 0, 
			'expiration' => 7200
		);
		// create captcha image
		$cap = create_captcha($vals);
		// store image html code in a variable
		$data['image'] = $cap['image'];
		// store the captcha word in a session
		$this->session->set_userdata('captchaWord', $cap['word']);
		*/
		$this->load->view('login');
	}
	// refresh captcha baru 
	public function refresh_captcha(){
		$this->load->helper('captcha');
		$vals = array(
			'img_path'	 => './captcha/',
			'img_url'	 => base_url().'captcha/',
			'img_width'	 => '200',
			'img_height' => 30,
			'border' => 0, 
			'expiration' => 7200
		);
		$cap = create_captcha($vals);
		$this->session->set_userdata('captchaWord', $cap['word']);
		echo $cap['image'].'^';
		echo $cap['word'];
	}
	// memanggil view pendaftaran researcher
	public function sign_up(){
		if($this->session->userdata('kd_user')){
            redirect('dashboard','refresh');
		}
		$this->load->helper('captcha');
		$vals = array(
			'img_path'	 => './captcha/',
			'img_url'	 => base_url().'captcha/',
			'img_width'	 => '200',
			'img_height' => 30,
			'border' => 0, 
			'expiration' => 7200
		);
		// create captcha image
		$cap = create_captcha($vals);
		// store image html code in a variable
		$data = array(
			'image' => $cap['image'],
			'word' => $cap['word']
		);
		// store the captcha word in a session
		$this->session->set_userdata('captchaWord', $cap['word']);
		$this->load->view('sign_up',$data);
	}

	// memanggil view login costumer
	public function sign_in_costumer(){
		if($this->session->userdata('kd_costumer')){
            redirect('dashboard/costumer','refresh');
		}

		$this->load->view('perusahaan/login');
	
	}

	public function sign_up_costumer(){
		if($this->session->userdata('kd_costumer')){
			redirect('dashboard/costumer','refresh');
			$this->toash->render("warning","Anda Sudah Login");
		}
		$this->load->helper('captcha');
		$vals = array(
			'img_path'	 => './captcha/',
			'img_url'	 => base_url().'captcha/',
			'img_width'	 => '200',
			'img_height' => 30,
			'border' => 0, 
			'expiration' => 7200
		);
		// create captcha image
		$cap = create_captcha($vals);
		// store image html code in a variable
		$data = array(
			'image' => $cap['image'],
			'word' => $cap['word']
		);
		// store the captcha word in a session
		$this->session->set_userdata('captchaWord', $cap['word']);
		$this->load->view('perusahaan/sign_up',$data);
	}
	// memanggil view pilihan Login
	public function login(){
		$this->load->view('Front/login');
	}
	// leaderboard bagan di researcher
	public function leader(){
		if (!isset($this->session->userdata['kd_user'])) {
            redirect('user/sign_in','refresh');
			}
		$where = array('hak'=>'Researcher');
        $get_data = $this->user_model->leaderboard($where);
        $data = array(
            'isi'=> 'leaderboard/leaderboard',
            'get_data' => $get_data,
            'tittle' => 'LeaderBoards'
        );
        $this->load->view('dashboard/template', $data);
	}
	// prosess login Costumer
	public function prosess_sign_in_ct(){
		$this->form_validation->set_rules('username', 'username', 'required|trim|xss_clean');
		$this->form_validation->set_rules('password', 'password', 'required|trim|xss_clean');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('perusahaan/login');
		} else {
			$usr = $this->input->post('username');
			$psw = $this->input->post('password');
			$u = $usr;
			$p = sha1(md5($psw));
			$cek = $this->user_model->cek_perusahaan($u,$p);
				if($cek->num_rows() > 0){
					foreach ($cek->result() as $qad) {
						$sess_data['kd_costumer'] = $qad->kd_costumer;
						$sess_data['username'] = $qad->username;
						$sess_data['email'] = $qad->email;
						$sess_data['perusahaan'] = $qad->perusahaan;
						$sess_data['no_tlp'] = $qad->no_tlp;
						$sess_data['hak'] = $qad->hak;
						$this->session->set_userdata($sess_data);
					}
					// $tipe = 'L'; $aksi = "Login ".$u;
					// $this->log_helper->insert_log($tipe,$aksi);
					$this->session->set_flashdata('success', 'Login Berhasil !');
					if($this->session->userdata['hak']=='perusahaan'){
						redirect('dashboard/costumer','refresh');
					}
					else{
					redirect('dashboard/costumer','refresh');
					}
				}else{
					$this->session->set_flashdata('result_login', 'Username atau Password yang anda masukan salah!');
					redirect('user/sign_in_costumer','refresh');
				}
		}
	}

	// alert mohon verifikasi email
	public function verifikasi(){
		$username = $this->session->userdata('username');
		$email = $this->session->userdata('email');
		$data = array(
			'username' => $username,
			'email' => $email
		);
		$this->load->view('aktivasi', $data);
	}
	// Alert akun terverifikasi
	public function verifikasi_success(){
		$username = $this->session->userdata('username');
		$email = $this->session->userdata('email');
		$data = array(
			'username' => $username,
			'email' => $email
		);
		$this->load->view('aktivasi_berhasil', $data);
	}
	// kirim ulang email
	public function kirim_lagi(){
		$username = $this->session->userdata('username');
		$email = $this->session->userdata('email');
		$this->user_model->sendMail($email,$username);
		redirect('user/verifikasi','refresh'); 
	}
	// pendaftaran akun researcher
	public function prosess_sign_up(){
		$kd_user = $this->app_library->get_kode("tb_user");
        $username = $this->input->post('username');
        $password = $this->input->post('password');
		$email = $this->input->post('email');
		$data = array(
			'kd_user' => $kd_user,
			'username' => $username,
			'password' => sha1(md5($password)),
			'email' => $email,
			'score' => '0',
			'hak' => 'Researcher',
			'baca' => 'belum'
		);
		$verifikasi = array('kd_user' => $kd_user ,'status' => 'tidak');
		$kode_user = array('kd_user' => $kd_user);
		if($this->user_model->insert($data) && $this->user_model->insert_detail($kode_user) && $this->verifikasi_model->insert($verifikasi) && $this->user_model->sendMail($email,$username)):

			$this->session->set_userdata('username', $username);
			$this->session->set_userdata('email', $email);
			
			redirect('user/verifikasi','refresh');
		
		else:
			
		endif;
	}

		// prosess pendaftaran costumer	
	public function prosess_sign_up_ct(){
		$kd_costumer = $this->app_library->get_kode("tb_costumer");
        $username = $this->input->post('username');
        $password = $this->input->post('password');
		$email = $this->input->post('email');
		$perusahaan = $this->input->post('perusahaan');
		$no_tlp = $this->input->post('no_tlp');
		$data = array(
			'kd_costumer' => $kd_costumer,
			'username' => $username,
			'password' => sha1(md5($password)),
			'email' => $email,
			'perusahaan' => $perusahaan,
			'no_tlp' => $no_tlp
		);
		$data2 = array(
			'kd_costumer' => $kd_costumer,
			'username' => $username,
			'nama_perusahaan' => $perusahaan,
			'no_tlp' => $no_tlp,
		);

		if($this->user_model->insert_cos($data) && $this->user_model->insert_detail_cos($data2)):

		else:
			
		endif;
	}

	// update status email
	public function verify($hash=NULL) {
		if ($this->user_model->verifyEmail($hash)) {
		  redirect('user/verifikasi_success'); 
		} else {
		  redirect('user/sign_up'); 
		}
	  }

	// Login researcher
	public function prosess_sign_in(){
			$this->form_validation->set_rules('username', 'username', 'required|trim|xss_clean');
			$this->form_validation->set_rules('password', 'password', 'required|trim|xss_clean');
			//$this->form_validation->set_rules('captcha', 'captcha', 'required|trim|xss_clean|callback_matching_captcha');
			if ($this->form_validation->run() == FALSE) {
				/*
				$this->load->helper('captcha');
				$vals = array(
					'img_path'	 => './captcha/',
					'img_url'	 => base_url().'captcha/',
					'img_width'	 => '200',
					'img_height' => 30,
					'border' => 0, 
					'expiration' => 7200
				);
				// create captcha image
				$cap = create_captcha($vals);
				// store image html code in a variable
				$data['image'] = $cap['image'];
				// store the captcha word in a session
				$this->session->set_userdata('captchaWord', $cap['word']);
				*/
				$this->load->view('login');
			} else {
			$usr = $this->input->post('username');
			$psw = $this->input->post('password');
			$u = $usr;
			$p = sha1(md5($psw));
			$cek = $this->user_model->cek($u,$p);
				if($cek->num_rows() > 0){
					foreach ($cek->result() as $qad) {
						$sess_data['kd_user'] = $qad->kd_user;
						$sess_data['username'] = $qad->username;
						$sess_data['email'] = $qad->email;
						$sess_data['hak'] = $qad->hak;
						$sess_data['foto'] = $qad->foto;
						$sess_data['first_name'] = $qad->first_name;
						$sess_data['last_name'] = $qad->last_name;
						$sess_data['no_sim'] = $qad->no_sim;
						$sess_data['nik'] = $qad->NIK;
						$sess_data['status'] = $qad->status;
						$this->session->set_userdata($sess_data);
					}
					// $tipe = 'L'; $aksi = "Login ".$u;
					// $this->log_helper->insert_log($tipe,$aksi);
					$this->session->set_flashdata('success', 'Login Berhasil !');
					if($this->session->userdata['hak']=='Researcher'){
						redirect('dashboard','refresh');
					}
					else{
					redirect('user/sign_in','refresh');
					}
				}else{
					$this->session->set_flashdata('result_login', 'Username atau Password yang anda masukan salah!');
					redirect('user/sign_in','refresh');
				}
		}
	}
	// kecocokan captcha
	public function matching_captcha($str){
		if($str != $this->session->userdata('captchaWord')){
			$this->form_validation->set_message('matching_captcha', '{field} yang anda masukan tidak cocok');
			return false;
		}else{
			return true;
		}
	}
	// memanggil view profile researcher
	public function profile(){
		if (!isset($this->session->userdata['kd_user'])) {
            redirect('user/sign_in','refresh');
			}
		$kd_user = $this->session->userdata('kd_user');
		$get_data = $this->user_model->tampil_data_lengkap($kd_user);
		$data = array(
			'isi'=> 'profile/profil',
			'tittle' => 'Profil',
            'get_data' => $get_data
		);
        $this->load->view('dashboard/template', $data);
	}
	// edit profil researcher
	public function prosess_edit_profil(){
        $config['upload_path'] =  './assets/img';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']     = '2000';
        $config['max_width'] = '2000';
        $config['max_height'] = '2000';
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
		$field = 'foto';
        $kd_user = $this->input->post('kd_user');
        if (!$this->upload->do_upload($field))
        {
			$error = array('error' => $this->upload->display_errors());
            $first_name = $this->input->post('first_name');
            $last_name = $this->input->post('last_name');
            $no_tlp = $this->input->post('no_tlp');
            $sertifikasi = $this->input->post('sertifikasi');
            $biografi = $this->input->post('biografi');
            $pendidikan = $this->input->post('pendidikan');
            $jurusan = $this->input->post('jurusan');
            $no_baju = $this->input->post('no_baju');
            $bank = $this->input->post('bank');
            $no_rekening = $this->input->post('no_rekening');
            
            $data = array(
                'first_name' => $first_name,
                'last_name' => $last_name,
                'no_tlp' => $no_tlp,
                'sertifikasi' => $sertifikasi,
                'biografi' => $biografi,
                'pendidikan' => $pendidikan,
                'jurusan' => $jurusan,
                'no_baju' => $no_baju,
                'bank' => $bank,
                'no_rekening' => $no_rekening
            );
			$where = array('kd_user' => $kd_user);
            if($this->user_model->update($data,$where)):
				$this->alert->render("success","Data Telah Terubah");
                header("Refresh:2; url='".site_url('user/profile')."'");
            else:
				$this->alert->render('warning',"Data Tidak Terubah");
                header("Refresh:2; url='".site_url('user/profile')."'");
            endif;
        }
        else{
            $data = array('upload_data' => $this->upload->data());
			$foto = ($data['upload_data']['file_name']);
			$first_name = $this->input->post('first_name');
            $last_name = $this->input->post('last_name');
            $no_tlp = $this->input->post('no_tlp');
            $sertifikasi = $this->input->post('sertifikasi');
            $biografi = $this->input->post('biografi');
            $pendidikan = $this->input->post('pendidikan');
			$data = array(
                'first_name' => $first_name,
                'last_name' => $last_name,
                'no_tlp' => $no_tlp,
                'sertifikasi' => $sertifikasi,
				'biografi' => $biografi,
				'pendidikan' => $pendidikan,
				'foto' => $foto
            );
			$where = array('kd_user' => $kd_user);
            if($this->user_model->update($data,$where)):
				$this->alert->render("success","Data Telah Terubah");
				$this->session->set_userdata('foto', $foto);
                header("Refresh:2; url='".site_url('user/profile')."'");
            else:
				$this->alert->render('warning',"Data Tidak Terubah");
                header("Refresh:2; url='".site_url('user/profile')."'");
            endif;
        }

	}

	public function prosess_edit_profil_perusahaan(){
 			$kd_costumer = $this->input->post('kd_costumer');
            $no_tlp = $this->input->post('no_tlp');
            $alamat = $this->input->post('alamat');
            
            $data = array(
                'no_tlp' => $no_tlp,
                'alamat' => $alamat
            );
            $kd_costumer = $this->session->userdata('kd_costumer');
			$where = array('kd_costumer' => $kd_costumer);
            if($this->user_model->update_d_cos($data,$where)):
				$this->alert->render("success","Data Telah Terubah");
                header("Refresh:2; url='".site_url('dashboard/costumer')."'");
            else:
				$this->alert->render('warning',"Data Tidak Terubah");
                header("Refresh:2; url='".site_url('dashboard/costumer')."'");
            endif;

	}

	// validasi email sudah digunakan
	public function cekmail(){
		$email = $this->input->post('email');
		$cek = $this->user_model->cek_email($email);
		if ($cek->num_rows() > 0){
			echo 0;
		} else {
			echo 1;
		}
	}
	// validasi email sudah di gunakan costumer
	public function cekmail_ct(){
		$email = $this->input->post('email');
		$cek = $this->user_model->cek_email_ct($email);
		if ($cek->num_rows() > 0){
			echo 0;
		} else {
			echo 1;
		}
	}
	// validasi username sudah digunakan
	public function cekusername(){
		$username = $this->input->post('username');
		$cek = $this->user_model->cek_username($username);
		if ($cek->num_rows() > 0){
			echo 0;
		} else {
			echo 1;
		}
	}
	// validasi username custumer sudah digunakan
	public function cekusername_ct(){
		$username = $this->input->post('username');
		$cek = $this->user_model->cek_username_ct($username);
		if ($cek->num_rows() > 0){
			echo 0;
		} else {
			echo 1;
		}
	}
}
