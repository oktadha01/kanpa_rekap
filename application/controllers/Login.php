<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
	public $load;
    public $session;
    public $input;
    public $m_login;
	function __construct()
	{
		parent::__construct();
		$this->load->model('m_login');
		$is_login = $this->session->userdata('is_login');

		if ($is_login) {
			redirect(base_url());
			return;
		}
	}

	function index()
	{

		$data['_title'] = 'Baron Living Studio';
		$data['_script'] = 'login/login_js';
		$data['_view_login'] = 'login/login';
		// $data['data_architec'] = $this->m_dashboard->m_architecture();
		$this->load->view('layout/index', $data);
	}

	public function login()
	{
		$input = array(
			'nm_user'  => $this->input->post('nm-user'),
			'password'  => $this->input->post('password'),
		);

		// $input = (object) $this->input->post(null, true);

		if ($this->m_login->run($input)) {
			// $this->session->set_flashdata('success', 'Berhasil melakukan login');
			// if ($this->session->userdata("status_user") == '0') {

				redirect(base_url(''));
			// } else {

				// redirect(base_url('login'));
			// }
		} else {
			// echo $input;
			$this->session->set_flashdata('error', 'E-mail/Password anda masukan salah !!');
			redirect(base_url('login'));
		}
	}
}
