<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Transaksi_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getKelas()
	{
		return $this->db->get('kelas');
	}
	public function getSiswa()
	{
		return $this->db->query('SELECT nis, nama_lengkap FROM siswa');
	}
	public function getThakademik()
	{
		return $this->db->get('th_akademik');
	}

	public function transaksi_input()
	{
		$data = array(
				'nis' => $this->input->post('nis'),
				'id_kelas' => $this->input->post('id_kelas'),
				'id_th_akademik' => $this->input->post('id_th_akademik')
			);
		return $this->db->insert('transaksi_kelas', $data);
	}

	public function semuatransaksi($kelas,$thakademik)
	{
		if ($kelas && $thakademik) {
			return $this->db->query("SELECT transaksi_kelas.id_transaksi_kelas, siswa.nis, siswa.nama_lengkap, kelas.nm_kelas, th_akademik.th_ajaran FROM transaksi_kelas INNER JOIN siswa ON siswa.nis = transaksi_kelas.nis INNER JOIN kelas ON kelas.id_kelas = transaksi_kelas.id_kelas INNER JOIN th_akademik ON th_akademik.id_th_akademik = transaksi_kelas.id_th_akademik WHERE kelas.id_kelas = '$kelas' AND th_akademik.id_th_akademik='$thakademik' ORDER BY transaksi_kelas.tgl DESC");
		}else{
			return $this->db->query("SELECT transaksi_kelas.id_transaksi_kelas, siswa.nis, siswa.nama_lengkap, kelas.nm_kelas, th_akademik.th_ajaran FROM transaksi_kelas INNER JOIN siswa ON siswa.nis = transaksi_kelas.nis INNER JOIN kelas ON kelas.id_kelas = transaksi_kelas.id_kelas INNER JOIN th_akademik ON th_akademik.id_th_akademik = transaksi_kelas.id_th_akademik ORDER BY transaksi_kelas.tgl DESC");
		}
	}

	public function hapus($id)
	{
		$this->db->where('id_transaksi_kelas', $id);
		return $this->db->delete('transaksi_kelas');
	}

}

/* End of file Transaksi_model.php */
/* Location: ./application/models/Transaksi_model.php */