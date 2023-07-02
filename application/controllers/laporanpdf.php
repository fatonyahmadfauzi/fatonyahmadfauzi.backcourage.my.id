<?php
Class Laporanpdf extends CI_Controller{

    function __construct() {
        parent::__construct();
        $this->load->library('pdf');
        $this->load->model('Model_invoice');
    }

    function index(){
        $pdf = new FPDF('p','mm','A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial','B',16);
        // mencetak string
        $pdf->Cell(190,7,'DAFTAR INVOICE',0,1,'C');
        $pdf->SetFont('Arial','B',12);
        $pdf->Cell(190,7,'PENJUALAN TOKO FURNITURE STORE',0,1,'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(40,6,'Nama Pemesan',1,0);
        $pdf->Cell(70,6,'Alamat',1,0);
        $pdf->Cell(40,6,'Tanggal Pemesanan',1,0);
        $pdf->Cell(40,6,'Batas Pembayaran',1,1);
        $pdf->SetFont('Arial','',10);
        $data=$this->Model_invoice->tampil_data();
        foreach ($data as $row){
        $pdf->Cell(40,6,$row->nama,1,0);
        $pdf->Cell(70,6,$row->alamat,1,0);
        $pdf->Cell(40,6,$row->tanggal_pesan,1,0);
        $pdf->Cell(40,6,$row->batas_bayar,1,1);
        }
        $pdf->Cell(10,7,'',0,1);
        $pdf->SetFont('Arial','B',10);
        $pdf->Cell(170,7,'Kepala Toko',0,1,'R');
        $pdf->Cell(10,20,'',0,1);
        $pdf->Cell(170,7,$this->session->userdata('nama') ,0,1,'R');

        $pdf->Output();
    }
}
?>