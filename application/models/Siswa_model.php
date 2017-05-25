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

	public function findbykelas($kelas)
	{
		return $this->db->query("SELECT siswa.nisn,siswa.nama_lengkap, siswa.tempat_lahir,siswa.tgl_lahir,siswa.gender,siswa.foto_siswa,siswa.telp, kelas.nm_kelas FROM transaksi_kelas INNER JOIN siswa ON transaksi_kelas.nisn = siswa.nisn INNER JOIN kelas ON transaksi_kelas.id_kelas = kelas.id_kelas WHERE kelas.id_kelas = '$kelas'");
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

}

/* End of file Siswa_model.php */
/* Location: ./application/models/Siswa_model.php */