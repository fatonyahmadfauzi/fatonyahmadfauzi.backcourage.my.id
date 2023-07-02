<?php
class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User_model');
        $this->load->library('session');
    }

    public function index()
    {
        $sort = $this->input->get('sort');

        if ($sort === 'admin') {
            $data['users'] = $this->User_model->get_admin_users();
        } elseif ($sort === 'user') {
            $data['users'] = $this->User_model->get_normal_users();
        } else {
            $data['users'] = $this->User_model->get_users();
        }
        $this->load->view('template/header');
        $this->load->view('template/sidebar_admin');
        $this->load->view('user_view', $data);
        $this->load->view('template/footer');
    }

    public function create()
    {
        $this->load->view('template/header');
        $this->load->view('template/sidebar_admin');
        $this->load->view('user_create');
        $this->load->view('template/footer');
    }

    public function save()
    {
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $role_id = $this->input->post('role_id');
        


        // Validasi data sebelum disimpan
        if (empty($username) || empty($password) || empty($nama) || empty($email) || empty($role_id)) {
            // Jika ada data yang kosong, tampilkan pesan error
            $this->session->set_flashdata('error_message', 'Harap lengkapi semua data!');
            redirect('user');
            return;
        }

        // Panggil fungsi hash_password() pada model untuk mengenkripsi password
        $hashed_password = $this->User_model->hash_password($password);

        // Panggil fungsi create_user() pada model untuk menyimpan data
        $result = $this->User_model->create_user($username, $hashed_password, $nama, $email, $role_id);
       

        if ($result) {
            // Jika berhasil disimpan, tampilkan pesan berhasil
            $this->session->set_flashdata('success_message', 'Data berhasil dibuat!');
        } else {
            // Jika terjadi kesalahan saat menyimpan, tampilkan pesan error
            $this->session->set_flashdata('error_message', 'Terjadi kesalahan saat menyimpan data.');
        }
        

        redirect('user');
    }

    public function delete($id)
    {
        $this->User_model->delete_user($id);
        redirect('user');
    }

    public function edit($id)
    {
        $id = $this->uri->segment(3);
        $result = $this->User_model->get_user($id);
        if ($result->num_rows() > 0) {
            $i = $result->row_array();
            $data = array(
                'id' => $i['id'],
                'username' => $i['username'],
                'password' => $i['password'],
                'nama' => $i['nama'],
                'email' => $i['email'],
                'role_id' => $i['role_id']
            );
            $this->load->view('template/header');
            $this->load->view('template/sidebar_admin');
            $this->load->view('user_edit' ,$data);
            $this->load->view('template/footer');
        } else {
            echo "Data Was Not Found";
        }
    }

    function update(){
        $id = $this->input->post('id');
        $username = $this->input->post('username');
        $password = $this->input->post('password');
        $nama = $this->input->post('nama');
        $email = $this->input->post('email');
        $role_id = $this->input->post('role_id');
        

        // Panggil fungsi hash_password() pada model untuk mengenkripsi password
        //$hashed_password = $this->User_model->hash_password($password);

        $this->User_model->update($id, $username, $password, $nama, $email, $role_id);
        redirect('user');
    }
}
?>
