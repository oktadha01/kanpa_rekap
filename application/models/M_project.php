<?php
class M_project extends CI_Model
{

    function m_data_project()
    {
        $this->db->select('*');
        $this->db->from('project');
        $this->db->order_by('id_project', 'desc');
        $query = $this->db->get();
        return $query->result();
    }
    function m_data_weekly($id_project)
    {
        $this->db->select('*');
        $this->db->from('progres');
        $this->db->where('id_progres_project', $id_project);
        $this->db->order_by('weekly', 'desc');
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
    function m_data_tenaga()
    {
        $this->db->select('*');
        $this->db->from('tenaga');
        // $this->db->where('status_tenaga', '');
        $this->db->order_by('id_tenaga', 'desc');
        $query = $this->db->get();
        return $query->result();
    }
    function m_data_tenaga_project($id_project, $id_weekly)
    {
        $weekly = $id_weekly;
        $this->db->select('*');
        $this->db->from('tenaga');
        $this->db->where('id_project_tenaga', $id_project);
        $this->db->where('status_bayar_gaji', $weekly);
        $this->db->order_by('id_tenaga', 'desc');
        $query = $this->db->get();
        return $query->result();
    }
    function m_simpan_data_project($data)
    {
        $result = $this->db->insert('project', $data);
        return $result;
    }
    function m_add_weekly_project($id_project, $add_weekly, $total_progres_material, $total_progres_tenaga, $total_progres_lainnya)
    {

        $sql = "SELECT * FROM project WHERE id_project = $id_project";
        $query = $this->db->query($sql);
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $project) {
                $add_weekly = $project->project_progres + 1;
            }
        }
        // $project_progres = $add_weekly + 1;
        $update = $this->db->set('project_progres', $add_weekly)
            ->where('id_project', $id_project)
            ->update('project');
        $data = array(
            'id_progres_project' => $id_project,
            'weekly' => $add_weekly,
            'total_progres_material' => $total_progres_material,
            'total_progres_tenaga' => $total_progres_tenaga,
            'total_progres_lainnya' => $total_progres_lainnya,
        );
        $insert = $this->db->insert('progres', $data);
        return $update;
        return $insert;
    }
    function m_add_tenaga_projec($id_project, $id_tenaga, $weekly)
    {
        $update = $this->db->set('id_project_tenaga', $id_project)
            ->set('status_tenaga', 'active')
            ->set('status_bayar_gaji', $weekly)
            ->where('id_tenaga', $id_tenaga)
            ->update('tenaga');
        return $update;
    }
    function m_delete_tenaga_project($id_tenaga, $action, $id_rekap_tenaga, $total_biaya, $id_project)
    {
        if ($action == 'rows-insert') {
            $update = $this->db->set('id_project_tenaga', '0')
                ->set('status_tenaga', '')
                ->set('status_bayar_gaji', '')
                ->where('id_tenaga', $id_tenaga)
                ->update('tenaga');
            return $update;
        } else if ($action == 'rows-update') {
            $delete = $this->db->where('id_rekap_tenaga', $id_rekap_tenaga)
                ->delete('rekap_tenaga');
            $update = $this->db->set('total_biaya', $total_biaya)
                ->where('id_project', $id_project)
                ->update('project');
            return $update;
            return $delete;
        }
    }
    function m_simpan_data_material($data, $total_biaya, $id_project)
    {
        $result = $this->db->insert('material', $data);
        $update = $this->db->set('total_biaya', $total_biaya)
            ->where('id_project', $id_project)
            ->update('project');
        return $update;
        return $result;
    }
    function m_edit_data_material($id_material, $nm_material, $total_material)
    {
        $update = $this->db->set('nm_material', $nm_material)
            ->set('total_material', $total_material)
            ->where('id_material', $id_material)
            ->update('material');
        return $update;
    }
    function m_update_total_rekap($id_project, $weekly, $total_progres_material, $total_progres_tenaga, $total_progres_lainnya)
    {
        $update = $this->db->set('total_progres_material', $total_progres_material)
            ->set('total_progres_tenaga', $total_progres_tenaga)
            ->set('total_progres_lainnya', $total_progres_lainnya)
            ->where('id_progres_project', $id_project)
            ->where('weekly', $weekly)
            ->update('progres');
        return $update;
        echo json_encode('$update');
    }

    function m_delete_data_material($id_material, $total_biaya, $id_project)
    {
        $delete = $this->db->where('id_material', $id_material)
            ->delete('material');
        $update = $this->db->set('total_biaya', $total_biaya)
            ->where('id_project', $id_project)
            ->update('project');
        return $update;
        return $delete;
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
    function m_data_tenaga_blm_disimpan($id_project, $id_weekly)
    {
        $this->db->select('*');
        $this->db->from('rekap_tenaga');
        $this->db->where('id_rekaptenaga_project', $id_project);
        $this->db->where('id_rekaptenaga_weekly', $id_weekly);
        $this->db->where('status_gaji', 'blm_disimpan');
        $this->db->limit(1);
        $query = $this->db->get();
        return $query->result();
    }
    function m_add_gaji_tenaga($action, $id_rekap_tenaga, $id_rekaptenaga, $id_rekaptenaga_project, $id_rekaptenaga_weekly, $total_gaji_h, $jmlh_h, $jmlh_j, $total_lembur)
    {
        if ($action == 'insert') {
            $status_bayar_gaji = $id_rekaptenaga_weekly + 1;
            $data = array(

                'id_rekaptenaga' => $id_rekaptenaga,
                'id_rekaptenaga_project' => $id_rekaptenaga_project,
                'id_rekaptenaga_weekly' => $id_rekaptenaga_weekly,
                'jmlh_h' => $jmlh_h,
                'total_gaji_h' => $total_gaji_h,
                'jmlh_j' => $jmlh_j,
                'total_lembur' => '0',
                'status_gaji' => 'blm_disimpan',
            );
            $insert = $this->db->insert('rekap_tenaga', $data);
            $update = $this->db->set('status_bayar_gaji', $status_bayar_gaji)
                ->where('id_tenaga', $id_rekaptenaga)
                ->update('tenaga');
            return $insert;
            return $update;
        } else if ($action == 'update') {
            $update = $this->db->set('jmlh_h', $jmlh_h)
                ->set('total_gaji_h', $total_gaji_h)
                ->set('jmlh_j', $jmlh_j)
                ->set('total_lembur', $total_lembur)
                ->set('status_gaji', 'blm_disimpan')
                ->where('id_rekap_tenaga', $id_rekap_tenaga)
                ->update('rekap_tenaga');
            return $update;
        }
    }
    function m_update_total_biaya($total_biaya, $id_project, $project_progres, $total_tenaga_weekly)
    {
        $update_total_biaya = $this->db->set('total_biaya', $total_biaya)
            ->where('id_project', $id_project)
            ->update('project');
        $update_rekap_tenaga = $this->db->set('status_gaji', 'disimpan')
            ->where('id_rekaptenaga_project', $id_project)
            ->where('id_rekaptenaga_weekly', $project_progres)
            ->update('rekap_tenaga');
        $update_total_tenaga_weekly = $this->db->set('total_tenaga_weekly', $total_tenaga_weekly)
            ->where('id_progres_project', $id_project)
            ->where('weekly', $project_progres)
            ->update('progres');
        return $update_total_biaya;
        return $update_rekap_tenaga;
        return $update_total_tenaga_weekly;
    }
}
