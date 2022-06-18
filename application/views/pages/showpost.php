
<div class = "featured-articles-container showpost">
    <div class="castoria-box">
        <div class="castoria-img-box">
            <a class="btn mb-3 px-2" href="<?php echo base_url('profile/viewprofile/'); ?>
                <?php echo $post['user_id']; ?>"> <img src="<?php echo base_url('/assets/images/featured/Debug01.png')?>" width="50" height="50" >
            </a>

            <a href="<?php echo base_url('profile/viewprofile/'); ?>
                <?php echo $post['user_id']; ?>"><?php echo $post['name'];?>
            </a>

            <a class="btn" href="<?php echo base_url('categories/postsbycat/'); ?>
                <?php echo $post['cat_id']; ?>">&#9679 Posted on <?php echo $post['catname']?>
            </a>
        </div>
        
        <?php echo  $post['title'];?>
        
        <p class="content mt-3" ><?php echo $post['content'];?></p>
       
    </div>

    <div class="comment">
        <?php echo validation_errors(); ?>
        <?php if(isset($_SESSION['user'])):?>
            <?php echo form_open('replies/create/'.$post['id']); ?>
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Comment your thoughts..." name="content">
                </div>
                
                <input type="hidden" name="id" value="<?php echo $post['id']; ?>">
         
            </form>
        <?php endif; ?>

        <div class="featured-articles-container">
            <div class="featured-content ">
                <span>REPLIES</span>
                    <?php foreach ($replies as $reply):?>
                        <div <?php echo base_url('replies/'.$reply['id']);?> class="trending-news-box mb-4">
                            <div class="trending-news-img-box">
                                <img src="<?php echo base_url('assets/images/featured/yeiwave.gif');?>" width= "80" height="80" class="rounded rounded-circle">
                            </div>

                            <div class="trending-news-data">

                                <div class="article-data">
                                    <span><?php echo $reply['created_at'];?></span>
                                    <span class="article-data-spacer"></span>
                                    <span><a class="btn mb-3 px-2" href="<?php echo base_url('profile/viewprofile/'); ?><?php echo $reply['user_id']; ?>"><?php echo $reply['name'];?></a></span>
                                </div>

                                <h3 class="title article-title"><?php echo $reply['content'];?></h3>

                            </div>
                        </div>
                    <?php endforeach;?>
            </div>
        </div>
    </div>
</div>