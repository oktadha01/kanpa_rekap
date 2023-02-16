<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public $load;
    public $m_user;
    public $uri;
    public $input;
    function __construct()
    {
        parent::__construct();
        $this->load->model('m_user');
    }

    function index()
    {

        $data['_title'] = 'User';
        $data['_script'] = 'user/user_js';
        $data['_view'] = 'user/user';
        $data['data_privilage'] = $this->m_user->m_data_privilage();
        // $data['data_foto'] = $this->m_user->m_data_foto();
        $this->load->view('layout/index', $data);
    }
    function data_user()
    {
        $data['_view'] = 'user/data_user';
        $data['data_user'] = $this->m_user->m_data_user();
        // $data['data_privilage'] = $this->m_user->m_data_privilage();
        $this->load->view('user/data_user', $data);
    }
    function simpan_data_user()
    {
        if ($this->input->post('action') == 'simpan') {

            $data = array(
                'nm_user' =>  $this->input->post('nm-user'),
                'password' =>  md5($this->input->post('password')),
                'id_privilage_user' =>  $this->input->post('privilage'),
            );
            $insert = $this->m_user->m_simpan_data_user($data);
            echo json_encode($insert);
        } else if ($this->input->post('action') == 'edit') {
            $id_user =  $this->input->post('id-user');
            $nm_user =  $this->input->post('nm-user');
            $id_privilage_user =  $this->input->post('privilage');
            $update = $this->m_user->m_edit_data_user($id_user, $nm_user, $id_privilage_user);
            echo json_encode($update);
        } else if ($this->input->post('action') == 'edit-pass') {
            $id_user =  $this->input->post('id-user');
            $nm_user =  $this->input->post('nm-user');
            $password =  $this->input->post('password');
            $id_privilage_user =  $this->input->post('privilage');
            $update = $this->m_user->m_edit_pass_user($id_user, $nm_user, $password, $id_privilage_user);
            echo json_encode($update);
        }
    }
    function delete_data_user(){
        $id_user =  $this->input->post('id-user');
        $update = $this->m_user->m_delete_data_user($id_user);
        echo json_encode($update);

    }
}
