<?php
class Invoice extends CI_Controller{

    public function index(){
        $data['invoice']=$this->Model_invoice->tampil_data();
        if ($this->session->userdata('email')) {
            // Jika pengguna sudah login, gunakan template/sidebar_user
            $user = $this->User_model->get_user_by_email($this->session->userdata('email'));
            
            if ($user) {
                $role_id = $user['role_id'];

                $data['coupons'] = $this->Coupon_model->get_coupons();
                $this->load->view('template/header', $data);

                if ($role_id == 1) {
                    $this->load->view('template/sidebar_admin', $data);
                    $this->load->view('invoices/invoice', $data);
                } elseif ($role_id == 2) {
                    $this->load->view('template/sidebar_user', $data);
                    $this->load->view('errors/cannot_access', $data);
                }

                $this->load->view('template/footer', $data);
                
                return;
                }
            }
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('errors/cannot_access', $data);
        $this->load->view('template/footer'); 
    }

    public function detail($id_invoice)
    {
        $data['invoice']=$this->Model_invoice->ambil_id_invoice($id_invoice);
        $data['pesanan']=$this->Model_invoice->ambil_id_pesanan($id_invoice);
        if ($this->session->userdata('email')) {
            // Jika pengguna sudah login, gunakan template/sidebar_user
            $user = $this->User_model->get_user_by_email($this->session->userdata('email'));
            
            if ($user) {
                $role_id = $user['role_id'];

                $data['coupons'] = $this->Coupon_model->get_coupons();
                $this->load->view('template/header', $data);

                if ($role_id == 1) {
                    $this->load->view('template/sidebar_admin', $data);
                    $this->load->view('invoices/detail_invoice', $data);
                } elseif ($role_id == 2) {
                    $this->load->view('template/sidebar_user', $data);
                    $this->load->view('errors/cannot_access', $data);
                }

                $this->load->view('template/footer', $data);
                
                return;
                }
            }
        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('errors/cannot_access', $data);
        $this->load->view('template/footer');
    }
}
?>