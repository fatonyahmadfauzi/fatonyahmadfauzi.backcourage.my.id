<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Management User</title>

    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/vendor/vendor.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/plugins/plugins.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.min.css">
    <style>
        .list-user {
            margin-left: 50px;
            margin-right: 50px;
        }

        .sort-select-list {
            float: right;
        }
    </style>
</head>
<body>
    <!-- ...:::: Start Breadcrumb Section:::... -->
    <div class="breadcrumb-section breadcrumb-bg-color--golden">
        <div class="breadcrumb-wrapper">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <h3 class="breadcrumb-title">Management User</h3>
                        <div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
                            <nav aria-label="breadcrumb">
                                <ul>
                                    <li class="active" aria-current="page">Management User</li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- ...:::: End Breadcrumb Section:::... -->
    
    <div class="list-user">
        <?php echo $this->session->flashdata('success_message'); ?>
        <div class="sort-select-list d-flex align-items-center">
            <label class="mr-2">Sort By:</label>
            <form action="<?php echo site_url('user') ?>" method="get">
                <fieldset>
                    <select name="sort" id="sort" onchange="this.form.submit()">
                        <option value="all" <?php echo $this->input->get('sort') == 'all' ? 'selected' : ''; ?>>Sort by all</option>
                        <option value="admin" <?php echo $this->input->get('sort') == 'admin' ? 'selected' : ''; ?>>Sort by admin</option>
                        <option value="user" <?php echo $this->input->get('sort') == 'user' ? 'selected' : ''; ?>>Sort by user</option>
                    </select>
                </fieldset>
            </form>
        </div>
        <a href="<?php echo site_url('user/create') ?>" class="btn btn-success" style="color: white;">Add Data</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Id User</th>
                    <th scope="col">Username</th>
                    <th scope="col">Password</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Email</th>
                    <th scope="col">Role Id</th>
                    <th width="200">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $count = 0;
                foreach ($users as $row) :
                    $count++;
                ?>
                    <tr>
                        <th scope="row"><?php echo $count; ?></th>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['username']; ?></td>
                        <td><?php echo $row['password']; ?></td>
                        <td><?php echo $row['nama']; ?></td>
                        <td><?php echo $row['email']; ?></td>
                        <td>
                            <?php
                            if ($row['role_id'] == 1) {
                                echo 'Admin';
                            } elseif ($row['role_id'] == 2) {
                                echo 'User';
                            }
                            ?>
                        </td>
                        <td>
                            <a href="<?php echo site_url('user/edit/' . $row['id']); ?>" class="btn btn-sm btn-info" style="color: black; height: 30px; width: 80px; border: none;">Update</a>
                            <a href="<?php echo site_url('user/delete/' . $row['id']); ?>" class="btn btn-sm btn-danger" style="color: white; background-color: red; height: 30px; width: 80px; border: none;" onclick="return confirm('Are you sure you want to delete this product?')">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script>
        function sortUsers() {
            var sortValue = document.getElementById("sort").value;
            // Lakukan logika pengurutan berdasarkan nilai sortValue
            // Misalnya, jika sortValue adalah "sortAdmin", lakukan pengurutan berdasarkan admin
            // Jika sortValue adalah "sortUser", lakukan pengurutan berdasarkan user
            // Anda dapat menambahkan logika pengurutan sesuai kebutuhan
        }
    </script>

    <!-- load jquery js file --> 
    <script src="<?php echo base_url('assets/js/jquery.min.js');?>"></script> 

    <!-- load bootstrap js file --> 
    <script src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script> 
</body>
</html>
