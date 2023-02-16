<?php
class M_user extends CI_Model
{

    function m_data_user()
    {
        $this->db->select('*');
        $this->db->from('user');
        $this->db->order_by('id_user', 'desc');
        $query = $this->db->get();
        return $query->result();
    }
    function m_data_privilage()
    {
        $this->db->select('*');
        $this->db->from('privilage');
        $this->db->order_by('id_privilage', 'desc');
        $query = $this->db->get();
        return $query->result();
    }
    function m_simpan_data_user($data)
    {
        $result = $this->db->insert('user', $data);
        return $result;
    }
    function m_edit_data_user($id_user, $nm_user, $id_privilage_user)
    {
        $update = $this->db->set('nm_user', $nm_user)
            ->set('id_privilage_user', $id_privilage_user)
            ->where('id_user', $id_user)
            ->update('user');
        return $update;
    }
    function m_edit_pass_user($id_user, $nm_user, $password, $id_privilage_user)
    {
        $password = md5($password);
        $update = $this->db->set('nm_user', $nm_user)
            ->set('password', $password)
            ->set('id_privilage_user', $id_privilage_user)
            ->where('id_user', $id_user)
            ->update('user');
        return $update;
    }
    function m_delete_data_user($id_user)
    {
        $delete = $this->db->where('id_user', $id_user)
            ->delete('user');
        return $delete;
    }
}
