<?php
class Coupon extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('Model_auth');
        $this->load->model('Coupon_model');
    }

    public function index() {
        $data['coupons'] = $this->Coupon_model->get_coupons();
        if ($this->session->userdata('email')) {
            // Jika pengguna sudah login, gunakan template/sidebar_user
            $user = $this->User_model->get_user_by_email($this->session->userdata('email'));
            
            if ($user) {
                $role_id = $user['role_id'];

                $this->load->view('template/header', $data);

                if ($role_id == 1) {
                    $this->load->view('template/sidebar_admin', $data);
                    $this->load->view('coupons/coupon_view', $data);
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

    public function create_coupon() {
        if ($this->session->userdata('email')) {
            // Jika pengguna sudah login, gunakan template/sidebar_user
            $user = $this->User_model->get_user_by_email($this->session->userdata('email'));
            
            if ($user) {
                $role_id = $user['role_id'];

                $data['coupons'] = $this->Coupon_model->get_coupons();
                $this->load->view('template/header', $data);

                if ($role_id == 1) {
                    $this->load->view('template/sidebar_admin', $data);
                    $this->load->view('coupons/create_coupon', $data);
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
        $this->load->view('errors/cannot_access');
        $this->load->view('template/footer');
    }

    public function save_coupon() {
        if ($this->input->server('REQUEST_METHOD') === 'POST') {
            $code = $this->input->post('coupon_code');
            $discount = $this->input->post('coupon_discount');
            $expiration_date = $this->input->post('expiration_date');

            $this->Coupon_model->create_coupon($code, $discount, $expiration_date);

            redirect('coupon');
        } else {
            // Redirect to error page or display an error message
            redirect('errors/error_view');
        }
    }

    public function delete($id_coupons) {
        $this->Coupon_model->delete($id_coupons);
        redirect('coupon');
    }

    public function get_edit($id_coupons) {
        $data['coupon'] = $this->Coupon_model->get_coupon($id_coupons);
        if ($data['coupon']) {
            if ($this->session->userdata('email')) {
            // Jika pengguna sudah login, gunakan template/sidebar_user
            $user = $this->User_model->get_user_by_email($this->session->userdata('email'));
            
            if ($user) {
                $role_id = $user['role_id'];

                $data['coupons'] = $this->Coupon_model->get_coupons();
                $this->load->view('template/header', $data);

                if ($role_id == 1) {
                    $this->load->view('template/sidebar_admin', $data);
                    $this->load->view('coupons/edit_coupon', $data);
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
        } else {
            echo "Data Was Not Found";
        }
    }

    public function update_coupon() {
        $id_coupons = $this->input->post('id_coupons');
        $code = $this->input->post('coupon_code');
        $discount = $this->input->post('coupon_discount');
        $expiration_date = $this->input->post('expiration_date');

        $this->Coupon_model->update_coupon($id_coupons, $code, $discount, $expiration_date);
        redirect('coupon');
    }

    public function process_coupon() {
        $code = $this->input->post('code');
        $coupon = $this->Coupon_model->validate_coupon($code);

        if ($coupon) {
            $discount = $coupon['discount'];
            $totalBelanja = $this->cart->total(); // Total belanja sebelum diskon
            $totalSetelahDiskon = $totalBelanja - ($totalBelanja * $discount / 100);
            $formattedTotal = number_format($totalSetelahDiskon, 0, ',', '.');

            echo json_encode([
                'total_amount' => $formattedTotal,
                'discount' => $discount
            ]);
        } else {
            echo json_encode(['error' => 'Kode kupon tidak valid atau telah kedaluwarsa.']);
        }
    }
}
?>
