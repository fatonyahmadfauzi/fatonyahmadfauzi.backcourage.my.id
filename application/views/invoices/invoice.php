<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Transaksi</title>

    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/vendor/vendor.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/plugins/plugins.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.min.css">
    
</head>
<body>
    <div class="container-fluid">
        <!-- ...:::: Start Breadcrumb Section:::... -->
        <div class="breadcrumb-section breadcrumb-bg-color--golden">
            <div class="breadcrumb-wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <h3 class="breadcrumb-title">Riwayat Transaksi</h3>
                            <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                                <nav aria-label="breadcrumb">
                                    <ul>
                                        <li class="active" aria-current="page">Riwayat Transaksi</li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- ...:::: End Breadcrumb Section:::... -->
        <a href="<?php echo site_url('laporanpdf') ?>" class="btn btn-success" style="color: white;">Print PDF</a>
        <a href="<?php echo site_url('laporanexcel') ?>" class="btn btn-success" style="color: white;">Print Excel</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Pemesan</th>
                    <th scope="col">Alamat</th>
                    <th scope="col">Tanggal Pemesanan</th>
                    <th scope="col">Batas Pembayaran</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($invoice) && is_iterable($invoice)) : ?>
                <?php
                $no = 1;
                foreach($invoice as $inv):
                ?>
                <tr>
                    <th scope="row"><?php echo $no++ ?></th>
                    <td><?php echo $inv->nama ?></td>
                    <td><?php echo $inv->alamat ?></td>
                    <td><?php echo $inv->tanggal_pesan ?></td>
                    <td><?php echo $inv->batas_bayar ?></td>
                    <td><?php echo anchor('invoice/detail/'.$inv->id_invoice,'<div class="btn btn-sm btn-primary">detail</div>')?></td>
                </tr>
                <?php endforeach; ?>
                <?php else : ?>
                    <tr>
                        <td colspan="6">No invoices found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>
    <!-- load jquery js file --> 
    <script src="<?php echo 
        base_url('assets/js/jquery.min.js');?>">
    </script> 
    
    <!-- load bootstrap js file --> 
    <script src="<?php echo 
        base_url('assets/js/bootstrap.min.js');?>">
    </script> 
</body>
</html>