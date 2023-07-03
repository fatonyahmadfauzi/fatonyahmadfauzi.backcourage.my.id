<?php
class Katalog_product extends CI_Controller{

    //bagian yang ditambahkan
    public function __construct() 
    { 
        parent::__construct();
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->model('Model_auth'); // Pastikan Model_auth telah dibuat dan dimuat
        $this->load->helper('url', 'form');
        $this->load->model('Product_model');
    }

    public function index()
    {
        $totalProducts = $this->Product_model->getTotalProducts();
        $perPage = 9;
        $currentPage = $this->input->get('page') ? $this->input->get('page') : 1;
        $start = ($currentPage - 1) * $perPage;

        // Mengambil parameter sort dari URL
        $sort = $this->input->get('sort');

        if ($sort === 'sortRating') {
            $data['products'] = $this->Product_model->get_rating($start, $perPage);
        } elseif ($sort === 'sortPopularity') {
            $data['products'] = $this->Product_model->get_popularity($start, $perPage);
        } elseif ($sort === 'sortLow') {
            $data['products'] = $this->Product_model->get_lowprice($start, $perPage);
        } elseif ($sort === 'sortHigh') {
            $data['products'] = $this->Product_model->get_highprice($start, $perPage);
        } elseif ($sort === 'sortName') {
            $data['products'] = $this->Product_model->get_name($start, $perPage);
        } else {
            $data['products'] = $this->Product_model->get_newness($start, $perPage);
        }

        $data['totalProducts'] = $totalProducts;
        $data['currentPage'] = $currentPage;
        $data['perPage'] = $perPage;

        // Memeriksa status login pengguna
        if ($this->session->userdata('email')) {
            // Jika pengguna sudah login, gunakan template/sidebar_user
            $role_id = $this->User_model->get_user_role_id($this->session->userdata('email'));
            $template = ($role_id == 1) ? 'template/sidebar_admin' : 'template/sidebar_user';
        } else {
            // Jika pengguna belum login, gunakan template/sidebar default
            $template = 'template/sidebar';
        }

        $this->load->view('template/header');
        $this->load->view($template, $data);
        $this->load->view('katalog_view', $data);
        $this->load->view('template/footer');
    }

    public function tambah_ke_keranjang($id)
    {
        $barang = $this->Product_model->find($id);
        $data = array(
            'id' => $barang->product_id,
            'qty' => 1,
            'price' => $barang->product_price,
            'name' => $barang->product_name,
            'options' => array(
                'picture' => '<img src="' . base_url('./upload/') . $barang->product_picture . '">',
            ),
        );

        $this->cart->insert($data);
        redirect('katalog_product');
    }

    public function detail_keranjang()
    {
        // Memeriksa status login pengguna
        if ($this->session->userdata('email')) {
            // Jika pengguna sudah login, gunakan template/sidebar_user
            $user = $this->User_model->get_user_by_email($this->session->userdata('email'));

            if ($user) {
                $data['user'] = $user; // Menambahkan data pengguna ke variabel data

                $this->load->view('template/header', $data);
                $this->load->view('template/sidebar_user', $data);
                $this->load->view('keranjang', $data); // Menambahkan variabel data saat memuat keranjang
                $this->load->view('template/footer', $data);

                return;
            }
        }

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('errors/not_logged_in'); // Mengarahkan ke not_logged_in jika pengguna belum login
        $this->load->view('template/footer');
    }

    public function hapus_keranjang($product_id) 
    { 
        $this->cart->remove($product_id);
        redirect('katalog_product/detail_keranjang');
    } 

    public function pembayaran()
    {
        // Memeriksa status login pengguna
        if ($this->session->userdata('email')) {
            // Jika pengguna sudah login, gunakan template/sidebar_user
            $user = $this->User_model->get_user_by_email($this->session->userdata('email'));

            if ($user) {
                $data['user'] = $user; // Menambahkan data pengguna ke variabel data

                $this->load->view('template/header', $data);
                $this->load->view('template/sidebar_user', $data);
                $this->load->view('pembayaran', $data);
                $this->load->view('template/footer', $data);

                return;
            }
        }

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('errors/not_logged_in'); // Mengarahkan ke not_logged_in jika pengguna belum login
        $this->load->view('template/footer');
    }

    public function proses_pesanan()
    {
        $di_proses=$this->Model_invoice->index();
        if($di_proses){
            $this->cart->destroy();
            $this->load->view('template/header');
            $this->load->view('template/sidebar_user');
            $this->load->view('proses_pesanan');
            $this->load->view('template/footer');
        }
        else{ echo"Maaf, Pesanan anda gagal diproses";}
    }

    function search(){
        $keyword = $this->input->get('keyword');
        $this->load->model('Product_model');

        $result = $this->Product_model->cari($keyword);
        $data['result'] = $result;

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

                $this->load->view('search/hasil_pencarian_user', $data);
                $this->load->view('template/footer', $data);
                
                return;
            }
        }

        $this->load->view('template/header');
        $this->load->view('template/sidebar');
        $this->load->view('search/hasil_pencarian_user',$data);
        $this->load->view('template/footer');
    }
}
?>