<head>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons">
    <link rel="stylesgeet" href="https://rawgit.com/creativetimofficial/material-kit/master/assets/css/material-kit.css">
    <!-- <link rel="stylesheet" href="prof.css"> -->
</head>

<body class="profile-page">

    <a href="#" class="mb-5 trending-news-box">
    <div class="trending-profile-img-box">
    <img src="./assets/images/featured/PROFILEPICPLACEHOLDER.png" alt="" class="article-image">
    </div>
    </a>
    <div class="text-dark text-center">
        <h3><?php echo $user['name'];?></h3>
    </div>

    <div class="page-header"></div>
    <div class="main">

                <div class="row">
                    <div class="col-4 py-5 ">
                        <div class="h-100 bg-light text-dark border box ">
                            <h3>About Me</h3>
                            <p><?php echo $user['bio'];?></p>
                            <div class="mb-3">
                                <a type="submit" id="edit" href="<?php echo base_url('pages/dashboard/edit_profile');?>" class="btn btn-custom" name="edit" >EDIT PROFILE</a>
                            </div>
                        </div>
                    </div>

                    <div class="col-6 py-7 mt-5">
            
                        <a href="#" class="mb-5 trending-news-profile-box">
                        <div class="trending-news-img-box">
                        <span class="trending-number place-items-center">01</span>
                        <img src="./assets/images/featured/PROFILEPICPLACEHOLDER.png" alt="" class="article-image">
                        </div>

                        <div class="trending-news-data">

                        <div class="article-data">
                        <span>1 April 2022</span>
                        <span class="article-data-spacer"></span>
                        <span>By Aljon</span>
                        </div>

                        <h3 class="title article-title">SI MARK</h3>

                        </div>
                        </a>

                        <a href="#" class="mb-5 trending-news-profile-box">
                        <div class="trending-news-img-box">
                        <span class="trending-number place-items-center">02</span>
                        <img src="./assets/images/featured/PROFILEPICPLACEHOLDER.png" alt="" class="article-image">
                        </div>

                        <div class="trending-news-data">

                        <div class="article-data">
                        <span>1 April 2022</span>
                        <span class="article-data-spacer"></span>
                        <span>By Mark</span>
                        </div>

                        <h3 class="title article-title">TAHIMIK LANG</h3>

                        </div>
                        </a>

                    </div>

                </div>
    </div>







</body> 