<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function __construct()
	{
		parent::__construct();
		
		$this->load->model(array('user_model','program_model'));
		
	}
	public function index(){
		if (!isset($this->session->userdata['kd_user'])) {
            redirect('user/sign_in','refresh');
			}
		$kd_user = $this->session->userdata('kd_user');
		$where = array('a.kd_user' => $kd_user);
		$get_data = $this->user_model->tampil_data_lengkap($kd_user);
		$get_data_submit = $this->program_model->tampil_submit($where);
		$data = array(
			'tittle' => 'Dashboard',
			'isi' => 'index_dashboard',
			'get_data' => $get_data,
			'get_data_submit' => $get_data_submit
		);
		$this->load->view('dashboard/template',$data);
	}

		// leaderboard bagan di researcher
	public function leader(){
		if (!isset($this->session->userdata['kd_costumer'])) {
            redirect('user/sign_in','refresh');
			}
		$where = array('hak'=>'Researcher');
        $get_data = $this->user_model->leaderboard($where);
        $data = array(
            'get_data' => $get_data,
            'tittle' => 'LeaderBoards'
        );
        $this->load->view('dashboard/perusahaan/leaderboard', $data);
	}

		public function profile(){
		if (!isset($this->session->userdata['kd_costumer'])) {
            redirect('user/sign_in_costumer','refresh');
			}

		$kd_costumer = $this->session->userdata('kd_costumer');
		$get_data = $this->user_model->tampil_data_perusahaan_lengkap($kd_costumer);
		$data = array(
			'tittle' => 'Profil perusahaan',
            'get_data' => $get_data,
		);
		$this->load->view('dashboard/perusahaan/profil_perusahaan', $data);
	}


	public function costumer(){
		if (!isset($this->session->userdata['kd_costumer'])) {
            redirect('user/sign_in_costumer','refresh');
			}
		$kd_user = $this->session->userdata('kd_costumer');
		$where = array('kd_costumer' => $kd_user);
		$get_data = $this->program_model->tampil_data($where);
		$data = array(
			'tittle' => 'Dashboard',
			'get_data' => $get_data,
			'isi' => 'dashboard/perusahaan/index'
		);
		$this->load->view('dashboard/perusahaan/template',$data);
	}
	public function lakukan_download(){	
		$url = $this->uri->segment(3);			
		force_download('assets/attachment/'.$url,NULL);
	}	
	public function daftar_submit(){
		if (!isset($this->session->userdata['kd_costumer'])) {
            redirect('user/sign_in_costumer','refresh');
			}
		$kd_user = $this->session->userdata('kd_costumer');
		$kd_program = $this->uri->segment(3);

		$sess_data['ses_program'] = $kd_program;
		$this->session->set_userdata($sess_data);

		$where = array('a.kd_program' => $kd_program);
		$get_submit = $this->program_model->tampil_submit($where);
		$wherea = array('kd_costumer' => $kd_user);
		$get_data = $this->program_model->tampil_data($wherea);
		$data = array(
			'get_data' => $get_data,
			'get_submit' => $get_submit,
			'isi' => 'dashboard/perusahaan/all_submit'
		);
		$this->load->view('dashboard/perusahaan/template',$data);
	}
	public function detail_daftar_submit(){
		if (!isset($this->session->userdata['kd_costumer'])) {
            redirect('user/sign_in_costumer','refresh');
			}
			$kd_costumer = $this->session->userdata('kd_costumer');
			$kd_user = $this->uri->segment(3);
			$kd_program = $this->session->userdata('ses_program');

			$where = array(
				'a.kd_user' => $kd_user,
				'b.kd_program' => $kd_program
			);
			$get_submit = $this->program_model->tampil_submit($where);

			$wherea = array('kd_program' => $kd_program);
			$get_data = $this->program_model->tampil_data($wherea);
			$data = array(
				'get_data' => $get_data,
				'get_submit' => $get_submit,
				'isi' => 'dashboard/perusahaan/detail_all_submit'
			);
			$this->load->view('dashboard/perusahaan/template',$data);
	}
	public function logout_cos(){
        $this->session->sess_destroy();
        redirect('User/sign_in_costumer','refresh');
    }
	public function logout(){
        $this->session->sess_destroy();
        redirect('User','refresh');
    }
}
