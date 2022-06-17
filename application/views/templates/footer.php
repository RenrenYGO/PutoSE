    <!-- Footer -->
    <footer class="footer section">

        <div class="footer-container container d-grid">

            <div class="company-data">
            <a href="<?php echo base_url('dashboard')?>">
                    <h2 class="logo"><b>PUTO</b></h2>
                </a>
                <p class="company-description">PUTO is a dedicated Micro-blog made by students, for students. Enjoy your stay!</p>

                <ul class="list social-media">
                    <li class="list-item">
                        <a href="#" class="list-link"><i class="ri-instagram-line"></i></a>
                    </li>
                    <li class="list-item">
                        <a href="#" class="list-link"><i class="ri-facebook-circle-line"></i></a>
                    </li>
                    <li class="list-item">
                        <a href="#" class="list-link"><i class="ri-twitter-line"></i></a>
                    </li>
                </ul>

                <span class="copyright-notice">&copy;2022 PUTO. All rights reserved.</span>
            </div>

              <!-- Newsletter -->
    <section class="newsletter section">

<div class="container">

    <div class="form-container-inner">
    <form id="newsletter" name="newsletter" method="post" action="<?php echo base_url();?>newsletter/index" onsubmit ='return validate()'>
    <h3 class="title newsletter-title">Subscribe to PUTO</h3>
        <p class="newsletter-description">Join our newsletter for the latest blog updates.</p>
        <form action="" class="form">
        <input type="email" name="email" id="email" style="width:250px;height:36px;" placeholder="Email address" class="ps-2 display border border-secondary border-1 rounded rounded-1"></input>
        <button type="submit" value="Submit" class="btn btn-post">Subscribe</button>
            </button>
        </form>

    </div>

</div>

</section>


            </div>

        </div>

    </footer>

    <!-- Swiper.js -->
    <script src="./assets/js/swiper-bundle.min.js"></script>
    <!-- Custom script -->
    <script src="./assets/js/main.js"></script>
</body>

</html>