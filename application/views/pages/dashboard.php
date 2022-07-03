
     <!-- Posts -->
    <section class="featured-articles section section-header-offset">

        <div class="featured-articles-container container d-grid">

            <div class="featured-content posts d-grid">

                <div class="d-flex justify-content-between align-items-center">
                <div class="text-dark">
                    <h2><?php echo $pagetit; ?></h2>
                </div>

                <div class="input-group d-flex justify-content-center">
                    <form action = "<?php echo site_url('posts/skeyword/');?>" method="post">
                        <input type="text" name="title" placeholder="&#xf002 Search..." style="font-family:FontAwesome" id="search" class="bg-light form-control">
                    </form>
                </div>
                
                <div class="text-dark" >
                    <?php if(isset($_SESSION['user']['name'])):?>
                        <button class="btn sign-up-btn fancy-border screen-sm-hidden " style="width:11em">
                            <a class="justify-content-center"href="<?php echo base_url('posts/create');?>" >
                                <span>Create Post + </span>
                            </a>
                        </button>
                    <?php else:?>
                        <button data-bs-toggle="modal" data-bs-target="#InputModal" class="btn sign-up-btn fancy-border screen-sm-hidden" style="width:11em">
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

                <?php foreach ($posts as $post):?>
                    <button class="trending-news-box" onclick="viewPost(<?php echo $post['id']?>)">
                        <div class="trending-news-img-box">
                           
                            <a class="btn post-user-image"
                            href="<?php echo base_url('profile/viewprofile/'); ?><?php echo $post['user_id']; ?>">
                            <?php if($post['profile_picture']!='noimage.jpg'):?>
                            <img src="<?php echo base_url('assets/images/profile_picture/' . $post['profile_picture']);?>" width= "80" height="80" class="rounded rounded-circle">
                            <?php else:?>
                            <img src="<?php echo base_url('assets/images/featured/PROFILEPICPLACEHOLDER.png');?>" width= "80" height="80" class="rounded rounded-circle">
                            <?php endif;?>
                            <?php echo $post['name'];?></a>

                        </div>

                        <div class="trending-news-data">

                            <div class="article-data">
                                <a href="<?php echo base_url('categories/postsbycat/'.$post['cat_id']); ?>">Posted on <?php echo $post['catname']?></a> 
                                <span class="article-data-spacer"></span>
                                <span><?php echo substr($post['created_at'], 0, 10);?></span>
                            </div>

                            <h3 class="title article-title"><?php echo mb_strimwidth($post['title'], 0, 15, '...');?></h3>

                            <?php if(isset($_SESSION['user'])):?>
                                <div class="d-flex mb-3">
                                    
                                    <div class="ms-2 me-1 pe-2 ps-1">
                                        <a title="Upvote" href="<?php echo base_url('/posts/upvote/'.$post['id']); ?>"class="px-2 text-decoration-none"  style="color:green;"> 
                                        <i class="ri-thumb-up-line px-2"></i><?php echo $post['upvote']; ?></a>
                                    </div>
                

                                
                                    <div class="input-group me-3 pe-2 ps-1">
                                        <a title="Downvote" href="<?php echo base_url('/posts/downvote/'.$post['id']); ?>"class="px-2 text-decoration-none" style="color:red;">
                                        <i class="ri-thumb-down-line px-2" ></i><?php echo $post['downvote']; ?></a>
                                    </div>
                                 
                                </div>
                            <?php endif; ?>

                        </div>
                    </button>
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
