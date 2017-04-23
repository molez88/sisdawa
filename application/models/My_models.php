<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class My_models extends CI_Model {

	// agama model
	function selectAgama()
	{
		return $this->db->query('SELECT * FROM tbl_agama');
	}

	function addAgama(){
		$data = array('agama' => $this->input->post('agama') );
    return $this->db->insert('tbl_agama',$data);
  }
  function get_agama_id($id){
  	$this->db->from('tbl_agama');
		$this->db->where('id',$id);
		$query = $this->db->get();

		return $query->row();
  }

  // provinsi model
	function selectProvinsi()
	{
		return $this->db->query('SELECT tbl_provinsi.provinsi_id, tbl_provinsi.provinsi, tbl_kabupaten.kabupaten_id, tbl_kabupaten.kabupaten FROM tbl_kabupaten LEFT JOIN tbl_provinsi ON tbl_kabupaten.provinsi_id = tbl_provinsi.provinsi_id ORDER BY tbl_provinsi.provinsi');
	}

	// kelas model
	function selectKelas()
	{
		return $this->db->query('SELECT * FROM tbl_kelas');
	}

	function addKelas($data){
		$this->db->insert('tbl_kelas', $data);
		return $this->db->insert_id();
	}

}

/* End of file My_models.php */
/* Location: ./application/models/My_models.php */