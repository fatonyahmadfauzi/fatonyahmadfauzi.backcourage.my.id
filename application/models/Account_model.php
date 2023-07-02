<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Account_model extends CI_Model {

    public function getInfoUsers() {
        return $this->db->get('info_user')->result();
    }

    public function getUserInfo($user_id)
    {
        $query = $this->db->get_where('tb_user', array('user_id' => $user_id));
        return $query;
    }

    public function addInfoUser($data) {
        $this->db->insert('info_user', $data);
        return $this->db->insert_id();
    }

    public function updateInfoUser($user_id, $data) {
        $this->db->where('user_id', $user_id);
        return $this->db->update('info_user', $data);
    }

    public function deleteInfoUser($user_id) {
        $this->db->where('user_id', $user_id);
        return $this->db->delete('info_user');
    }
}
?>