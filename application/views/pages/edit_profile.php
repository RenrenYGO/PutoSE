<div class="container mt-5 pt-5">
    <?php echo validation_errors();?>
    <?php echo form_open_multipart('edit_profile/profile_edit');?>
    <input type="hidden" name="id" value="<?php echo $this->session->userdata('user')['id'];?>">
    <div class="box mt-5 col-6 mx-auto border border-2">
        <h2 class="text-center mt-2 pt-3"><b>Edit Profile</b></h2>
        <div class="px-5 mx-3 pt-4 mt-3">
            <div class="form-group mb-2">
                <input type="text" class="form-control" name="name" placeholder="Edit Username" value="<?php echo $this->session->userdata('user')['name'];?>">
            </div>
            <div class="form-group mb-2">
                <textarea class="form-control" name="bio" placeholder="Edit Bio"
                ><?php echo $this->session->userdata('user')['bio'];?></textarea>
            </div>
            <div class="label" title="Add Profile Picture">
                <input type="file" name="profile_picture" size="200">
            </div>
            <div class="ms-auto">
                <button type="submit" class="btn btn-custom">Submit</button>
            </div>
        </div>
    </div>
</div>