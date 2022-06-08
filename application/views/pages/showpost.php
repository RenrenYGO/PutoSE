
<div class="castoria-box">
    <div class="castoria-img-box">
        <img src="<?php echo base_url('/assets/images/featured/Debug01.png')?>" width="90" height="105" >
        <span><?php echo $post['name'];?></span>
    <div>
        <span><?php echo $post['title'];?></span>   
    </div>
        <span><?php echo $post['content'];?></span>
    </div>
</div>

    <div class="mb-6">
        <input type="comment" class="form-control" placeholder="Comment your thoughts..." name="comment">
        <button type="submit" class="btn btn-post">Comment</button>
    </div>
