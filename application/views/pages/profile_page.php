
<div class = "profile">
        <div class="m-3 cover-photo-container">
            <?php if($user['cover_photo']!='noimage.jpg'):?>
                <img src="<?php echo base_url('assets/images/cover_photo/' . $user['cover_photo']);?>" class= "cover-photo">
            <?php else:?>
                <img src="<?php echo base_url('assets/images/featured/defaultcover1.jpg');?>" class= "cover-photo" >
            <?php endif;?>

            <?php $sess_user = $this->session->userdata('user');
                if(isset($sess_user) && $sess_user!=null && $sess_user['id'] == $user['id']):?>
                <div class="dropdown edit-cover">
                    <div class="btn btn-danger cancel dropbtn">Edit Cover Photo</div>

                    <div class="dropdown-content">
                        <button type="button"
                            data-bs-toggle="modal" 
                            data-bs-target="#uploadModal" 
                            style="padding:1rem; width:100%;"
                            onclick="changeAction('edit_cover')">
                            Upload
                        </button>

                        <button type="button"
                            style="padding:1rem; width:100%;"
                            onclick="deletePic('cover_photo')">
                            Remove
                        </button>
                    </div>
                    
                </div>

                <!-- Modal -->
                <div class="modal fade" id="uploadModal"  aria-labelledby="uploadModal" >
                    <div class="modal-dialog modal-dialog-centered text-dark">
                        <form id="Modal" method="post" name="Modal" enctype='multipart/form-data' >
                            <div class="modal-content">
                                <div class="modal-header justify-content-center">
                                <h4 class="modal-title" id="InputModalTitleLabel">Upload Photo</h4>
                                </div> 
                                <div class="modal-body text-color">
                                <input id='picture' type="file" ></input>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-custom cancel" data-bs-dismiss="modal" >Close</button>
                                    <button type="submit" class="btn btn-custom" >Submit</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                
            <?php endif;?>   
        </div>

    <div class="trending-profile-img-box">
        <div class = "profile-photo">
            <!-- Profile Picture -->
            <?php if($user['profile_picture']!='noimage.jpg'):?>
            <img src="<?php echo base_url('assets/images/profile_picture/' . $user['profile_picture']);?>" width= "120" height="120"  class="rounded-circle">
            <?php else:?>
            <img src="<?php echo base_url('assets/images/featured/PROFILEPICPLACEHOLDER.png');?>" width= "120" height="120" class="rounded-circle">
            <?php endif;?>
            
            <!-- Upload icon -->
            <?php $sess_user = $this->session->userdata('user');
            if(isset($sess_user) && $sess_user!=null && $sess_user['id'] == $user['id']):?>
                <button title="Upload Picture" class="btn rounded-circle btn-danger cancel dropbtn icon"
                    data-bs-toggle="modal" 
                    data-bs-target="#uploadModal"
                    onclick="changeAction('edit_profile_photo')">
                    <i class="ri-camera-fill"></i>
                </button>
            <?php endif;?>
            
        </div>
        <div class="text-dark text-center mt-3">
            <span><?php echo $user['name'];?></span>
        </div>
      
    </div>

    <div class="main">

        <div class="row">
            <div class="col-4 py-5 ">
                <div class="bg-light about ">
                    <div class=" text-dark">
                        <h2><strong>About Me</strong></h2>
                        <p><?php echo $user['bio'];?></p>
                    </div>
                    <div class="mb-3 text-dark">
                        <?php $sess_user = $this->session->userdata('user');
                            if(isset($sess_user) && $sess_user!=null && $sess_user['id'] == $user['id']):?>
                                <a type="submit" id="edit" href="<?php echo base_url('edit_profile/index');?>" class="btn btn-custom" name="edit" >EDIT PROFILE</a>
                            <?php endif;?>
                    </div>
                </div>
            </div>
               
            <div class="col-8 my-5 pl-5 d-grid">
            
                <?php foreach ($posts as $post):?>
                    <button  class="trending-news-box mb-5" onclick="viewPost(<?php echo $post['id']?>)" style="max-height:10em">
                        <div class="trending-news-img-box">
                            <a class="btn post-user-image" >
                            <?php if($user['profile_picture']!='noimage.jpg'):?>
                            <img src="<?php echo base_url('assets/images/profile_picture/' . $user['profile_picture']);?>" width= "80" height="80" class="rounded rounded-circle">
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

                            <h3 class="title article-title">
                     
                                <?php echo $post['title'];?></a>
                            </h3>

                            <?php if(isset($_SESSION['user'])):?>
                                <div class="d-flex mb-3">
                                 
                                    <div class="ms-2 me-1 pe-2 ps-1">
                                        <a title="Upvote" href="<?php echo base_url('/posts/upvoteP/'.$post['id'].'/'.$user['id']); ?>"class="px-2 text-decoration-none"  style="color:green;"> 
                                        <i class="ri-thumb-up-line px-2"></i><?php echo $post['upvote']; ?></a>
                                    </div>
                

                                
                                    <div class="input-group me-3 pe-2 ps-1">
                                        <a title="Downvote" href="<?php echo base_url('/posts/downvoteP/'.$post['id'].'/'.$user['id']); ?>"class="px-2 text-decoration-none" style="color:red;">
                                        <i class="ri-thumb-down-line px-2" ></i><?php echo $post['downvote']; ?></a>
                                    </div>
                            
                                </div>
                            <?php endif; ?>

                        </div>
                    </button>
                <?php endforeach;?>

            </div>

        </div>
    </div>
</div>

