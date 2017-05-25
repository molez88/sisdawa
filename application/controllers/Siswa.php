<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Siswa extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('Siswa_model');
	}

	public function index()
	{
		$data['judul'] = 'Data Siswa';
		$data['kelas'] = $this->Siswa_model->getKelas();
		$data['thakademik'] = $this->Siswa_model->getThAkademik();
		

		$kelas = $this->input->post('kelas');

		//$data['hasil'] = $this->Siswa_model->findbykelas($kelas)->result_array();
	  $data['siswa'] = $this->Siswa_model->semuasiswa($kelas)->result_array();
		
		$property['konten'] = $this->load->view('siswa/view',$data,TRUE);
		$this->load->view('template',$property);
	}

	// public function list_siswa()
	// {
	// 	$siswa = $this->Siswa_model->get_datatables();
	// 	$data = array();
	// 	$no = $_POST['start'] + 1;
	// 	foreach ($siswa as $siswas) {
	// 		$row = array();
	// 		$row[] = $no++.'.';
	// 		$row[] = $siswas->nisn;
	// 		$row[] = $siswas->nama_lengkap;
	// 		$row[] = $siswas->tempat_lahir;
	// 		$row[] = $siswas->gender;
	// 		$row[] = $siswas->telp;

	// 		//add html for action
	// 		$row[] = '<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_users('."'".$siswas->nisn."'".')"><i class="glyphicon glyphicon-edit"></i> Edit</a>||
	// 			  <a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="delete_users('."'".$siswas->nisn."'".')"><i class="glyphicon glyphicon-trash"></i> Hapus</a>';
		
	// 		$data[] = $row;
	// 	}

	// 	$output = array(
	// 					"draw" => $_POST['draw'],
	// 					"recordsTotal" => $this->Siswa_model->count_all(),
	// 					"recordsFiltered" => $this->Siswa_model->count_filtered(),
	// 					"data" => $data,
	// 			);
	// 	//output to json format
	// 	echo json_encode($output);
	// }
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

	// menampilkan data siswa sesuai kelas yang dipilih
	// public function findbykelas()
	// {
	// 	$data['judul'] = 'Data Siswa';
	// 	$kelas = $this->input->post('kelas');
	// 	$data['hasil'] = $this->Siswa_model->findbykelas($kelas)->result_array();
	// }

}

/* End of file Siswa.php */
/* Location: ./application/controllers/Siswa.php */