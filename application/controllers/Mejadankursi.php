<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mejadankursi extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
		$this->load->helper('captcha');
		$this->load->model(array('program_model','user_model','verifikasi_model'));
    }
    public function index()
    {
		if (!isset($this->session->userdata['kd_user'])=='USR001') {
            redirect('mejadankursi/sign_in','refresh');
			}
		$get_data = $this->program_model->tampil_data_active_tidak();
		$where = array('baca' => 'belum');
		$belum_baca = $this->program_model->tampil_data_detail($where);
		$belum_baca_u = $this->user_model->tampil_data_user($where);
        $data = array(
			'tittle' => 'Dashboard',
			'get_data' => $get_data,
			'belum_baca' => $belum_baca,
			'belum_baca_u' => $belum_baca_u,
			'isi' => 'program/data_program'
		);
		$this->load->view('dashboard/admin/template',$data);
	}
	public function daftar_submit(){
		if (!isset($this->session->userdata['kd_user'])=='USR001') {
            redirect('mejadankursi/sign_in','refresh');
			}
		$get_submit = $this->program_model->tampil_submit();
		$where = array('baca' => 'belum');
		$belum_baca = $this->program_model->tampil_data_detail($where);
		$belum_baca_u = $this->user_model->tampil_data_user($where);
		$data = array(
			'tittle' => 'Daftar Researcher Submit Report',
			'get_submit' => $get_submit,
			'belum_baca' => $belum_baca,
			'belum_baca_u' => $belum_baca_u,
			'isi' => 'dashboard/admin/all_submit'
		);
		$this->load->view('dashboard/admin/template',$data);
	}

	public function lihat_laporan(){
		if (!isset($this->session->userdata['kd_user'])=='USR001') {
            redirect('mejadankursi/sign_in','refresh');
			}
			
		$kd_program =  $this->input->get('kd_program', FALSE);
		$kd_user =  $this->input->get('kd_user', FALSE);
		$where = array(
			'a.kd_user' => $kd_user,
			'b.kd_program' => $kd_program,
		);
		$data = $this->program_model->tampil_submit_detail($where);
		$this->load->view('dashboard/admin/detail_all_submit', $data);	
	}


	public function data_user(){
		if (!isset($this->session->userdata['kd_user'])=='USR001') {
            redirect('mejadankursi/sign_in','refresh');
			}
		$hak = array('hak'=>'Researcher');
		$get_data = $this->user_model->tampil_data_user($hak);
		$where = array('baca' => 'belum');
		$belum_baca = $this->program_model->tampil_data_detail($where);
		$belum_baca_u = $this->user_model->tampil_data_user($where);
        $data = array(
			'tittle' => 'Data Researcher',
			'get_data' => $get_data,
			'belum_baca' => $belum_baca,
			'belum_baca_u' => $belum_baca_u,
			// 'isi' => 'dashboard/admin/index',
			'isi' => 'profile/data_user'
		);
		$this->load->view('dashboard/admin/template',$data);
	}
	public function prosess_sign_in(){
		$this->form_validation->set_rules('username', 'username', 'required|trim|xss_clean');
		$this->form_validation->set_rules('password', 'password', 'required|trim|xss_clean');
		//$this->form_validation->set_rules('captcha', 'captcha', 'required|trim|xss_clean|callback_matching_captcha');
		if ($this->form_validation->run() == FALSE) {
			/*$this->load->helper('captcha');
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
			$this->load->view('adminn/login');
		} else {
		$usr = $this->input->post('username');
		$psw = $this->input->post('password');

		$cek = $this->user_model->cek($usr,$psw);
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
				if($this->session->userdata['hak']=='Admin'){
					redirect('mejadankursi','refresh');
				}
				else{
				 	echo "GGAL";
					redirect('mejadankursi/sign_in','refresh');
				}
			}else{
				$this->session->set_flashdata('result_login', 'Username atau Password yang anda masukan salah!');
				redirect('mejadankursi/sign_in','refresh');
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
	public function detail_user(){
		if (!isset($this->session->userdata['kd_user'])=='USR001') {
            redirect('mejadankursi/sign_in','refresh');
			}
		$kd_user =  $this->uri->segment(3);
		$where = array('a.kd_user' => $kd_user);
		$baca = array('baca' => 'belum');
		$belum_baca = $this->program_model->tampil_data_detail($baca);
		$belum_baca_u = $this->user_model->tampil_data_user($baca);
		$get_data = $this->user_model->tampil_data_user($where);
		$data = array(
			'tittle' => $kd_user,
			'get_data' => $get_data,
			'belum_baca' => $belum_baca,
			'belum_baca_u' => $belum_baca_u,
			'isi' => 'profile/detail_user'
		);
		$this->load->view('dashboard/admin/template',$data);
	}
	public function detail_ktp(){
		if (!isset($this->session->userdata['kd_user'])=='USR001') {
            redirect('mejadankursi/sign_in','refresh');
			}
		$nik =  $this->uri->segment(3);
		$where = array('c.NIK' => $nik);
		$baca = array('baca' => 'belum');
		$belum_baca = $this->program_model->tampil_data_detail($baca);
		$belum_baca_u = $this->user_model->tampil_data_user($baca);
		$get_data = $this->user_model->tampil_data_ktp($where);
		$data = array(
			'tittle' => $nik,
			'get_data' => $get_data,
			'belum_baca' => $belum_baca,
			'belum_baca_u' => $belum_baca_u,
			'isi' => 'verifikasi/detail_ktp'
		);
		$this->load->view('dashboard/admin/template',$data);
	}
	public function detail_sim(){
		if (!isset($this->session->userdata['kd_user'])=='USR001') {
            redirect('mejadankursi/sign_in','refresh');
			}
		$no_sim =  $this->uri->segment(3);
		$where = array('c.no_sim' => $no_sim);
		$baca = array('baca' => 'belum');
		$belum_baca = $this->program_model->tampil_data_detail($baca);
		$belum_baca_u = $this->user_model->tampil_data_user($baca);
		$get_data = $this->user_model->tampil_data_sim($where);
		$data = array(
			'tittle' => $no_sim,
			'get_data' => $get_data,
			'belum_baca' => $belum_baca,
			'belum_baca_u' => $belum_baca_u,
			'isi' => 'verifikasi/detail_sim'
		);
		$this->load->view('dashboard/admin/template',$data);
	}
	public function detail_passport(){
		if (!isset($this->session->userdata['kd_user'])=='USR001') {
            redirect('mejadankursi/sign_in','refresh');
			}
		$passport =  $this->uri->segment(3);
		$where = array('c.passport' => $passport);
		$baca = array('baca' => 'belum');
		$belum_baca = $this->program_model->tampil_data_detail($baca);
		$belum_baca_u = $this->user_model->tampil_data_user($baca);
		$get_data = $this->user_model->tampil_data_passport($where);
		$data = array(
			'tittle' => $passport,
			'get_data' => $get_data,
			'belum_baca' => $belum_baca,
			'belum_baca_u' => $belum_baca_u,
			'isi' => 'verifikasi/detail_passport'
		);
		$this->load->view('dashboard/admin/template',$data);
	}
	public function prosess_tambah_score(){
        $kd_user = $this->input->post('kd_user');
        $score = $this->input->post('score');
        $data = array(
            'score' => $score
        );
        $where = array('kd_user' => $kd_user);
        $this->user_model->update_user($data,$where);
	}
	public function proses_terima_report(){
        $kd_user = $this->input->post('kd_user');
        $status = $this->input->post('status');
        $data = array(
            'status_terima' => $status
        );
        $where = array('kd_user' => $kd_user);
        $this->program_model->update_program($data,$where);
	}

	public function prosess_edit_status(){
		if (!isset($this->session->userdata['kd_user'])=='USR001') {
            redirect('mejadankursi/sign_in','refresh');
			}
        $kd_program = $this->input->post('kd_program');
        $status = $this->input->post('status');
        $data = array(
            'status' => $status
        );
        $where = array('kd_program' => $kd_program);
        if($this->program_model->update($data,$where)):
            // $tipe = 'U'; $aksi = "Update Status ".$active;
			// $this->log_helper->insert_log($tipe,$aksi);
            // header("Refresh:2; url='".site_url('asset')."'");
            // $this->alert->render("success","Status Telah Terubah");
        else:
            // $this->alert->render('warning',"Status Tidak Terubah");
        endif;
	}

	public function proses_konfirmasi_laporan(){
		if (!isset($this->session->userdata['kd_user'])=='USR001') {
            redirect('mejadankursi/sign_in','refresh');
			}
        $kd_program = $this->input->post('kd_program');
        $konfirmasi = $this->input->post('konfirmasi');
        $data = array(
            'konfirmasi' => $konfirmasi
        );
        $where = array('kd_program' => $kd_program);
        $this->program_model->update_program($data,$where);
      	}



	public function prosess_edit_status_user(){
        $kd_user = $this->input->post('kd_user');
        $status = $this->input->post('status');
        $data = array(
            'status' => $status
        );
        $where = array('kd_user' => $kd_user);
        if($this->verifikasi_model->update($data,$where)):
            // $tipe = 'U'; $aksi = "Update Status ".$active;
			// $this->log_helper->insert_log($tipe,$aksi);
            // header("Refresh:2; url='".site_url('asset')."'");
            // $this->alert->render("success","Status Telah Terubah");
        else:
            // $this->alert->render('warning',"Status Tidak Terubah");
        endif;
	}
	public function prosess_tolak_status(){
        $kd_program = $this->input->post('kd_program');
        $data = array(
            'status' => 'tolak'
        );
        $where = array('kd_program' => $kd_program);
        if($this->program_model->update($data,$where)):
            // $tipe = 'U'; $aksi = "Update Status ".$active;
			// $this->log_helper->insert_log($tipe,$aksi);
            // header("Refresh:2; url='".site_url('asset')."'");
            // $this->alert->render("success","Status Telah Terubah");
        else:
            // $this->alert->render('warning',"Status Tidak Terubah");
        endif;
	}
	public function baca_belum(){
        $kd_program = $this->input->post('kd_program');
        $baca = $this->input->post('baca');
        $data = array(
            'baca' => 'sudah'
        );
        $where = array('kd_program' => $kd_program);
        if($this->program_model->update($data,$where)):
          
		else:
			
        endif;
	}
	public function baca_belum_u(){
        $kd_user = $this->input->post('kd_user');
        $baca = $this->input->post('baca');
        $data = array(
            'baca' => 'sudah'
        );
        $where = array('kd_user' => $kd_user);
        if($this->user_model->update_user($data,$where)):
          
		else:
			
        endif;
	}
	public function detail(){
		$kd_program =  $this->uri->segment(3);
		$where = array('kd_program' => $kd_program);
		$baca = array('baca' => 'belum');
		$belum_baca = $this->program_model->tampil_data_detail($baca);
		$belum_baca_u = $this->user_model->tampil_data_user($baca);
		$get_data = $this->program_model->tampil_data_detail($where);
		$get_target = $this->program_model->tampil_data_target($where);
		$data = array(
			'tittle' => $kd_program,
			'get_data' => $get_data,
			'get_target' => $get_target,
			'belum_baca' => $belum_baca,
			'belum_baca_u' => $belum_baca_u,
			'isi' => 'program/detail_program'
		);
		$this->load->view('dashboard/admin/template',$data);
	}
    public function sign_in(){
		if($this->session->userdata('kd_user')=='USR001'){
            redirect('mejadankursi','refresh');
		}
		$this->load->view('adminn/login');
	}
	public function logout(){
        $this->session->sess_destroy();
        redirect('mejadankursi/sign_in','refresh');
    }

}

?>
