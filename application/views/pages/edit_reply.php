<div class="form bg ">
    <div class="create" style= "margin: 10rem auto;">
        <div class = "Title">
            Edit Reply
        </div>
        <?php echo validation_errors();?>
            <?php echo form_open_multipart("replies/update/") ;?>
            <input type="hidden" name="id" value="<?php echo $data['id'];?>">
            <div class="form-group">
                <label for="body">Reply :</label>
                <textarea  class="form-control" required id="editor1" name="body" placeholder="Edit your reply"><?php echo $data['content'];?></textarea>
            </div>
            <button type="submit" class="btn btn-post">Post</button>
            <a href = "<?php echo base_url('/dashboard');?>"  class="btn btn-post cancel">Cancel</a>
        </form>
    </div>
</div>
