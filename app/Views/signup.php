<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
<title>User Registration</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/style.css'); ?>">

</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-md-center">

            <div class="card">
			<div class="card-header">
				<h3>Register User</h3>
				<div class="d-flex justify-content-end social_icon">

				</div>
			</div>

                <?php if (isset($validation)): ?>
                <div class="alert alert-warning">
                   <?=$validation->listErrors()?>
                </div>
                <?php endif;?>
                <form action="<?php echo base_url(); ?>/SignupController/store" method="post">
                    <div class="form-group mb-3">
                        <input type="text" name="name" placeholder="Name" value="<?=set_value('name')?>" class="form-control" >
                    </div>
                    <div class="form-group mb-3">
                        <input type="email" name="email" placeholder="Email" value="<?=set_value('email')?>" class="form-control" >
                    </div>
                    <div class="form-group mb-3">
                        <input type="text" name="mobileNo" placeholder="Mobile No" value="<?=set_value('mobileNo')?>" class="form-control" >
                    </div>
                    <div class="form-group mb-3">
                        <input type="password" name="password" placeholder="Password" class="form-control" >
                    </div>
                    <div class="form-group mb-3">
                        <input type="password" name="confirmpassword" placeholder="Confirm Password" class="form-control" >
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-dark">Signup</button>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>
</body>
</html>