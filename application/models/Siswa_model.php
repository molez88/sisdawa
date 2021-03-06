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
		// $this->db->insert('siswa', $data_siswa);

		// $data_ortu['siswa_id'] = $this->db->insert_id();
		// $this->db->insert('siswa_ortu', $data_ortu);

		// $data_wali['siswa_id'] = $this->db->insert_id();
		// $this->db->insert('siswa_wali', $data_wali);
	}

	public function editdatasiswa($data_siswa,$data_ortu,$data_wali,$nis)
	{
		$nis = $this->input->post('nis');
		$this->db->trans_start();
		$this->db->where('nis', $nis);
		$this->db->update('siswa', $data_siswa);

		$this->db->where('nis', $nis);
		$this->db->update('siswa_ortu', $data_ortu);

		$this->db->where('nis', $nis);
		$this->db->update('siswa_wali', $data_wali);
		$this->db->trans_complete();
	}

	public function getbynis($nis)
	{
		// return $this->db->get_where('siswa',array('nis'=>$nis))->row_array();
		// $this->db->get_where('siswa_ortu',array('nis'=>$nis))->row_array();
		// $this->db->get_where('siswa_wali',array('nis'=>$nis))->row_array();
		return $this->db->query("SELECT * FROM siswa as s INNER JOIN siswa_ortu as so ON s.nis = so.nis INNER JOIN siswa_wali as sw ON s.nis = sw.nis WHERE s.nis = '$nis'")->row_array();
	}

	public function siswa_hapus($nis)
	{
		$this->db->trans_start();
		$this->db->where('nis', $nis);
		$this->db->delete('siswa');

		$this->db->where('nis', $nis);
		$this->db->delete('siswa_ortu');

		$this->db->where('nis', $nis);
		$this->db->delete('siswa_wali');

		$this->db->where('nis', $nis);
		$this->db->delete('transaksi_kelas');
		$this->db->trans_complete();
	}

	public function semuasiswa($kelas, $thn_akademik)
	{
		if ($kelas && $thn_akademik) {
			return $this->db->query("SELECT siswa.nis,siswa.nama_lengkap, siswa.tempat_lahir,siswa.tgl_lahir,siswa.gender,siswa.foto_siswa,siswa.alamat, kelas.nm_kelas, th_akademik.th_ajaran FROM transaksi_kelas INNER JOIN siswa ON transaksi_kelas.nis = siswa.nis INNER JOIN kelas ON transaksi_kelas.id_kelas = kelas.id_kelas INNER JOIN th_akademik ON transaksi_kelas.id_th_akademik = th_akademik.id_th_akademik WHERE kelas.id_kelas = '$kelas' AND th_akademik.id_th_akademik= '$thn_akademik' ORDER BY siswa.tgl DESC");

			// $this->db->select('nis, nama_lengkap, tempat_lahir, tgl_lahir, gender, foto_siswa, alamat, wali_nama');
			// $this->db->from('siswa');
			// $this->db->join('siswa_wali', 'siswa_wali.nis = siswa.nis', 'left');
			// return $this->db->get();
		}else{
			// return $this->db->query("SELECT siswa.nis,siswa.nama_lengkap, siswa.tempat_lahir,siswa.tgl_lahir,siswa.gender,siswa.foto_siswa,siswa.telp, kelas.nm_kelas, th_akademik.th_ajaran FROM transaksi_kelas INNER JOIN siswa ON transaksi_kelas.nis = siswa.nis INNER JOIN kelas ON transaksi_kelas.id_kelas = kelas.id_kelas INNER JOIN th_akademik ON transaksi_kelas.id_th_akademik = th_akademik.id_th_akademik");
			return $this->db->query("SELECT foto_siswa, nis, nama_lengkap, gender, tempat_lahir, tgl_lahir, alamat FROM siswa ORDER BY tgl DESC");
		}
	}

	public function getSiswaDetail($nis)
	{
		return $this->db->query("SELECT * FROM siswa, agama WHERE siswa.id_agama = agama.id_agama AND siswa.nis = '$nis' LIMIT 1")->row_array();
	}

	public function getAyahDetail($nis)
	{
		return $this->db->query("SELECT * FROM siswa_ortu, agama,pekerjaan,pendidikan,penghasilan
														WHERE
														siswa_ortu.nis = '$nis' AND
														siswa_ortu.ayah_id_agama = agama.id_agama AND
														siswa_ortu.ayah_id_pendidikan = pendidikan.id_pendidikan AND
														siswa_ortu.ayah_id_pekerjaan = pekerjaan.id_pekerjaan AND
														siswa_ortu.ayah_id_penghasilan = penghasilan.id_penghasilan LIMIT 1")->row_array();
	}
	public function getIbuDetail($nis)
	{
		return $this->db->query("SELECT * FROM siswa_ortu, agama,pekerjaan,pendidikan,penghasilan
														WHERE
														siswa_ortu.nis = '$nis' AND
														siswa_ortu.ibu_id_agama = agama.id_agama AND
														siswa_ortu.ibu_id_pendidikan = pendidikan.id_pendidikan AND
														siswa_ortu.ibu_id_pekerjaan = pekerjaan.id_pekerjaan AND
														siswa_ortu.ibu_id_penghasilan = penghasilan.id_penghasilan LIMIT 1")->row_array();
	}
	public function getWaliDetail($nis)
	{
		return $this->db->query("SELECT * FROM siswa_wali, agama,pekerjaan,pendidikan,penghasilan
														WHERE
														siswa_wali.nis = '$nis' AND
														siswa_wali.wali_id_agama = agama.id_agama AND
														siswa_wali.wali_id_pendidikan = pendidikan.id_pendidikan AND
														siswa_wali.wali_id_pekerjaan = pekerjaan.id_pekerjaan AND
														siswa_wali.wali_id_penghasilan = penghasilan.id_penghasilan LIMIT 1")->row_array();
	}


}

/* End of file Siswa_model.php */
/* Location: ./application/models/Siswa_model.php */