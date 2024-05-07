<!-- Footer Start -->
        <div class="container-fluid bg-dark text-white-50 footer pt-5 mt-5">
            <div class="container py-5">
                <div class="pb-4 mb-4" style="border-bottom: 1px solid rgba(226, 175, 24, 0.5) ;">
                    <div class="row g-4">
                        <div class="col-lg-3">
                            <a href="#">
                                <h1 class="text-primary mb-0">Shop Now</h1>
                                <p class="text-secondary mb-0">Fresh products</p>
                            </a>
                        </div>
                        <div class="col-lg-6">
                            <div class="position-relative mx-auto">
                                <input class="form-control border-0 w-100 py-3 px-4 rounded-pill" type="number" placeholder="Your Email">
                                <button type="submit" class="btn btn-primary border-0 border-secondary py-3 px-4 position-absolute rounded-pill text-white" style="top: 0; right: 0;">Subscribe Now</button>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="d-flex justify-content-end pt-3">
                                <a class="btn  btn-outline-secondary me-2 btn-md-square rounded-circle" href=""><i class="fab fa-twitter"></i></a>
                                <a class="btn btn-outline-secondary me-2 btn-md-square rounded-circle" href=""><i class="fab fa-facebook-f"></i></a>
                                <a class="btn btn-outline-secondary me-2 btn-md-square rounded-circle" href=""><i class="fab fa-youtube"></i></a>
                                <a class="btn btn-outline-secondary btn-md-square rounded-circle" href=""><i class="fab fa-linkedin-in"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row g-5">
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-item">
                            <h4 class="text-light mb-3">Lorem ipsum!</h4>
                            <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt.</p>
                            <a href="" class="btn border-secondary py-2 px-4 rounded-pill text-primary">Read More</a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="d-flex flex-column text-start footer-item">
                            <h4 class="text-light mb-3">Home</h4>
                            <a class="btn-link" href="">Register</a>
                            <a class="btn-link" href="">Login</a>
                            <a class="btn-link" href="">SignOut</a>
                            <a class="btn-link" href="">Products</a>
                            <a class="btn-link" href="">Categories</a>

                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="d-flex flex-column text-start footer-item">
                        <h4 class="text-light mb-3">Home</h4>
                            <a class="btn-link" href="">Register</a>
                            <a class="btn-link" href="">Login</a>
                            <a class="btn-link" href="">SignOut</a>
                            <a class="btn-link" href="">Products</a>
                            <a class="btn-link" href="">Categories</a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-item">
                            <h4 class="text-light mb-3">Contact</h4>
                            <p>Address: 0000 Netus Rd, NY 0000</p>
                            <p>Email: Example@gmail.com</p>
                            <p>Phone: +0000 0000 0000</p>
                            <p>Payment Accepted</p>
                            <img src="<?php echo base_url(''); ?>/Assets/img/payment.png" class="img-fluid" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Footer End -->

        <!-- Copyright Start -->
        <div class="container-fluid copyright bg-dark py-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                        <span class="text-light"><a href="#"><i class="fas fa-copyright text-light me-2"></i>Your Site Name</a>, All right reserved.</span>
                    </div>
                    <div class="col-md-6 my-auto text-center text-md-end text-white">
                        <!--/*** This template is free as long as you keep the below author’s credit link/attribution link/backlink. ***/-->
                        <!--/*** If you'd like to use the template without the below author’s credit link/attribution link/backlink, ***/-->
                        <!--/*** you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". ***/-->
                        Designed By <a class="border-bottom" href="">SHOP NOW</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Copyright End -->



        <!-- Back to Top -->
        <a href="#" class="btn btn-primary border-3 border-primary rounded-circle back-to-top"><i class="fa fa-arrow-up"></i></a>   

        
    </div>
    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="<?php echo base_url(''); ?>/Assets/lib/easing/easing.min.js"></script>
    <script src="<?php echo base_url(''); ?>/Assets/lib/waypoints/waypoints.min.js"></script>
    <script src="<?php echo base_url(''); ?>/Assets/lib/lightbox/js/lightbox.min.js"></script>
    <script src="<?php echo base_url(''); ?>/Assets/lib/owlcarousel/owl.carousel.min.js"></script>

    <!-- Template Javascript -->
    
    <script src="<?php echo base_url(''); ?>/Assets/js/main.js"></script>
    <script>
        var BASE_URL = '<?php echo base_url(''); ?>';
        var User_Email = '<?php echo $this->session->userdata('USER_EMAIL'); ?>';
        var User_Role = '<?php echo $this->session->userdata('USER_ROLE'); ?>';
        var Product_Id = '<?php echo $this->session->userdata('PRODUCT_ID'); ?>';
        var Category_Id = '<?php echo $this->session->userdata('CATEGORY_ID'); ?>';
    </script>
    <script src="<?php echo base_url(''); ?>/Assets/js/myvue.js"></script>
    </body>

</html>