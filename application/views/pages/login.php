
    <div class="form bg ">
        <div class="box ">
            <div class="PutoLogo">
                <img src="<?php echo base_url('/assets/images/featured/PUTOLOGO.png')?>" width="120" height="120" >
            </div>
            
            <div class="title" style="color: #FFFFFF">
                <b>Welcome back, Ka-Puto!</b>   
            </div>

            <div class="mb-3">
                <input type="text" class="form-control" placeholder="Username" name="name">
            </div>
    
            <div class="mb-3">
                <input type="password" class="form-control" placeholder="Password" name="password">
            </div>
            
            <div class="errorsignup">
                <?php echo validation_errors();?>
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-custom" name="Submit" >Login</button>
            </div>
            

            <div class="row justify-content-left mt-3">
               <p>Can't Log in?<a href="<?php echo base_url("forgot_pass")?>"><u>Forgot Password</u></a></p>
            </div>
        </div>
    </div>

    