<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>BSCS-3C | Home</title>
        <!-- Jquery for Ajax -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
        <!--Bootstrap 5 elements link-->
        <!-- CSS only -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <!-- Favicon -->
        <link rel="icon" type="image/png" sizes="32x32" href="./assets/images/favicon.png">
        <!-- Remix icons -->
        <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
        <!-- Swiper.js styles -->
        <link rel="stylesheet" href="<?php echo base_url('/assets/css/swiper-bundle.min.css')?>" />
        <!-- Custom styles -->
        <link rel="stylesheet" href="<?php echo base_url('/assets/css/main.css')?>">
        <!-- Javascript -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
       
        <!-- For About Page -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons">
        <link rel="stylesgeet" href="https://rawgit.com/creativetimofficial/material-kit/master/assets/css/material-kit.css">
        

    </head>

    <!-- Header -->
    <header class="header" id="header">

        <nav class="navbar container">
           
            <a href="<?php echo base_url('dashboard')?>">              
                <h2 class="logo mt-2"><b>PUTO</b></h2>
                <div class="logo-image">
                    <img src="<?php echo base_url('/assets/images/featured/PUTOLOGO.png') ?>" width="40" height="50" >
                </div>
            </a>

            <div class="menu" id="menu">
                <ul class="list">
                    <li class="list-item">
                        <a href="<?php echo base_url();?>pages/categories" class="list-link">Categories</a>
                    </li>
                    <li class="list-item">
                        <a href="<?php echo base_url();?>pages/users" class="list-link" class="list-link">Users</a>
                    </li>
                    <li class="list-item">
                        <a href="#" class="list-link">Contact</a>
                    </li>
                </ul>
            </div>

            <div class="list list-right">
                <button class="btn place-items-center" id="theme-toggle-btn">
                    <i class="ri-sun-line sun-icon"></i>
                    <i class="ri-moon-line moon-icon"></i>
                </button>

                <button class="btn place-items-center" id="search-icon">
                    <i class="ri-search-line"></i>
                </button>

                <button class="btn place-items-center screen-lg-hidden menu-toggle-icon" id="menu-toggle-icon">
                    <i class="ri-menu-3-line open-menu-icon"></i>
                    <i class="ri-close-line close-menu-icon"></i>
                </button>

                <?php $user = $this->session->userdata('user');
                if(isset($user) && $user!=null):?>

                    
                    
                    <button type="button" data-bs-toggle="dropdown" aria-expanded="false">
                        <a href="#menu"> &#9776;</a>
                    <i class="bi bi-list h3"></i>
                    </button>
                    
                    <!-- Dropdowm Menu -->
                    <ul class="dropdown-menu dropdown-menu-end  mx-3 my-2">
                        <li><a class="px-4" href="<?php echo base_url('profile');?>" >
                        
                            <div class="logo-image"  style="text-align:right; margin: 0 auto;">
                                <img src="<?php echo base_url("/assets/images/featured/PROFILEPICPLACEHOLDER.png") ?>" width="40" height="40"  style="float:left;">
                                
                            </div>
                            <h2 class="mt-2"> <?php echo $this->session->userdata('user')['name'];?> </h2>
                            
                        </a>
                        </li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item px-4 " type="button" href = "<?php echo base_url();?>settings/edit_account"><h3>Settings</h3></a></li>
                        <li><a class="dropdown-item px-4" type="button" href = "<?php echo base_url();?>pages/view/about"><h3>About</h3></a></li>
                        <li><a class="dropdown-item px-4" type="button" href = "<?php echo base_url();?>logout"><h3>Logout</h3></a></li>
                    </ul>
                <?php else:?>
                    <a href="<?php echo base_url('login'); ?>" class="list-link screen-sm-hidden">Sign in</a>
                    <a href="<?php echo base_url('register'); ?>" class="btn sign-up-btn fancy-border screen-sm-hidden">
                        <span>Sign up</span>
                    </a>

                <?php endif; ?>

            </div>

        </nav>

    </header>
<body>