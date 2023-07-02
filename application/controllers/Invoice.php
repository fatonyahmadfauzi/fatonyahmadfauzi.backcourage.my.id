<?php
class Invoice extends CI_Controller{

    public function index(){
        $data['invoice']=$this->Model_invoice->tampil_data();
        $this->load->view('template/header');
        $this->load->view('template/sidebar_user');
        $this->load->view('invoices/invoice',$data);
        $this->load->view('template/footer');
    }

    public function detail($id_invoice)
    {
        $data['invoice']=$this->Model_invoice->ambil_id_invoice($id_invoice);
        $data['pesanan']=$this->Model_invoice->ambil_id_pesanan($id_invoice);
        $this->load->view('template/header');
        $this->load->view('template/sidebar_user');
        $this->load->view('invoices/detail_invoice',$data);
        $this->load->view('template/footer');
    }
}
?>