<?php
class M_tenaga extends CI_Model
{

    function m_data_tenaga()
    {
        $this->db->select('*');
        $this->db->from('tenaga');
        $this->db->order_by('id_tenaga', 'desc');
        $query = $this->db->get();
        return $query->result();
    }
    function m_simpan_data_tenaga($nm_tenaga, $hrg_tenaga, $hrg_tenaga_lembur)
    {
        $data = array(
            'nm_tenaga' => $nm_tenaga,
            'hrg_tenaga' => $hrg_tenaga,
            'hrg_tenaga_lembur' => $hrg_tenaga_lembur,
        );
        $result = $this->db->insert('tenaga', $data);
        return $result;
    }
    function m_edit_data_tenaga($nm_tenaga, $hrg_tenaga, $id_tenaga, $hrg_tenaga_lembur)
    {
        $update = $this->db->set('nm_tenaga', $nm_tenaga)
            ->set('hrg_tenaga', $hrg_tenaga)
            ->set('hrg_tenaga_lembur', $hrg_tenaga_lembur)
            ->where('id_tenaga', $id_tenaga)
            ->update('tenaga');
        return $update;
    }

    function m_delete_data_tenaga($id_tenaga)
    {
        $delete = $this->db->where('id_tenaga', $id_tenaga)
            ->delete('tenaga');
        return $delete;
    }
}
