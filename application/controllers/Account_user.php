<?php
// Controller: Account_user.php
class Account_user extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('User_model');
    }

    public function index()
    {
        if ($this->session->userdata('email')) {
            $user = $this->User_model->get_user_by_email($this->session->userdata('email'));
            
            if ($user) {
                $role_id = $user['role_id'];

                $this->load->view('template/header');

                if ($role_id == 1) {
                    $this->load->view('template/sidebar_admin');
                } elseif ($role_id == 2) {
                    $this->load->view('template/sidebar_user');
                }

                $this->load->view('account/account_setting', ['user' => $user]);
                $this->load->view('template/footer');
                
                return;
            }
        }

        // Handle jika data pengguna tidak ditemukan atau pengguna belum login
        echo 'User not found';
    }

    public function update()
    {
        // Process form submission and update the data in the model

        // Redirect back to the account settings page
        redirect('account_user');
    }
}
?>