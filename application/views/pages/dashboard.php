
   

    <!-- Search -->
    <div class="search-form-container container" id="search-form-container">

        <div class="form-container-inner">

            <form action="" class="form">
                <input class="form-input" type="text" placeholder="What are you looking for?">
                <button class="btn form-btn" type="submit">
                    <i class="ri-search-line"></i>
                </button>
            </form>
            <span class="form-note">Or press ESC to close.</span>

        </div>

        <button class="btn form-close-btn place-items-center" id="form-close-btn">
            <i class="ri-close-line"></i>
        </button>

    </div>

    <!-- Posts -->
    <section class="featured-articles section section-header-offset">

        <div class="featured-articles-container container d-grid">

            <div class="featured-content posts d-grid">
                
                <?php if(isset($_SESSION['user']['name'])):?>
                    <button class="btn sign-up-btn fancy-border screen-sm-hidden " >
                        <a class="justify-content-center"href="<?php echo base_url('posts/create');?>" >
                            <span>Create Post + </span>
                        </a>
                    </button>
                <?php else:?>
                    <button data-bs-toggle="modal" data-bs-target="#InputModal" class="btn sign-up-btn fancy-border screen-sm-hidden" >
                    <span>Create Post + </span>
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="InputModal" tabindex="-1" aria-labelledby="InputModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered text-color">
                            <div class="modal-content">
                                <div class="modal-header justify-content-center">
                                <h5 class="modal-title" id="InputModalTitleLabel">Create Post</h5>
                                </div> 
                                <div class="modal-body">
                                <h2 class="title footer-title">Please sign in first or create an account!</h2>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif;?>

                <?php foreach ($posts as $post):?>
                    <div class="trending-news-box">
                        <div class="trending-news-img-box">
                            <a class="trending-number place-items-center" href="<?php echo base_url('categories/postsbycat/'); ?><?php echo $post['cat_id']; ?>"> <?php echo $post['catname']?>
                            <a class="btn mb-3 px-2" href="<?php echo base_url('profile/viewprofile/'); ?><?php echo $post['user_id']; ?>"> <img src="./assets/images/featured/PROFILEPICPLACEHOLDER.png" alt="" class="article-image"></a>
                        </div>

                        <div class="trending-news-data">

                            <div class="article-data">
                                <span><?php echo $post['created_at'];?></span>
                                <span class="article-data-spacer"></span>
                                <span><a class="btn mb-3 px-2" href="<?php echo base_url('profile/viewprofile/'); ?><?php echo $post['user_id']; ?>"><?php echo $post['name'];?></a></span>
                            </div>

                            <a href="<?php echo base_url('post/'.$post['id']);?>"><h3 class="title article-title"><?php echo $post['title'];?></h3></a>

                        </div>
                    </div>
                <?php endforeach;?>

            </div>

            <div class="sidebar d-grid">

                <h3 class="title featured-content-title">Top Posts</h3>
                <a href ="#">1. wow</a>
                <a href ="#">2. noice</a>
                <a href ="#">3. goodjob</a>
                <a href ="#">4. galing</a>
                <a href ="#">5. dabest</a>
                <a href ="#">6. lupit</p>
                <a href ="#">7. nakamamangha</a>
                <a href ="#">8. cool</a>
                <a href ="#">9. sugoi</a>
                <a href ="#">10. angas</a>
            </div>

        </div>

    </section>

