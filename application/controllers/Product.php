<?php
class Product extends CI_Controller {
    function __construct() {
        parent::__construct();
        $this->load->helper('url', 'form');
        $this->load->model('product_model');
        if ($this->session->userdata('role_id') != '1') {
            $this->session->set_flashdata('pesan', '<div class="alert alert-warning alert-dismissible fade show" role="alert">Anda Belum login<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
            redirect('auth/login');
        }
    }

    function index()
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

        $this->load->view('template/header');
        $this->load->view('template/sidebar_admin');
        $this->load->view('product_view', $data);
        $this->load->view('template/footer');
    }

    function add_new() {
        $this->load->view('template/header');
        $this->load->view('template/sidebar_admin');
        $this->load->view('add_product_view');
        $this->load->view('template/footer');
    }

    function save() {
        $product_name = $this->input->post('product_name');
        $product_price = $this->input->post('product_price');
        $product_picture = $_FILES['product_picture']['name'];
        $config['upload_path'] = './upload/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png|webp';
        $config['max_size'] = 2000;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('product_picture')) {
            echo "Gagal Upload Gambar";
        } else {
            $this->product_model->save($product_name, $product_price, $product_picture);
            redirect('product');
        }
    }

    function delete() {
        $product_id = $this->uri->segment(3);
        $product = $this->product_model->get_product_id($product_id);
        if (!$product) {
            redirect('product');
        }
        $picture_path = './upload/' . $product->product_picture;
        if (file_exists($picture_path) && is_file($picture_path)) {
            if (unlink($picture_path)) {
                $this->product_model->delete($product_id);
                redirect('product');
            } else {
                // Gagal menghapus file, tangani kesalahan dengan sesuai
            }
        } else {
            // File tidak ditemukan dalam folder, lanjutkan dengan menghapus entri database
            $this->product_model->delete($product_id);
            redirect('product');
        }
    }

    function get_edit() {
        $product_id = $this->uri->segment(3);
        $result = $this->product_model->get_product_id($product_id);
        if ($result->num_rows() > 0) {
            $i = $result->row_array();
            $data = array(
                'product_id' => $i['product_id'],
                'product_name' => $i['product_name'],
                'product_price' => $i['product_price']
            );
            $this->load->view('template/header');
            $this->load->view('template/sidebar_admin');
            $this->load->view('edit_product_view', $data);
            $this->load->view('template/footer');
        } else {
            echo "Data Was Not Found";
        }
    }

    function update() {
        $product_id = $this->input->post('product_id');
        $product_name = $this->input->post('product_name');
        $product_price = $this->input->post('product_price');
        $product_picture = $_FILES['product_picture']['name'];
        $config['upload_path'] = './upload/';
        $config['allowed_types'] = 'gif|jpg|jpeg|png|webp';
        $config['max_size'] = 2000;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if (!$this->upload->do_upload('product_picture')) {
            echo "Gagal Upload Gambar";
        } else {
            $this->product_model->update($product_id, $product_name, $product_price, $product_picture);
            redirect('product');
        }
    }

    function search(){
        $keyword = $this->input->get('keyword');
        $this->load->model('product_model');

        $result = $this->product_model->cari($keyword);
        $data['result'] = $result;

        $this->load->view('template/header');
        $this->load->view('template/sidebar_admin');
        $this->load->view('hasil_pencarian_admin',$data);
        $this->load->view('template/footer');
    }
}
?>