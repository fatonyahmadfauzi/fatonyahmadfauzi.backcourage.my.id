<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Pencarian</title>

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
                        <h3 class="breadcrumb-title">Hasil Pencarian</h3>
                        <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                            <nav aria-label="breadcrumb">
                                <ul>
                                    <li class="active" aria-current="page">Hasil Pencarian</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- ...:::: End Breadcrumb Section:::... -->

    <div class="sort-product-tab-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="tab-content">
                        <div class="tab-pane active show sort-layout-single" id="layout-4-grid">
                            <div class="row">
                                <?php if (!empty($result)) { ?>
                                    <?php foreach ($result as $row) { ?>
                                        <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                                            <div class="product-default-single-item product-color--golden"
                                                data-aos="fade-up" data-aos-delay="0">
                                                <div class="image-box">
                                                    <a href="product-details-default.html" class="image-link">
                                                        <img src="<?php echo base_url().'/upload/'.$row->product_picture;?>"
                                                            alt="">
                                                    </a>
                                                    <div class="action-link">
                                                        <div class="action-link-left">
                                                            <?php echo anchor('katalog_product/tambah_ke_keranjang/'.$row->product_id, 'Add to Cart'); ?>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="content">
                                                    <div class="content-left">
                                                        <h6 class="title"><a
                                                                href="product-details-default.html"><?php echo $row->product_name;?></a></h6>
                                                        <ul class="review-star">
                                                            <li class="fill"><i class="ion-android-star"></i></li>
                                                            <li class="fill"><i class="ion-android-star"></i></li>
                                                            <li class="fill"><i class="ion-android-star"></i></li>
                                                            <li class="fill"><i class="ion-android-star"></i></li>
                                                            <li class="empty"><i class="ion-android-star"></i></li>
                                                        </ul>
                                                    </div>
                                                    <div class="content-right">
                                                        <span class="price">Rp. <?php echo number_format($row->product_price);?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                <?php } else { ?>
                                    <div class="col-12">
                                        <p>Tidak ada hasil pencarian.</p>
                                    </div>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>