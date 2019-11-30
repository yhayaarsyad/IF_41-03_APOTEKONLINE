<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	function __construct(){
        parent::__construct();
        //load libary pagination
        $this->load->library('pagination');
    }
	public function index()
	{
		$config['base_url'] = site_url('pages/index'); //site url
        $config['total_rows'] = $this->db->count_all('obat'); //total row
        $config['per_page'] = 4;  //show record per halaman
        $config["uri_segment"] = 3;  // uri parameter
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = floor($choice);
 
        // Membuat Style pagination untuk BootStrap v4
      	$config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Next';
        $config['prev_link']        = 'Prev';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
 
        $this->pagination->initialize($config);
        $data['page'] = ($this->uri->segment(3)) ? $this->uri->segment(3) : 0;
 
        //panggil function get_mahasiswa_list yang ada pada mmodel mahasiswa_model. 
		// $data['data'] = $this->mahasiswa_model->get_mahasiswa_list($config["per_page"], $data['page']);  
		$data['data'] = $this->db->get('obat', $config["per_page"], $data['page'])->result();         
 
        $data['pagination'] = $this->pagination->create_links();
 
        //load view mahasiswa view
        // $this->load->view('mahasiswa_view',$data);



		// $data['data'] = $this->db->get('obat')->result();
		$this->load->view('index', $data);
	}
	public function addadmin(){
		$data = array(
			'username' => 'admin',
			'password' => sha1('admin'),
			'role' => 'admin'
		);
		
		$this->db->insert('admin', $data);
	}
	public function login()
	{
		if ($this->session->userdata('id')){
			redirect('pages');
		}
		$this->load->view('login');
	}
	public function register()
	{
		$this->load->view('register');

	}
	public function belanja()
	{
		$id = $this->session->userdata('id');
		$data['data'] = $this->db->query("SELECT
						`obat`.`nama_obat`
						, `obat`.`harga`
						, `chart`.`totalharga`
    					, `chart`.`quantity`
						, `obat`.`gambar`
					FROM
						`impal`.`chart`
						INNER JOIN `impal`.`obat` 
							ON (`chart`.`idobat` = `obat`.`id`)
						INNER JOIN `impal`.`user` 
							ON (`chart`.`iduser` = `user`.`id`)
					WHERE iduser = '$id';")->result();
		$this->load->view('belanja',$data);
	}
	public function profil()
	{
		$id =  $this->session->userdata('id');
		$data['profile'] = $this->db->get_where('biodata',array('id_user' => $id))->row_array();
		$this->load->view('profil', $data);
	}
	public function demam()
	{
			$this->load->view('demam');
	}
		
	//admin
	
	public function admin(){
		$this->load->view('admin/admin');
	}
	public function pembelian(){
		$data['pembayaran']= $this->db->get('pembayaran')->result();
		$this->load->view('admin/pembelian',$data);
	}
	public function daftarobat(){
		
		$data['obat']= $this->db->get('obat')->result();
		$this->load->view('admin/daftarobat',$data);
	}

	
	public function reg(){
		$data = [
			"username" => $this->input->post('username'),
			"password" =>sha1( $this->input->post('password')),
			'role' => 'user'
		];
		$this->db->insert('user', $data);
		$user = $this->db->get_where('user', array ('username' => $this->input->post('username')))->row_array();
		echo $user['id'];
		$biodata = array(
			'id_user' => $user['id'],
			'email' => $this->input->post('email') 
		);
		$this->db->insert('biodata', $biodata);
		$this->session->set_userdata($user);
		redirect('pages');
	}
	public function log(){
		$email = $this->input->post('email');
		$password = sha1($this->input->post('password'));

		$user = $this->db->get_where('user', array('username' => $email, 'password' => $password))->row_array();
		if ($user){
			if ($user['role'] == 'user'){
				$this->session->set_userdata($user);
				redirect('pages');
			}else if($user['role'] == 'admin'){
				$this->session->set_userdata($user);
				redirect('pages/admin');
			}
			
		}else{
			echo 'err';
		}
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect('pages/login');
	}
	public function updateprofil()
	{
		$data=array(
			'nama' => $this->input->post('nama'),
			'alamat' => $this->input->post('alamat'),
			'nohp' => $this->input->post('nohp')
		);

		$this->db->where('id_user', $this->session->userdata('id'));
		$this->db->update('biodata', $data);

		redirect('pages/profil');
	}

	public function aksi_upload(){
		$config['upload_path']          = 'assets/img/';
		$config['allowed_types']        = 'gif|jpg|png';
		$config['max_size']             = 50000;
		$config['max_width']            = 2048;
		$config['max_height']           = 768;
 
		$this->load->library('upload', $config);
		echo $this->upload->do_upload('berkas');
		$upload_data = $this->upload->data();
		$file_name = $upload_data['file_name'];
 
		if ( ! $this->upload->do_upload('berkas')){
			$error = array('error' => $this->upload->display_errors());
			// $this->load->view('v_upload', $error);
			echo 'error';
		}else{
			$data = array('upload_data' => $this->upload->data());
			// $this->load->view('v_upload_sukses', $data);
			$data = array(
				'nama_obat' => $this->input->post('nama_obat'),
				'kode_obat' => $this->input->post('kode_obat'),
				'harga' => $this->input->post('harga'),
				'gambar' => $file_name,
				'stock' => $this->input->post('stock')
			);
			$this->db->insert('obat', $data);
			redirect('pages/admin');
		}
		
	}
	public function hapusobat($id){
		$this->db->where('id',$id);
		$this->db->delete('obat');
		redirect('pages/daftarobat');
	}

	public function addchart($idobat){
		$iduser=$this->session->userdata('id');
		$tot=$this->input->post('harga')*$this->input->post('qty');
		$data=array(
			'iduser' => $iduser,
			'idobat' => $idobat,
			'idchart' => $iduser,
			'quantity' => $this->input->post('qty'),
			'totalharga' => $tot
		);
		$this->db->insert('chart',$data);
		redirect('pages/belanja');
	}
	public function updateobat()
	{
		$data=array(
			'nama_obat' => $this->input->post('nama_obat'),
			'harga' => $this->input->post('harga'),
			'stock' => $this->input->post('stock')
		);

		$this->db->where('id', $this->input->post('id'));
		$this->db->update('obat', $data);

		redirect('pages/daftarobat');
	}
	public function checkout(){
		$id = $this->session->userdata('id');
		$data = $this->db->query("SELECT
    `obat`.`kode_obat`
    , `chart`.`quantity`
    , `chart`.`totalharga`
    , `obat`.`nama_obat`
FROM
    `impal`.`chart`
    INNER JOIN `impal`.`obat` 
        ON (`chart`.`idobat` = `obat`.`id`)
    INNER JOIN `impal`.`user` 
        ON (`chart`.`iduser` = `user`.`id`)
		WHERE iduser='$id'")->result();
		$bio = $this->db->get_where('biodata', array('id_user' => $id))->row_array();
		foreach($data as $key){
			$cek = array(
				'namauser' => $bio['nama'],
				'alamat' => $bio['alamat'],
				'kodeobat' => $key->kode_obat,
				'quantity' => $key->quantity,
				'totalharga' => $key->totalharga
			);
			$this->db->insert('pembayaran', $cek);
		}
		$this->db->where('iduser', $id);
		$this->db->delete('chart');
		$this->session->set_flashdata('checkout', 'Berhasil');
		redirect('/');

	}
	public function hapuspembelian($id){
		$this->db->where('id',$id);
		$this->db->delete('pembayaran');
		redirect('pages/pembelian');
	}

}
