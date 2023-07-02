<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Account Settings</title>
	<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="<?php echo base_url() ?>views/account/css/style.css">
</head>
<body>
	<section class="py-5 my-5">
		<div class="container">
			<h1 class="mb-5">Account Settings</h1>
			<div class="bg-white shadow rounded-lg d-block d-sm-flex">
				<div class="profile-tab-nav border-right">
					<div class="p-4">
						<div class="img-circle text-center mb-3">
							<img src="<?php echo $infoUser['profile_picture']; ?>" alt="Image" class="shadow">
						</div>
						<h4 class="text-center"><?php echo $user['name']; ?></h4>
					</div>
					<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
						<a class="nav-link active" id="account-tab" data-toggle="pill" href="#account" role="tab" aria-controls="account" aria-selected="true">
							<i class="fa fa-home text-center mr-1"></i> 
							Account
						</a>
						<a class="nav-link" id="password-tab" data-toggle="pill" href="#password" role="tab" aria-controls="password" aria-selected="false">
							<i class="fa fa-key text-center mr-1"></i> 
							Password
						</a>
					</div>
				</div>
				<div class="tab-content p-4 p-md-5" id="v-pills-tabContent">
					<div class="tab-pane fade show active" id="account" role="tabpanel" aria-labelledby="account-tab">
						<h3 class="mb-4">Account Settings</h3>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Nama</label>
								  	<input type="text" name="nama" id="nama" class="form-control" value="<?php echo $user['nama']; ?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Email</label>
								  	<input type="text" name="email" id="email" class="form-control" value="<?php echo $user['email']; ?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Phone number</label>
								  	<input type="text" name="phone_number" id="phone_number" class="form-control" value="<?php echo $infoUser['nomor_hp']; ?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Region</label>
								  	<input type="text" name="region" id="region" class="form-control" value="<?php echo $infoUser['region']; ?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Account</label>
								  	<input type="text" name="account" id="account" class="form-control" value="<?php echo $infoUser['role_id']; ?>">
								</div>
							</div>
							<div class="col-md-12">
								<div class="form-group">
								  	<label>Address</label>
								  	<textarea name="address" id="address" class="form-control" rows="4"><?php echo $infoUser['alamat']; ?></textarea>
								</div>
							</div>
						</div>
						<div>
							<button class="btn btn-primary" onclick="updateAccount()">Update</button>
							<button class="btn btn-light">Cancel</button>
						</div>
					</div>
					<div class="tab-pane fade" id="password" role="tabpanel" aria-labelledby="password-tab">
						<h3 class="mb-4">Password Settings</h3>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Old password</label>
								  	<input type="password" name="old_password" id="old_password" class="form-control">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
								  	<label>New password</label>
								  	<input type="password" name="new_password" id="new_password" class="form-control">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
								  	<label>Confirm new password</label>
								  	<input type="password" name="confirm_password" id="confirm_password" class="form-control">
								</div>
							</div>
						</div>
						<div>
							<button class="btn btn-primary" onclick="updatePassword()">Update</button>
							<button class="btn btn-light">Cancel</button>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

	<script>
		function updateAccount() {
			// Implement your logic to update account information
			// You can use AJAX to send the form data to the server-side for processing
			// Once the account is updated successfully, you can show a success message or perform any other necessary action
			$.ajax({
				url: '<?php echo site_url("account/updateAccount"); ?>',
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
				url: '<?php echo site_url("account/updatePassword"); ?>',
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
