<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public $load;
    public $m_dashboard;
    public $uri;
    public $input;
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_dashboard');
    }

    function index()
    {

        $data['_title'] = 'Dashboard';
        $data['_script'] = 'dashboard/index_js';
        $data['_view'] = 'dashboard/index';
        $data['data_project'] = $this->m_dashboard->m_data_project();
        $data['data_schedule'] = $this->m_dashboard->m_data_schedule();
        $data['data_foto'] = $this->m_dashboard->m_data_foto();
        $this->load->view('layout/index', $data);
    }
}
