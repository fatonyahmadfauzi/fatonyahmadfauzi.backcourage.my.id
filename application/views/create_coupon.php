<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Coupon</title>

    <link rel="stylesheet" href="<?php echo base_url('assets/css/vendor/vendor.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/plugins/plugins.min.css');?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.min.css');?>">

</head>
<body>
    <!-- ...:::: Start Breadcrumb Section:::... -->
    <div class="breadcrumb-section breadcrumb-bg-color--golden">
        <div class="breadcrumb-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3 class="breadcrumb-title">Product List - Create Coupon</h3>
                        <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                            <nav aria-label="breadcrumb">
                                <ul>
                                    <li><a href="<?php echo site_url('blog');?>" method="post">Home</a></li>
                                    <li><a href="<?php echo site_url('product');?>" method="post">Product List</a></li>
                                    <li class="active" aria-current="page">Create Coupon</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- ...:::: End Breadcrumb Section:::... -->

    <style>
        .form-group {
            color: black;
        }
    </style>

    <div class="container">
        <div class="col-md-6 offset-md-3"> 
            <form action="<?php echo site_url('coupon/save_coupon');?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="coupon_code">Coupon Code:</label>
                    <input type="text" name="coupon_code" class="form-control" id="coupon_code" placeholder="Coupon Code">
                </div>
                <div class="form-group">
                    <label for="coupon_discount">Discount (%):</label>
                    <input type="text" name="coupon_discount" class="form-control" id="coupon_discount" placeholder="Discount">
                </div>
                <div class="form-group">
                    <label for="expiration_date">Expiration Date:</label>
                    <input type="date" name="expiration_date" class="form-control" id="expiration_date">
                </div>

                <button type="submit" class="btn-primary" style="height: 35px; width: 125px; border: none; margin-top: 5px;">Create Coupon</button>
            </form>
        </div>
    </div>
        
    <!-- load jquery js file --> 
    <script src="<?php echo base_url('assets/js/jquery.min.js');?>"></script> 

    <!-- load bootstrap js file --> 
    <script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script> 
</body>
</html>
