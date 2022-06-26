
    <form method="post" class="form bg" action="<?php echo base_url('login/index'); ?>">
        <div class="box ">
            
            
            <div class="title" style="color: #FFFFFF">
                <b>Welcome back to the blog, Ka-Puto!</b>   
                <div class="PutoLogo">
                    <img src="<?php echo base_url('/assets/images/featured/PUTOLOGO.png')?>">
                </div>
            </div>

            <div class="mb-3">
                <input type="text" class="form-control" placeholder="Username" name="name">
            </div>
    
            <div class="mb-3">
                <input type="password" class="form-control" placeholder="Password" name="password">
            </div>

            <?php echo validation_errors(); ?>
            
            <div class="mb-3">
                <button type="submit" class="btn btn-custom px-5" name="Submit" >LOGIN</button>
            </div>
            

            <div class="d-flex justify-content-center mt-3">
               <p>Can't Log in?<a href="<?php echo site_url("forgot_pass")?>"><u>Forgot Password</u></a></p>
            </div>
        </div>
    </form>
    </div>

    