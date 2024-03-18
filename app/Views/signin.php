<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Login Page</title>

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">

    <!--Fontawesome CDN-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/style.css'); ?>">
  </head>


<body>
<div class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Login in</h3>
				<div class="d-flex justify-content-end social_icon">

				</div>
			</div>
			<div class="card-body">
            <?php if (session()->getFlashdata('msg')): ?>
                    <div class="alert alert-warning">
                       <?=session()->getFlashdata('msg')?>
                    </div>
                <?php endif;?>


                <form action="<?php echo base_url(); ?>/SigninController/loginAuth" method="post">
                    <div class="input-group form-group mb-3">

                        <input type="email" name="email" placeholder="Email" value="<?=set_value('email')?>" class="form-control" >
                    </div>

                    <div class="form-group mb-3">
                        <input type="password" name="password" placeholder="Password" class="form-control" >
                    </div>

                    <div class="d-grid">
                         <button type="submit" class="btn btn-success">Signin</button>
                    </div>
                 
                </form>


                <div class="card-footer">
				<div class="d-flex justify-content-center links">
					Don't have an account?<a href="#">Sign Up</a>
				</div>
				<div class="d-flex justify-content-center">
					<a href="#">Forgot your password?</a>
				</div>
			</div>

			</div>
			
		</div>
	</div>
</div>
</body>
</html>