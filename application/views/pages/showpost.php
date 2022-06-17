
<div class="castoria-box">
    <div class="castoria-img-box">
    <a class="btn mb-3 px-2" href="<?php echo base_url('profile/viewprofile/'); ?><?php echo $post['user_id']; ?>"> <img src="<?php echo base_url('/assets/images/featured/Debug01.png')?>" width="90" height="105" ></a>
    
    <span><a class="btn mb-3 px-2" href="<?php echo base_url('profile/viewprofile/'); ?><?php echo $post['user_id']; ?>"><?php echo $post['name'];?></a></span>
    <div>
        <span>Title: <?php echo  $post['title'];?></span>   
    </div>
</div>
<div>
    <span><?php echo $post['content'];?></span>
</div>

</div>

    <div class="comment">
        <?php echo validation_errors(); ?>
        <?php if(isset($_SESSION['user'])):?>
                <?php echo form_open('replies/create/'.$post['id']); ?>
                    <div class="form-group">
                        <input type="text" class="form-control" placeholder="Comment your thoughts..." name="content">
                    </div>
                    
                    <input type="hidden" name="id" value="<?php echo $post['id']; ?>">
                    <button type="submit" class="btn btn-post">Comment</button>
                </form>
        <?php endif; ?>

        <div class="featured-articles-container container d-grid">
            <div class="featured-content d-grid">
                <span>REPLIES</span>
                    <?php foreach ($replies as $reply):?>
                        <a href="<?php echo base_url('replies/'.$reply['id']);?>" class="trending-news-box">
                            <div class="trending-news-img-box">
                                <span class="trending-number place-items-center">HOT</span>
                                <img src="<?php echo base_url('assets/images/featured/yeiwave.gif');?>" width= "80" height="80" class="rounded rounded-circle">
                            </div>

                            <div class="trending-news-data">

                                <div class="article-data">
                                    <span><?php echo $reply['created_at'];?></span>
                                    <span class="article-data-spacer"></span>
                                    <span><?php echo $reply['name'];?></span>
                                </div>

                                <h3 class="title article-title"><?php echo $reply['content'];?></h3>

                            </div>
                        </a>
                    <?php endforeach;?>
            </div>
        </div>
    </div>