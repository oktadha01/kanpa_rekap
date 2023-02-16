<?php
class M_detail extends CI_Model
{
    function m_data_progres($nm_project)
    {
        $sql = "SELECT * FROM project WHERE nm_project = '$nm_project'";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $data) {
                $id_project = $data->id_project;
            }
        }
        $this->db->select('*');
        $this->db->from('progres');
        $this->db->where('id_progres_project', $id_project);
        $this->db->order_by('id_progres', 'desc');
        $query = $this->db->get();
        return $query->result();
    }
    function m_data_project($nm_project)
    {

        $this->db->select('*');
        $this->db->from('project');
        $this->db->where('nm_project', $nm_project);
        $query = $this->db->get();
        return $query->result();
    }
    function m_data_material($id_project, $project_progres, $status_material)
    {
        $this->db->select('*');
        $this->db->from('material');
        $this->db->where('id_material_project', $id_project);
        $this->db->where('id_material_weekly', $project_progres);
        $this->db->where('status_material', $status_material);
        $this->db->order_by('id_material', 'desc');
        $query = $this->db->get();
        return $query->result();
    }
    function m_data_ketegori_schedule($id_project)
    {
        $this->db->select('*');
        $this->db->from('schedule');
        $this->db->where('id_schedule_project', $id_project);
        $this->db->group_by('kategori_pekerjaan');
        $this->db->order_by('id_schedule', 'asc');
        $query = $this->db->get();
        return $query->result();
    }
    function m_data_schedule($id_project)
    {
        $this->db->select('*');
        $this->db->from('schedule');
        $this->db->where('id_schedule_project', $id_project);
        $this->db->order_by('id_schedule', 'asc');
        $query = $this->db->get();
        return $query->result();
    }
    function m_rekap_gaji_tenaga($id_project, $id_weekly)
    {
        $this->db->select('*');
        $this->db->from('rekap_tenaga');
        $this->db->join('tenaga', 'tenaga.id_tenaga = rekap_tenaga.id_rekaptenaga');
        $this->db->where('id_rekaptenaga_project', $id_project);
        $this->db->where('id_rekaptenaga_weekly', $id_weekly);
        // $this->db->order_by('id_tenaga', 'desc');
        $query = $this->db->get();
        return $query->result();
    }

    function m_data_foto($id_progres_schedule)
    {
        $this->db->select('*');
        $this->db->from('foto_progres');
        $this->db->where('id_progres_schedule', $id_progres_schedule);
        $this->db->order_by('id_foto', 'asc');
        $query = $this->db->get();
        return $query->result();
    }
}
