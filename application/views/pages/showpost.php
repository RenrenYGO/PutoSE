
<div class = "showpost">
    <div class="castoria-box">
        <div class="castoria-img-box">
            <div class="postheader">
                <a class="btn mb-3 px-2" href="<?php echo base_url('profile/viewprofile/'); ?><?php echo $post['user_id']; ?>"> 
                    <?php if($post['profile_picture']!='noimage.jpg'):?>
                    <img src="<?php echo base_url('assets/images/profile_picture/' . $post['profile_picture']);?>" width= "80" height="80" class="rounded rounded-circle">
                    <?php else:?>
                    <img src="<?php echo base_url('assets/images/featured/PROFILEPICPLACEHOLDER.png');?>" width= "100" height="100" class="rounded rounded-circle">
                    <?php endif;?>
                </a>

                <a href="<?php echo base_url('profile/viewprofile/'); ?><?php echo $post['user_id']; ?>">
                    <?php echo $post['name'];?>
                </a>

                <a class="btn" href="<?php echo base_url('categories/postsbycat/'); ?><?php echo $post['cat_id']; ?>">&#9679 Posted on 
                    <?php echo $post['catname']?>
                </a>
</div>
            <div class="postheader" style="float: right">
                <?php if(isset($_SESSION['user']) && $this->session->userdata('user')['id'] == $post['user_id']):?>
                    <a class="btn btn-custom" id="edit" href="<?php echo base_url('posts/edit/'.$post['id']);?>">Edit Post</a>
                    <?php echo form_open('posts/delete/'.$post['id']);?>
                        <input type="submit" value="Delete" class="btn btn-danger">
                    </form>
                <?php endif;?>
            </div>
        </div>

        
        
        <?php echo  $post['title'];?>
        
        <p class="content mt-3" ><?php echo $post['content'];?></p>

        <?php if(isset($_SESSION['user'])):?>
                    
                    <div class="d-flex mb-3">
                        <?php echo form_open('/posts/upvote/'.$post['id']); ?>
                            <div class="input-group ms-2 me-1 pe-2 ps-1">
                                <input name="upvote" type="hidden" value="<?php echo $post['id']?>">
                                    <button class="btn bg-success" type="submit">
                                    <?php echo $post['upvote']; ?></button>
                            </div>
                        </form>

                        <?php echo form_open('/posts/downvote/'.$post['id']); ?>
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
                        <button type="submit" class="m-3 btn btn-custom">Comment</button>
                    </form>
                </div>
                <?php endif; ?>
                    <?php foreach ($replies as $reply):?>
                        <div <?php echo base_url('replies/'.$reply['id']);?> class="trending-news-box mb-4">
                            <div class="trending-news-img-box">
                                <?php if($reply['profile_picture']!='noimage.jpg'):?>
                                <img src="<?php echo base_url('assets/images/profile_picture/' . $reply['profile_picture']);?>" width= "80" height="80" class="rounded rounded-circle">
                                <?php else:?>
                                <img src="<?php echo base_url('assets/images/featured/PROFILEPICPLACEHOLDER.png');?>" width= "100" height="100" class="rounded rounded-circle">
                                <?php endif;?>
                            </div>

                            <div class="trending-news-data">

                                <div class="replyheader" style="float:right">
                                    <?php if(isset($_SESSION['user']) && $this->session->userdata('user')['id'] == $reply['user_id']):?>
                                        <?php echo form_open('replies/delete_reply/'.$reply['id']);?>
                                            <input type="submit" value="Delete" class="btn btn-danger">
                                        </form>
                                    <?php endif;?>
                                </div>

                                <div class="article-data">
                                    <span><?php echo $reply['created_at'];?></span>
                                    <span class="article-data-spacer"></span>
                                    <span><a class="btn mb-3 px-2" href="<?php echo base_url('profile/viewprofile/'); ?><?php echo $reply['user_id']; ?>"><?php echo $reply['name'];?></a></span>
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
                        </div>
                    <?php endforeach;?>
            </div>
        </div>
    </div>
</div>