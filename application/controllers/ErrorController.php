<?php
class ErrorController extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->model('User_model');
    }

    public function error_method() {
        // Tampilkan halaman 404 yang telah Anda buat
        $data = array(); // Anda bisa menyesuaikan data yang diperlukan

        if ($this->session->userdata('email')) {
            // Jika pengguna sudah login, gunakan template/sidebar_user
            $user = $this->User_model->get_user_by_email($this->session->userdata('email'));
            
            if ($user) {
                $role_id = $user['role_id'];

                $this->load->view('template/header', $data);

                if ($role_id == 1) {
                    $this->load->view('template/sidebar_admin', $data);
                } elseif ($role_id == 2) {
                    $this->load->view('template/sidebar_user', $data);
                }

                $this->load->view('errors/404', $data);
                $this->load->view('template/footer', $data);
                
                return;
            }
        }
        $this->load->view('template/header', $data);
        $this->load->view('errors/404', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('template/footer', $data);
    }
}
?>
