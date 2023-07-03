<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran</title>

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
                        <h3 class="breadcrumb-title">Pembayaran</h3>
                        <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                            <nav aria-label="breadcrumb">
                                <ul>
                                    <li><a href="<?php echo site_url('katalog_product');?>" method="post">Katalog Product</a></li>
                                    <li><a href="<?php echo site_url('katalog_product/detail_keranjang');?>" method="post">Detail Keranjang</a></li>
                                    <li class="active" aria-current="page">Pembayaran</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- ...:::: End Breadcrumb Section:::... -->

    <div class="container-fluid"> 
            <div class="col-md-2"></div> 
            <div class="col-md-8"> 
                <div class="btn btn-sm btn-success"> 
                    <?php 
                    $grand_total=0; 
                    if ($keranjang=$this->cart->contents()) 
                    { 
                    foreach($keranjang as $item) 
                    { 
                    $grand_total=$grand_total+$item['subtotal']; 
                    } 
                    echo "<h4>Total Belanja Anda: Rp.".number_format($grand_total,0,',','.'); 
                    ?> 
                </div> 
                <h3>Input Alamat Pengiriman dan Pembayaran</h3> 
                <form method="post" action="<?php echo 
                    base_url('')?>katalog_product/proses_pesanan"> 
                    <div class="form-group"> 
                        <label for="exampleFormControlInput1">Email address</label> 
                        <input type="email" name="email" class="form-control" 
                        id="exampleFormControlInput1" placeholder="name@example.com"> 
                    </div> 
                    <div class="form-group"> 
                        <label for="exampleFormControlInput1">Nama Lengkap</label> 
                        <input type="text" name="nama" class="form-control" 
                        id="exampleFormControlInput1" placeholder="Nama Lengkap"> 
                    </div> 
                    <div class="form-group"> 
                        <label for="exampleFormControlInput1">Nomor Hp</label> 
                        <input type="text" name="no_hp" class="form-control" 
                        id="exampleFormControlInput1" placeholder="No Hp"> 
                    </div> 
                    <div class="form-group"> 
                        <label for="exampleFormControlSelect1">Jasa Pengiriman</label> 
                        <select class="form-control" name="jasa" id="exampleFormControlSelect1"> 
                            <option>Tiki</option> 
                            <option>POS</option> 
                            <option>JNE</option> 
                        </select> 
                    </div> 
                    <div class="form-group"> 
                        <label for="exampleFormControlSelect1">Metode pembayaran</label> 
                        <select class="form-control" name="jasa" id="exampleFormControlSelect1">
                            <option>Debit/Credit Card</option> 
                            <option>Transfer Bank</option> 
                            <option>Gopay</option> 
                            <option>OVO</option> 
                        </select> 
                    </div> 
                    <div class="form-group"> 
                        <label for="exampleFormControlTextarea1">Alamat Lengkap</label> 
                        <textarea class="form-control" name="alamat" id="exampleFormControlTextarea1" 
                        rows="3"></textarea> 
                    </div> 
                    <button type="submit" class="btn btn-sm btn-primary">Proses Pesanan</button> 
                </form> 
                <?php 
                }else{ 
                    echo "Keranjang Belanja anda masih kosong"; 
                } 
                ?> 
            </div> 
            <div class="col-md-2"></div> 
    </div>