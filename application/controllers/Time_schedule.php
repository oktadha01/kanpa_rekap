<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Time_schedule extends CI_Controller
{
    public $load;
    public $m_time_schedule;
    public $input;
    public $upload;
    public $image_lib;
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_time_schedule');
    }

    function index()
    {

        $data['_title'] = 'Time Schedule';
        $data['_script'] = 'time_schedule/time_schedule_js';
        $data['_view'] = 'time_schedule/time_schedule';
        $data['data_project'] = $this->m_time_schedule->m_data_project();
        // $data['data_kategori_schedule'] = $this->m_time_schedule->m_data_kategori_schedule();
        // $data['data_schedule'] = $this->m_time_schedule->m_data_schedule();
        $this->load->view('layout/index', $data);
    }
    function data_schedule()
    {

        $data['_title'] = 'Schedule Project';
        // $data['_script'] = 'time_schedule/time_schedule_js';
        $id_project = $this->input->post('id-project');
        $data['_view'] = 'time_schedule/data_schedule';
        $data['data_kategori_schedule'] = $this->m_time_schedule->m_data_kategori_schedule($id_project);
        $data['data_schedule'] = $this->m_time_schedule->m_data_schedule($id_project);
        $this->load->view('time_schedule/data_schedule', $data);
    }
    function data_foto_progres()
    {
        $data['_title'] = 'Schedule Project';
        $id_progres_schedule = $this->input->post('id-progres-schedule');
        $data['_view'] = 'time_schedule/data_foto_progres';
        $data['data_foto'] = $this->m_time_schedule->m_data_foto($id_progres_schedule);
        $this->load->view('time_schedule/data_foto_progres', $data);
    }
    function data_chart_schedule()
    {
        $id_project = $this->input->post('id-project');
        $data['_view'] = 'time_schedule/data_chart_schedule';
        $data['data_chart'] = $this->m_time_schedule->m_data_chart($id_project);
        $data['data_schedule'] = $this->m_time_schedule->m_data_schedule_validasi($id_project);
        $this->load->view('time_schedule/data_chart_schedule', $data);
    }
    function update_tahapan_schedule()
    {
        $id_schedule = $this->input->post('id-schedule');
        $tahapan = $this->input->post('tahapan');
        $tahapan_selesai = $this->input->post('tahapan-selesai');
        $tahapan_pekerjaan = $this->input->post('tahapan-pekerjaan');
        $status_schedule = $this->input->post('status-schedule');
        $id_project = $this->input->post('id-project');
        $jumlah_bobot = $this->input->post('jumlah-bobot');

        $update = $this->m_time_schedule->m_update_tahapan_schedule($id_schedule, $tahapan, $tahapan_selesai, $tahapan_pekerjaan, $status_schedule, $id_project, $jumlah_bobot);
        echo json_encode($update);
    }
    function add_foto_progres()
    {
        $config['upload_path'] = "./upload/schedule/";
        $config['allowed_types'] = 'gif|jpg|png';
        $config['encrypt_name'] = TRUE;

        $this->load->library('upload', $config);

        if ($this->upload->do_upload("file-foto-progres")) {
            $data = array('upload_data' => $this->upload->data());
            $id_progres_schedule = $this->input->post('id-progres-schedule');
            $id_foto_project = $this->input->post('id-project');
            $file_foto = $data['upload_data']['file_name'];
            $uploadedImage = $this->upload->data();
            $data = array(
                'id_progres_schedule' => $id_progres_schedule,
                'id_foto_project' => $id_foto_project,
                'file_foto' => $file_foto,
            );
            $this->resizeImage($uploadedImage['file_name']);
            $insert = $this->m_time_schedule->m_add_foto_progres($data);
            echo json_encode($insert);
        }
        exit;
    }
    function resizeImage($filename)
    {
        $source_path = 'upload/schedule/' . $filename;
        $target_path = 'upload/schedule/';
        $config = [
            'image_library' => 'gd2',
            'source_image' => $source_path,
            'new_image' => $target_path,
            'maintain_ratio' => TRUE,
            'quality' => '50%',
            'width' => '1440',
            'height' => 'auto',
        ];
        $this->load->library('image_lib', $config);
        if (!$this->image_lib->resize()) {
            return [
                'status' => 'error compress',
                'message' => $this->image_lib->display_errors()
            ];
        }
        $this->image_lib->clear();
        return 1;
    }

    function delete_foto()
    {
        $foto = $this->input->post('foto');
        unlink('./upload/schedule/' . $foto);

        $id_foto = $this->input->post('id-foto');
        $delete = $this->m_time_schedule->m_delete_foto($id_foto);
        echo json_encode($delete);
    }
}
