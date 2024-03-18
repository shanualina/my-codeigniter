<!DOCTYPE html>
<html lang="en">
<head>
 
    <title>Edit User</title>
    <!--  -->
</head>
<body>
    <div class="container">
        
        <?php 

        $validation = \Config\Services::validation();


        ?>
        <h2 class="text-center mt-4 mb-4">Edit User</h2>
        
        <div class="card">
            <div class="card-header">Edit User</div>
            <div class="card-body">
                
                <form method="post" enctype="multipart/form-data" action="<?php echo base_url('dashboard/edit_validation'); ?>">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" name="name" class="form-control" value="<?php echo $user_data['name']; ?>">

                        <!-- Error -->
                        <?php 
                        if($validation->getError('name'))
                        {
                            echo "
                            <div class='alert alert-danger mt-2'>
                            ".$validation->getError('name')."
                            </div>
                            ";
                        }
                        ?>
                    </div>
                    <div class="form-group">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control" value="<?php echo $user_data['email']; ?>">

                        <?php 
                        if($validation->getError('email'))
                        {
                            echo "
                            <div class='alert alert-danger mt-2'>
                            ".$validation->getError('email')."
                            </div>
                            ";
                        }
                        ?>
                    </div>

                    <div class="form-group">
                    <label>Mobile No</label>
                        <input type="text" name="mobileNo" class="form-control" value="<?php echo $user_data['mobileNo']; ?>">
                        <?php 
                        if($validation->getError('mobileNo'))
                        {
                            echo "
                            <div class='alert alert-danger mt-2'>
                            ".$validation->getError('mobileNo')."
                            </div>
                            ";
                        }
                        ?>
                    </div>
                    <div class="form-group">
                    <input type="file" name="userfile" size="20">
                    </div>
                    <div class="form-group">
                        <input type="hidden" name="id" value="<?php echo $user_data["id"]; ?>" />
                        <button type="submit" class="btn btn-primary">Edit</button>
                    </div>
                </form>
            </div>
        </div>

    </div>
 
</body>
</html>
