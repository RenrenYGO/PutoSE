
<div class = "showpost">
    <div class="castoria-box">
        <div class="castoria-img-box text-dark">
            <div class="postheader text-dark">
                <a class="btn px-2" href="<?php echo base_url('profile/viewprofile/'); ?><?php echo $post['user_id']; ?>"> 
                    <?php if($post['profile_picture']!='noimage.jpg'):?>
                    <img src="<?php echo base_url('assets/images/profile_picture/' . $post['profile_picture']);?>" width= "50" height="50" class="rounded rounded-circle">
                    <?php else:?>
                    <img src="<?php echo base_url('assets/images/featured/PROFILEPICPLACEHOLDER.png');?>" width= "50" height="50" class="rounded rounded-circle">
                    <?php endif;?>
                </a>

                <a href="<?php echo base_url('profile/viewprofile/'); ?><?php echo $post['user_id']; ?>">
                    <?php echo $post['name'];?>
                </a>

                <div class="btn" >
                    &#9679 Posted on <?php echo $post['created_at']?>
                </div>
            </div>
            
            <div class="postheader" style="float: right">
                <?php if(isset($_SESSION['user']) && $this->session->userdata('user')['id'] == $post['user_id']):?>
                    <a class="btn btn-custom" id="edit" href="<?php echo base_url('posts/edit/'.$post['id']);?>">Edit</a>
                    <a class="btn btn-custom cancel" id="edit" href="<?php echo base_url('posts/delete/'.$post['id']);?>">Delete</a>
                <?php endif;?>
            </div>
        </div>

        
        
        <p class="text-dark" > <?php echo  $post['title'];?></p>
        
        <p class="content mb-5 text-dark" ><?php echo $post['content'];?></p>

        
                    
        <div class="d-flex justify-content-between mb-3 postfooter text-dark">
            <div>
                Replies: <?php echo count($replies)?>
            </div>

            <div>
                <a  href="<?php echo base_url('categories/postsbycat/'); ?><?php echo $post['cat_id']; ?>">Posted on 
                    <?php echo $post['catname']?>
                </a>
            </div>

            <?php if(isset($_SESSION['user'])):?>
                <div class="d-flex ">
                
                    <?php echo form_open('/posts/upvoteR/'.$post['id']); ?>
                        <div class="input-group ms-2 me-1 pe-2 ps-1">
                            <input name="upvote" type="hidden" value="<?php echo $post['id']?>">
                                <button class="btn bg-success" type="submit">
                                <?php echo $post['upvote']; ?></button>
                        </div>
                    </form>

                    <?php echo form_open('/posts/downvoteR/'.$post['id']); ?>
                        <div class="input-group me-3 pe-2 ps-1">
                            <input name="downvote" type="hidden" value="<?php echo $post['id']?>">
                            <button class="btn bg-danger" type="submit">
                                <?php echo $post['downvote']; ?>
                            </button>
                        </div>
                    </form>
                </div>
            <?php endif; ?>
         </div>
        
       
    </div>

    <div class="comment">
        <?php echo validation_errors(); ?>

        <div class="featured-articles-container">
            <div class="featured-content ">
                <span>REPLIES</span>
                <?php if(isset($_SESSION['user'])):?>
                    <div style="text-align:right;">
                    <?php echo form_open('replies/create/'.$post['id']); ?>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Comment your thoughts..." name="content">
                        </div>
                        
                        <input type="hidden" name="id" value="<?php echo $post['id']; ?>">
                        <button type="submit" class="my-3 btn btn-custom">Comment</button>
                    </form>
                </div>
                <?php endif; ?>
                    <?php foreach ($replies as $reply):?>
                        <div <?php echo base_url('replies/'.$reply['id']);?> class="trending-news-box mt-4">
                            <div class="trending-news-img-box">
                                <a class="btn post-user-image" href="<?php echo base_url('profile/viewprofile/'); ?><?php echo $post['user_id']; ?>">
                                <?php if($post['profile_picture']!='noimage.jpg'):?>
                                <img src="<?php echo base_url('assets/images/profile_picture/' . $post['profile_picture']);?>" width= "80" height="80" class="rounded rounded-circle">
                                <?php else:?>
                                <img src="<?php echo base_url('assets/images/featured/PROFILEPICPLACEHOLDER.png');?>" width= "80" height="80" class="rounded rounded-circle">
                                <?php endif;?>
                                <?php echo $post['name'];?>
                                </a>
                                
                            </div>

                            <div class="trending-news-data">

                                
                                
                                <div class="article-data">
                                    <span><?php echo $reply['created_at'];?></span>           
                                </div>
                                
                                <h3 class="title article-title"><?php echo $reply['content'];?></h3>

                                <?php if(isset($_SESSION['user'])):?>
                                    <div class="d-flex mb-3">
                                        <?php echo form_open('/replies/upvoteR/'.$reply['id']."/".$post['id']); ?>
                                            <div class="input-group ms-1 me-1 pe-2 ps-1">
                                                <input name="upvote" type="hidden" value="<?php echo $reply['id']?>">
                                                <button class="btn bg-success" type="submit"> 
                                                    <?php echo $reply['upvote']; ?>    
                                                </button>
                                            </div>
                                        </form>
                                    
                                        <?php echo form_open('/replies/downvoteR/'.$reply['id']."/".$post['id']); ?>
                                            <div class="input-group  pe-2 ps-1">
                                                <input name="downvote" type="hidden" value="<?php echo $reply['id']?>">
                                                <button class="btn bg-danger" type="submit">
                                                <?php echo $reply['downvote']; ?></button>
                                            </div>
                                        </form>
                                    </div>
                                <?php endif; ?>

                            </div>
                            <div class="replyheader d-flex" style="float:right">
                                <?php if(isset($_SESSION['user']) && $this->session->userdata('user')['id'] == $reply['user_id']):?>
                                    <a class="btn btn-custom" id="edit" href="<?php echo base_url('replies/edit/'.$reply['id']);?>">Edit</a>
                                    <a class="btn btn-custom cancel" id="delete" href="<?php echo base_url('replies/delete_reply/'.$reply['id'].'/'.$post['id']);?>">Delete</a>
                                    <?php endif;?>
                                </div>
                        </div>
                    <?php endforeach;?>
            </div>
        </div>
    </div>
</div>