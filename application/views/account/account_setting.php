<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Account</title>

    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/vendor/vendor.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/plugins/plugins.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>assets/css/style.min.css">
</head>
<body>
    <div class="breadcrumb-section breadcrumb-bg-color--golden">
		<div class="breadcrumb-wrapper">
			<div class="container">
				<div class="row">
					<div class="col-12">
						<h3 class="breadcrumb-title">My Account</h3>
						<div class="breadcrumb-nav breadcrumb-nav-color--black breadcrumb-nav-hover-color--golden">
							<nav aria-label="breadcrumb">
								<ul>
									<li><a href="<?php echo site_url('blog')?>">Home</a></li>
									<li><a href="<?php echo site_url('katalog_product')?>">Shop</a></li>
									<li class="active" aria-current="page">My Account</li>
								</ul>
							</nav>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- ...:::: Start Account Dashboard Section:::... -->
	<div class="account-dashboard">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-3 col-lg-3">
					<!-- Nav tabs -->
					<div class="dashboard_tab_button" data-aos="fade-up" data-aos-delay="0">
						<ul role="tablist" class="nav flex-column dashboard-list">
							<li><a href="#dashboard" data-bs-toggle="tab"
									class="nav-link btn btn-block btn-md btn-black-default-hover active">Dashboard</a>
							</li>
							<li> <a href="#orders" data-bs-toggle="tab"
									class="nav-link btn btn-block btn-md btn-black-default-hover">Orders</a></li>
							<li><a href="#downloads" data-bs-toggle="tab"
									class="nav-link btn btn-block btn-md btn-black-default-hover">Passwords</a></li>
							<li><a href="#address" data-bs-toggle="tab"
									class="nav-link btn btn-block btn-md btn-black-default-hover">Addresses</a></li>
							<li><a href="#account-details" data-bs-toggle="tab"
									class="nav-link btn btn-block btn-md btn-black-default-hover">Account details</a>
							</li>
							<li><a href="<?php echo site_url('auth/logout')?>"
									class="nav-link btn btn-block btn-md btn-black-default-hover">logout</a></li>
						</ul>
					</div>
				</div>
				<div class="col-sm-12 col-md-9 col-lg-9">
					<!-- Tab panes -->
					<div class="tab-content dashboard_content" data-aos="fade-up" data-aos-delay="200">
						<div class="tab-pane fade show active" id="dashboard">
							<h4>Dashboard </h4>
							<p>From your account dashboard. you can easily check &amp; view your <a href="#">recent
									orders</a>, manage your <a href="#">shipping and billing addresses</a> and <a
									href="#">Edit your password and account details.</a></p>
						</div>
						<div class="tab-pane fade" id="orders">
							<h4>Orders</h4>
							<div class="table_page table-responsive">
								<table>
									<thead>
										<tr>
											<th>Order</th>
											<th>Date</th>
											<th>Total</th>
											<th>Actions</th>
											<th>Download</th>
										</tr>
									</thead>
									<tbody>
										<tr>
											<td>1</td>
											<td>May 10, 2018</td>
											<td>$25.00 for 1 item </td>
											<td><a href="cart.html" class="view">view</a></td>
											<td><a href="#" class="view">Click Here To Download Your File</a></td>
										</tr>
										<tr>
											<td>2</td>
											<td>May 10, 2018</td>
											<td>$17.00 for 1 item </td>
											<td><a href="cart.html" class="view">view</a></td>
											<td><a href="#" class="view">Click Here To Download Your File</a></td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
						<div class="tab-pane fade" id="downloads">
							<h4>Passwords</h4>
							<div class="table_page table-responsive">
								<div class="default-form-box">
									<label>Old Password <span>*</span></label>
									<input type="text" name="nama">
								</div>
								<div class="default-form-box">
									<label>New Password <span>*</span></label>
									<input type="text" name="register_email">
								</div>
								<div class="default-form-box">
									<label>Confirm Password <span>*</span></label>
									<input type="password" name="register_password">
								</div>
								<div class="login_submit">
									<button onclick="updatePassword()" class="btn btn-md btn-black-default-hover" type="submit">Register</button>
								</div>
							</div>
						</div>
						<div class="tab-pane" id="address">
							<div class="address-section">
								<p>The following addresses will be used on the checkout page by default.</p>
								<h5 class="billing-address">Billing address</h5>
								<a href="#" class="view">Edit</a>
								<p><strong>Bobby Jackson</strong></p>
								<address>
									Address: Your address goes here.
								</address>
							</div>
						</div>
						<div class="tab-pane fade" id="account-details">
							<h3>Account details </h3>
							<div class="login">
								<div class="login_form_container">
									<div class="account_login_form">
										<form action="#">
											<p>Already have an account? <a href="<?php echo site_url('auth/login')?>">Log in instead!</a></p>
											<div class="default-form-box mb-20">
												<label>Foto Profile</label>
												<input type="file" name="foto_profile">
											</div>
											<div class="default-form-box mb-20">
												<label>Full Name</label>
												<input type="text" name="first-name">
											</div>
											<div class="default-form-box mb-20">
												<label>Username</label>
												<input type="text" name="last-name">
											</div>
											<div class="default-form-box mb-20">
												<label>Email</label>
												<input type="email" name="email-name">
											</div>
											<div class="default-form-box mb-20">
												<label>Birthdate</label>
												<input type="date" name="birthdate">
											</div>
											<span class="example">
												(E.g.: 05/31/1970)
											</span>
											<br>
											<div class="input-radio">
												<span class="custom-radio"><input type="radio" value="1"
														name="id_gender"> Laki-laki</span>
												<span class="custom-radio"><input type="radio" value="1"
														name="id_gender"> Perempuan</span>
											</div> <br>
											<!-- <div class="default-form-box mb-20">
												<label>Country</label>
												<select class="gds-cr" country-data-region-id="gds-cr-two" data-language="en" country-data-default-value="US"></select>
											</div>
											<div class="default-form-box mb-20">
												<label>Region</label>
												<select id="gds-cr-two"></select>
											</div> -->
											<div class="save_button mt-3">
												<button onclick="updateAccount()" class="btn btn-md btn-black-default-hover"
													type="submit">Save</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- ...:::: End Account Dashboard Section:::... -->

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <script>
        function updateAccount() {
            // Implement your logic to update account information
            // You can use AJAX to send the form data to the server-side for processing
            // Once the account is updated successfully, you can show a success message or perform any other necessary action
            $.ajax({
                url: '<?php echo site_url("account_user/updateAccount"); ?>',
                method: 'POST',
                data: {
                    nama: $('#nama').val(),
                    email: $('#email').val(),
                    phone_number: $('#phone_number').val(),
                    region: $('#region').val(),
                    account: $('#account').val(),
                    address: $('#address').val()
                },
                success: function(response) {
                    // Handle the success response
                    console.log(response);
                },
                error: function(xhr, status, error) {
                    // Handle the error response
                    console.log(xhr.responseText);
                }
            });
        }

        function updatePassword() {
            // Implement your logic to update password
            // You can use AJAX to send the form data to the server-side for processing
            // Once the password is updated successfully, you can show a success message or perform any other necessary action
            $.ajax({
                url: '<?php echo site_url("account_user/updatePassword"); ?>',
                method: 'POST',
                data: {
                    old_password: $('#old_password').val(),
                    new_password: $('#new_password').val(),
                    confirm_password: $('#confirm_password').val()
                },
                success: function(response) {
                    // Handle the success response
                    console.log(response);
                },
                error: function(xhr, status, error) {
                    // Handle the error response
                    console.log(xhr.responseText);
                }
            });
        }
    </script>
</body>
</html>