<?php 
class Blog extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->database(); // Initialize the database
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('model_auth'); // Pastikan model_auth telah dibuat dan dimuat
        $this->load->model('Product_model'); // Pastikan model_product telah dibuat dan dimuat
    }

    public function index()
    {
        $data['products1'] = $this->getProductSet1();
        $data['products2'] = $this->getProductSet2();

        // Memeriksa status login pengguna
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

                $this->load->view('blog_view', $data);
                $this->load->view('template/footer', $data);
                
                return;
            }
        }

        // Handle jika data pengguna tidak ditemukan atau pengguna belum login
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar', $data);
        $this->load->view('blog_view', $data);
        $this->load->view('template/footer', $data);
    }

    public function getProductSet1() {
        $this->db->select('product_name, product_picture');
        $this->db->order_by('product_id', 'desc');
        $this->db->limit(1);
        $query = $this->db->get('product');
        return $query; // Return the query object
    }

    public function getProductSet2() {
        $this->db->select('product_name, product_picture');
        $this->db->order_by('product_id', 'desc');
        $this->db->limit(1, 1);
        $query = $this->db->get('product');
        return $query; // Return the query object
    }
}
?>
