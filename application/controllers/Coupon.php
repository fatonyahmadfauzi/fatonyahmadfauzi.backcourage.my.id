<?php
class Coupon extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('Coupon_model');
    }

    public function index() {
        $data['coupons'] = $this->Coupon_model->get_coupons();
        $this->load->view('template/header');
        $this->load->view('template/sidebar_admin');
        $this->load->view('coupon_view', $data);
        $this->load->view('template/footer');
    }

    public function create_coupon() {
        $this->load->view('template/header');
        $this->load->view('template/sidebar_admin');
        $this->load->view('create_coupon');
        $this->load->view('template/footer');
    }

    public function save_coupon() {
        $code = $this->input->post('coupon_code');
        $discount = $this->input->post('coupon_discount');
        $expiration_date = $this->input->post('expiration_date');

        $this->Coupon_model->create_coupon($code, $discount, $expiration_date);

        redirect('coupon/coupon_list');
    }

    public function delete($id_coupons) {
        $this->Coupon_model->delete($id_coupons);
        redirect('coupon/coupon_list');
    }

    public function get_edit($id_coupons) {
        $data['coupon'] = $this->Coupon_model->get_coupon($id_coupons);
        if ($data['coupon']) {
            $this->load->view('template/header');
            $this->load->view('template/sidebar_admin');
            $this->load->view('edit_coupon', $data);
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
        redirect('coupon/coupon_list');
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
