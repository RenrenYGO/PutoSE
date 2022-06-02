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
        <div class="box ">
            <div class="Title">
                Edit Profile
            </div>

            <div class="mb-3">
                <p class="Title">Name:</p>
                <a href="#" class="pencil"><i class="bi bi-pencil"></i></a>
                <input type="text" class="form-control" name="name">
            </div>
            
            <div class="mb-3">
                <p class="Title">Email:</p>
                <a href="#" class="pencil"><i class="bi bi-pencil"></i></a>
                <input type="text" class="form-control" name="email">
            </div>

            <div class="mb-3">
                <p class="Title">Password:</p>
                <a href="#" class="pencil"><i class="bi bi-pencil"></i></a>
                <input type="password" class="form-control" name="password">
            </div>

            <div class="mb-3">
                <p class="Title">New Password:</p>
                <input type="password" class="form-control" name="confirm_password">
            </div>

            <div class="mb-3">
                <button type="submit" class="btn btn-custom" name="submit" >Submit</button>
            </div>

        </div>
    </div>

    