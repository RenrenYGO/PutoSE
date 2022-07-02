<div class="container mt-5 pt-5">
    
    <?php echo form_open_multipart('edit_profile/index');?>
    <input type="hidden" name="id" value="<?php $user['id'];?>">
    
    <div class="box mt-5 col-6 mx-auto border border-2 ">
        <div class="text-light">
            <h2 class="text-center mt-2 pt-3 "><b>Edit Profile</b></h2>
            <div class="px-5 mx-3 pt-4 mt-3">

                <div class="form-group mb-2 form-floating">
                    <input type="text" class="form-control py-5" id="floatingInput" name="name" placeholder="Edit Username" value="<?php echo $user['name'];?>">
                    <label for="floatingInput" class="text-dark">Username</label>
                </div>

                <div class="form-group mb-2 form-floating">
                    <textarea style="height: 150px" class="form-control py-5" maxlength="150"
                    id="floatingBio" name="bio" 
                    placeholder="Edit Bio"><?php echo $user['bio'];?></textarea>
                    <label for="floatingBio" class="text-dark">Bio</label>
                </div>
                <?php echo validation_errors();?>
                <div class="ms-auto">
                    <button type="submit" class="btn btn-custom">Submit</button>
                </div>
            </div>
        </div>
    </div>
</div>