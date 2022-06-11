
    <a href="#" class="m-5 trending-news-box">
    <div class="trending-profile-img-box">
        <?php if($user['profile_picture']!='noimage.jpg'):?>
        <img src="<?php echo base_url('assets/images/profile_picture/' . $user['profile_picture']);?>" width= "80" height="80" class="rounded rounded-circle">
        <?php else:?>
        <img src="<?php echo base_url('assets/images/featured/PROFILEPICPLACEHOLDER.png');?>" width= "80" height="80" class="rounded rounded-circle">
        <?php endif;?>
    </div>
    </a>
    <div class="text-dark text-center">
        <h3><?php echo $user['name'];?></h3>
    </div>

    <div class="page-header"></div>
    <div class="main">
        <div class="row">
            <div class="col-4 py-5 ">
                <div class="bg-light text-dark border about ">
                    <h3>About Me</h3>
                    <p><?php echo $user['bio'];?></p>
                    <div class="mb-3">
                        <a type="submit" id="edit" href="<?php echo base_url('pages/dashboard/edit_profile');?>" class="btn btn-custom" name="edit" >EDIT PROFILE</a>
                    </div>
                </div>
            </div>

            <div class="container col-6 py-5">
            
                <?php foreach ($posts as $post):?>
                    <div class="trending-news-box mb-5 ">
                        <div class="trending-news-img-box">
                            <span class="trending-number place-items-center">HOT</span>
                            <img src="./assets/images/featured/PROFILEPICPLACEHOLDER.png" alt="" class="article-image">
                        </div>

                        <div class="trending-news-data">
                            <div class="article-data">
                                <span><?php echo $post['created_at'];?></span>
                                <span class="article-data-spacer"></span>
                                <span><?php echo $post['name'];?></span>
                            </div>

                            <h3 class="title article-title">
                                <a href="<?php echo base_url('post/'.$post['id']);?>" >
                                <?php echo $post['title'];?></a>
                            </h3>
                        </div>
                    </div>
                <?php endforeach;?>

            </div>

        </div>
    </div>