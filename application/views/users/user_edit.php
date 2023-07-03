<!DOCTYPE html>
<html lang="en">
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
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
                        <h3 class="breadcrumb-title">User List - Edit User</h3>
                        <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                            <nav aria-label="breadcrumb">
                                <ul>
                                    <li><a href="<?php echo site_url('blog');?>" method="post">Home</a></li>
                                    <li><a href="<?php echo site_url('user');?>" method="post">Management User</a></li>
                                    <li class="active" aria-current="page">Edit User</li>
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
            <form enctype="multipart/form-data" action="<?php echo site_url('user/update');?>" method="post"> 
                <div class="form-group"> 
                    <label>Edit Username</label> 
                    <input type="text" class="form-control" name="username" value="<?php echo $username;?>" placeholder="Edit Username"> 
                </div> 
                <div class="form-group"> 
                    <label>Edit Password</label> 
                    <input type="password" class="form-control" name="password" value="<?php echo $password;?>" placeholder="password"> 
                </div>
                <div class="form-group"> 
                    <label>Nama</label> 
                    <input type="nama" class="form-control" name="nama" value="<?php echo $nama;?>" placeholder="Nama"> 
                </div>
                <div class="form-group"> 
                    <label>Email</label> 
                    <input type="text" class="form-control" name="email" value="<?php echo $email;?>" placeholder="email"> 
                </div>
                <div class="form-group">
                    <label>Role_ID</label>
                    <div class="form-group">
                        <select name="role_id" aria-label="Default select example" class="form-control">
                            <option value="1" <?php if($role_id == 1) echo 'selected'; ?>>Admin</option>
                            <option value="2" <?php if($role_id == 2) echo 'selected'; ?>>User</option>
                        </select>
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </div>
                <input type="hidden" name="id" value="<?php echo $id; ?>">
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