<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>BSCS-3C | Home</title>
        <!-- Favicon -->
        <link rel="icon" type="image/png" sizes="32x32" href="./assets/images/favicon.png">
        <!-- Remix icons -->
        <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
        <!-- Swiper.js styles -->
        <link rel="stylesheet" href="<?php echo base_url('/assets/css/swiper-bundle.min.css')?>" />
        <!-- Custom styles -->
        <link rel="stylesheet" href="<?php echo base_url('assets/css/main.css')?>">
    </head>

    <!-- Header -->
    <header class="header" id="header">

        <nav class="navbar container">
           
            <a href="./index.html">              
                <h2 class="logo">PUTO</h2>
                <div class="logo-image">
                    <img src="<?php echo base_url('/assets/images/featured/PUTOLOGO.png')?>" >
                </div>
            </a>

            <div class="menu" id="menu">
                <ul class="list">
                    <li class="list-item">
                        <a href="#" class="list-link">Categories</a>
                    </li>
                    <li class="list-item">
                        <a href="#" class="list-link">Posts</a>
                    </li>
                    <li class="list-item">
                        <a href="#" class="list-link">Contact</a>
                    </li>
                    <li class="list-item screen-lg-hidden">
                        <a href="./signin.html" class="list-link">Sign in</a>
                    </li>
                    <li class="list-item screen-lg-hidden">
                        <a href="./signup.html" class="list-link">Sign up</a>
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

                <a href="#" class="list-link screen-sm-hidden">Sign in</a>
                <a href="#" class="btn sign-up-btn fancy-border screen-sm-hidden">
                    <span>Sign up</span>
                </a>

                <a href="#menu">
                    &#9776;
                </a>

            </div>

        </nav>

    </header>
<body>