<?php
  class Verifikasi_model extends CI_Model {
 
    public function tampil_data($where = array()){
        $query = $this->db->where($where)->get('tb_ktp');
        $data = array(
            'rows' => $query->result(),
            'total' => $query->num_rows()
        );
        return $data;
    }
    public function tampil_data_verifikasi($where = array()){
        $query = $this->db->where($where)->get('tb_verifikasi');
        $data = array(
            'rows' => $query->result(),
            'total' => $query->num_rows()
        );
        return $data;
    }
    public function cek_data($where=array()){
        $query = $this->db->where($where);
        return $this->db->get('tb_verifikasi');
    }
    public function tampil_ktp($where=array()){
        $query = $this->db->where($where)->join('tb_ktp b','b.nik = a.nik')->get('tb_verifikasi a');
        $data = array(
            'rows' => $query->result(),
            'total' => $query->num_rows()
        );
        return $data;
    }
    public function tampil_sim($where=array()){
        $query = $this->db->where($where)->join('tb_sim b','b.no_sim = a.no_sim')->get('tb_verifikasi a');
        $data = array(
            'rows' => $query->result(),
            'total' => $query->num_rows()
        );
        return $data;
    }
    public function tampil_passport($where=array()){
        $query = $this->db->where($where)->join('tb_passport b','b.passport = a.passport')->get('tb_verifikasi a');
        $data = array(
            'rows' => $query->result(),
            'total' => $query->num_rows()
        );
        return $data;
    }
    public function cek_sim($no_sim){
        $query = $this->db->where("no_sim",$no_sim);
        return $this->db->get('tb_sim');
    }
    public function cek_nik($nik){
        $query = $this->db->where("nik",$nik);
        return $this->db->get('tb_ktp');
    }
    public function cek_passport($nik){
        $query = $this->db->where("passport",$passport);
        return $this->db->get('tb_passport');
    }
    function insert_ktp($data){
        return $this->db->insert('tb_ktp', $data);
    }
    function insert_passport($data){
        return $this->db->insert('tb_passport', $data);
    }
    function insert_sim($data){
        return $this->db->insert('tb_sim', $data);
    }
    function insert($data){
        return $this->db->insert('tb_verifikasi', $data);
    }
	function update($data,$where = array()){
		return $this->db->where($where)->update('tb_verifikasi',$data);
	}

  }
  ?>