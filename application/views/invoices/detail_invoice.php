<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Invoice</title>

    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/vendor/vendor.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/plugins/plugins.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.min.css">
    
</head>
<body>
    <!-- ...:::: Start Breadcrumb Section:::... -->
    <div class="breadcrumb-section breadcrumb-bg-color--golden">
        <div class="breadcrumb-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3 class="breadcrumb-title">Detail Invoice</h3>
                        <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                            <nav aria-label="breadcrumb">
                                <ul>
                                    <li><a href="<?php echo site_url('invoice');?>" method="post">Riwayat Transaksi</a></li>
                                    <li class="active" aria-current="page">Detail Invoice</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- ...:::: End Breadcrumb Section:::... -->
    <div class="container-fluid">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Nama Produk</th>
                    <th scope="col">Jumlah Pesanan</th>
                    <th scope="col">Harga Satuan</th>
                    <th scope="col">Sub_total</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($pesanan) && is_iterable($pesanan)) : ?>
                <?php
                    $no=1;
                    $grandTotal = 0; // Variable to store the total amount
                    
                    foreach ($pesanan as $psn) :
                        $subTotal = $psn->jumlah * $psn->harga; // Calculate the subtotal for each item
                        $grandTotal += $subTotal; // Add the subtotal to the grand total
                ?>
                <tr>
                    <th scope="row"><?php echo $no++ ?></th>
                    <td><?php echo $psn->nama_brg ?></td>
                    <td><?php echo $psn->jumlah ?></td>
                    <td>Rp. <?php echo number_format ($psn->harga) ?></td>
                    <td>Rp. <?php echo number_format ($subTotal) ?></td>
                </tr>
                <?php endforeach; ?>
                <td colspan="4" align="right">Total</td> 
                <td align="right">Rp. <?php echo number_format($subTotal) ?></td>
                <?php else : ?>
                <tr>
                    <td colspan="6">No orders found.</td>
                </tr>
                <?php endif; ?>
            <tbody>
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