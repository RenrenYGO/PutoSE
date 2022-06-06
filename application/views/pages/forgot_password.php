<div class="form bg">
    <div class="box col-8 mt-5">
        <div class="login">
            <img src="<?php echo base_url('/assets/images/featured/PUTOLOGO.png')?>" width="138" height="130" >
            Forgot Password
        </div>

        <?php echo form_open("forgot_password/verify") ;?>
            <div class="mb-3 ">
                <input type="email" class="form-control" placeholder="Enter Email" name="email" id="email" required>
            </div>
            
            <div class="mb-3 input-group">
                <input type="text" class="form-control" placeholder="Enter Verification Code" name="verification"> 
                <button id="regenerateOTP" class="btn btn-custom" name="verify" ><span id="timer">Send Code</span></button>         
            </div>
            <script>
                $('#regenerateOTP').on('click', function () {
                    var email = document.getElementById("email").value;
                    console.log(email);
                    disableResend();
                    timer(60);
                        $.ajax({
                            url: "<?php echo base_url()?>forgot_password/sendOTP",
                            type:'post',
                            data : {
                                email : email,
                            },
                        });

                    });

                function disableResend()
                {
                        $("#regenerateOTP").attr("disabled", true);
                        timer(60);
                        setTimeout(function() {
                        // enable click after 1 second
                        $('#regenerateOTP').removeAttr("disabled");
                        }, 60000); // 1 second delay
                }

                let timerOn = true;

                function timer(remaining) {
                    var m = Math.floor(remaining / 60);
                    var s = remaining % 60;
                    
                    m = m < 10 ? '0' + m : m;
                    s = s < 10 ? '0' + s : s;
                    resend = "Resend";
                    document.getElementById('timer').textContent = m + ':' + s;
                    remaining -= 1;
                    
                    if(remaining >= 0 && timerOn) {
                    setTimeout(function() {
                        timer(remaining);
                    }, 1000);
                    return;
                    }

                    if(!timerOn) {
                    return;
                    }
                    document.getElementById('timer').textContent = resend;
                    return;
                }
            </script>
            <div class="mb-3">
                <input type="password" class="form-control" placeholder="Enter New Password" name="new_password" required>
            </div>

            <div class="mb-3">
                <input type="password" class="form-control" placeholder="Confirm Password" name="confirm_password" required>
            </div>
            <div class="errorsignup">
                    <?php echo validation_errors();?>
                </div>
            <div class="mb-3">
                <button type="submit" class="btn btn-custom" name="submit" >Submit</button>
            </div>
        </form>
    </div>
</div>

    