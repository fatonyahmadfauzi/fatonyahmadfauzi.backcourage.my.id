<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Product</title>

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
                    <h3 class="breadcrumb-title">Katalog Produk</h3>
                    <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                        <nav aria-label="breadcrumb">
                            <ul>
                                <li><a href="<?php echo site_url('blog');?>" method="post">Home</a></li>
                                <li><a class="active" aria-current="page">Katalog Produk</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- ...:::: End Breadcrumb Section:::... -->

<!-- ...:::: Start Shop Section:::... -->
<div class="shop-section">
    <div class="container">
        <div class="row flex-column-reverse flex-lg-row">
            <div class="col-lg-12">
                <!-- Start Shop Product Sorting Section -->
                <div class="shop-sort-section">
                    <div class="container">
                        <div class="row">
                            <!-- Start Sort Wrapper Box -->
                            <div class="sort-box d-flex justify-content-between align-items-md-center align-items-start flex-md-row flex-column"
                                data-aos="fade-up" data-aos-delay="0">
                                <!-- Start Sort tab Button -->
                                <div class="sort-tablist d-flex align-items-center">

                                    <!-- Start Page Amount -->
                                    <div class="page-amount ml-2">
                                        <span>Showing <?php echo ($currentPage - 1) * $perPage + 1; ?>–<?php echo min($currentPage * $perPage, $totalProducts); ?> of <?php echo $totalProducts; ?> results</span>
                                    </div> <!-- End Page Amount -->
                                </div> <!-- End Sort tab Button -->

                                <!-- Start Sort Select Option -->
                                <div class="sort-select-list d-flex align-items-center">
                                    <label class="mr-2">Sort By:</label>
                                    <form action="<?php echo site_url('product') ?>" method="get">
                                        <fieldset>
                                            <select name="sort" id="short" onchange="sortProducts()">
                                                <option value="sortRating" <?php echo $this->input->get('sort') == 'sortRating' ? 'selected' : ''; ?>>Sort by average rating</option>
                                                <option value="sortPopularity" <?php echo $this->input->get('sort') == 'sortPopularity' ? 'selected' : ''; ?>>Sort by popularity</option>
                                                <option value="sortNewness" <?php echo $this->input->get('sort') == 'sortNewness' ? 'selected' : ''; ?>>Sort by newness</option>
                                                <option value="sortLow" <?php echo $this->input->get('sort') == 'sortLow' ? 'selected' : ''; ?>>Sort by price: low to high</option>
                                                <option value="sortHigh" <?php echo $this->input->get('sort') == 'sortHigh' ? 'selected' : ''; ?>>Sort by price: high to low</option>
                                                <option value="sortName" <?php echo $this->input->get('sort') == 'sortName' ? 'selected' : ''; ?>>Product Name: Z</option>
                                            </select>
                                        </fieldset>
                                    </form>
                                </div>
                                <!-- End Sort Select Option -->

                            </div> <!-- Start Sort Wrapper Box -->
                        </div>
                    </div>
                </div> <!-- End Section Content -->

                <!-- Start Tab Wrapper -->
                <div class="sort-product-tab-wrapper">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="tab-content">
                                    <!-- Start Grid View Product -->
                                    <div class="tab-pane active show sort-layout-single" id="layout-4-grid">
                                        <div class="row">
                                            <?php foreach($products as $row): ?>
                                                <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                                                    <!-- Start Product Default Single Item -->
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
                                                                <!--div class="action-link-right">
                                                                    <a href="#" data-bs-toggle="modal"
                                                                        data-bs-target="#modalQuickview"><i
                                                                            class="icon-magnifier"></i></a>
                                                                    <a href="wishlist.html"><i
                                                                            class="icon-heart"></i></a>
                                                                    <a href="compare.html"><i
                                                                            class="icon-shuffle"></i></a>
                                                                </div-->
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
                                                    <!-- End Product Default Single Item -->
                                                </div>
                                            <?php endforeach ?>
                                        </div>
                                    </div> <!-- End Grid View Product -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div> <!-- End Tab Wrapper -->

                <!-- Start Pagination -->
                <div class="page-pagination text-center" data-aos="fade-up" data-aos-delay="0">
                    <ul>
                        <?php for ($i = 1; $i <= ceil($totalProducts / $perPage); $i++) : ?>
                            <li <?php if ($i == $currentPage) echo 'class="active"'; ?>>
                                <a href="<?php echo site_url('katalog_product?page=' . $i); ?>"><?php echo $i; ?></a>
                            </li>
                        <?php endfor; ?>
                    </ul>
                </div> <!-- End Pagination -->

            </div> <!-- End Shop Product Sorting Section  -->
        </div>
    </div>
</div> <!-- ...:::: End Shop Section:::... -->

<script>
    function sortProducts() {
        var sortValue = document.getElementById("short").value;
        var url = "<?php echo site_url('katalog_product'); ?>";
        url += "?sort=" + sortValue;

        window.location.href = url;
    }
</script>