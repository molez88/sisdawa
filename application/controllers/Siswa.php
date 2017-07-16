<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Siswa extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('logged_in') == FALSE) {
			echo "<script language=javascript>alert('Maaf. Anda tidak memiliki akses.');</script>";
			redirect('users/login','refresh');
		}
		$this->load->model('Siswa_model');
		$this->load->helper('tanggal');
	}

	public function index()
	{
		$data['judul'] = 'Data Siswa';
		$data['kembali']= FALSE;
		$data['kelas'] = $this->Siswa_model->getKelas();
		$data['thn_akademik'] = $this->Siswa_model->getThAkademik();
		

		$kelas = $this->input->post('kelas');
		$thn_akademik = $this->input->post('thn_akademik');

		//$data['hasil'] = $this->Siswa_model->findbykelas($kelas)->result_array();
	  $data['siswa'] = $this->Siswa_model->semuasiswa($kelas,$thn_akademik)->result_array();
		
		$property['konten'] = $this->load->view('siswa/view',$data,TRUE);
		$this->load->view('template',$property);
	}

	
	public function input(){		
		$data['kembali']= FALSE;
		$data['judul'] = 'Form Input Data Siswa';

		$data['agama'] = $this->Siswa_model->getAgama()->result_array();
		$data['pendidikan'] = $this->Siswa_model->getPendidikan()->result_array();
		$data['pekerjaan'] = $this->Siswa_model->getPekerjaan()->result_array();
		$data['penghasilan'] = $this->Siswa_model->getPenghasilan()->result_array();
		$data['status_dakel']=$this->db->anggota_enum('siswa','status_dakel');

		$this->form_validation->set_rules('nis', 'NIS', 'is_unique[siswa.nis]|required|min_length[4]|max_length[4]');

		if ($this->form_validation->run() == FALSE) {
			$property['konten'] = $this->load->view('siswa/create',$data,TRUE);
			$this->load->view('template',$property);
		} else {

			// konfigurasi upload gambar

			if (isset($_FILES['userfile']['name']) && !empty($_FILES['userfile']['name'])) {
				$config['upload_path'] = './assets/img/siswa';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']  = '2048';
				$config['max_width']  = '1288';
				$config['max_height']  = '1288';
				$config['file_name']      = 'gambar-'.trim(str_replace(" ","",date('dmYHis')));
				
				$this->load->library('upload', $config);
				
				if ( ! $this->upload->do_upload()){
					$this->session->set_flashdata('image_error', $this->upload->display_errors());
					redirect('siswa/input','refresh');
				}
				else{
					$data = array('upload_data' => $this->upload->data());
					$foto = $this->upload->data('file_name');
				}

				$data_siswa = array(
					'nis' => $this->input->post('nis'),
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
					'thn_masuk' => $this->input->post('thn_masuk'),
					'kps' => $this->input->post('kps'),
					'kkm' => $this->input->post('kkm'),
					'kip' => $this->input->post('kip'),
					'kms' => $this->input->post('kms'),
					'kks' => $this->input->post('kks'),
					'foto_siswa' => $foto
				);

				$data_ortu = array(
						'nis' => $this->input->post('nis'),
						'nik_ayah' => $this->input->post('nik_ayah'),
						'ayah_nama' => $this->input->post('ayah_nama'),
						'ayah_tempat_lahir' => $this->input->post('ayah_tmp_lahir'),
						'ayah_tgl_lahir' => $this->input->post('ayah_tgl_lahir'),
						'ayah_id_agama' => $this->input->post('ayah_id_agama'),
						'ayah_id_pendidikan' => $this->input->post('ayah_id_pendidikan'),
						'ayah_id_pekerjaan' => $this->input->post('ayah_id_pekerjaan'),
						'ayah_id_penghasilan' => $this->input->post('ayah_id_penghasilan'),
						'ayah_alamat' => $this->input->post('ayah_alamat'),
						'ayah_telp' => $this->input->post('ayah_telp'),
						'nik_ibu' => $this->input->post('nik_ibu'),
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
						'nis' => $this->input->post('nis'),
						'nik_wali' => $this->input->post('nik_wali'),
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
			}else{
				$data_siswa = array(
					'nis' => $this->input->post('nis'),
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
					'thn_masuk' => $this->input->post('thn_masuk'),
					'kps' => $this->input->post('kps'),
					'kkm' => $this->input->post('kkm'),
					'kip' => $this->input->post('kip'),
					'kms' => $this->input->post('kms'),
					'kks' => $this->input->post('kks'),
				);
				$data_ortu = array(
						'nis' => $this->input->post('nis'),
						'nik_ayah' => $this->input->post('nik_ayah'),
						'ayah_nama' => $this->input->post('ayah_nama'),
						'ayah_tempat_lahir' => $this->input->post('ayah_tmp_lahir'),
						'ayah_tgl_lahir' => $this->input->post('ayah_tgl_lahir'),
						'ayah_id_agama' => $this->input->post('ayah_id_agama'),
						'ayah_id_pendidikan' => $this->input->post('ayah_id_pendidikan'),
						'ayah_id_pekerjaan' => $this->input->post('ayah_id_pekerjaan'),
						'ayah_id_penghasilan' => $this->input->post('ayah_id_penghasilan'),
						'ayah_alamat' => $this->input->post('ayah_alamat'),
						'ayah_telp' => $this->input->post('ayah_telp'),
						'nik_ibu' => $this->input->post('nik_ibu'),
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
						'nis' => $this->input->post('nis'),
						'nik_wali' => $this->input->post('nik_wali'),
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
			}

				$this->Siswa_model->simpandatasiswa($data_siswa,$data_ortu,$data_wali);
				$this->session->set_flashdata('insert_siswa', 'Data siswa berhasil dimasukkan');
				redirect('siswa','refresh');
		}
	}

	public function update($nis=0){
		$data['kembali']= FALSE;
		$data['judul'] = 'Form Edit Data Siswa';

		$data['agama'] = $this->Siswa_model->getAgama()->result_array();
		$data['pendidikan'] = $this->Siswa_model->getPendidikan()->result_array();
		$data['pekerjaan'] = $this->Siswa_model->getPekerjaan()->result_array();
		$data['penghasilan'] = $this->Siswa_model->getPenghasilan()->result_array();

		$this->form_validation->set_rules('nis', 'nis', 'required|min_length[4]|max_length[4]');

		if ($this->form_validation->run() == FALSE) {
			$data['siswa_nis'] = $this->Siswa_model->getbynis($nis);
			$property['konten'] = $this->load->view('siswa/update',$data,TRUE);
			$this->load->view('template',$property);
		} else {
			if (isset($_FILES['userfile']['name']) && !empty($_FILES['userfile']['name'])) {
				$config['upload_path'] = './assets/img/siswa';
				$config['allowed_types'] = 'gif|jpg|png';
				$config['max_size']  = '2048';
				$config['max_width']  = '1288';
				$config['max_height']  = '1288';
				$config['file_name']      = 'gambar-'.trim(str_replace(" ","",date('dmYHis')));
				
				$this->load->library('upload', $config);
				
				if ( ! $this->upload->do_upload()){
					$this->session->set_flashdata('image_error', $this->upload->display_errors());
					redirect('siswa/update/'.$nis,'refresh');
				}
				else{
					$data = array('upload_data' => $this->upload->data());
					$foto = $this->upload->data('file_name');
				}
				// konfigurasi upload gambar
				

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
						'kps' => $this->input->post('kps'),
						'kkm' => $this->input->post('kkm'),
						'kip' => $this->input->post('kip'),
						'kms' => $this->input->post('kms'),
						'kks' => $this->input->post('kks'),
						'thn_masuk' => $this->input->post('thn_masuk'),
						'foto_siswa' => $foto
				);

				$data_ortu = array(
						'nik_ayah' => $this->input->post('nik_ayah'),
						'ayah_nama' => $this->input->post('ayah_nama'),
						'ayah_tempat_lahir' => $this->input->post('ayah_tmp_lahir'),
						'ayah_tgl_lahir' => $this->input->post('ayah_tgl_lahir'),
						'ayah_id_agama' => $this->input->post('ayah_id_agama'),
						'ayah_id_pendidikan' => $this->input->post('ayah_id_pendidikan'),
						'ayah_id_pekerjaan' => $this->input->post('ayah_id_pekerjaan'),
						'ayah_id_penghasilan' => $this->input->post('ayah_id_penghasilan'),
						'ayah_alamat' => $this->input->post('ayah_alamat'),
						'ayah_telp' => $this->input->post('ayah_telp'),
						'nik_ibu' => $this->input->post('nik_ibu'),
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
						'nik_wali' => $this->input->post('nik_wali'),
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
			}else{
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
						'thn_masuk' => $this->input->post('thn_masuk'),
						'kps' => $this->input->post('kps'),
						'kkm' => $this->input->post('kkm'),
						'kip' => $this->input->post('kip'),
						'kms' => $this->input->post('kms'),
						'kks' => $this->input->post('kks'),
				);

				$data_ortu = array(
						'nik_ayah' => $this->input->post('nik_ayah'),
						'ayah_nama' => $this->input->post('ayah_nama'),
						'ayah_tempat_lahir' => $this->input->post('ayah_tmp_lahir'),
						'ayah_tgl_lahir' => $this->input->post('ayah_tgl_lahir'),
						'ayah_id_agama' => $this->input->post('ayah_id_agama'),
						'ayah_id_pendidikan' => $this->input->post('ayah_id_pendidikan'),
						'ayah_id_pekerjaan' => $this->input->post('ayah_id_pekerjaan'),
						'ayah_id_penghasilan' => $this->input->post('ayah_id_penghasilan'),
						'ayah_alamat' => $this->input->post('ayah_alamat'),
						'ayah_telp' => $this->input->post('ayah_telp'),
						'nik_ibu' => $this->input->post('nik_ibu'),
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
						'nik_wali' => $this->input->post('nik_wali'),
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
			}
			
			$this->Siswa_model->editdatasiswa($data_siswa,$data_ortu,$data_wali,$nis);
			$this->session->set_flashdata('update_siswa', 'Data siswa berhasil diubah');
			redirect('siswa','refresh');
		}
	}

	public function hapus($nis)
	{
		$this->Siswa_model->siswa_hapus($nis);
		$this->session->set_flashdata('delete_siswa', 'Data siswa berhasil dihapus');
		redirect('siswa','refresh');
	}

	public function detail($nis)
	{
		$data['judul'] = 'Detail Siswa';
		$data['kembali']= TRUE;
		$data['siswa_detail'] = $this->Siswa_model->getSiswaDetail($nis);
		$data['ayah_detail'] = $this->Siswa_model->getAyahDetail($nis);
		$data['ibu_detail'] = $this->Siswa_model->getIbuDetail($nis);
		$data['wali_detail'] = $this->Siswa_model->getWaliDetail($nis);
		$property['konten'] = $this->load->view('siswa/detail', $data, TRUE);
		$this->load->view('template', $property);
	}

	public function print_pdf_detail_siswa($nis)
	{
    $for_tgl = date('d-F-Y');

   	$data['siswa_detail'] = $this->Siswa_model->getSiswaDetail($nis);
		$data['ayah_detail'] = $this->Siswa_model->getAyahDetail($nis);
		$data['ibu_detail'] = $this->Siswa_model->getIbuDetail($nis);
		$data['wali_detail'] = $this->Siswa_model->getWaliDetail($nis);

   	$pdfFilePath = "Profil siswa nis_$nis.pdf"; //tentukan nama file dan lokasi report yang akan kita buat 
      
	  $tgl_cetak = date('d F Y H:i:s');
	  ini_set('memory_limit','32M'); 

	  $html = $this->load->view('siswa/print_pdf_detail_siswa',$data,true); // menyimpan hasil HTML ke variabel $html

	   
	  $this->load->library('pdf');
	  $pdf = $this->pdf->load();
	  // |{PAGENO}| = Page Numbering. Halaman
	  $pdf->SetFooter("Sistem Data Siswa".'|{PAGENO}|'.$tgl_cetak); 
	  $pdf->WriteHTML($html); // generate file pdf dari $html
	  $pdf->Output($pdfFilePath, 'I'); // save ke direktori $pdfFilePath
	}
	public function laporansiswa()
	{
		$data['judul'] = 'Laporan Siswa';
		$data['kelas'] = $this->Siswa_model->getKelas();
		$data['thn_akademik'] = $this->Siswa_model->getThAkademik();
		
		

		$kelas = $this->input->post('kelas');
		$thn_akademik = $this->input->post('thn_akademik');

		//$data['hasil'] = $this->Siswa_model->findbykelas($kelas)->result_array();
	  $data['siswa'] = $this->Siswa_model->semuasiswa($kelas,$thn_akademik)->result_array();
		
		$property['konten'] = $this->load->view('siswa/laporan_view',$data);
	}

	// public function printsiswa($nis){
	// 	$data['siswa_detail'] = $this->Siswa_model->getSiswaDetail($nis);
	// 	$data['ayah_detail'] = $this->Siswa_model->getAyahDetail($nis);
	// 	$data['ibu_detail'] = $this->Siswa_model->getIbuDetail($nis);
	// 	$data['wali_detail'] = $this->Siswa_model->getWaliDetail($nis);
	// 	$this->load->view('siswa/print_siswa',$data);
	// }

	public function export_excel($kelas)
	{
		//$data['judul'] = 'Laporan Siswa';
		//$data['kelas'] = $this->Siswa_model->getKelas();
		
		

		//$kelas = $this->input->post('kelas');

		//$data['hasil'] = $this->Siswa_model->findbykelas($kelas)->result_array();
	  $data['siswa'] = $this->Siswa_model->semuasiswa($kelas)->result_array();
		
		$property['konten'] = $this->load->view('siswa/export_excel',$data);
	}

}

/* End of file Siswa.php */
/* Location: ./application/controllers/Siswa.php */