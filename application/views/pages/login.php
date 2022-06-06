
    <form method="post" class="form bg" action="<?php echo base_url('login/index'); ?>">
        <div class="box ">
            <div class="PutoLogo">
                <img src="<?php echo base_url('/assets/images/featured/PUTOLOGO.png')?>" width="120" height="120" >
            </div>
            
            <div class="title" style="color: #FFFFFF">
                <b>Welcome back, Ka-Puto! Sign In!</b>   
            </div>

            <div class="mb-3">
                <input type="text" class="form-control" placeholder="Username" name="name">
            </div>
    
            <div class="mb-3">
                <input type="password" class="form-control" placeholder="Password" name="password">
            </div>

            <?php echo validation_errors(); ?>
            
            <div class="mb-3">
                <button type="submit" class="btn btn-custom" name="Submit" >Login</button>
            </div>
            

            <div class="row justify-content-left mt-3">
               <p>Can't Log in?<a href="<?php echo site_url("")?>"><u>Forgot Password</u></a></p>
            </div>
        </div>
    </form>
    </div>

    