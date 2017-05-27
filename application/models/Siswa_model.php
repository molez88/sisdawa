<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Siswa_model extends CI_Model {


	public function __construct()
	{
		parent::__construct();
		
	}

	public function getKelas()
	{
		return $this->db->get('kelas');
	}
	public function getThAkademik()
	{
		return $this->db->get('th_akademik');
	}
	public function getAgama()
	{
		return $this->db->get('agama');
	}
	public function getPendidikan()
	{
		return $this->db->get('pendidikan');
	}
	public function getPekerjaan()
	{
		return $this->db->get('pekerjaan');
	}
	public function getPenghasilan()
	{
		return $this->db->get('penghasilan');
	}

	public function simpandatasiswa($data_siswa,$data_ortu,$data_wali)
	{
		$this->db->trans_start();
		$this->db->insert('siswa', $data_siswa);
		$this->db->insert('siswa_ortu', $data_ortu);
		$this->db->insert('siswa_wali', $data_wali);
		$this->db->trans_complete();
	}

	public function editdatasiswa($data_siswa,$data_ortu,$data_wali,$nisn)
	{
		$this->db->trans_start();
		$this->db->where('nisn', $nisn);
		$this->db->update('siswa', $data_siswa);

		$this->db->where('nisn', $nisn);
		$this->db->update('siswa_ortu', $siswa_ortu);

		$this->db->where('nisn', $nisn);
		$this->db->update('siswa_wali', $data_wali);
		$this->db->trans_complete();
	}

	public function getbyid($nisn)
	{
		// return $this->db->get_where('siswa',array('nisn'=>$nisn))->row_array();
		// $this->db->get_where('siswa_ortu',array('nisn'=>$nisn))->row_array();
		// $this->db->get_where('siswa_wali',array('nisn'=>$nisn))->row_array();
		return $this->db->query("SELECT * FROM siswa as s INNER JOIN siswa_ortu as so ON s.nisn = so.nisn INNER JOIN siswa_wali as sw ON s.nisn = sw.nisn WHERE s.nisn = '$nisn'")->row_array();
	}

	public function siswa_hapus($nisn)
	{
		$this->db->trans_start();
		$this->db->where('nisn', $nisn);
		$this->db->delete('siswa');

		$this->db->where('nisn', $nisn);
		$this->db->delete('siswa_ortu');

		$this->db->where('nisn', $nisn);
		$this->db->delete('siswa_wali');
		$this->db->trans_complete();
	}

	public function semuasiswa($kelas)
	{
		if ($kelas) {
			return $this->db->query("SELECT siswa.nisn,siswa.nama_lengkap, siswa.tempat_lahir,siswa.tgl_lahir,siswa.gender,siswa.foto_siswa,siswa.telp, kelas.nm_kelas FROM transaksi_kelas INNER JOIN siswa ON transaksi_kelas.nisn = siswa.nisn INNER JOIN kelas ON transaksi_kelas.id_kelas = kelas.id_kelas WHERE kelas.id_kelas = '$kelas'");
		}else{
			$this->db->select('foto_siswa,nisn, nama_lengkap, tempat_lahir, tgl_lahir, gender, telp');
			return $this->db->get('siswa');
		}
	}

	public function getSiswaDetail($nisn)
	{
		return $this->db->query("SELECT * FROM siswa, agama WHERE siswa.id_agama = agama.id_agama AND siswa.nisn = '$nisn'")->row_array();
	}

	public function getAyahDetail($nisn)
	{
		return $this->db->query("SELECT * FROM siswa_ortu, agama,pekerjaan,pendidikan,penghasilan
														WHERE
														siswa_ortu.nisn = '$nisn' AND
														siswa_ortu.ayah_id_agama = agama.id_agama AND
														siswa_ortu.ayah_id_pendidikan = pendidikan.id_pendidikan AND
														siswa_ortu.ayah_id_pekerjaan = pekerjaan.id_pekerjaan AND
														siswa_ortu.ayah_id_penghasilan = penghasilan.id_penghasilan")->row_array();
	}
	public function getIbuDetail($nisn)
	{
		return $this->db->query("SELECT * FROM siswa_ortu, agama,pekerjaan,pendidikan,penghasilan
														WHERE
														siswa_ortu.nisn = '$nisn' AND
														siswa_ortu.ibu_id_agama = agama.id_agama AND
														siswa_ortu.ibu_id_pendidikan = pendidikan.id_pendidikan AND
														siswa_ortu.ibu_id_pekerjaan = pekerjaan.id_pekerjaan AND
														siswa_ortu.ibu_id_penghasilan = penghasilan.id_penghasilan")->row_array();
	}
	public function getWaliDetail($nisn)
	{
		return $this->db->query("SELECT * FROM siswa_wali, agama,pekerjaan,pendidikan,penghasilan
														WHERE
														siswa_wali.nisn = '$nisn' AND
														siswa_wali.wali_id_agama = agama.id_agama AND
														siswa_wali.wali_id_pendidikan = pendidikan.id_pendidikan AND
														siswa_wali.wali_id_pekerjaan = pekerjaan.id_pekerjaan AND
														siswa_wali.wali_id_penghasilan = penghasilan.id_penghasilan")->row_array();
	}


}

/* End of file Siswa_model.php */
/* Location: ./application/models/Siswa_model.php */