<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>

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
                        <h3 class="breadcrumb-title">Product List - Edit Product</h3>
                        <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                            <nav aria-label="breadcrumb">
                                <ul>
                                    <li><a href="<?php echo site_url('blog');?>" method="post">Home</a></li>
                                    <li><a href="<?php echo site_url('product');?>" method="post">Product List</a></li>
                                    <li class="active" aria-current="page">Edit Product</li>
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
            <form enctype="multipart/form-data" action="<?php echo site_url('product/update');?>" method="post"> 
                <div class="form-group"> 
                    <label>Product Name</label> 
                    <input 
                    type="text" 
                    class="form-control" 
                    name="product_name" 
                    value="<?php echo $product_name;?>" placeholder="Product Name"> 
                </div> 
                <div class="form-group"> 
                    <label>Price</label> 
                    <input type="text" class="form-control" name="product_price" 
                    value="<?php echo 
                    $product_price;?>" placeholder="Price"> 
                </div>
                <!-- Update untuk menyisipkan gambar -->
                <div class="form-group">
                    <label for="formGroupExampleInput2">Picture</label>
                    <input 
                        type="file" 
                        name="product_picture" 
                        class="form-control" 
                        id="product_picture" 
                        placeholder="Another input placeholder">
                </div>
                <input type="hidden" name="product_id" value="<?php echo $product_id?>"> 
                <button type="submit" class="btn btn-primary" style="margin-top: 5px;">Update</button> 
            </form> 
        </div> 
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