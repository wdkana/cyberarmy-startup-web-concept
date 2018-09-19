<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Program extends CI_Controller {

    
    public function __construct()
    {
        parent::__construct();
        $this->load->model('program_model');
        $this->load->library(array('cart','image_lib'));
    }
    public function index(){
        $where = array('status' => 'ya');
        $get_data = $this->program_model->tampil_data($where);
        $data = array(
            'isi' => 'program/program_all',
            'get_data' => $get_data,
            'tittle' => 'Program'
        );   
        $this->load->view('dashboard/template', $data);
    }
    public function program_da(){
        if (!isset($this->session->userdata['kd_user'])) {
            redirect('user/sign_in','refresh');
			}
        $kd_program =  $this->uri->segment(3);
        $kd_user = $this->session->userdata('kd_user');
        $where = array('kd_program' => $kd_program);
        $where_kode = array('a.kd_program' => $kd_program);
        $kode_user = array('a.kd_user' => $kd_user,'b.kd_program' => $kd_program,'a.status_terima'=>'tidak');
        $get_data = $this->program_model->tampil_data($where);
        $get_target = $this->program_model->tampil_data_target($where);
        $get_submit = $this->program_model->tampil_submit($kode_user);
        $get_submit_photo = $this->program_model->tampil_submit_detail($where_kode);
        $data = array(
            'isi' => 'program/index',
            'get_data' => $get_data,
            'get_target' => $get_target,
            'get_submit' => $get_submit,
            'get_submit_photo' => $get_submit_photo
        );   
        $this->load->view('dashboard/template', $data);
    }
    public function program_submit(){
        if (!isset($this->session->userdata['kd_user'])) {
            redirect('user/sign_in','refresh');
			}
        $kd_program =  $this->uri->segment(3);
        $ses_data['kd_program'] = $kd_program;
        $this->session->set_userdata($ses_data);

        $where = array('kd_program' => $kd_program);
        $get_data = $this->program_model->tampil_data($where);
        $get_target = $this->program_model->tampil_data_informasi_target($where);
        $data = array(
            'isi' => 'program/prosess_program_detail',
            'tittle' => 'Program Report',
            'get_data' => $get_data,
            'get_target' => $get_target
        );   
        $this->load->view('dashboard/template', $data);
    }
    public function detail_program(){
        if (!isset($this->session->userdata['kd_costumer'])) {
            redirect('user/sign_in_costumer','refresh');
			}
        $kd_user = $this->session->userdata('kd_costumer');
		$kd_program =  $this->uri->segment(3);
        $where = array('kd_program' => $kd_program);
        $where1 = array('kd_costumer' => $kd_user);
		$get_data = $this->program_model->tampil_data($where1);
        $get_program = $this->program_model->tampil_data_detail($where);
        $get_target = $this->program_model->tampil_data_target($where);
		$data = array(
			'tittle' => $kd_program,
			'get_data' => $get_data,
			'get_program' => $get_program,
			'get_target' => $get_target,
			'isi' => 'program/detail_program_ct'
		);
		$this->load->view('dashboard/perusahaan/template',$data);
    }

     public function program_submit_report(){
        if (!isset($this->session->userdata['kd_user'])) {
            redirect('user/sign_in','refresh');
            }
        $kd_program =  $this->uri->segment(3);
        $where = array('kd_program' => $kd_program);
        $get_data = $this->program_model->tampil_data($where);
        $get_target = $this->program_model->tampil_data_target($where);
        $data = array(
            'isi' => 'program/prosess_program_detail',
            'tittle' => 'Program Report',
            'get_data' => $get_data,
            'get_target' => $get_target
        );   
        $this->load->view('dashboard/template', $data);
    }
    public function detail_program_report(){
        if (!isset($this->session->userdata['kd_costumer'])) {
            redirect('user/sign_in_costumer','refresh');
            }
        $kd_user = $this->session->userdata('kd_costumer');
        $kd_program =  $this->uri->segment(3);
        $where = array('kd_program' => $kd_program);
        $where1 = array('kd_costumer' => $kd_user);
        $get_data = $this->program_model->tampil_data($where1);
        $get_program = $this->program_model->tampil_data_detail($where);
        $get_target = $this->program_model->tampil_data_target($where);
        $data = array(
            'tittle' => $kd_program,
            'get_data' => $get_data,
            'get_program' => $get_program,
            'get_target' => $get_target,
            'isi' => 'program/detail_program_ct'
        );
        $this->load->view('dashboard/perusahaan/template',$data);
    }

    public function edit_program(){
        if (!isset($this->session->userdata['kd_costumer'])) {
            redirect('user/sign_in_costumer','refresh');
			}
        $kd_user = $this->session->userdata('kd_costumer');
		$kd_program =  $this->uri->segment(3);
        $where = array('kd_program' => $kd_program);
        $where1 = array('kd_costumer' => $kd_user);
		$get_data = $this->program_model->tampil_data($where1);
		$get_program = $this->program_model->tampil_data_detail($where);
		$data = array(
			'tittle' => $kd_program,
			'get_data' => $get_data,
			'get_program' => $get_program,
			'isi' => 'program/edit_program'
		);
		$this->load->view('dashboard/perusahaan/template',$data);
    }
    public function prosess_komentar(){
        $kd_program = $this->input->post('kd_program');
        $kd_user = $this->input->post('kd_user');
        $data = array(
            'status_terima' => 'iya'
        );
        $where = array('kd_program'=> $kd_program,'kd_user'=>$kd_user);
        if($this->program_model->update_program($data,$where)):
            header("Refresh:2; url='".site_url('dashboard/costumer')."'");
            $this->alert->render("success","Data Telah Diterima");
        else:
            $this->alert->render('warning',"Data Telah Diterima");
        endif;
    }
    public function prosess_edit(){
        $kd_program = $this->input->post('kd_program');
        $nama_aplikasi = $this->input->post('nama_aplikasi');
        $nama_organisasi = $this->input->post('nama_organisasi');
        $deskripsi = $this->input->post('deskripsi');
        $informasi_target = $this->input->post('informasi_target');
        $data = array(
            'kd_program' => $kd_program,
            'nama_aplikasi' => $nama_aplikasi,
            'nama_organisasi' => $nama_organisasi,
            'deskripsi' => $deskripsi,
            'informasi_target' => $informasi_target,
            'status' => 'ya',
            'baca' => 'belum'
        );
        $where = array('kd_program' => $kd_program);
        if($this->program_model->update($data,$where)):
            header("Refresh:2; url='".site_url('dashboard/costumer')."'");
            $this->alert->render("success","Data Telah Terubah");
        else:
            $this->alert->render('warning',"Data Tidak Terubah");
        endif;
    }
    public function program_new(){
        if (!isset($this->session->userdata['kd_costumer'])) {
            redirect('user/sign_in_costumer','refresh');
			}
        $kd_user = $this->session->userdata('kd_costumer');
		$where = array('kd_costumer' => $kd_user);
		$get_data = $this->program_model->tampil_data($where);
        $data = array(
            'isi' => 'program/prosess_program',
            'tittle' => 'Program Baru',
            'get_data' => $get_data
        );
        $this->load->view('dashboard/perusahaan/template',$data);
    }
    public function prosess_tambah(){
        $config['upload_path'] =  './assets/img';
        $config['allowed_types'] = 'svg|jpg|png';
        $config['max_size']     = '2000';
        $config['max_width'] = '1024';
        $config['max_height'] = '1024';
        $new_name = 'foto'.time();
        $config['file_name'] = $new_name;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $field = 'foto';

            $gbr = $this->upload->data();
            $config['image_library']='gd2';
            $config['source_image']='./assets/img/'.$gbr['file_name'];
            $config['create_thumb']= TRUE;
            $config['maintain_ratio']= TRUE;
            $config['quality']= '100%';
            $config['width']= '200%';
            $config['height']= 256;
            $config['new_image']= './assets/images/'.$gbr['file_name'];
            $this->load->library('image_lib', $config);
            $this->image_lib->resize();
            $gambar=$gbr['file_name'];
            $kd_program = $this->app_library->get_kode("tb_program");
            $nama_organisasi = $this->input->post('nama_organisasi');
            $deskripsi = $this->input->post('deskripsi');
            $deskripsi_singkat = $this->input->post('deskripsi_singkat');
            $informasi_target = $this->input->post('informasi_target');
            $nama_aplikasi = $this->input->post('nama_aplikasi');
            $kd_costumer = $this->session->userdata('kd_costumer');
            $data = array(
                'kd_program' => $kd_program,
                'nama_organisasi' => $nama_organisasi,
                'nama_aplikasi' => $nama_aplikasi,
                'deskripsi' => $deskripsi,
                'deskripsi_singkat' => $deskripsi_singkat,
                'informasi_target' => $informasi_target,
                'foto'     => $gambar,
                'kd_costumer' => $kd_costumer,
                'status'   => 'tidak',
                'baca' => 'belum'
            );

            if($this->program_model->insert($data)):
                // $tipe = 'I'; $aksi = "Tambah User ".$nama_lengkap;
                // $this->log_helper->insert_log($tipe,$aksi);
                header("Refresh:2; url='".site_url('dashboard/costumer')."'");
                $this->alert->render("success","Data Telah Tersimpan");
            else:
                $this->alert->render("warning","Data Tidak Tersimpan");
            endif;
    }

    public function submit_program(){
        $config['upload_path'] =  './assets/attachment';
        $config['allowed_types'] = 'pdf';
        $config['max_size']     = '50000';
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        $field = 'attachment';
         if (!$this->upload->do_upload($field))
        {
            $error = array('error' => $this->upload->display_errors());
            $kd_program =  $this->session->userdata('kd_program');
            header("Refresh:2; url='program_submit/$kd_program'");
            $this->alert->render("warning", "Upload Bukti Laporan berupa PDF");



        }else{
            $data = array('upload_data' => $this->upload->data());
            $attachment = ($data['upload_data']['file_name']);

            $kd_program = $this->input->post('kd_program');
            $kd_user = $this->session->userdata('kd_user');
            $info = $this->input->post('info');
            $target = $this->input->post('target');
            $keparahan = $this->input->post('keparahan');
            $URL = $this->input->post('url');
            $Deskripsi = $this->input->post('deskripsi');
            $permintaan_http = $this->input->post('permintaan_http');
            $data = array(
                'kd_program' => $kd_program,
                'kd_user' => $kd_user,
                'info' => $info,
                'target' => $target,
                'keparahan' => $keparahan,
                'url' => $URL,
                'deskripsi' => $Deskripsi,
                'permintaan_http' => $permintaan_http,
                'attachment' => $attachment,
                'komentar' => '',
                'status_terima' => 'tidak',
                'konfirmasi' => 'tidak'
            );
            if($this->program_model->program_submit($data)){
                $this->alert->render("success","Data Telah Tersimpan");
                header("Refresh:2; url='".site_url('program')."'");
            }else{
                $this->alert->render("warning","Data Tidak Tersimpan");
            }
        }
        
    }
    public function delete(){
        $kd_program = $this->input->post('kd_program');
        $where = array("kd_program"=>$kd_program);
        if($this->program_model->delete($where)):
            print_r("success");
        else:
            print_r("error");
        endif;
    }
}