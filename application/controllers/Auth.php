<?php
class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Load library atau helper yang diperlukan
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('Model_auth'); // Pastikan Model_auth telah dibuat dan dimuat
    }

    public function login()
    {
        $this->form_validation->set_rules('email', 'Email', 'required', ['required' => 'Email wajib diisi']);
        $this->form_validation->set_rules('password', 'Password', 'required', ['required' => 'Password wajib diisi']);

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar');
            $this->load->view('form_login');
            $this->load->view('template/footer');
        } else {
            $auth = $this->Model_auth->cek_login();
            if ($auth == FALSE) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">Email atau Password Anda Salah<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                redirect('auth/login');
            } else {
                $this->session->set_userdata('email', $auth->email);
                $this->session->set_userdata('nama', $auth->nama);
                $this->session->set_userdata('role_id', $auth->role_id);
                switch ($auth->role_id) {
                    case 1:
                        redirect('product');
                        break;
                    case 2:
                        redirect('blog');
                        break;
                    default:
                        break;
                }
            }
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email'); // Menghapus session 'email'
        $this->session->unset_userdata('nama');
        $this->session->unset_userdata('role_id');
        redirect('blog');
    }
}
?>
