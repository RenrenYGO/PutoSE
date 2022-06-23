
<div class = "profile">
    <?php echo form_open_multipart('edit_profile/cover_edit');?>
        <div class="m-3 cover-photo-container">
            <?php if($user['cover_photo']!='noimage.jpg'):?>
                <img src="<?php echo base_url('assets/images/cover_photo/' . $user['cover_photo']);?>" class= "cover-photo">
            <?php else:?>
                <img src="<?php echo base_url('assets/images/featured/defaultcover1.jpg');?>" class= "cover-photo" >
            <?php endif;?>
        </div>

        <div class="label" title="Add Cover Photo">
        <?php $sess_user = $this->session->userdata('user');
            if(isset($sess_user) && $sess_user!=null && $sess_user['id'] == $user['id']):?>
                <input type="file" name="cover_photo"></input>
                <button type="submit" class="btn btn-custom">Submit</button>
            <?php endif;?>
        </div>
    </form>

    <div class="trending-profile-img-box">
        <?php if($user['profile_picture']!='noimage.jpg'):?>
        <img src="<?php echo base_url('assets/images/profile_picture/' . $user['profile_picture']);?>" width= "80" height="80" class="rounded rounded-circle">
        <?php else:?>
        <img src="<?php echo base_url('assets/images/featured/PROFILEPICPLACEHOLDER.png');?>" width= "100" height="100" class="rounded rounded-circle">
        <?php endif;?>
        <div class="text-dark text-center mt-3">
            <h3><?php echo $user['name'];?></h3>
        </div>
    </div>
    
    <div class="main">

        <div class="row">
            <div class="col-4 py-5 ">
                <div class="bg-light text-dark about ">
                    <h3>About Me</h3>
                    <p><?php echo $user['bio'];?></p>
                    <div class="mb-3">
                        <?php $sess_user = $this->session->userdata('user');
                            if(isset($sess_user) && $sess_user!=null && $sess_user['id'] == $user['id']):?>
                                <a type="submit" id="edit" href="<?php echo base_url('pages/dashboard/edit_profile');?>" class="btn btn-custom" name="edit" >EDIT PROFILE</a>
                            <?php endif;?>
                    </div>
                </div>
            </div>
               
            <div class="container col-8 my-5 pl-5">
            
                <?php foreach ($posts as $post):?>
                    <div class="trending-news-box mb-5 ">
                        <div class="trending-news-img-box">
                            <a class="trending-number place-items-center" href="<?php echo base_url('categories/postsbycat/'); ?><?php echo $post['cat_id']; ?>"> <?php echo $post['catname']?></a>
                            <?php if($user['profile_picture']!='noimage.jpg'):?>
                            <img src="<?php echo base_url('assets/images/profile_picture/' . $user['profile_picture']);?>" width= "80" height="80" class="rounded rounded-circle">
                            <?php else:?>
                            <img src="<?php echo base_url('assets/images/featured/PROFILEPICPLACEHOLDER.png');?>" width= "100" height="100" class="rounded rounded-circle">
                            <?php endif;?>
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
                    </div>
                <?php endforeach;?>

            </div>

        </div>
    </div>
</div>