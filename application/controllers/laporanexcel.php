<?php
defined('BASEPATH') OR exit('No direct script access allowed');

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Laporanexcel extends CI_Controller {

    public function index()
    {
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1','No');
		$sheet->setCellValue('B1', 'Nama');
		$sheet->setCellValue('C1', 'Alamat');
		$sheet->setCellValue('D1', 'Tanggal Pemesanan');
		$sheet->setCellValue('E1', 'Batas Pembayaran');
		$data=$this->model_invoice->tampil_data();
		$no = 1;
		$x = 2;
		foreach($data as $row)
		{
			$sheet->setCellValue('A'.$x, $no++);
			$sheet->setCellValue('B'.$x, $row->nama);
			$sheet->setCellValue('C'.$x, $row->alamat);
			$sheet->setCellValue('D'.$x, $row->tanggal_pesan);
			$sheet->setCellValue('E'.$x, $row->batas_bayar);
			$x++;
		}
		$writer = new Xlsx($spreadsheet);
		$filename = 'Laporan Invoice';

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="'. $filename .'.xlsx"');
		header('Cache-Control: max-age=0');
		ob_end_clean();
		$writer->save('php://output');
	}
}
?>