<div class="container pt-5">
   
    <div class="create" style = "margin: 12rem auto;">
        <h2 class="text-center mt-2 p-4"><b>Edit Account</b></h2>
    
       
            <?php echo form_open('settings/edit_account');?>
                <input type="hidden" name="id" value="<?php echo $this->session->userdata('user')['id'];?>">
                <div class = "py-4">

                    <div class="form-group mb-2 ">
                        <label>Current Password: </label>
                        <input type="password" class="form-control" name="password" id="newpass" placeholder="Enter Current Password">
                    </div>

                    <div class="form-group mb-2 ">
                        <label>New Password:</label>
                        <input type="password" class="form-control" name="newpass" id="newpass" placeholder="Enter New Password">
                    </div>

                    <div class="form-group mb-2">
                        <label>Confirm Password:</label>
                        <input type="password" class="form-control" name="confpass" id="confpass" placeholder="Confirm New Password">
                    </div>
                </div>

                <div class="error">
                <?php echo validation_errors();?>
                </div>

                <div class="my-5">
                    <button type="submit" class="btn btn-post" name="submit">Submit</button>
                </div>
            </form>
        
    </div>
</div>