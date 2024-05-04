
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
                                        class="w-100 form-control border-0 py-3 mb-4" placeholder="Enter Product Name" 
                                        autocomplete="off" 
                                        v-model="addProductName" 
                                        name="user_name" 
                                        @input="addProductInputFieldValidation('name')"
                                    >
                                    <p v-if="errors.addProductNameError" class="error text-danger">{{ errors.addProductNameError }}</p>
                                    <input type="text" 
                                        class="w-100 form-control border-0 py-3 mb-4" placeholder="Enter Product Price" 
                                        autocomplete="off" 
                                        v-model="addProductPrice" 
                                        name="user_name" 
                                        @input="addProductInputFieldValidation('price')"
                                    >
                                    <p v-if="errors.addProductPriceError" class="error text-danger">{{ errors.addProductPriceError }}</p>
                                    <textarea 
                                        class="w-100 form-control border-0 mb-4" 
                                        rows="5" 
                                        cols="10" 
                                        placeholder="Enter Product Description"
                                        autocomplete="off" 
                                        v-model="addProductDescription" 
                                        name="user_name" 
                                        @input="addProductInputFieldValidation('description')"
                                    ></textarea>
                                    <p v-if="errors.addProductDescriptionError" class="error text-danger">{{ errors.addProductDescriptionError }}</p>

                                    <div class="form-group">
                                        <label>Choose product categories</label>
                                        <div class="checkbox-group">
                                            <input type="checkbox" id="category1" value="1" v-model="addProductCategory" name="category[]" @input="addProductInputFieldValidation('category')">
                                            <label for="category1">Category 1</label>
                                        </div>
                                        <div class="checkbox-group">
                                            <input type="checkbox" id="category2" value="2" v-model="addProductCategory" name="category[]" @input="addProductInputFieldValidation('category')">
                                            <label for="category2">Category 2</label>
                                        </div>
                                        <div class="checkbox-group">
                                            <input type="checkbox" id="category3" value="3" v-model="addProductCategory" name="category[]" @input="addProductInputFieldValidation('category')">
                                            <label for="category3">Category 1</label>
                                        </div>
                                        
                                        <!-- Add more checkboxes as needed -->
                                    </div>


                                    
                                    <p v-if="errors.userNameError" class="error text-danger">{{ errors.userNameError }}</p>
                                    
                                    <button class="w-100 btn form-control border-secondary py-3 bg-white text-primary " type="submit">Submit</button>
                                </form>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact End -->


