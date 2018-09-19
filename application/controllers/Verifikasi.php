<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Verifikasi extends CI_Controller {
    
    public function __construct()
    {
        parent::__construct();
        // load model verifikasi_model
        $this->load->model(array('verifikasi_model'));
        
    }
    public function index()
    {
		$kd_user = $this->session->userdata('kd_user');
		// $get_data = $this->user_model->tampil_data_lengkap($kd_user);
		$data = array(
			'isi'=> 'verifikasi/verfik',
			'tittle' => 'Verifikasi'
            // 'get_data' => $get_data
		);
        $this->load->view('dashboard/template', $data);
    }
    // cek view passport data sudah ada atau tidak 
    public function cekpassport(){
		$passport = $this->input->post('passport');
		$cek = 	$cek = $this->verifikasi_model->cek_passport($passport);
		if ($cek->num_rows() > 0){
			echo 0;
		} else {
			echo 1;
		}
    }
    // cek view SIM data sudah ada atau tidak 
    public function ceksim(){
		$no_sim = $this->input->post('no_sim');
		$cek = 	$cek = $this->verifikasi_model->cek_sim($no_sim);
		if ($cek->num_rows() > 0){
			echo 0;
		} else {
			echo 1;
		}
    }
    // cek view NIK data sudah ada atau tidak 
    public function ceknik(){
		$nik = $this->input->post('nik');
		$cek = 	$cek = $this->verifikasi_model->cek_nik($nik);
		if ($cek->num_rows() > 0){
			echo 0;
		} else {
			echo 1;
		}
    }
    // memanggil view KTP
    public function ktp(){

        $kd_user = $this->session->userdata('kd_user');
        $NIK = $this->session->userdata('nik');
        $kode_user = array('a.kd_user' => $kd_user,'b.NIK' => $NIK);
        $get_data = $this->verifikasi_model->tampil_ktp($kode_user);
		$data = array(
            'isi'=> 'verifikasi/ktp',
            'get_data' => $get_data,
			'tittle' => 'KTP'
		);
        $this->load->view('dashboard/template', $data);
    }
    // memanggil view SIM
    public function sim(){
        $kd_user = $this->session->userdata('kd_user');
        $no_sim = $this->session->userdata('no_sim');
        $kode_user = array('a.kd_user' => $kd_user,'b.no_sim'=> $no_sim);
        $get_data = $this->verifikasi_model->tampil_sim($kode_user);
        $data = array(
            'isi'=> 'verifikasi/sim',
            'get_data' => $get_data,
            'tittle' => 'SIM'
        );
        $this->load->view('dashboard/template', $data);
    }
    // memanggil view Passport
    public function passport(){
        $kd_user = $this->session->userdata('kd_user');
        $passport = $this->session->userdata('passport');
        $kode_user = array('a.kd_user' => $kd_user,'b.passport'=> $passport);
        $get_data = $this->verifikasi_model->tampil_passport($kode_user);
        $data = array(
            'isi'=> 'verifikasi/passport',
            'get_data' => $get_data,
            'tittle' => 'Passport'
        );
        $this->load->view('dashboard/template', $data);
    }
    // input ktp
    public function prosess_ktp(){
        $config['upload_path'] =  './assets/img';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']     = '2000';
        $config['max_width'] = '2000';
        $config['max_height'] = '2000';
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $field = 'foto';


        if ($this->upload->do_upload($field))
        {
        
        $datas = array('upload_data' => $this->upload->data());
        $foto = ($datas['upload_data']['file_name']);
        $kd_user = $this->session->userdata('kd_user');
        $nik = $this->input->post('nik');
        
        $data = array(
        'kd_user' => $kd_user,
		'nik' => $nik,
		'foto' => $foto
        );
        $data1 = array(
            'nik' => $nik,
            'status' => 'tidak'
        );
        $where = array('kd_user'=>$kd_user);
        if($this->verifikasi_model->insert_ktp($data) && $this->verifikasi_model->update($data1,$where)):
            $this->alert->render("success","Data Telah Tersimpan");
            $this->session->set_userdata('foto', $foto);
            $this->session->set_userdata('nik', $nik);
            header("Refresh:2; url='".site_url('verifikasi')."'");
        else:
            $this->alert->render("warning","Data Tidak Tersimpan");
            header("Refresh:2; url='".site_url('verifikasi')."'");
        endif;
    }
       
    }
    // input SIM
    public function prosess_sim(){
        
        $config['upload_path'] =  './assets/img';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']     = '2000';
        $config['max_width'] = '2000';
        $config['max_height'] = '2000';
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $field = 'foto';


        if ($this->upload->do_upload($field))
        {
        $datas = array('upload_data' => $this->upload->data());
        $foto = ($datas['upload_data']['file_name']);
        $kd_user = $this->session->userdata('kd_user');
        $no_sim = $this->input->post('no_sim');

        $cek_data = $this->verifikasi_model->cek_data();
		$data = array(
            'kd_user' => $kd_user,
			'no_sim' => $no_sim,
            'foto' => $foto
        );
        $data1 = array(
            'no_sim' => $no_sim,
            'status' => 'tidak'
        );
        $where = array('kd_user'=>$kd_user);
            if($this->verifikasi_model->insert_sim($data) && $this->verifikasi_model->update($data1,$where)):
                $this->session->set_userdata('no_sim', $no_sim);
                header("Refresh:2; url='".site_url('verifikasi/sim')."'");
            else:
                header("Refresh:2; url='".site_url('verifikasi/sim')."'");
            endif;
        }
    }
    // input Passport
    public function prosess_passport(){
        $config['upload_path'] =  './assets/img';
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size']     = '2000';
        $config['max_width'] = '2000';
        $config['max_height'] = '2000';
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $field = 'foto';

        if ($this->upload->do_upload($field))
        {
        $datas = array('upload_data' => $this->upload->data());
        $foto = ($datas['upload_data']['file_name']);
        $kd_user = $this->session->userdata('kd_user');
        $passport = $this->input->post('passport');

		$data = array(
            'kd_user' => $kd_user,
			'passport' => $passport,
            'foto' => $foto
		
        );
        $data1 = array(
            'passport' => $passport,
            'status' => 'tidak'
        );
        $where = array('kd_user'=>$kd_user);
            if($this->verifikasi_model->insert_passport($data) && $this->verifikasi_model->update($data1,$where)):
                $this->session->set_userdata('passport', $passport);
                header("Refresh:2; url='".site_url('verifikasi/sim')."'");
            else:
                header("Refresh:2; url='".site_url('verifikasi/sim')."'");
            endif;
        }
    }
}
?>