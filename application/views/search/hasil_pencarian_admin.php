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
        <?php if (!empty($result)) { ?>
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
                        $startPage = 1; // Variable to keep track of the row number

                        foreach ($result as $row) :
                    ?>
                        <tr>
                            <th scope="row"><?php echo $startPage; ?></th>
                            <td><?php echo $row->product_name; ?></td>
                            <td>Rp. <?php echo number_format($row->product_price); ?></td>
                            <td><img src="<?php echo base_url().'/upload/'.$row->product_picture;?>" alt="Gambar" class="product-picture"></td>
                            <td>
                                <a href="<?php echo site_url('product/get_edit/' . $row->product_id); ?>" class="btn btn-sm btn-info" style="color: black; height: 30px; width: 80px; border: none;">Update</a>
                                <a href="<?php echo site_url('product/delete/' . $row->product_id); ?>" class="btn btn-sm btn-danger" style="color: white; background-color: red; height: 30px; width: 80px; border: none;" onclick="return confirm('Are you sure you want to delete this product?')">Delete</a>
                            </td>
                        </tr>
                        <?php $startPage++; ?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        <?php } else { ?>
            <div class="col-12">
                <p>Tidak ada hasil pencarian.</p>
            </div>
        <?php } ?>
    </div>
</body>
</html>
