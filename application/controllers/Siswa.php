<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Siswa extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Siswa_model');
		$this->load->helper('tanggal');
	}

	public function index()
	{
		$data['judul'] = 'Data Siswa';
		$data['kelas'] = $this->Siswa_model->getKelas();
		
		

		$kelas = $this->input->post('kelas');

		//$data['hasil'] = $this->Siswa_model->findbykelas($kelas)->result_array();
	  $data['siswa'] = $this->Siswa_model->semuasiswa($kelas)->result_array();
		
		$property['konten'] = $this->load->view('siswa/view',$data,TRUE);
		$this->load->view('template',$property);
	}

	
	public function siswa_input()
	{		
		$data['judul'] = 'Form Input Data Siswa';

		$data['agama'] = $this->Siswa_model->getAgama()->result_array();
		$data['pendidikan'] = $this->Siswa_model->getPendidikan()->result_array();
		$data['pekerjaan'] = $this->Siswa_model->getPekerjaan()->result_array();
		$data['penghasilan'] = $this->Siswa_model->getPenghasilan()->result_array();
		$data['status_dakel']=$this->db->anggota_enum('siswa','status_dakel');

		$this->form_validation->set_rules('nisn', 'NISN', 'is_unique[siswa.nisn]|required|min_length[4]|max_length[4]');

		if ($this->form_validation->run() == FALSE) {
			$property['konten'] = $this->load->view('siswa/input',$data,TRUE);
			$this->load->view('template',$property);
		} else {

			// konfigurasi upload gambar
			$config['upload_path'] = './assets/img/siswa';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']  = '2048';
			$config['max_width']  = '1288';
			$config['max_height']  = '1288';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload()){
				$error = array('error' => $this->upload->display_errors());
				$foto = 'default.png';
			}
			else{
				$data = array('upload_data' => $this->upload->data());
				$foto = $_FILES['userfile']['name'];
			}

			$data_siswa = array(
					'nisn' => $this->input->post('nisn'),
					'nama_lengkap' => $this->input->post('nama'),
					'gender' => $this->input->post('gender'),
					'tempat_lahir' => $this->input->post('tmp_lahir'),
					'tgl_lahir' => $this->input->post('tgl_lahir'),
					'alamat' => $this->input->post('alamat'),
					'id_agama' => $this->input->post('id_agama'),
					'status_dakel' => $this->input->post('status_dakel'),
					'anak_ke' => $this->input->post('anak_ke'),
					'jml_saudara' => $this->input->post('jml_saudara'),
					'telp' => $this->input->post('telp'),
					'email' => $this->input->post('email'),
					'riwayat_kesehatan' => $this->input->post('riwayat_kesehatan'),
					'foto_siswa' => $foto
			);

			$data_ortu = array(
					'nisn' => $this->input->post('nisn'),
					'ayah_nama' => $this->input->post('ayah_nama'),
					'ayah_tempat_lahir' => $this->input->post('ayah_tmp_lahir'),
					'ayah_tgl_lahir' => $this->input->post('ayah_tgl_lahir'),
					'ayah_id_agama' => $this->input->post('ayah_id_agama'),
					'ayah_id_pendidikan' => $this->input->post('ayah_id_pendidikan'),
					'ayah_id_pekerjaan' => $this->input->post('ayah_id_pekerjaan'),
					'ayah_id_penghasilan' => $this->input->post('ayah_id_penghasilan'),
					'ayah_alamat' => $this->input->post('ayah_alamat'),
					'ayah_telp' => $this->input->post('ayah_telp'),
					'ibu_nama' => $this->input->post('ibu_nama'),
					'ibu_tempat_lahir' => $this->input->post('ibu_tmp_lahir'),
					'ibu_tgl_lahir' => $this->input->post('ibu_tgl_lahir'),
					'ibu_id_agama' => $this->input->post('ibu_id_agama'),
					'ibu_id_pendidikan' => $this->input->post('ibu_id_pendidikan'),
					'ibu_id_pekerjaan' => $this->input->post('ibu_id_pekerjaan'),
					'ibu_id_penghasilan' => $this->input->post('ibu_id_penghasilan'),
					'ibu_alamat' => $this->input->post('ibu_alamat'),
					'ibu_telp' => $this->input->post('ibu_telp')
			);

			$data_wali = array(
					'nisn' => $this->input->post('nisn'),
					'wali_nama' => $this->input->post('wali_nama'),
					'wali_tempat_lahir' => $this->input->post('wali_tmp_lahir'),
					'wali_tgl_lahir' => $this->input->post('wali_tgl_lahir'),
					'wali_id_agama' => $this->input->post('wali_id_agama'),
					'wali_id_pendidikan' => $this->input->post('wali_id_pendidikan'),
					'wali_id_pekerjaan' => $this->input->post('wali_id_pekerjaan'),
					'wali_id_penghasilan' => $this->input->post('wali_id_penghasilan'),
					'wali_alamat' => $this->input->post('wali_alamat'),
					'wali_notelp' => $this->input->post('wali_telp')
			);

			$this->Siswa_model->simpandatasiswa($data_siswa,$data_ortu,$data_wali);
			redirect('siswa','refresh');
		}

		
	}

	public function siswa_update($nisn)
	{
		$data['judul'] = 'Form Edit Data Siswa';

		$data['agama'] = $this->Siswa_model->getAgama()->result_array();
		$data['pendidikan'] = $this->Siswa_model->getPendidikan()->result_array();
		$data['pekerjaan'] = $this->Siswa_model->getPekerjaan()->result_array();
		$data['penghasilan'] = $this->Siswa_model->getPenghasilan()->result_array();

		$this->form_validation->set_rules('nisn', 'NISN', 'is_unique[siswa.nisn]|required|min_length[4]|max_length[4]');

		if ($this->form_validation->run() == FALSE) {
			$data['siswa_nisn'] = $this->Siswa_model->getbyid($nisn);
			$property['konten'] = $this->load->view('siswa/update',$data,TRUE);
			$this->load->view('template',$property);
		} else {

			// konfigurasi upload gambar
			$config['upload_path'] = './assets/img/siswa';
			$config['allowed_types'] = 'gif|jpg|png';
			$config['max_size']  = '2048';
			$config['max_width']  = '1288';
			$config['max_height']  = '1288';
			
			$this->load->library('upload', $config);
			
			if ( ! $this->upload->do_upload()){
				$error = array('error' => $this->upload->display_errors());
				$foto = 'default.png';
			}
			else{
				$data = array('upload_data' => $this->upload->data());
				$foto = $_FILES['userfile']['name'];
			}

			$data_siswa = array(
					'nama_lengkap' => $this->input->post('nama'),
					'gender' => $this->input->post('gender'),
					'tempat_lahir' => $this->input->post('tmp_lahir'),
					'tgl_lahir' => $this->input->post('tgl_lahir'),
					'alamat' => $this->input->post('alamat'),
					'id_agama' => $this->input->post('id_agama'),
					'status_dakel' => $this->input->post('status_dakel'),
					'anak_ke' => $this->input->post('anak_ke'),
					'jml_saudara' => $this->input->post('jml_saudara'),
					'telp' => $this->input->post('telp'),
					'email' => $this->input->post('email'),
					'riwayat_kesehatan' => $this->input->post('riwayat_kesehatan'),
					'foto_siswa' => $foto
			);

			$data_ortu = array(
					'ayah_nama' => $this->input->post('ayah_nama'),
					'ayah_tempat_lahir' => $this->input->post('ayah_tmp_lahir'),
					'ayah_tgl_lahir' => $this->input->post('ayah_tgl_lahir'),
					'ayah_id_agama' => $this->input->post('ayah_id_agama'),
					'ayah_id_pendidikan' => $this->input->post('ayah_id_pendidikan'),
					'ayah_id_pekerjaan' => $this->input->post('ayah_id_pekerjaan'),
					'ayah_id_penghasilan' => $this->input->post('ayah_id_penghasilan'),
					'ayah_alamat' => $this->input->post('ayah_alamat'),
					'ayah_telp' => $this->input->post('ayah_telp'),
					'ibu_nama' => $this->input->post('ibu_nama'),
					'ibu_tempat_lahir' => $this->input->post('ibu_tmp_lahir'),
					'ibu_tgl_lahir' => $this->input->post('ibu_tgl_lahir'),
					'ibu_id_agama' => $this->input->post('ibu_id_agama'),
					'ibu_id_pendidikan' => $this->input->post('ibu_id_pendidikan'),
					'ibu_id_pekerjaan' => $this->input->post('ibu_id_pekerjaan'),
					'ibu_id_penghasilan' => $this->input->post('ibu_id_penghasilan'),
					'ibu_alamat' => $this->input->post('ibu_alamat'),
					'ibu_telp' => $this->input->post('ibu_telp')
			);

			$data_wali = array(
					'wali_nama' => $this->input->post('wali_nama'),
					'wali_tempat_lahir' => $this->input->post('wali_tmp_lahir'),
					'wali_tgl_lahir' => $this->input->post('wali_tgl_lahir'),
					'wali_id_agama' => $this->input->post('wali_id_agama'),
					'wali_id_pendidikan' => $this->input->post('wali_id_pendidikan'),
					'wali_id_pekerjaan' => $this->input->post('wali_id_pekerjaan'),
					'wali_id_penghasilan' => $this->input->post('wali_id_penghasilan'),
					'wali_alamat' => $this->input->post('wali_alamat'),
					'wali_notelp' => $this->input->post('wali_telp')
			);
			$this->Siswa_model->editdatasiswa($data_siswa,$data_ortu,$data_wali,$nisn);
			redirect('siswa','refresh');
		}
	}

	public function siswa_hapus($nisn)
	{
		$this->Siswa_model->siswa_hapus($nisn);
		redirect('siswa','refresh');
	}

	public function siswa_detail($nisn)
	{
		$data['judul'] = 'Siswa';
		$data['siswa_detail'] = $this->Siswa_model->getSiswaDetail($nisn);
		$data['ayah_detail'] = $this->Siswa_model->getAyahDetail($nisn);
		$data['ibu_detail'] = $this->Siswa_model->getIbuDetail($nisn);
		$data['wali_detail'] = $this->Siswa_model->getWaliDetail($nisn);
		$property['konten'] = $this->load->view('siswa/detail', $data, TRUE);
		$this->load->view('template', $property);
	}

	public function printtt()
	{
		$this->load->view('test');
		// Get output html
		$html = $this->output->get_output();
		
		// Load library
		$this->load->library('dompdf_gen');
		
		// Convert to PDF
		$this->dompdf->load_html($html);
		$this->dompdf->render();
		$this->dompdf->stream("welcome.pdf");
	}

}

/* End of file Siswa.php */
/* Location: ./application/controllers/Siswa.php */