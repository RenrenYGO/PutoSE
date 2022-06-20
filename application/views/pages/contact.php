<div class="container pt-5">    
    <div class="create" style= "margin: 10rem auto;">
        <div class = "Title">
            <b>Contact Us</b>
        </div>
<form id="contact" name="contact" method="post" action="<?php echo base_url();?>contact/index" onsubmit='return validate()'>
    <div class="form-group mb-2 ">
    <label>Email: </label>
    <input type="email" class="form-control" name="email" id="email" style="width: 300px" placeholder="Enter Email" required>
    <div class="form-group mb-2">
        <label for="message-text" class="col-form-label">Message:</label>
        <textarea class="form-control" id="editor1" name="editor1" style="height: 200px"></textarea>
                                <input type = "submit" value="submit" class="btn btn-post">
                            </div>                         
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>  
