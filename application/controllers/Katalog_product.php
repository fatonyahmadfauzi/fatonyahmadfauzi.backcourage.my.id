<?php
class Katalog_product extends CI_Controller{

    //bagian yang ditambahkan
    public function __construct() 
    { 
        parent::__construct();
        $this->load->library('session');
        $this->load->library('form_validation');
        $this->load->library('pagination');
        $this->load->model('Model_auth'); // Pastikan Model_auth telah dibuat dan dimuat
        $this->load->helper('url', 'form');
        $this->load->model('Product_model');
    }

    public function index()
    {
        $perPage = 9;
        $currentPage = $this->input->get('page') ? $this->input->get('page') : 1;
        $start = ($currentPage - 1) * $perPage;

        $sort = $this->input->get('sort') ? $this->input->get('sort') : 'default';

        // Pencarian
        $search = $this->input->get('search');
        if (!empty($search)) {
            $totalProducts = $this->Product_model->getTotalSearchProducts($search);
            $data['products'] = $this->getSortedProducts($sort, $start, $perPage, $search); // Menggunakan $search sebagai argumen
            $data['sort'] = 'search';
        } else {
            $totalProducts = $this->Product_model->getTotalProducts();
            $data['products'] = $this->getSortedProducts($sort, $start, $perPage);
            $data['sort'] = $sort;
        }

        $data['totalProducts'] = $totalProducts;
        $data['currentPage'] = $currentPage;
        $data['perPage'] = $perPage;

        $this->load->library('pagination');

        if ($totalProducts > $perPage && $perPage > 0) {
            $config['base_url'] = site_url('katalog_product');
            $config['total_rows'] = $totalProducts;
            $config['per_page'] = $perPage;
            $config['use_page_numbers'] = true;
            $config['query_string_segment'] = 'page';
            $config['page_query_string'] = true;

            $this->pagination->initialize($config);

            $data['pagination'] = $this->pagination->create_links();
        } else {
            $data['pagination'] = '';
        }

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

                $this->load->view('katalog_view', $data);
                $this->load->view('template/footer', $data);
                
                return;
            }
        }

        $this->load->view('template/header');
        $this->load->view('template/sidebar'); // Menggunakan variabel $sidebar
        $this->load->view('katalog_view', $data);
        $this->load->view('template/footer');
    }

    private function getSortedProducts($sort, $start, $perPage, $search = null)
    {
        switch ($sort) {
            case 'sortRating':
                return $search ? $this->Product_model->get_rating_search($search, $start, $perPage) : $this->Product_model->get_rating($start, $perPage);
            case 'sortPopularity':
                return $search ? $this->Product_model->get_popularity_search($search, $start, $perPage) : $this->Product_model->get_popularity($start, $perPage);
            case 'sortLow':
                return $search ? $this->Product_model->get_lowprice_search($search, $start, $perPage) : $this->Product_model->get_lowprice($start, $perPage);
            case 'sortHigh':
                return $search ? $this->Product_model->get_highprice_search($search, $start, $perPage) : $this->Product_model->get_highprice($start, $perPage);
            case 'sortName':
                return $search ? $this->Product_model->get_name_search($search, $start, $perPage) : $this->Product_model->get_name($start, $perPage);
            default:
                return $search ? $this->Product_model->get_newness_search($search, $start, $perPage) : $this->Product_model->get_newness($start, $perPage);
        }
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
        redirect($_SERVER['HTTP_REFERER']); // Redirect ke halaman sebelumnya
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
        redirect($_SERVER['HTTP_REFERER']); // Redirect ke halaman sebelumnya
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
            if ($this->session->userdata('email')) {
                // Jika pengguna sudah login, gunakan template/sidebar_user
                $user = $this->User_model->get_user_by_email($this->session->userdata('email'));
                
                if ($user) {
                    $role_id = $user['role_id'];

                    $data['coupons'] = $this->Coupon_model->get_coupons();
                    $this->load->view('template/header', $data);

                    if ($role_id == 1) {
                        $this->load->view('template/sidebar_admin', $data);
                        $this->load->view('errors/cannot_access', $data);
                    } elseif ($role_id == 2) {
                        $this->load->view('template/sidebar_user', $data);
                        $this->load->view('proses_pesanan', $data);
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
        else{ echo"Maaf, Pesanan anda gagal diproses";}
    }
}
?>