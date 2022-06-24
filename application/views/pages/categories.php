
   

    <!-- Search -->
    <div class="search-form-container container" id="search-form-container">

        <button class="btn form-close-btn place-items-center" id="form-close-btn">
            <i class="ri-close-line"></i>
        </button>

    </div>

    <!-- Posts -->
    <section class="featured-articles section section-header-offset">

    <div class="text-dark text-left mt-3">
        <h1><?php echo $pagetit; ?></h1>
        <form action = "<?php echo site_url('categories/skeyword/');?>" method="post">
          <div class="input-group">
            <input type="text" name="title" placeholder="Search..." class=" bg-light border border-secondary form-control">  
            <button class="btn bg-light border-start-0 border border-secondary" type="submit"> <i class="ri-search-line"></i></button>
          </div>
        </form>
    </div>

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

                <?php foreach ($cats as $cat):?>
                    <div class="trending-news-box">
                        <a href="<?php echo base_url('categories/postsbycat/'.$cat['id']);?>"><h3 class="title article-title"><?php echo $cat['name'];?></h3></a>
                    </div>
                <?php endforeach;?>

            </div>

            <div class="sidebar d-grid">

                <h3 class="title featured-content-title">Top Posts</h3>

                <?php $i = 0; foreach ($pops as $pop):?>
                    <a href="<?php echo base_url('post/'.$pop['id']);?>"><h3 class="title article-title"> <?php echo $pop['title'];?></h3></a>
                    <?php if (++$i == 10) break;?>
                <?php endforeach;?>

            </div>

        </div>

    </section>

