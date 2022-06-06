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
    <form method="post" class="form bg" action="<?php echo base_url('login'); ?>">
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

    