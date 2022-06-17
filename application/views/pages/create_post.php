<div class="form bg ">
    <div class="create ">
        <div class = "Title">
            Create Post
        </div>
        <?php echo validation_errors();?>
            <?php echo form_open_multipart("posts/create") ;?>
            <div class="form-group">
                <label for="title">Title : </label>
                <input type="text" class="form-control" name="title">
            </div>
            <div class="form-group">
                <label for="body">Body :</label>
                <textarea  class="form-control" id="editor1" name="body"></textarea>
            </div>
            <div class="form-group">
                <label>Category</label>
                <select name="cat_id" class="form-control" style="width:470px;">
                    <?php foreach($cats as $cat):?>
                        <option value="<?php echo $cat['id']; ?>"><?php echo $cat['name']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <button type="submit" class="btn btn-post">Post</button>
            <a href = "<?php echo base_url('/dashboard');?>"  class="btn btn-post cancel">Cancel</a>
        </form>
    </div>
</div>
