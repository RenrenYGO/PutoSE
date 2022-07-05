
    <form class="box " method="post" class="form bg" action="<?php echo base_url('login/index'); ?>">
        <div class="text-light ">
            
            
            <div class="title" style="color: #FFFFFF">
                <b>Welcome back to the blog, Ka-Puto!</b>   
                <div class="PutoLogo">
                    <img src="<?php echo base_url('/assets/images/featured/PUTOLOGO.png')?>">
                </div>
            </div>

            <div class="mb-4">
                <input type="text" class="form-control" placeholder="Username" name="name">
            </div>
    
            <div class="mb-3">
                <input type="password" class="form-control" placeholder="Password" name="password">
            </div>

            <div class="mb-3">
                <?php if($error){ 
                        echo $error;}
                    else{?>
                    </br>
                <?php }?>
            </div>
           
            
            <div class="mt-4">
                <button type="submit" class="btn btn-custom px-5" name="Submit" style="font-size:1.5rem">LOGIN</button>
            </div>
            

            <div class="d-flex justify-content-center mt-3">
               <p>Can't Log in?<a href="<?php echo site_url("forgot_pass")?>"><u>Forgot Password</u></a></p>
            </div>
        </div>
    </form>
    </div>

    