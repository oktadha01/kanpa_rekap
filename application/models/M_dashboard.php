<?php
class M_dashboard extends CI_Model
{

    function m_data_project()
    {
        $this->db->select('*');
        $this->db->from('project');
        $this->db->order_by('id_project', 'desc');
        $query = $this->db->get();
        return $query->result();
    }
    function m_data_foto()
    {
        $this->db->select('*');
        $this->db->from('foto_progres');
        $this->db->order_by('id_foto', 'desc');
        // $this->db->limit(1);
        $query = $this->db->get();
        return $query->result();
    }
    function m_data_schedule()
    {
        $this->db->select('*');
        $this->db->from('schedule');
        $this->db->order_by('id_schedule', 'desc');
        $query = $this->db->get();
        return $query->result();
    }
}
