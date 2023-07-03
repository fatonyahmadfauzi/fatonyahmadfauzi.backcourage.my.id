<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Keranjang</title>

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
                        <h3 class="breadcrumb-title">DETAIL KERANJANG</h3>
                        <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                            <nav aria-label="breadcrumb">
                                <ul>
                                    <li><a href="<?php echo site_url('blog');?>" method="post">Home</a></li>
                                    <li><a href="<?php echo site_url('katalog_product');?>" method="post">Katalog Product</a></li>
                                    <li class="active" aria-current="page">Detail Keranjang</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- ...:::: End Breadcrumb Section:::... -->

    <!-- ...:::: Start Cart Section:::... -->
    <div class="cart-section">
        <!-- Start Cart Table -->
        <div class="cart-table-wrapper" data-aos="fade-up" data-aos-delay="0">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="table_desc">
                            <div class="table_page table-responsive">
                                <table>
                                    <!-- Start Cart Table Head -->
                                    <thead>
                                        <tr>
                                            <th class="product_remove">Delete</th>
                                            <th class="product_thumb">Image</th>
                                            <th class="product_name">Product</th>
                                            <th class="product-price">Price</th>
                                            <th class="product_quantity">Quantity</th>
                                            <th class="product_total">Total</th>
                                        </tr>
                                    </thead> <!-- End Cart Table Head -->
                                    <tbody>
                                        <!-- Start Cart Single Item-->
                                        <?php 
                                            foreach ($this->cart->contents() as $items):
                                        ?>
                                        <tr>
                                            <td class="product_remove">
                                                <a href="<?php echo base_url('katalog_product/hapus_keranjang/'.$items['rowid']) ?>"><i class="fa fa-trash-o"></i></a>
                                            </td>
                                            <td class="product_thumb">
                                                <?php echo isset($items['options']['picture']) ? $items['options']['picture'] : ''; ?>
                                            </td>
                                            <td class="product_name">
                                                <a href="product-details-default.html"><?php echo $items['name'] ?></a>
                                            </td>
                                            <td class="product-price">Rp. <?php echo number_format($items['price'], 0, ',', '.') ?></td>
                                            <td class="product_quantity">
                                                <input min="1" max="100" value="<?php echo $items['qty'] ?>" type="number">
                                            </td>
                                            <td class="product_total">Rp. <?php echo number_format($items['subtotal'], 0, ',', '.') ?></td>
                                        </tr>
                                        <?php endforeach; ?> 
                                        <!-- End Cart Single Item-->
                                    </tbody>
                                </table>
                            </div>
                            <div class="cart_submit">
                                <button class="btn btn-md btn-golden" type="submit">update cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End Cart Table -->

        <!-- Start Coupon Start -->
        <div class="coupon_area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="coupon_code left" data-aos="fade-up" data-aos-delay="200">
                            <h3>Coupon</h3>
                            <div class="coupon_inner">
                                <p>Enter your coupon code if you have one.</p>
                                <input class="mb-2" placeholder="Coupon code" type="text" id="coupon_code" name="coupon_code">
                                <button type="button" class="btn btn-md btn-golden" onclick="applyCoupon()">Apply coupon</button>
                            </div>
                        </div>
                        <div id="error_message"></div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="coupon_code right" data-aos="fade-up" data-aos-delay="400">
                            <h3>Cart Totals</h3>
                            <div class="coupon_inner">
                                <div class="cart_subtotal">
                                    <p>Subtotal</p>
                                    <p class="cart_amount">Rp. <?php echo number_format($this->cart->total(),0,',','.') ?></p>
                                </div>
                                <div class="cart_subtotal ">
                                    <p>Coupon</p>
                                    <p class="cart_amount">Diskon: <span id="discount_value">0%</span></p>
                                </div>
                                <a href="#">Calculate diskon</a>

                                <div class="cart_subtotal">
                                    <p>Total</p>
                                    <p class="cart_amount">Rp. <span id="total_amount"><?php echo number_format($this->cart->total(),0,',','.') ?></span></p>
                                </div>
                                <div class="checkout_btn">
                                    <a href="<?php echo base_url('katalog_product/pembayaran')?>" class="btn btn-md btn-golden">Proceed to Checkout</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- End Coupon Start -->
    </div> <!-- ...:::: End Cart Section:::... -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    function applyCoupon() {
    var couponCode = $('#coupon_code').val();

    $.ajax({
        url: '<?php echo base_url('coupon/process_coupon') ?>',
        type: 'POST',
        dataType: 'json', // Specify the expected data type as JSON
        data: { code: couponCode },
        success: function(response) {
            if (response.error) {
                $('#error_message').text(response.error);
            } else {
                $('#total_amount').text(response.total_amount);
                if (response.discount) {
                    $('#discount_value').text(response.discount + '%');
                } else {
                    $('#discount_value').text('0%');
                }
            }
        }
    });
}
</script>
</body>
</html>
