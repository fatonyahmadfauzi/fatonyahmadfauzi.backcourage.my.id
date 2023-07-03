<?php
class Account_user extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->database(); // Initialize the database
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('Model_auth'); // Pastikan Model_auth telah dibuat dan dimuat
        $this->load->model('Product_model'); // Pastikan model_product telah dibuat dan dimuat
    }

    public function index() {
        // Memeriksa status login pengguna
        if ($this->session->userdata('email')) {
            // Jika pengguna sudah login, gunakan template/sidebar_user
            $user = $this->User_model->get_user_by_email($this->session->userdata('email'));
            
            if ($user) {
                $role_id = $user['role_id'];

                $this->load->view('template/header');

                if ($role_id == 1) {
                    $this->load->view('template/sidebar_admin');
                } elseif ($role_id == 2) {
                    $this->load->view('template/sidebar_user');
                }

                $this->load->view('account/account_setting');
                $this->load->view('template/footer');
                
                return;
            }
        }
        // Load template sidebar untuk pengguna yang belum login
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('errors/not_logged_in');
        $this->load->view('template/footer');
    }

    public function updateAccount() {
        // Ambil data dari form
        $data = array(
            'nama' => $this->input->post('nama'),
            'email' => $this->input->post('email'),
            'nomor_hp' => $this->input->post('phone_number'),
            'region' => $this->input->post('region'),
            'role_id' => $this->input->post('account')
        );

        $user_id = 1; // ID user yang sedang aktif, dapat disesuaikan dengan session atau autentikasi
        $this->User_model->update($id, $data);

        // Redirect ke halaman account_settings
        redirect('Account_user');
    }

    public function updatePassword() {
        // Ambil data dari form
        $old_password = $this->input->post('old_password');
        $new_password = $this->input->post('new_password');
        $confirm_password = $this->input->post('confirm_password');

        // Validasi password baru
        if ($new_password !== $confirm_password) {
            // Password baru tidak sesuai dengan konfirmasi password
            echo 'Password baru tidak sesuai dengan konfirmasi password';
            return;
        }

        $user_id = 1; // ID user yang sedang aktif, dapat disesuaikan dengan session atau autentikasi

        // Periksa apakah old_password sesuai dengan password yang ada dalam database
        $user_data = $this->User_model->get_user($id);
        if ($old_password !== $user_data['password']) {
            // Password lama tidak sesuai dengan password yang ada dalam database
            echo 'Password lama tidak sesuai';
            return;
        }

        // Update password baru dalam tabel tb_user
        $data = array(
            'password' => $new_password
        );
        $this->User_model->update_user($id, $data);

        // Redirect ke halaman account_settings
        redirect('Account_user');
    }
}
?>