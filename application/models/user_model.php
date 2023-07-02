<?php
class user_model extends CI_Model
{
    public function get_users()
    {
        $query = $this->db->get('tb_user');
        return $query->result_array();
    }

    public function get_admin_users()
    {
        $this->db->where('role_id', 1);
        $query = $this->db->get('tb_user');
        return $query->result_array();
    }

    public function get_normal_users()
    {
        $this->db->where('role_id', 2);
        $query = $this->db->get('tb_user');
        return $query->result_array();
    }

    public function create_user($username, $password, $nama, $email, $role_id)
    {
        $data = array(
            'username' => $username,
            'password' => $password,
            'nama' => $nama,
            'email' => $email,
            'role_id' => $role_id
        );
        $this->db->insert('tb_user', $data);
        //return $this->db->insert_id();
    }

    public function delete_user($id)
    {
        $this->db->where('id', $id);
        $this->db->delete('tb_user');
    }

    public function get_user($id)
    {
        $query = $this->db->get_where('tb_user', array('id' => $id));
        return $query->row_array();
    }

    public function get_user_role_id($email)
    {
        $this->db->select('role_id');
        $this->db->where('email', $email);
        $query = $this->db->get('tb_user');
        $result = $query->row_array();

        if ($result) {
            return $result['role_id'];
        } else {
            return null;
        }
    }

    public function get_user_by_email($email)
    {
        $this->db->where('email', $email);
        $query = $this->db->get('tb_user');
        $result = $query->row_array();

        return $result;
    }

    public function update($id, $username, $password, $nama, $email, $role_id)
    {
        $data = array(
            'username' => $username,
            'password' => $password,
            'nama' => $nama,
            'email' => $email,
            'role_id' => $role_id
        );
        $this->db->where('id', $id);
        $this->db->update('tb_user', $data);
    }

    public function verify_password($password, $hash)
    {
        return password_verify($password, $hash);
    }

    public function hash_password($password)
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }
}
?>
