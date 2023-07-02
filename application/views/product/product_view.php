<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>

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
                        <h3 class="breadcrumb-title">Product List</h3>
                        <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                            <nav aria-label="breadcrumb">
                                <ul>
                                    <li><a href="<?php echo site_url('blog');?>" method="post">Home</a></li>
                                    <li class="active" aria-current="page">Product List</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- ...:::: End Breadcrumb Section:::... -->

    <!-- Start Shop Product Sorting Section -->
    <div class="shop-sort-section" style="margin-bottom: 40px;">
        <div class="container">
            <div class="row">
                <!-- Start Sort Wrapper Box -->
                <div class="sort-box d-flex justify-content-between align-items-md-center align-items-start flex-md-row flex-column" data-aos="fade-up" data-aos-delay="0">
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

    <style>
        th.scope-col,
        th {
            color: black;
            font-weight: bold;
        }

        td {
            color: black;
        }

        .table-striped tbody tr:nth-of-type(odd) {
            background-color: #E6E6E6;
            color: white;
        }

        .product-picture {
            width: 125px;
            height: 65px;
            object-fit: cover;
        }
    </style>

    <div class="container">
        <a href="<?php echo site_url('product/add_new') ?>" class="btn btn-success" style="color: white;">Add Product</a>
        <a href="<?php echo site_url('coupon/create_coupon') ?>" class="btn btn-success" style="color: white;">Create Coupon</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th class="scope-col">#</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Gambar</th>
                    <th width="200">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $startPage = ($currentPage - 1) * $perPage + 1; // Calculate the starting row number

                    foreach ($products as $product) :
                ?>
                    <tr>
                        <th scope="row"><?php echo $startPage; ?></th>
                        <td><?php echo $product->product_name; ?></td>
                        <td>Rp. <?php echo number_format($product->product_price); ?></td>
                        <td><img src="<?php echo base_url(); ?>./upload/<?php echo $product->product_picture; ?>" alt="Gambar" class="product-picture"></td>
                        <td>
                            <a href="<?php echo site_url('product/get_edit/' . $product->product_id); ?>" class="btn btn-sm btn-info" style="color: black; height: 30px; width: 80px; border: none;">Update</a>
                            <a href="<?php echo site_url('product/delete/' . $product->product_id); ?>" class="btn btn-sm btn-danger" style="color: white; background-color: red; height: 30px; width: 80px; border: none;" onclick="return confirm('Are you sure you want to delete this product?')">Delete</a>
                        </td>
                    </tr>
                    <?php $startPage++; ?>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <!-- Start Pagination -->
    <div class="page-pagination text-center" data-aos="fade-up" data-aos-delay="0">
        <ul>
            <?php
            $startPage = $currentPage - 2; // Menyimpan nomor halaman saat ini dan mengurangi 2
            $endPage = $currentPage + 2; // Menambahkan 2 ke nomor halaman saat ini
            $endPage = min($endPage, ceil($totalProducts / $perPage)); // Memastikan nomor halaman tidak melebihi total halaman yang tersedia

            // Jika nomor halaman saat ini berada di awal, atur nomor halaman awal menjadi 1
            if ($startPage <= 0) {
                $startPage = 1;
                $endPage = min(5, ceil($totalProducts / $perPage)); // Mengubah jumlah tautan yang ditampilkan menjadi 5 jika nomor halaman saat ini berada di awal
            }

            // Membangun tautan halaman
            for ($i = $startPage; $i <= $endPage; $i++) :
            ?>
                <li><a <?php if ($i == $currentPage): ?>class="active"<?php endif; ?> href="?page=<?php echo $i; ?>"><?php echo $i; ?></a></li>
            <?php endfor; ?>

            <?php if ($endPage < ceil($totalProducts / $perPage)): // Menampilkan tombol "skip" hanya jika halaman belum mencapai akhir ?>
                <li><a href="#"><i class="ion-ios-skipforward"></i></a></li>
            <?php endif; ?>
        </ul>
    </div>
    <!-- End Pagination -->

    <script>
    function sortProducts() {
        var sortValue = document.getElementById("short").value;
        var url = "<?php echo site_url('product'); ?>";
        url += "?sort=" + sortValue;

        window.location.href = url;
    }
    </script>

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