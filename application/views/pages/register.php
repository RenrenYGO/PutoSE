
    <div class="form bg ">
        
        <form method="post" class="box signup" action="<?php echo base_url('registration/register'); ?>">

            <div class="login">
                <img src="<?php echo base_url('/assets/images/featured/PUTOLOGO.png')?>" >
                Sign Up
            </div>
            
                <div class="p-3">

                    <div class="mb-3">
                        <input type="text" class="form-control" name="name" placeholder="Enter Name" required>
                    </div>

                    <div class="mb-3">
                        <input type="text" class="form-control" name="email" placeholder="Enter Email" required>
                    </div>

                    <div class="mb-3">
                        <input type="password" class="form-control" name="password" placeholder="Enter Password" required>
                    </div>

                    <div class="mb-3">
                        <input type="password" class="form-control" name="password2" placeholder="Confirm Password" required>
                    </div>

                    <?php echo validation_errors(); ?>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-custom px-5 my-2" name="submit" >Submit</button>
                    </div>

                    <div class="mb-3">
                        <hr></hr>
                    </div>

                </div>


            <div class="social-icons mb-3">
                <a href="#" class="google"><i class="bi bi-google mx-5"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook mx-5"></i></a>
            </div>

            <div class="mt-3">
               <p class = "d-flex flex-column justify-content-center">Already have an account?<a style="margin:0 auto;" href="<?php echo base_url('login'); ?>"><u>LOGIN</u></a></p>
            </div>

        </form>
        </div>
    </div>

    