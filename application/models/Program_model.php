<?php
  class Program_model extends CI_Model {

    public function tampil_data($where = array()){
        $query = $this->db->where($where)->get('tb_program');
        $data = array(
            'rows' => $query->result(),
            'total' => $query->num_rows()
        );
        return $data;
    }
      public function tampil_data_submit($where = array()){
        $query = $this->db->where($where)->get('tb_program_submit');
        $data = array(
            'rows' => $query->result(),
            'total' => $query->num_rows()
        );
        return $data;
    }
    public function tampil_data_target($where = array()){
        $query = $this->db->where($where)->get('tb_target');
        $data = array(
            'rows' => $query->result(),
            'total' => $query->num_rows()
        );
        return $data;
    }
    public function tampil_data_informasi_target($where = array()){
        $query = $this->db->where($where)->get('tb_program');
        $data = array(
            'rows' => $query->result(),
            'total' => $query->num_rows()
        );
        return $data;
    }
    public function tampil_submit($where = array()){
        $query = $this->db->where($where)->join('tb_program b','b.kd_program = a.kd_program')->join('tb_user c','c.kd_user = a.kd_user')->get('tb_program_submit a');
        $data = array(
            'rows' => $query->result(),
            'total' => $query->num_rows()
        );
        return $data;
    }
    public function tampil_submit_detail($where = array()){
        $query = $this->db->where($where)->join('tb_program b','b.kd_program = a.kd_program')->join('tb_user c','c.kd_user = a.kd_user')->join('tb_d_user d','d.kd_user = a.kd_user')->get('tb_program_submit a');
        $data = array(
            'rows' => $query->result(),
            'total' => $query->num_rows()
        );
        return $data;
    }
    public function tampil_data_detail($where = array()){
        $query = $this->db->where($where)->join('tb_costumer b','b.kd_costumer = a.kd_costumer')->get('tb_program a');
        $data = array(
            'rows' => $query->result(),
            'total' => $query->num_rows()
        );
        return $data;
    }
    public function tampil_data_active_tidak(){
        $query = $this->db->where('status','ya')->or_where('status','tidak')->join('tb_costumer b','b.kd_costumer = a.kd_costumer')->get('tb_program a');
        $data = array(
            'rows' => $query->result(),
            'total' => $query->num_rows()
        );
        return $data;
    }
    public function insert($data){
        return $this->db->insert('tb_program',$data);
    }
    public function insert_target($data){
        return $this->db->insert_batch('tb_target',$data);
    }
    public function program_submit($data){
        return $this->db->insert('tb_program_submit',$data);
    }
    function update_program($data,$where = array()){
		return $this->db->where($where)->update('tb_program_submit',$data);
    }
    function update($data,$where = array()){
		return $this->db->where($where)->update('tb_program',$data);
    }
    function delete($where = array()){
		return $this->db->where($where)->delete('tb_program');
	}
  }
?>
