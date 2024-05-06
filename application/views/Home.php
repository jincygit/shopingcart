


        <!-- Hero Start -->
        <div class="container-fluid py-5 mb-5 hero-header">
            <div class="container py-5">
                <div class="row g-5 align-items-center">
                    <div class="col-md-12 col-lg-7">
                        <h4 class="mb-3 text-secondary">100% Organic Foods</h4>
                        <h1 class="mb-5 display-3 text-primary">Organic Food Products</h1>
                        <!-- <div class="position-relative mx-auto">
                            <input class="form-control border-2 border-secondary w-75 py-3 px-4 rounded-pill" type="number" placeholder="Search">
                            <button type="submit" class="btn btn-primary border-2 border-secondary py-3 px-4 position-absolute rounded-pill text-white h-100" style="top: 0; right: 25%;">Submit Now</button>
                        </div> -->
                    </div>
                    <div class="col-md-12 col-lg-5">
                        <div id="carouselId" class="carousel slide position-relative" data-bs-ride="carousel">
                            <div class="carousel-inner" role="listbox">
                                <div class="carousel-item active rounded">
                                    <img src="<?php echo base_url(''); ?>/Assets/img/hero-img-1.png" class="img-fluid w-100 h-100 bg-secondary rounded" alt="First slide">
                                    <a href="#" class="btn px-4 py-2 text-white rounded">Fruites</a>
                                </div>
                                <div class="carousel-item rounded">
                                    <img src="<?php echo base_url(''); ?>/Assets/img/hero-img-2.jpg" class="img-fluid w-100 h-100 rounded" alt="Second slide">
                                    <a href="#" class="btn px-4 py-2 text-white rounded">Vesitables</a>
                                </div>
                            </div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselId" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carouselId" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero End -->


        <!-- Fruits Shop Start-->
        <div class="container-fluid fruite ">
            <div class="container">
                <div class="tab-class text-center">
                    <div class="row g-4">
                        <div class="col-lg-4 text-start">
                            <h1>Our Organic Products</h1>
                        </div>
                        <div class="col-lg-8 text-end">
                            <ul class="nav nav-pills d-inline-flex text-center mb-5">
                                
                                <li class="nav-item">
                                    <p>Currently All category is selected</p>                       
                                </li>
                                <li class="nav-item">
                                    <a class="d-flex m-2 py-2 bg-light rounded-pill active" data-bs-toggle="pill" href="#tab-1">
                                        <span class="text-dark" style="width: 130px;">Category Selection</span>
                                    </a>
                                </li>
                                
                                <li class="nav-item">
                                    <div class="nav-item dropdown">
                                        <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Select Category</a>
                                        <div class="dropdown-menu m-0 bg-secondary rounded-0" >
                                            <div v-for="(categorydata, category_id) in categoryList" :key="category_id">
                                                <a href="categorydata.category_id" class="dropdown-item">{{ categorydata.category_name }}</a>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </li>                               
                            </ul>
                        </div>
                    </div>
                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane fade show p-0 active">
                            <div class="row g-4">
                                <div class="col-lg-12">
                                    
                                    <div class="row g-4">
                                        <div v-for="(productdata, product_id) in productList" :key="product_id" class="col-md-6 col-lg-4 col-xl-3">
                                            <div class="rounded position-relative fruite-item">
                                                <div class="fruite-img">
                                                    <img src="<?php echo base_url(''); ?>/Assets/img/fruite-item-5.jpg" class="img-fluid w-100 rounded-top" alt="">
                                                </div>
                                                <!-- <div class="text-white bg-secondary px-3 py-1 rounded position-absolute" style="top: 10px; left: 10px;">Fruits</div> -->
                                                <div class="p-4 border border-secondary border-top-0 rounded-bottom">
                                                    <h4>{{ productdata.product_name }}</h4>
                                                    <p>{{ productdata.product_description }}</p>
                                                    <div class="d-flex justify-content-between flex-lg-wrap">
                                                        <p class="text-dark fs-5 fw-bold mb-0">${{ productdata.product_price }} / kg</p>
                                                    </div>
                                                    <div class="d-flex justify-content-between flex-lg-wrap">                                               
                                                        <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa bi bi-cart-fill me-2 text-primary"></i> Add to cart</a>
                                                    </div>
                                                    <div class="d-flex justify-content-between flex-lg-wrap" @click="selectedProductUpdate(productdata,'edit')">
                                                    
                                                        <a  href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa bi bi-pencil-fill me-2 text-primary"></i> View/Edit</a>
                                                    </div>
                                                    <div class="d-flex justify-content-between flex-lg-wrap" @click="selectedProductUpdate(productdata,'delete')">
                                                        <a href="#" class="btn border border-secondary rounded-pill px-3 text-primary"><i class="fa bi bi-trash-fill me-2 text-primary"></i> Delete</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        
                       
                    </div>
                </div>      
            </div>
        </div>
        <!-- Fruits Shop End-->

        <!-- Product Pagination Start-->
        <div class="container-fluid fruite py-5">
            <div class="container py-5">
                <div class="tab-class text-center">
                    
                    <div class="tab-content">
                        <div id="tab-1" class="tab-pane fade show p-0 active">
                            <div class="row g-4">
                                <div class="col-lg-12">
                                    <!-- <div class="row g-4"> -->
                                        <!-- <div class="col-lg-4 text-start">
                                            <h1>Our Organic Products</h1>
                                        </div>
                                        <div class="col-lg-8 text-end"> -->
                                            <ul class="nav nav-pills d-inline-flex text-center mb-5">
                                                <li class="nav-item">
                                                    <a class="d-flex py-2 m-2 rounded-pill bg-green" data-bs-toggle="pill" href="#tab-2">
                                                        <span class="text-white" style="width: 130px;"><i class="fa bi bi-arrow-left-circle-fill me-2 text-white"></i>Prev</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="d-flex m-2 py-2 bg-light rounded-pill active" data-bs-toggle="pill" href="#tab-1">
                                                        <span class="text-dark" style="width: 130px;">1</span>
                                                    </a>
                                                </li>
                                                
                                                <li class="nav-item">
                                                    <a class="d-flex m-2 py-2 bg-light rounded-pill" data-bs-toggle="pill" href="#tab-3">
                                                        <span class="text-dark" style="width: 130px;">2</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="d-flex m-2 py-2 bg-light rounded-pill" data-bs-toggle="pill" href="#tab-3">
                                                        <span class="text-dark" style="width: 130px;">3</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="d-flex m-2 py-2 bg-light rounded-pill" data-bs-toggle="pill" href="#tab-3">
                                                        <span class="text-dark" style="width: 130px;">4</span>
                                                    </a>
                                                </li>
                                                
                                                <li class="nav-item">
                                                    <a class="d-flex py-2 m-2 rounded-pill bg-green" data-bs-toggle="pill" href="#tab-2">
                                                        <span class="text-white" style="width: 130px;">Next<i class="fa bi bi-arrow-right-circle-fill me-2-left text-white"></i></span>
                                                    </a>
                                                </li>
                                            </ul>
                                        <!-- </div>                                         -->
                                    <!-- </div> -->
                                </div>
                            </div>
                        </div>
                        
                       
                    </div>
                </div>      
            </div>
        </div>
        <!-- Product Pagination End-->

        <!-- Category Title Start-->
        <div class="container-fluid fruite ">
            <div class="container">
                <div class="tab-class text-center">
                    <div class="row g-4">
                        <div class="col-lg-4 text-start">
                            <h1>All Categories</h1>
                        </div>
                    </div>
                    
                </div>      
            </div>
        </div>
        <!-- Category Title End-->


        <!-- Featurs Start -->
        <div class="container-fluid service py-5">
            
            <div class="container py-5">
                
            <div class="row g-4">
                <div class="col-md-6 col-lg-4" v-for="(categorydata, category_id) in categoryList" :key="category_id">
                    <a href="#">
                        <div class="service-item bg-secondary rounded border border-secondary">
                            <img src="<?php echo base_url(''); ?>/Assets/img/featur-1.jpg" class="img-fluid rounded-top w-100" alt="">
                            <div class="px-4 rounded-bottom">
                            
                                <div class="service-content bg-primary text-center p-4 rounded">
                                    <h3 class="mb-0">{{ categorydata.category_name }}</h3>
                                    <h5 class="text-white" @click="selectedCategoryUpdate(categorydata,'edit')"><a href="#" class="btn border border-secondary rounded-pill px-3 text-light"><i class="fa bi bi-pencil-fill me-2 text-light"></i>View/Edit</a></h5>
                                    <h5 class="text-white" @click="selectedCategoryUpdate(categorydata,'delete')"><a href="" class="btn border border-secondary rounded-pill px-3 text-light"><i class="fa bi bi-trash-fill me-2 text-light"></i>Delete</a></h5>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>


            </div>
        </div>
        <!-- Featurs End -->


        <!-- Vesitable Shop Start-->
        
        <!-- Vesitable Shop End -->


        <!-- Banner Section Start-->
        <div class="container-fluid banner bg-secondary my-5">
            <div class="container py-5">
                <div class="row g-4 align-items-center">
                    <div class="col-lg-6">
                        <div class="py-4">
                            <h1 class="display-3 text-white">Fresh Exotic Fruits</h1>
                            <p class="fw-normal display-3 text-dark mb-4">in Our Store</p>
                            <p class="mb-4 text-dark">The generated Lorem Ipsum is therefore always free from repetition injected humour, or non-characteristic words etc.</p>
                            <a href="#" class="banner-btn btn border-2 border-white rounded-pill text-dark py-3 px-5">BUY</a>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="position-relative">
                            <img src="<?php echo base_url(''); ?>/Assets/img/baner-1.png" class="img-fluid w-100 rounded" alt="">
                            <div class="d-flex align-items-center justify-content-center bg-white rounded-circle position-absolute" style="width: 140px; height: 140px; top: 0; left: 0;">
                                <h1 style="font-size: 100px;">1</h1>
                                <div class="d-flex flex-column">
                                    <span class="h2 mb-0">50$</span>
                                    <span class="h4 text-muted mb-0">kg</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Banner Section End -->


        


        <!-- Fact Start -->
        <div class="container-fluid py-5">
            <div class="container">
                <div class="bg-light p-5 rounded">
                    <div class="row g-4 justify-content-center">
                        <div class="col-md-6 col-lg-6 col-xl-3">
                            <div class="counter bg-white rounded p-5">
                                <i class="fa fa-users text-secondary"></i>
                                <h4>satisfied customers</h4>
                                <h1>1963</h1>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-3">
                            <div class="counter bg-white rounded p-5">
                                <i class="fa fa-users text-secondary"></i>
                                <h4>quality of service</h4>
                                <h1>99%</h1>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-3">
                            <div class="counter bg-white rounded p-5">
                                <i class="fa fa-users text-secondary"></i>
                                <h4>quality certificates</h4>
                                <h1>33</h1>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-3">
                            <div class="counter bg-white rounded p-5">
                                <i class="fa fa-users text-secondary"></i>
                                <h4>Available Products</h4>
                                <h1>789</h1>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Fact Start -->


       


        