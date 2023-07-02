<?php 
class Account_model extends CI_Model
{
    public function get_user_info($user_id)
    {
        $this->db->select('tb_user.id, tb_user.username, tb_user.password, tb_user.nama, tb_user.email, info_user.profile_picture, info_user.alamat, info_user.nomor_hp, info_user.region');
        $this->db->from('tb_user');
        $this->db->join('info_user', 'info_user.user_id = tb_user.id');
        $this->db->where('tb_user.id', $user_id);
        $query = $this->db->get();
        return $query->row_array();
    }

    // ...
}
?>