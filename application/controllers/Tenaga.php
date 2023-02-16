<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Tenaga extends CI_Controller
{
    public $load;
    public $m_tenaga;
    public $input;
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_tenaga');
    }

    function index()
    {

        $data['_title'] = 'Data Tenaga';
        $data['_script'] = 'tenaga/tenaga_js';
        $data['_view'] = 'tenaga/tenaga';
        $this->load->view('layout/index', $data);
    }
    function data_tenaga()
    {

        $data['data_tenaga'] = $this->m_tenaga->m_data_tenaga();
        $data['_view'] = 'tenaga/data_tenaga';
        $this->load->view('tenaga/data_tenaga', $data);
    }
    function simpan_data_tenaga()
    {
        $nm_tenaga = $this->input->post('nm-tenaga');
        $hrg_tenaga = $this->input->post('hrg-tenaga');
        $hrg_tenaga_lembur = $this->input->post('hrg-tenaga-lembur');

        $insert = $this->m_tenaga->m_simpan_data_tenaga($nm_tenaga, $hrg_tenaga, $hrg_tenaga_lembur);
        echo json_encode($insert);
    }
    function edit_data_tenaga()
    {
        $id_tenaga = $this->input->post('id-tenaga');
        $nm_tenaga = $this->input->post('nm-tenaga');
        $hrg_tenaga = $this->input->post('hrg-tenaga');
        $hrg_tenaga_lembur = $this->input->post('hrg-tenaga-lembur');

        $update = $this->m_tenaga->m_edit_data_tenaga($nm_tenaga, $hrg_tenaga, $id_tenaga, $hrg_tenaga_lembur);
        echo json_encode($update);
    }
    function delete_data_tenaga()
    {
        $id_tenaga = $this->input->post('id-tenaga');

        $delete = $this->m_tenaga->m_delete_data_tenaga($id_tenaga);
        echo json_encode($delete);
    }
}
