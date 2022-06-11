<div class="container mt-5 pt-5">
    <?php echo validation_errors();?>
    <?php echo form_open('edit_account/account_edit');?>
        <input type="hidden" name="id" value="<?php echo $this->session->userdata('user')['id'];?>">
        <div class="box mt-5 col-6 mx-auto border border-2">
        <h2 class="text-center mt-2 pt-3"><b>Edit Account Settings</b></h2>
        <div class="px-5 mx-3 pt-4 mt-3">
        <div class="form-group mb-2">
            <p>Email:</p>
            <input type="text" class="form-control" name="email" placeholder="Enter Email" value="<?php echo $this->session->userdata('user')['email'];?>">
        </div>
    <!-- </form> -->

        <?php //echo form_open('edit_account/change_pass');?>
                <div class="form-group mb-2">
                    <p>New Password:</p>
                    <input type="password" class="form-control" name="newpass" id="newpass" placeholder="Enter New Password">
                </div>
                <div class="form-group mb-2">
                    <p>Confirm Password:</p>
                    <input type="password" class="form-control" name="confpass" id="confpass" placeholder="Confirm New Password">
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-custom" name="submit">Submit</button>
                </div>
            </div>
        </form>
    </div>
</div>