<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Detail extends CI_Controller
{
    public $load;
    public $m_detail;
    public $uri;
    public $input;
    public $db;
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_detail');
    }

    function project()
    {
        $tittle = $this->uri->segment(3);
        $nm_project = preg_replace("![^a-z0-9]+!i", " ", $tittle);

        $data['_title'] = $nm_project;
        $data['_script'] = 'detail/detail_js';
        $data['_view'] = 'detail/detail';
        $data['data_project'] = $this->m_detail->m_data_project($nm_project);
        $data['data_progres'] = $this->m_detail->m_data_progres($nm_project);
        $this->load->view('layout/index', $data);
    }

    function data_rekap_project()
    {
        $tittle = $this->uri->segment(3);
        if ($tittle == 'material') {
            $id_project = $this->input->post('id-project');
            $project_progres = $this->input->post('project-progres');
            $status_material = $this->input->post('status-material');
            $data['data_material'] = $this->m_detail->m_data_material($id_project, $project_progres, $status_material);
            $data['_view'] = 'detail/detail_rekap_material';
            $this->load->view('detail/detail_rekap_material', $data);
            // echo $tittle;
        } else if ($tittle == 'tenaga') {
            $id_project = $this->input->post('id-project');
            $id_weekly = $this->input->post('project-progres');
            // $status_weekly_tenaga_gaji = 'weekly-' + $id_weekly;
            // $data['data_tenaga'] = $this->m_detail->m_data_tenaga();
            $data['data_rekap_gaji_tenaga'] = $this->m_detail->m_rekap_gaji_tenaga($id_project, $id_weekly);
            // $data['data_tenaga_project'] = $this->m_detail->m_data_tenaga_project($id_project, $id_weekly);
            $data['_view'] = 'detail/detail_rekap_tenaga';
            $this->load->view('detail/detail_rekap_tenaga', $data);
            // echo $tittle;
        
        } else if ($tittle == 'schedule') {
            $id_project = $this->input->post('id-project');
            $data['data_kategori_schedule'] = $this->m_detail->m_data_ketegori_schedule($id_project);
            $data['data_schedule'] = $this->m_detail->m_data_schedule($id_project);
            $data['_view'] = 'detail/detail_time_schedule';
            $this->load->view('detail/detail_time_schedule', $data);
            // echo $tittle;
        }
    }
    function detail_foto_progres()
    {
        $data['_title'] = 'Schedule Project';
        $id_progres_schedule = $this->input->post('id-progres-schedule');
        $data['_view'] = 'detail/detail_foto_progres';
        $data['data_foto'] = $this->m_detail->m_data_foto($id_progres_schedule);
        $this->load->view('detail/detail_foto_progres', $data);
    }
}
