
        <!-- Single Page Header start -->
        <div class="container-fluid page-header py-5">
            <h1 class="text-center text-white display-6">Register</h1>
            <ol class="breadcrumb justify-content-center mb-0">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item"><a href="#">User</a></li>
                <li class="breadcrumb-item active text-white">Register</li>
            </ol>
        </div>
        <!-- Single Page Header End -->


        <!-- Toast Notification Start -->
        <div class="notification" v-bind:class="{ 'show': showNotification }">
            {{ notificationMessage }}
        </div>
        <!-- Toast Notification End -->
        

        <!-- Contact Start -->
        <div class="container-fluid contact py-5">
            <div class="container py-5">
                <div class="p-5 bg-light rounded">
                    <div class="row g-4">
                        <div class="col-12">
                            <div class="text-center mx-auto" style="max-width: 700px;">
                                <h1 class="text-primary">Get in touch</h1>
                                <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. 
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="h-100 rounded">
                                <form   @submit.prevent="signupSubmission" class="">
                                    <input type="text" 
                                        class="w-100 form-control border-0 py-3 mb-4" placeholder="Your Name" 
                                        autocomplete="off" 
                                        v-model="signup.userName" 
                                        name="user_name" 
                                        @input="registerInputFieldValidation('name')"
                                    >
                                    <p v-if="errors.signup.userNameError" class="error text-danger">{{ errors.signup.userNameError }}</p>

                                    <input type="email" 
                                        class="w-100 form-control border-0 py-3 mb-4" 
                                        placeholder="Enter Your Email" 
                                        autocomplete="off" 
                                        v-model="signup.userEmail" 
                                        name="user_email" 
                                        @input="registerInputFieldValidation('email')"
                                    >
                                    <p v-if="errors.signup.userEmailError" class="error text-danger">{{ errors.signup.userEmailError }}</p>

                                    <input type="password" 
                                        class="w-100 form-control border-0 py-3 mb-4" placeholder="Enter Your Password" 
                                        autocomplete="off" 
                                        v-model="signup.userPassword" 
                                        name="user_password" 
                                        @input="registerInputFieldValidation('password')"
                                    >
                                    <p v-if="errors.signup.userPasswordError" class="error text-danger">{{ errors.signup.userPasswordError }}</p>
                                    <input type="password" 
                                        class="w-100 form-control border-0 py-3 mb-4" placeholder="Enter Your Confirm Password" autocomplete="off" 
                                        v-model="signup.userConfirmPassword" name="user_confirm_password" 
                                        @input="registerInputFieldValidation('confirmpassword')"
                                    >
                                    <p v-if="errors.signup.userConfirmPasswordError" class="error text-danger">{{ errors.signup.userConfirmPasswordError }}</p>
                                    <button 
                                   
                                        class="w-100 btn form-control border-secondary py-3 bg-white text-primary " 
                                        type="submit"
                                    >
                                        <i v-if="signup.buttonLoaderFlag"class="fa bi bi-hourglass-top me-2 text-white"></i>
                                        <p v-else>Submit</p>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-12 text-center">
                            <p class="mb-0">Do you have an account? <a href="<?php echo base_url(''); ?>login" class="text-primary">Login</a></p>
                            <p class="mt-2">Have you forgot password? <a href="<?php echo base_url(''); ?>forgotPassword" class="text-primary">Forgot Password</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->


