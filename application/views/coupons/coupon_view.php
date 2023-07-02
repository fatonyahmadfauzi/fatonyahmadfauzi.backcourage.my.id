<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coupons List</title>

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
                        <h3 class="breadcrumb-title">Coupons List</h3>
                        <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                            <nav aria-label="breadcrumb">
                                <ul>
                                    <li><a href="<?php echo site_url('blog');?>">Home</a></li>
                                    <li class="active" aria-current="page">Coupons List</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- ...:::: End Breadcrumb Section:::... -->
    <div class="col-md-6 offset-md-3"> 
        <a href="<?php echo site_url('coupon/create_coupon') ?>" class="btn btn-success" style="color: white;">Add Data</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Code</th>
                    <th scope="col">Discount</th>
                    <th scope="col">Expiration Date</th>
                    <th width="200">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $count = 0;
                foreach ($coupons as $row) :
                    $count++;
                ?>
                    <tr>
                        <th scope="row"><?php echo $count; ?></th>
                        <td><?php echo $row['code']; ?></td>
                        <td><?php echo intval($row['discount']); ?>%</td>
                        <td><?php echo $row['expiration_date']; ?></td>
                        <td>
                            <a href="<?php echo site_url('coupon/get_edit/' . $row['id_coupons']); ?>" class="btn btn-sm btn-info" style="color: black; height: 30px; width: 80px; border: none;">Update</a>
                            <a href="<?php echo site_url('coupon/delete/' . $row['id_coupons']); ?>" class="btn btn-sm btn-danger" style="color: white; background-color: red; height: 30px; width: 80px; border: none;" onclick="return confirm('Are you sure you want to delete this product?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

<!-- load jquery js file --> 
<script src="<?php echo base_url('assets/js/jquery.min.js');?>"></script> 

<!-- load bootstrap js file --> 
<script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script> 
</body>
</html>