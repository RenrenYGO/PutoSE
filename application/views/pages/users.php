
    <!-- Posts -->
    <section class="featured-articles section section-header-offset">

        <div class="featured-articles-container container d-grid">

            <div class="featured-content posts d-grid">

            <div class="d-flex">
                <div class="container text-dark mx-5 px-5">
                    <h1><?php echo $pagetit; ?></h1>
                </div>
                <div class="input-group">
                    <form action = "<?php echo site_url('posts/skeyword/');?>" method="post">
                        <input type="text" name="title" placeholder="&#xf002 Search..." style="font-family:FontAwesome" id="search" class="bg-light form-control">
                    </form>
                </div>
                
                <div class="container text-dark mx-5 px-5">
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
                </div>
                </div>

                <?php foreach ($users as $user):?>
                    <div class="trending-news-box">
                        <a href="<?php echo base_url('profile/viewprofile/'.$user['id']);?>"><h3 class="title article-title"><?php echo $user['name'];?></h3></a>
                    </div>
                <?php endforeach;?>

            </div>

            <div class="sidebar">
                <h3 class="title featured-content-title">Top Posts</h3>
                <?php $i = 0; foreach ($pops as $pop):?>
                    <div class='top-links'>
                        <a href="<?php echo base_url('post/'.$pop['id']);?>"> <?php echo $i+1,'. ',$pop['title'];?></a>
                    </div>
                    <?php if (++$i == 10) break;?>
                <?php endforeach;?>
            </div>

        </div>

    </section>

