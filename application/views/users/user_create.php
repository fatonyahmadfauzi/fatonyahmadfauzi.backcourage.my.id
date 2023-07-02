<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create User</title>

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
                        <h3 class="breadcrumb-title">Management User - Create User</h3>
                        <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                            <nav aria-label="breadcrumb">
                                <ul>
                                    <li><a href="<?php echo site_url('user');?>" method="post">Management User</a></li>
                                    <li class="active" aria-current="page">Create User</li>
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
            <?php echo $this->session->flashdata('error_message'); ?>
            <form action="<?php echo site_url('user/save');?>" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="formGroupExampleInput">Username</label>
                    <input type="text" name="username" class="form-control" id="formGroupExampleInput" placeholder="Username" required>
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Password</label>
                    <input type="password" name="password" class="form-control" id="formGroupExampleInput2" placeholder="Password" required>
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Nama</label>
                    <input type="text" name="nama" class="form-control" id="formGroupExampleInput2" placeholder="Nama" required>
                </div>
                <div class="form-group">
                    <label for="formGroupExampleInput2">Email</label>
                    <input type="email" name="email" class="form-control" id="formGroupExampleInput2" placeholder="Email" required>
                </div>
                <select name="role_id" required>
                    <option value="">Pilih Role</option>
                    <option value="1">Admin</option>
                    <option value="2">User</option>
                </select>
                <button type="submit" class="btn-primary" style="height: 35px; width: 75px; border: none; margin-top: 5px;">Create</button>
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