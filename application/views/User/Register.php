
        <!-- Single Page Header start -->
        <div class="container-fluid page-header py-5">
            <h1 class="text-center text-white display-6">Contact</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">Pages</a></li>
                <li class="breadcrumb-item active text-white">Contact</li>
            </ol>
        </div>
        <!-- Single Page Header End -->


        <!-- Contact Start -->
        <div class="container-fluid contact py-5">
            <div class="container py-5">
                <div class="p-5 bg-light rounded">
                    <div class="row g-4">
                        <div class="col-12">
                            <div class="text-center mx-auto" style="max-width: 700px;">
                                <h1 class="text-primary">Get in touch</h1>
                                <p class="mb-4">The contact form is currently inactive. Get a functional and working contact form with Ajax & PHP in a few minutes. Just copy and paste the files, add a little code and you're done. <a href="https://htmlcodex.com/contact-form">Download Now</a>.</p>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="h-100 rounded">
                                <form action="" class="">
                                    <input type="text" 
                                        class="w-100 form-control border-0 py-3 mb-4" placeholder="Your Name" 
                                        autocomplete="off" 
                                        v-model="userName" 
                                        name="user_name" 
                                        @input="registerInputFieldValidation('name')"
                                    >
                                    <p v-if="errors.userNameError" class="error text-danger">{{ errors.userNameError }}</p>

                                    <input type="email" 
                                        class="w-100 form-control border-0 py-3 mb-4" 
                                        placeholder="Enter Your Email" 
                                        autocomplete="off" 
                                        v-model="userEmail" 
                                        name="user_email" 
                                        @input="registerInputFieldValidation('email')"
                                    >
                                    <p v-if="errors.userEmailError" class="error text-danger">{{ errors.userEmailError }}</p>

                                    <input type="password" 
                                        class="w-100 form-control border-0 py-3 mb-4" placeholder="Enter Your Password" 
                                        autocomplete="off" 
                                        v-model="userPassword" 
                                        name="user_password" 
                                        @input="registerInputFieldValidation('password')"
                                    >
                                    <p v-if="errors.userPasswordError" class="error text-danger">{{ errors.userPasswordError }}</p>
                                    <input type="password" 
                                        class="w-100 form-control border-0 py-3 mb-4" placeholder="Enter Your Confirm Password" autocomplete="off" 
                                        v-model="userConfirmPassword" name="user_confirm_password" 
                                        @input="registerInputFieldValidation('confirmpassword')"
                                    >
                                    <p v-if="errors.userConfirmPasswordError" class="error text-danger">{{ errors.userConfirmPasswordError }}</p>
                                    <button class="w-100 btn form-control border-secondary py-3 bg-white text-primary " type="submit">Submit</button>
                                </form>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->


