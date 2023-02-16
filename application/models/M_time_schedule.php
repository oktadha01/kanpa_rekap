<?php
class M_time_schedule extends CI_Model
{

    function m_data_project()
    {
        $this->db->select('*');
        $this->db->from('project');
        $this->db->order_by('id_project', 'desc');
        $query = $this->db->get();
        return $query->result();
    }
    function m_data_kategori_schedule($id_project)
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
    function m_data_schedule_validasi($id_project)
    {
        $this->db->select('*');
        $this->db->from('schedule');
        $this->db->where('id_schedule_project', $id_project);
        $this->db->where('status_schedule', ' ');
        $this->db->order_by('id_schedule', 'asc');
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->result();
    }
    function m_data_chart($id_project)
    {
        $this->db->select('*');
        $this->db->from('project');
        $this->db->where('id_project', $id_project);
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

    function m_update_tahapan_schedule($id_schedule, $tahapan, $tahapan_selesai, $tahapan_pekerjaan, $status_schedule, $id_project, $jumlah_bobot)
    {
        $update_schedule = $this->db->set('tahapan', $tahapan)
            ->set('tahapan_selesai', $tahapan_selesai)
            ->set('tahapan_pekerjaan', $tahapan_pekerjaan)
            ->set('status_schedule', $status_schedule)
            ->where('id_schedule', $id_schedule)
            ->update('schedule');
        $sql = "SELECT *FROM schedule WHERE status_schedule = ''";
        $query = $this->db->query($sql);
        if ($query->num_rows() >= 1) {
            $this->db->set('jumlah_bobot', $jumlah_bobot)
                ->set('status_project', '')
                ->where('id_project', $id_project)
                ->update('project');
        } else {
            $this->db->set('jumlah_bobot', $jumlah_bobot)
                ->set('status_project', 'selesai')
                ->where('id_project', $id_project)
                ->update('project');
        }
        return $update_schedule;
        // return $update_project1;
        // return $update_project2;
    }
    function m_add_foto_progres($data)
    {
        $result = $this->db->insert('foto_progres', $data);
        return $result;
    }

    function m_delete_foto($id_foto)
    {
        $delete = $this->db->where('id_foto', $id_foto)
            ->delete('foto_progres');
        return $delete;
    }
}
