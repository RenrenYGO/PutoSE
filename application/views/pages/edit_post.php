<div class="form bg ">
    <div class="create" style= "margin: 10rem auto;">
        <div class = "Title">
            Edit Post
        </div>
        <?php echo validation_errors();?>
            <?php echo form_open_multipart("posts/update") ;?>
            <input type="hidden" name="id" value="<?php echo $post['id'];?>">
            <input type="hidden" name="postedBy" value="<?php echo $post['user_id'];?>">

            <div class="form-group">
                <label for="title">Title : </label>
                <input type="text" class="form-control" name="title" placeholder="Add Title" value="<?php echo $post['title'];?>">
            </div>
            <div class="form-group">
                <label for="body">Body :</label>
                <textarea  class="form-control" id="editor1" name="body" placeholder="Add Content"><?php echo $post['content'];?></textarea>
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