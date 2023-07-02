<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

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
                        <h3 class="breadcrumb-title">Login</h3>
                        <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                            <nav aria-label="breadcrumb">
                                <ul>
                                    <li><a href="<?php echo site_url('blog')?>">Home</a></li>
                                    <li><a href="<?php echo site_url('katalog_product')?>">Shop</a></li>
                                    <li class="active" aria-current="<?php echo site_url('auth/login')?>">Login</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- ...:::: End Breadcrumb Section:::... -->

    <!-- ...:::: Start Customer Login Section :::... -->
    <div class="customer-login">
        <div class="container">
            <div class="row">
                <!--login area start-->
                <div class="col-lg-6 col-md-6">
                    <div class="account_form" data-aos="fade-up" data-aos-delay="0">
                        <h3>Login</h3>
                        <form id="login" action="#" method="POST" action="<?php echo base_url('auth/login')?>">
                            <div class="default-form-box">
                                <label>Email address<span>*</span></label>
                                <input type="text" name="email">
                            </div>
                            <div class="default-form-box">
                                <label>Password <span>*</span></label>
                                <input type="password" name="password">
                            </div>
                            <div class="default-form-box">
                                <label class="checkbox-default mb-4" for="offer">
                                    <input type="checkbox" id="offer" name="rememberMe">
                                    <span>Remember me</span>
                                </label>
                            </div>
                            <div class="login_submit">
                                <button class="btn btn-md btn-black-default-hover mb-4" type="submit">Login</button>
                                <a href="#">Lost your password?</a>
                            </div>
                        </form>
                    </div>
                </div>
                <!--login area start-->

                <!--register area start-->
                <div class="col-lg-6 col-md-6">
                    <div class="account_form register" data-aos="fade-up" data-aos-delay="200">
                        <h3>Register</h3>
                        <form id="register" action="#" method="POST" action="<?php echo base_url('registrasi/index')?>">
                            <div class="default-form-box">
                                <label>Username <span>*</span></label>
                                <input type="text" name="username">
                            </div>
                            <div class="default-form-box">
                                <label>Full name <span>*</span></label>
                                <input type="text" name="nama">
                            </div>
                            <div class="default-form-box">
                                <label>Email address <span>*</span></label>
                                <input type="text" name="email">
                            </div>
                            <div class="default-form-box">
                                <label>Password <span>*</span></label>
                                <input type="password" name="password">
                            </div>
                            <div class="login_submit">
                                <button class="btn btn-md btn-black-default-hover" type="submit">Register</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!--register area end-->
            </div>
        </div>
    </div>
    <!-- ...:::: End Customer Login Section :::... -->

    <!-- load jquery js file --> 
    <script src="<?php echo base_url('assets/js/jquery.min.js');?>"></script> 

    <!-- load bootstrap js file --> 
    <script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script> 

    <!-- Remember Me JavaScript -->
    <script>
        window.addEventListener('load', function() {
            // Mengambil referensi elemen-elemen dalam form
            var form = document.getElementById('login');
            var emailField = document.getElementsByName('email')[0];
            var passwordField = document.getElementsByName('password')[0];
            var rememberMeCheckbox = document.getElementById('offer');

            // Mengisi form dengan nilai yang disimpan di local storage jika ada
            if (localStorage.getItem('rememberedEmail') && localStorage.getItem('rememberedPassword')) {
                emailField.value = localStorage.getItem('rememberedEmail');
                passwordField.value = localStorage.getItem('rememberedPassword');
                rememberMeCheckbox.checked = true;
            }

            // Menyimpan nilai email dan password saat form di-submit
            form.addEventListener('submit', function() {
                if (rememberMeCheckbox.checked) {
                    localStorage.setItem('rememberedEmail', emailField.value);
                    localStorage.setItem('rememberedPassword', passwordField.value);
                } else {
                    localStorage.removeItem('rememberedEmail');
                    localStorage.removeItem('rememberedPassword');
                }
            });
        });
    </script>
</body>
</html>
