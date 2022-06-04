<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BSCS-3C | Home</title>
    <!--Bootstrap 5 elements link-->
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <!-- Favicon -->
    <link rel="icon" type="image/png" sizes="32x32" href="./assets/images/favicon.png">
    <!-- Remix icons -->
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
    <!-- Swiper.js styles -->
    <link rel="stylesheet" href="<?php echo base_url('/assets/css/swiper-bundle.min.css')?>" />
    <!-- Custom styles -->
    <link rel="stylesheet" href="<?php echo base_url('assets/css/main.css')?>">
</head>
<body>  
    <div class="form bg ">
        
        <form method="post" class="box col-8 mt-5" action="<?php echo base_url('registration/register'); ?>">

            <div class="login">
                <img src="<?php echo base_url('/assets/images/featured/PUTOLOGO.png')?>" width="138" height="130" >
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
                        <button type="submit" class="btn btn-custom" name="submit" >Submit</button>
                    </div>

                    <div class="mb-3">
                        <hr></hr>
                    </div>

                </div>


            <div class="social-icons mb-3">
                <a href="#" class="google"><i class="bi bi-google mx-5"></i></a>
                <a href="#" class="facebook"><i class="bi bi-facebook mx-5"></i></a>
            </div>

            <div class="row justify-content-left mt-3">
               <p>Already have an account?<a href="<?php echo base_url('login'); ?>"><u>LOGIN</u></a></p>
            </div>

        </form>
        </div>
    </div>

    