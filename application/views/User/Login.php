
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
                                    <input type="email" 
                                        class="w-100 form-control border-0 py-3 mb-4" 
                                        placeholder="Enter Your Email" 
                                        autocomplete="off" 
                                        v-model="loginEmail" 
                                        name="user_email" 
                                        @input="loginInputFieldValidation('email')"
                                    >
                                    <p v-if="errors.loginEmailError" class="error text-danger">{{ errors.loginEmailError }}</p>

                                    <input type="password" 
                                        class="w-100 form-control border-0 py-3 mb-4" placeholder="Enter Your Password" 
                                        autocomplete="off" 
                                        v-model="loginPassword" 
                                        name="user_password" 
                                        @input="loginInputFieldValidation('password')"
                                    >
                                    <p v-if="errors.loginPasswordError" class="error text-danger">{{ errors.loginPasswordError }}</p>
                                    <button class="w-100 btn form-control border-secondary py-3 bg-white text-primary " type="submit">Submit</button>
                                </form>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->


