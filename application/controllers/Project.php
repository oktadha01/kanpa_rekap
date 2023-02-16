<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Project extends CI_Controller
{
    public $load;
    public $m_project;
    public $uri;
    public $input;
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_project');
    }

    function index()
    {

        $data['_title'] = 'Data Project';
        $data['_script'] = 'project/project_js';
        $data['_view'] = 'project/project';
        $this->load->view('layout/index', $data);
    }
    function data_rekap_project()
    {
        $tittle = $this->uri->segment(3);
        if ($tittle == 'material') {
            $id_project = $this->input->post('id-project');
            $project_progres = $this->input->post('project-progres');
            $status_material = $this->input->post('status-material');
            $data['data_material'] = $this->m_project->m_data_material($id_project, $project_progres, $status_material);
            $data['_view'] = 'project/rekap/rekap_material';
            $this->load->view('project/rekap/rekap_material', $data);
            // echo $tittle;
        } else if ($tittle == 'tenaga') {
            $id_project = $this->input->post('id-project');
            $id_weekly = $this->input->post('project-progres');
            // $status_weekly_tenaga_gaji = 'weekly-' + $id_weekly;
            $data['data_tenaga'] = $this->m_project->m_data_tenaga();
            $data['data_rekap_gaji_tenaga'] = $this->m_project->m_rekap_gaji_tenaga($id_project, $id_weekly);
            $data['data_tenaga_project'] = $this->m_project->m_data_tenaga_project($id_project, $id_weekly);
            $data['data_tenaga_blm_disimpan'] = $this->m_project->m_data_tenaga_blm_disimpan($id_project, $id_weekly);
            $data['_view'] = 'project/rekap/rekap_tenaga';
            $this->load->view('project/rekap/rekap_tenaga', $data);
            // echo $tittle;
        } else if ($tittle == 'weekly') {
            $id_project = $this->input->post('id-project');
            $data['data_weekly'] = $this->m_project->m_data_weekly($id_project);
            $data['_view'] = 'project/rekap/rekap_weekly';
            $this->load->view('project/rekap/rekap_weekly', $data);
            // echo $tittle;
        } else if ($tittle == 'project') {
            $data['data_project'] = $this->m_project->m_data_project();
            $data['_view'] = 'project/data_project';
            $this->load->view('project/data_project', $data);
            // echo $tittle;
        }
    }
    function simpan_data_project()
    {
        $data = array(

            'nm_project' => $this->input->post('nm-project'),
            'rab' => $this->input->post('rab'),
            'rap' => $this->input->post('rap'),
        );

        $insert = $this->m_project->m_simpan_data_project($data);
        echo json_encode($insert);
    }
    function add_weekly_project()
    {
        $id_project = $this->input->post('id-project');
        $add_weekly = $this->input->post('add-weekly');
        $total_progres_material = '0';
        $total_progres_tenaga = '0';
        $total_progres_lainnya = '0';
        $insert = $this->m_project->m_add_weekly_project($id_project, $add_weekly, $total_progres_material, $total_progres_tenaga, $total_progres_lainnya);
        echo json_encode($insert);
    }
    function add_tenaga_project()
    {
        $id_project = $this->input->post('id-project');
        $id_tenaga = $this->input->post('id-tenaga');
        $weekly = $this->input->post('project-progres');
        $update = $this->m_project->m_add_tenaga_projec($id_project, $id_tenaga, $weekly);
        echo json_encode($update);
    }
    function delete_tenaga_project()
    {
        $id_tenaga = $this->input->post('id-tenaga');
        $id_project = $this->input->post('id-project');
        $action = $this->input->post('action');
        $id_rekap_tenaga = $this->input->post('id-rekap-tenaga');
        $total_biaya = $this->input->post('total-biaya');
        $delete = $this->m_project->m_delete_tenaga_project($id_tenaga, $action, $id_rekap_tenaga, $total_biaya, $id_project);
        echo json_encode($delete);
    }

    function simpan_data_material()
    {
        $data = array(

            'id_material_project' => $this->input->post('id-material-project'),
            'id_material_weekly' => $this->input->post('id-material-weekly'),
            'nm_material' => $this->input->post('nm-material'),
            'qty' => $this->input->post('qty'),
            'satuan' => $this->input->post('satuan'),
            'hrg_satuan' => $this->input->post('hrg-satuan'),
            'total_material' => $this->input->post('total-material'),
            'status_material' => $this->input->post('status-material'),
        );
        $total_biaya = $this->input->post('total-biaya');
        $id_project = $this->input->post('id-material-project');

        $insert = $this->m_project->m_simpan_data_material($data, $total_biaya, $id_project);
        echo json_encode($insert);
    }

    function edit_data_material()
    {
        $id_material = $this->input->post('id-material');
        $nm_material = $this->input->post('nm-material');
        $total_material = $this->input->post('total-material');
        $update = $this->m_project->m_edit_data_material($id_material, $nm_material, $total_material);
        echo json_encode($update);
    }

    function delete_data_material()
    {
        $id_material = $this->input->post('id-material');
        $total_biaya = $this->input->post('total-biaya');
        $id_project = $this->input->post('id-project');
        $delete = $this->m_project->m_delete_data_material($id_material, $total_biaya, $id_project);
        echo json_encode($delete);
    }
    function update_total_rekap()
    {
        $id_project = $this->input->post('id-project');
        $weekly = $this->input->post('weekly');
        $total_progres_material = $this->input->post('total-progres-material');
        $total_progres_tenaga = $this->input->post('total-progres-tenaga');
        $total_progres_lainnya = $this->input->post('total-progres-lainnya');
        $this->m_project->m_update_total_rekap($id_project, $weekly, $total_progres_material, $total_progres_tenaga, $total_progres_lainnya);
        // echo json_encode($update);
    }

    function rekap_gaji_tenaga()
    {

        $id_rekaptenaga_project = $this->input->post('id-rekaptenaga-project');
        $id_rekaptenaga_weekly = $this->input->post('id-rekaptenaga-weekly');
        $delete = $this->m_project->m_rekap_gaji_tenaga($id_rekaptenaga_weekly, $id_rekaptenaga_project);
        echo json_encode($delete);
    }
    function add_gaji_tenaga()
    {
        $action = $this->input->post('action');
        $id_rekap_tenaga = $this->input->post('id-rekap-tenaga');
        $id_rekaptenaga = $this->input->post('id-tenaga');
        $id_rekaptenaga_project = $this->input->post('id-project');
        $id_rekaptenaga_weekly = $this->input->post('project-progres');
        $total_gaji_h = $this->input->post('total-gaji-h');
        $jmlh_h = $this->input->post('jmlh-h');
        $jmlh_j = $this->input->post('jmlh-j');
        $total_lembur = $this->input->post('total-lembur');
        $insert = $this->m_project->m_add_gaji_tenaga($action, $id_rekap_tenaga, $id_rekaptenaga, $id_rekaptenaga_project, $id_rekaptenaga_weekly, $total_gaji_h, $jmlh_h, $jmlh_j, $total_lembur);
        echo json_encode($insert);
    }

    function update_total_biaya()
    {
        $total_biaya = $this->input->post('total-biaya');
        $id_project = $this->input->post('id-project');
        $project_progres = $this->input->post('project-progres');
        $total_tenaga_weekly = $this->input->post('total-tenaga-weekly');
        $update = $this->m_project->m_update_total_biaya($total_biaya, $id_project, $project_progres, $total_tenaga_weekly);
        echo json_encode($update);
    }
}
