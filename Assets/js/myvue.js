var app = new Vue({
    el: '#app',
    data: {
        //register
        signup: {
            userName: '',
            userEmail: '',
            userPassword: '',
            userConfirmPassword: '',
            submissionAllowFlag:false,
            buttonLoaderFlag: 0,
        },
        //login
        login: {
            loginEmail: '',
            loginPassword: '',
            submissionAllowFlag:false,
            buttonLoaderFlag: 0,
        },
        //forgot password
        forgot: {
            forgotPasswordEmail: '',
            submissionAllowFlag:false,
            buttonLoaderFlag: 0,
        },
        //updatepassword
        changePassword: {
            userEmail: '',
            updateNewPassword: '',
            updateNewConfirmPassword: '',
            submissionAllowFlag:false,
            buttonLoaderFlag: 0,
        },
        //addProduct
        addProduct: {
            userEmail: '',
            addProductName: '',
            addProductPrice: '',
            addProductCategory: [],
            addProductDescription: '',
            submissionAllowFlag:false,
            buttonLoaderFlag: 0,
        },
        //editProduct
        editProduct: {
            userEmail: '',
            editProductId: '',
            editProductName: '',
            editProductPrice: '',
            editProductCategory: [],
            editProductDescription: '',
            submissionAllowFlag:false,
            buttonLoaderFlag: 0,
        },
        //deleteProduct
        deleteProduct: {
            buttonLoaderFlag: 0,
        },
        //addCategory
        addCategory: {
            addCategoryName: '',
            submissionAllowFlag:false,
            buttonLoaderFlag: 0,
        },
        //editCategory
        editCategory: {
            editCategoryId: '',
            editCategoryName: '',
            submissionAllowFlag:false,
            buttonLoaderFlag: 0,
        },
        //deleteCategory
        deleteCategory: {
            buttonLoaderFlag: 0,
        },
        productListingHomePagination: {
            offset: 0,
            limit: 4,
        },
        
        
        
        categoryList: [], 
        productList: [], 
        //selectedProductId: 0,
        selectedProductdata: [],
        selectedCategorydata: [], 
        
        //createCategory
        //editCategory

        //custom notification
        showNotification: false,
        notificationMessage: 'oooooo',
        errors: {
            //register
            signup: {             
                userNameError: '',
                userEmailError: '',
                userPasswordError: '',
                userConfirmPasswordError: '',
            },
            //login
            login: {
                loginEmailError: '',
                loginPasswordError: '',
            },
            //forgot password
            forgot: {
                forgotPasswordEmailError: '',
            },
            //updatepassword
            changePassword: {
                updateNewPasswordError: '',
                updateNewConfirmPasswordError: '',
            },
            //addProduct
            addProduct: {
                addProductNameError: '',       
                addProductPriceError: '',
                addProductCategoryError: '',
                addProductDescriptionError: '',
            },
            //editProduct
            editProduct: {
                editProductNameError: '',       
                editProductPriceError: '',
                editProductCategoryError: '',
                editProductDescriptionError: '',
            },
            //addCategory
            addCategory: {
                addCategoryNameError: '',
            },
            //editCategory
            editCategory: {
                editCategoryNameError: '',
            },
                        
            //createCategory
            //editCategory
            
        }
    },
    created() {
        this.categoryListingAPI();
        this.productListingAPI();
        this.editProductDataSetting();
        this.editCategoryDataSetting();
      },
    methods: {
        registerInputFieldValidation(type) {
            //console.log(this.userName.length);
            // Validate userName
            if(type == "name"){
                const alphanumericRegex = /^[a-zA-Z0-9]+$/;
                this.errors.signup.userNameError = '';
                // Check if data is empty         
                if (!this.signup.userName.trim()) {
                    this.errors.signup.userNameError = 'Username is required';
                }
                //Check if its length is within the specified range
                else if (this.signup.userName.length < 2 || this.signup.userName.length > 25) {
                    this.errors.signup.userNameError = 'Username must be between 2 and 25 characters';
                }               
                // Check if it contains only alphanumeric characters
                else if (!alphanumericRegex.test(this.signup.userName)) {
                    this.errors.signup.userNameError = 'Username can only contain letters and numbers';
                }
                
            }

            // Validate userEmail
            if(type == "email"){
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                this.errors.signup.userEmailError = '';
                // Check if data is empty         
                if (!this.signup.userEmail.trim()) {
                    this.errors.signup.userEmailError = 'Useremail is required';
                }               
                // Check if email format is valid
                else if (!emailRegex.test(this.signup.userEmail)) {
                    this.errors.signup.userEmailError = 'Invalid email format';
                }
            }

            // Validate userPassword
            if(type == "password"){
                this.errors.signup.userPasswordError = '';
                // Check if data is empty         
                if (!this.signup.userPassword.trim()) {
                    this.errors.signup.userPasswordError = 'UserPassword is required';
                }
                //Check if its length is within the specified range
                else if (this.signup.userPassword.length < 8 || this.signup.userPassword.length > 25) {
                    this.errors.signup.userPasswordError = 'UserPassword must be between 8 and 25 characters';
                }                             
            }

            // Validate userConfirmPassword
            if(type == "confirmpassword"){
                this.errors.signup.userConfirmPasswordError = '';
                // Check if data is empty         
                if (!this.signup.userConfirmPassword.trim()) {
                    this.errors.signup.userConfirmPasswordError = 'UserPassword is required';
                }
                //Check if its length is within the specified range
                else if (this.signup.userConfirmPassword.length < 8 || this.signup.userConfirmPassword.length > 25) {
                    this.errors.signup.userConfirmPasswordError = 'UserPassword must be between 8 and 25 characters';
                }
                // Check if confirm password matches userPassword
                else if (this.signup.userConfirmPassword !== this.signup.userPassword) {
                    this.errors.signup.userConfirmPasswordError = 'Passwords do not match';
                }                           
            }

            if  (
                (this.errors.signup.userNameError ==='') &&
                (this.errors.signup.userEmailError ==='') &&
                (this.errors.signup.userPasswordError ==='') &&
                (this.errors.signup.userConfirmPasswordError ==='') &&
                (this.signup.userName.trim()) &&
                (this.signup.userEmail.trim()) &&
                (this.signup.userPassword.trim()) &&
                (this.signup.userConfirmPassword.trim())
            ){ 
                this.signup.submissionAllowFlag=true;
            }   
        },
        loginInputFieldValidation(type) {

            // Validate userEmail
            if(type == "email"){
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                this.errors.login.loginEmailError = '';
                // Check if data is empty         
                if (!this.login.loginEmail.trim()) {
                    this.errors.login.loginEmailError = 'Useremail is required';
                }               
                // Check if email format is valid
                else if (!emailRegex.test(this.login.loginEmail)) {
                    this.errors.login.loginEmailError = 'Invalid email format';
                }              
            }

            // Validate userPassword
            if(type == "password"){
                this.errors.login.loginPasswordError = '';
                // Check if data is empty         
                if (!this.login.loginPassword.trim()) {
                    this.errors.login.loginPasswordError = 'UserPassword is required';
                }
                //Check if its length is within the specified range
                else if (this.login.loginPassword.length < 8 || this.login.loginPassword.length > 25) {
                    this.errors.login.loginPasswordError = 'UserPassword must be between 8 and 25 characters';
                }                             
            }

            if  (
                    (this.errors.login.loginEmailError ==='') &&
                    (this.errors.login.loginPasswordError ==='') &&
                    (this.login.loginEmail.trim()) &&
                    (this.login.loginPassword.trim())
                ){ 
                    this.login.submissionAllowFlag=true;
            }                  
        },
        forgotPasswordInputFieldValidation(type) {
            // Validate userEmail
            if(type == "email"){
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                this.errors.forgot.forgotPasswordEmailError = '';
                // Check if data is empty         
                if (!this.forgot.forgotPasswordEmail.trim()) {
                    this.errors.forgot.forgotPasswordEmailError = 'Useremail is required';
                }               
                // Check if email format is valid
                else if (!emailRegex.test(this.forgot.forgotPasswordEmail)) {
                    this.errors.forgot.forgotPasswordEmailError = 'Invalid email format';
                }
                
            }   
            if  (
                (this.errors.forgot.forgotPasswordEmailError ==='') &&
                (this.forgot.forgotPasswordEmail.trim()) 
            ){ 
                this.forgot.submissionAllowFlag=true;
            }                       
        },
        updatePasswordInputFieldValidation(type) {
            this.changePassword.userEmail = document.getElementById('forgotPasswordEmail').value;
            // Validate userPassword
            if(type == "newpassword"){
                this.errors.changePassword.updateNewPasswordError = '';
                // Check if data is empty         
                if (!this.changePassword.updateNewPassword.trim()) {
                    this.errors.changePassword.updateNewPasswordError = 'UserPassword is required';
                }
                //Check if its length is within the specified range
                else if (this.changePassword.updateNewPassword.length < 8 || this.changePassword.updateNewPassword.length > 25) {
                    this.errors.changePassword.updateNewPasswordError = 'UserPassword must be between 8 and 25 characters';
                }                             
            }

            // Validate userConfirmPassword
            if(type == "confirmnewpassword"){
                this.errors.changePassword.updateNewConfirmPasswordError = '';
                // Check if data is empty         
                if (!this.changePassword.updateNewConfirmPassword.trim()) {
                    this.errors.changePassword.updateNewConfirmPasswordError = 'UserPassword is required';
                }
                //Check if its length is within the specified range
                else if (this.changePassword.updateNewConfirmPassword.length < 8 || this.changePassword.updateNewConfirmPassword.length > 25) {
                    this.errors.changePassword.updateNewConfirmPasswordError = 'UserPassword must be between 8 and 25 characters';
                }
                // Check if confirm password matches userPassword
                else if (this.changePassword.updateNewConfirmPassword !== this.changePassword.updateNewPassword) {
                    this.errors.changePassword.updateNewConfirmPasswordError = 'Passwords do not match';
                }                           
            }
            if  (
                (this.errors.changePassword.updateNewPasswordError ==='') &&
                (this.errors.changePassword.updateNewConfirmPasswordError ==='') &&
                (this.changePassword.updateNewPassword.trim()) &&
                (this.changePassword.userEmail.trim()) &&
                (this.changePassword.updateNewConfirmPassword.trim())
            ){ 
                this.changePassword.submissionAllowFlag=true;
            }
        },
        addProductInputFieldValidation(type) {
            //console.log(this.addProduct.addProductCategory);
            // Validate productname
            if(type == "name"){
                const alphanumericRegex = /^[a-zA-Z0-9]+$/;
                this.errors.addProduct.addProductNameError = '';
                // Check if data is empty         
                if (!this.addProduct.addProductName.trim()) {
                    this.errors.addProduct.addProductNameError = 'Productname is required';
                }
                //Check if its length is within the specified range
                else if (this.addProduct.addProductName.length < 2 || this.addProduct.addProductName.length > 25) {
                    this.errors.addProduct.addProductNameError = 'Productname must be between 2 and 25 characters';
                }               
                // Check if it contains only alphanumeric characters
                else if (!alphanumericRegex.test(this.addProduct.addProductName)) {
                    this.errors.addProduct.addProductNameError = 'Productname can only contain letters and numbers';
                }
                
            }

            if(type == "price"){
                const alphanumericRegex = /^[0-9]+$/;
                this.errors.addProduct.addProductPriceError = '';
                // Check if data is empty         
                if (!this.addProduct.addProductPrice.trim()) {
                    this.errors.addProduct.addProductPriceError = 'Productprice is required';
                }
                
                // Check if it contains only alphanumeric characters
                else if (!alphanumericRegex.test(this.addProduct.addProductPrice)) {
                    this.errors.addProduct.addProductPriceError = 'Productprice can contains only numbers';
                }
                
            }

            if(type == "category1"){
                
            }

            // Validate userConfirmPassword
            if(type == "description"){
                const alphanumericRegex = /^[a-zA-Z0-9]+$/;
                this.errors.addProduct.addProductDescriptionError = '';
                // Check if data is empty         
                if (!this.addProduct.addProductDescription.trim()) {
                    this.errors.addProduct.addProductDescriptionError = 'Product description is required';
                }           
                
                
            }

            if  (
                (this.errors.addProduct.addProductNameError ==='') &&
                (this.errors.addProduct.addProductPriceError ==='') &&
                (this.errors.addProduct.addProductDescriptionError ==='') &&
                (this.errors.addProduct.addProductCategoryError ==='') &&
                (this.addProduct.addProductName.trim()) &&
                (this.addProduct.addProductPrice.trim()) &&
                (this.addProduct.addProductDescription.trim()) 
            ){ 
                this.addProduct.submissionAllowFlag=true;
            } 
        },
        editProductInputFieldValidation(type) {
            //console.log(this.editProduct.editProductCategory);
            // Validate productname
            if(type == "name"){
                const alphanumericRegex = /^[a-zA-Z0-9]+$/;
                this.errors.editProduct.editProductNameError = '';
                // Check if data is empty         
                if (!this.editProduct.editProductName.trim()) {
                    this.errors.editProduct.editProductNameError = 'Productname is required';
                }
                //Check if its length is within the specified range
                else if (this.editProduct.editProductName.length < 2 || this.editProduct.editProductName.length > 25) {
                    this.errors.editProduct.editProductNameError = 'Productname must be between 2 and 25 characters';
                }               
                // Check if it contains only alphanumeric characters
                else if (!alphanumericRegex.test(this.editProduct.editProductName)) {
                    this.errors.editProduct.editProductNameError = 'Productname can only contain letters and numbers';
                }
                
            }

            if(type == "price"){
                const alphanumericRegex = /^[0-9]+$/;
                this.errors.editProduct.editProductPriceError = '';
                // Check if data is empty         
                if (!this.editProduct.editProductPrice.trim()) {
                    this.errors.editProduct.editProductPriceError = 'Productprice is required';
                }
                
                // Check if it contains only alphanumeric characters
                else if (!alphanumericRegex.test(this.editProduct.editProductPrice)) {
                    this.errors.editProduct.editProductPriceError = 'Productprice can contains only numbers';
                }
                
            }

            if(type == "category1"){
                
            }

            // Validate userConfirmPassword
            if(type == "description"){
                const alphanumericRegex = /^[a-zA-Z0-9]+$/;
                this.errors.editProduct.editProductDescriptionError = '';
                // Check if data is empty         
                if (!this.editProduct.editProductDescription.trim()) {
                    this.errors.editProduct.editProductDescriptionError = 'Product description is required';
                }           
                
                
            }

            if  (
                (this.errors.editProduct.editProductNameError ==='') &&
                (this.errors.editProduct.editProductPriceError ==='') &&
                (this.errors.editProduct.editProductDescriptionError ==='') &&
                (this.errors.editProduct.editProductCategoryError ==='') &&
                (this.editProduct.editProductName.trim()) &&
                (this.editProduct.editProductPrice.trim()) &&
                (this.editProduct.editProductDescription.trim()) 
            ){ 
                this.editProduct.submissionAllowFlag=true;
            } 
        },
        addCategoryInputFieldValidation(type) {
            // Validate productname
            if(type == "name"){
                const alphanumericRegex = /^[a-zA-Z0-9]+$/;
                this.errors.addCategory.addCategoryNameError = '';
                // Check if data is empty         
                if (!this.addCategory.addCategoryName.trim()) {
                    this.errors.addCategory.addCategoryNameError = 'Categoryname is required';
                }
                //Check if its length is within the specified range
                else if (this.addCategory.addCategoryName.length < 2 || this.addCategory.addCategoryName.length > 12) {
                    this.errors.addCategory.addCategoryNameError = 'Categoryname must be between 2 and 12 characters';
                }               
                // Check if it contains only alphanumeric characters
                else if (!alphanumericRegex.test(this.addCategory.addCategoryName)) {
                    this.errors.addCategory.addCategoryNameError = 'Categoryname can only contain letters and numbers';
                }
                
            }

            if  (
                (this.errors.addCategory.addCategoryNameError ==='') &&
                (this.addCategory.addCategoryName.trim()) 
            ){ 
                this.addCategory.submissionAllowFlag=true;
            } 
        },
        editCategoryInputFieldValidation(type) {
            // Validate productname
            if(type == "name"){
                const alphanumericRegex = /^[a-zA-Z0-9]+$/;
                this.errors.editCategory.editCategoryNameError = '';
                // Check if data is empty         
                if (!this.editCategory.editCategoryName.trim()) {
                    this.errors.editCategory.editCategoryNameError = 'Categoryname is required';
                }
                //Check if its length is within the specified range
                else if (this.editCategory.editCategoryName.length < 2 || this.editCategory.editCategoryName.length > 12) {
                    this.errors.editCategory.editCategoryNameError = 'Categoryname must be between 2 and 12 characters';
                }               
                // Check if it contains only alphanumeric characters
                else if (!alphanumericRegex.test(this.editCategory.editCategoryName)) {
                    this.errors.editCategory.editCategoryNameError = 'Categoryname can only contain letters and numbers';
                }
                
            }

            

            if  (
                (this.errors.editCategory.editCategoryNameError ==='') &&
                (this.editCategory.editCategoryName.trim()) 
            ){ 
                this.editCategory.submissionAllowFlag=true;
            } 
        },
        signupSubmission() {
            //for prevent buttonclick on API processing    
            if (this.signup.submissionAllowFlag=== true){ 
                if (this.signup.buttonLoaderFlag===0){
                    this.signup.buttonLoaderFlag=1;
                    //API callling
                    const requestData = {
                        signup: this.signup,
                        additionalData: {
                            functionType: 'API',
                        }
                    };
                    fetch('http://localhost/shopping/registerSubmissionAPI', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify(requestData)
                    })
                    .then(response => {
                        //checking response is ok or not
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {                    
                        //success part                    
                        this.showCustomNotify(data.message);
                        this.signup.buttonLoaderFlag=0;
                        //clearinput if its  successful 
                        if(data.status === true){
                            this.signup.userName = "";
                            this.signup.userEmail = "";
                            this.signup.userPassword = "";
                            this.signup.userConfirmPassword = "";
                        }
                        
                    })
                    .catch(error => {
                        console.log(error);
                        //error in submission
                        this.showCustomNotify('There was a problem with form submission');
                        this.signup.buttonLoaderFlag=0;
                    });
                }
            }
        },
        loginSubmission() {
            //for prevent buttonclick on API processing  this.login.submissionAllowFlag   
            if (this.login.buttonLoaderFlag===0){
                if (this.login.submissionAllowFlag=== true){
                    this.login.buttonLoaderFlag=1;
                    //API callling
                    const requestData = {
                        login: this.login,
                        additionalData: {
                            functionType: 'API',
                        }
                    };
                    fetch(BASE_URL+'loginSubmissionAPI', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify(requestData)
                    })
                    .then(response => {
                        //checking response is ok or not
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {                    
                        //success part                    
                        this.showCustomNotify(data.message);
                        this.login.buttonLoaderFlag=0;
                    })
                    .catch(error => {
                        //error in submission
                        this.showCustomNotify('There was a problem with form submission');
                        this.login.buttonLoaderFlag=0;
                    });
                }
            }
        },
        forgotSubmission() {
            //for prevent buttonclick on API processing     
            if (this.forgot.buttonLoaderFlag===0){
                if (this.forgot.submissionAllowFlag=== true){
                    this.forgot.buttonLoaderFlag=1;
                    //API callling
                    const requestData = {
                        forgot: this.forgot,
                        additionalData: {
                            functionType: 'API',
                        }
                    };
                    fetch(BASE_URL+'forgotSubmissionAPI', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify(requestData)
                    })
                    .then(response => {
                        //checking response is ok or not
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {                    
                        //success part                    
                        this.showCustomNotify(data.message);
                        this.forgot.buttonLoaderFlag=0;
                        window.location.href = BASE_URL+'/'+data.data.redirect_url;
                    })
                    .catch(error => {
                        //error in submission
                        this.showCustomNotify('There was a problem with form submission');
                        this.forgot.buttonLoaderFlag=0;
                    });
                }
            }
        },
        changePasswordSubmission() {
            //check useremail exist or not
            this.changePassword.userEmail = document.getElementById('forgotPasswordEmail').value;
            if(this.changePassword.userEmail ===""){
                this.changePassword.submissionAllowFlag = false;
                this.showCustomNotify('Again do forgot password');
            }else{
                if (this.changePassword.submissionAllowFlag=== true){
                    this.changePassword.submissionAllowFlag = true;
                }
            }

            //for prevent buttonclick on API processing     
            if (this.changePassword.buttonLoaderFlag===0){
                if (this.changePassword.submissionAllowFlag=== true){
                    this.changePassword.buttonLoaderFlag=1;
                    //API callling
                    const requestData = {
                        changePassword: this.changePassword,
                        additionalData: {
                            functionType: 'API',
                        }
                    };
                    fetch(BASE_URL+'changePasswordAPI', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify(requestData)
                    })
                    .then(response => {
                        //checking response is ok or not
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {                    
                        //success part                    
                        this.showCustomNotify(data.message);
                        this.changePassword.buttonLoaderFlag=0;
                        window.location.href = BASE_URL+'/'+data.data.redirect_url;
                    })
                    .catch(error => {
                        //error in submission
                        this.showCustomNotify('There was a problem with form submission');
                        this.changePassword.buttonLoaderFlag=0;
                    });
                }
            }
        },
        addProductSubmission() {
            //check whether user logged in or not before submission
            if(!this.checkUserLogged()){
                this.showCustomNotify("User not logged yet");
            }else{
                //product category crosschecking
                this.errors.addProduct.addProductCategoryError = '';
                // Check if atleast one category        
                if (Object.keys(this.addProduct.addProductCategory).length==0) {
                    this.errors.addProduct.addProductCategoryError = 'Alteast one category is required';
                    this.addProduct.submissionAllowFlag = false;
                }
                else{
                    if (this.addProduct.submissionAllowFlag=== true){
                        this.addProduct.submissionAllowFlag = true;
                    }
                }

                //for prevent buttonclick on API processing     
                if (this.addProduct.buttonLoaderFlag===0){
                    if (this.addProduct.submissionAllowFlag=== true){
                        this.addProduct.buttonLoaderFlag=1;
                        //API callling
                        const requestData = {
                            addProduct: this.addProduct,
                            additionalData: {
                                functionType: 'API',
                            }
                        };
                        fetch(BASE_URL+'addProductAPI', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                            },
                            body: JSON.stringify(requestData)
                        })
                        .then(response => {
                            //checking response is ok or not
                            if (!response.ok) {
                                throw new Error('Network response was not ok');
                            }
                            return response.json();
                        })
                        .then(data => {                    
                            //success part                    
                            this.showCustomNotify(data.message);
                            this.addProduct.buttonLoaderFlag=0;
                        })
                        .catch(error => {
                            //error in submission
                            //console.log(error);
                            this.showCustomNotify('There was a problem with form submission');
                            this.addProduct.buttonLoaderFlag=0;
                        });
                    }
                }
            }      
        },
        editProductSubmission() {
            //check whether user logged in or not before submission
            if(!this.checkUserLogged()){
                this.showCustomNotify("User not logged yet");
            }else{
                //product category crosschecking
                this.errors.editProduct.editProductCategoryError = '';
                // Check if atleast one category        
                if (Object.keys(this.editProduct.editProductCategory).length==0) {
                    this.errors.editProduct.editProductCategoryError = 'Alteast one category is required';
                    this.editProduct.submissionAllowFlag = false;
                }
                else{
                    if (this.editProduct.submissionAllowFlag=== true){
                        this.editProduct.submissionAllowFlag = true;
                    }
                }
                //this case if user willnot make any change 
                if (
                    (this.errors.editProduct.editProductNameError ==='') &&
                    (this.errors.editProduct.editProductPriceError ==='') &&
                    (this.errors.editProduct.editProductDescriptionError ==='') &&
                    (this.errors.editProduct.editProductCategoryError ==='') &&
                    (this.editProduct.editProductName.trim()) &&
                    (this.editProduct.editProductPrice.trim()) &&
                    (this.editProduct.editProductDescription.trim())&& 
                    (this.editProduct.submissionAllowFlag=== false)
                ){
                    this.showCustomNotify('No change in form');
                }

                //for prevent buttonclick on API processing     
                if (this.editProduct.buttonLoaderFlag===0){
                    if (this.editProduct.submissionAllowFlag=== true){
                        this.editProduct.buttonLoaderFlag=1;
                        //API callling
                        const requestData = {
                            editProduct: this.editProduct,
                            additionalData: {
                                functionType: 'API',
                            }
                        };
                        fetch(BASE_URL+'editProductAPI', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                            },
                            body: JSON.stringify(requestData)
                        })
                        .then(response => {
                            //checking response is ok or not
                            if (!response.ok) {
                                throw new Error('Network response was not ok');
                            }
                            return response.json();
                        })
                        .then(data => {                    
                            //success part                    
                            this.showCustomNotify(data.message);
                            this.editProduct.buttonLoaderFlag=0;
                        })
                        .catch(error => {
                            //error in submission
                            //console.log(error);
                            this.showCustomNotify('There was a problem with form submission');
                            this.editProduct.buttonLoaderFlag=0;
                        });
                    }
                }
            }      
        },
        deleteProductSubmission() {
            //check whether user logged in or not before submission
            if(!this.checkUserLogged()){
                this.showCustomNotify("User not logged yet");
            }else{
                //for prevent buttonclick on API processing     
                if (this.deleteProduct.buttonLoaderFlag===0){
                    this.deleteProduct.buttonLoaderFlag=1;
                    //API callling
                    const requestData = {
                        editProduct: this.editProduct,
                        additionalData: {
                            functionType: 'API',
                        }
                    };
                    fetch(BASE_URL+'deleteProductAPI', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify(requestData)
                    })
                    .then(response => {
                        //checking response is ok or not
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {                    
                        //success part                    
                        this.showCustomNotify(data.message);
                        this.deleteProduct.buttonLoaderFlag=0;
                        //update non deleted products
                        this.productListingAPI();
                    })
                    .catch(error => {
                        //error in submission
                        //console.log(error);
                        this.showCustomNotify('There was a problem with form submission');
                        this.deleteProduct.buttonLoaderFlag=0;
                    });
                    
                }
            }      
        },
        addCategorySubmission() {
            //check whether user logged in or not before submission
            if(!this.checkUserLogged()){
                this.showCustomNotify("User not logged yet");
            }else{
                //for prevent buttonclick on API processing     
                if (this.addCategory.buttonLoaderFlag===0){
                    if (this.addCategory.submissionAllowFlag=== true){
                        this.addCategory.buttonLoaderFlag=1;
                        //API callling
                        const requestData = {
                            addCategory: this.addCategory,
                            additionalData: {
                                functionType: 'API',
                            }
                        };
                        fetch(BASE_URL+'addCategoryAPI', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                            },
                            body: JSON.stringify(requestData)
                        })
                        .then(response => {
                            //checking response is ok or not
                            if (!response.ok) {
                                throw new Error('Network response was not ok');
                            }
                            return response.json();
                        })
                        .then(data => {                    
                            //success part                    
                            this.showCustomNotify(data.message);
                            this.addCategory.buttonLoaderFlag=0;
                        })
                        .catch(error => {
                            //error in submission
                            //console.log(error);
                            this.showCustomNotify('There was a problem with form submission');
                            this.addCategory.buttonLoaderFlag=0;
                        });
                    }
                }
            }      
        },
        editCategorySubmission() {
            //check whether user logged in or not before submission
            if(!this.checkUserLogged()){
                this.showCustomNotify("User not logged yet");
            }else{                
                //this case if user willnot make any change 
                if (
                    (this.errors.editCategory.editCategoryNameError ==='') &&
                    (this.editCategory.editCategoryName.trim()) &&
                    (this.editCategory.submissionAllowFlag=== false)
                ){
                    this.showCustomNotify('No change in form');
                }

                //for prevent buttonclick on API processing     
                if (this.editCategory.buttonLoaderFlag===0){
                    if (this.editCategory.submissionAllowFlag=== true){
                        this.editCategory.buttonLoaderFlag=1;
                        //API callling
                        const requestData = {
                            editCategory: this.editCategory,
                            additionalData: {
                                functionType: 'API',
                            }
                        };
                        fetch(BASE_URL+'editCategoryAPI', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                            },
                            body: JSON.stringify(requestData)
                        })
                        .then(response => {
                            //checking response is ok or not
                            if (!response.ok) {
                                throw new Error('Network response was not ok');
                            }
                            return response.json();
                        })
                        .then(data => {                    
                            //success part 
                            if(data.status){
                                window.location.href = BASE_URL+'home';     
                            }  
                            //            
                            this.showCustomNotify(data.message);
                            this.editCategory.buttonLoaderFlag=0;
                        })
                        .catch(error => {
                            //error in submission
                            //console.log(error);
                            this.showCustomNotify('There was a problem with form submission');
                            this.editCategory.buttonLoaderFlag=0;
                        });
                    }
                }
            }      
        },
        deleteCategorySubmission() {
            //check whether user logged in or not before submission
            if(!this.checkUserLogged()){
                this.showCustomNotify("User not logged yet");
            }else{
                //for prevent buttonclick on API processing     
                if (this.deleteCategory.buttonLoaderFlag===0){
                    this.deleteCategory.buttonLoaderFlag=1;
                    //API callling
                    const requestData = {
                        editProduct: this.editProduct,
                        additionalData: {
                            functionType: 'API',
                        }
                    };
                    fetch(BASE_URL+'deleteCategoryAPI', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                        },
                        body: JSON.stringify(requestData)
                    })
                    .then(response => {
                        //checking response is ok or not
                        if (!response.ok) {
                            throw new Error('Network response was not ok');
                        }
                        return response.json();
                    })
                    .then(data => {                    
                        //success part                    
                        this.showCustomNotify(data.message);
                        this.deleteCategory.buttonLoaderFlag=0;
                        //update non deleted categories
                        //this.categoryListingAPI();
                    })
                    .catch(error => {
                        //error in submission
                        //console.log(error);
                        this.showCustomNotify('There was a problem with form submission');
                        this.deleteCategory.buttonLoaderFlag=0;
                    });
                    
                }
            }      
        },
        categoryListingAPI() {
            const requestData = {
                limit: 10,
                offset: 0,
            };
            fetch(BASE_URL+'categoryListingAPI', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(requestData)
            })
            .then(response => {
                //checking response is ok or not
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                //return response;
                return response.json();
            })
            .then(data => {                    
                //success part                    
                //this.showCustomNotify(data.message);
                if (data.status){
                    this.categoryList=data.data;
                }
            })
            .catch(error => {
                //error in submission
                //console.log(error)
                this.showCustomNotify('There was a problem with form submission');
            });
        },

        productListingAPI() {
            const requestData = {
                limit: 4,
                offset: 0,
            };
            fetch(BASE_URL+'allProductDataAPI', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(requestData)
            })
            .then(response => {
                //checking response is ok or not
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                //return response;
                return response.json();
            })
            .then(data => {                    
                //success part                    
                //this.showCustomNotify(data.message);
                if (data.status){
                    this.productList=data.data;
                }
            })
            .catch(error => {
                //error in submission
                //console.log(error)
                this.showCustomNotify('There was a problem with form submission');
            });
        },
        singleProductListingAPI(product_id,type) {
            const requestData = {
                limit: 4,
                offset: 0,
                product_id:product_id,
            };
            fetch(BASE_URL+'singleProductDataAPI', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(requestData)
            })
            .then(response => {
                //checking response is ok or not
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                //return response;
                return response.json();
            })
            
            .then(data => {                    
                //success part                    
                //this.showCustomNotify(data.message);
                if (data.status){                    
                    this.selectedProductdata=data.data[0];
                    this.editProduct.editProductId=data.data[0].product_id;
                    this.editProduct.editProductName=data.data[0].product_name;
                    this.editProduct.editProductPrice=data.data[0].product_price;
                    this.editProduct.editProductDescription=data.data[0].product_description;
                    this.editProduct.editProductCategory=JSON.parse(data.data[0].category_id);
                    if(type ==="delete"){
                        this.deleteProductSubmission();
                    }
                    else if(type ==="edit"){
                        window.location.href = BASE_URL+'editProduct';
                    }
                }
            })
            .catch(error => {
                //error in submission
                //console.log(error)
                this.showCustomNotify('There was a problem with form submission');
            });
        },
        singleCategoryListingAPI(category_id,type) {
            const requestData = {
                limit: 4,
                offset: 0,
                category_id:category_id,
            };
            fetch(BASE_URL+'singleCategoryDataAPI', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify(requestData)
            })
            .then(response => {
                //checking response is ok or not
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                //return response;
                return response.json();
            })
            
            .then(data => {                    
                //success part                    
                //this.showCustomNotify(data.message);
                if (data.status){             
                    this.selectedCategorydata=data.data[0];
                    this.editCategory.editCategoryId=data.data[0].category_id;
                    this.editCategory.editCategoryName=data.data[0].category_name;
                    
                    if(type ==="delete"){
                        this.deleteCategorySubmission();
                    }
                    else if(type ==="edit"){
                        window.location.href = BASE_URL+'editCategory';
                    }
                }
            })
            .catch(error => {
                //error in submission
                //console.log(error)
                this.showCustomNotify('There was a problem with form submission');
            });
        },
        //custom toast message notification
        showCustomNotify(message) {
            this.notificationMessage = message;
            this.showNotification = true;
            // show notification only for 3 seconds
            setTimeout(() => {
              this.showNotification = false;
            }, 3000);
        },
        //product category checkbox validation
        checkProductCategory() {
            this.errors.addProduct.addProductCategoryError = '';
            // Check if atleast one category        
            if (Object.keys(this.addProduct.addProductCategory).length==0) {
                this.errors.addProduct.addProductCategoryError = 'Alteast one category is required';
            }
            
        },
        //check user
        checkUserLogged() {
            if (User_Email=== "") {
                //console.log("user not logged");
                return false;
            }else{
                //console.log("user logged");
                return true;
            }
            
        },
        selectedProductUpdate(productdata,type) {
            console.log(productdata);
            //set data for edit
            this.selectedProductdata=productdata;
            this.singleProductListingAPI(productdata.product_id,type);
        },
        selectedCategoryUpdate(categorydata,type) {
            console.log(categorydata);
            //set data for edit
            this.selectedCategorydata=categorydata;
            this.singleCategoryListingAPI(categorydata.category_id ,type);
        },
        //work this function in each pageload to get productdata
        editProductDataSetting() { 
            if(Product_Id !== ""){
                this.singleProductListingAPI(Product_Id);
            }
        },
        //work this function in each pageload to get category data
        editCategoryDataSetting() { 
            if(Category_Id !== ""){
                this.singleCategoryListingAPI(Category_Id);
            }
        },
        isCategorySelected(categoryId) {
            console.log(this.editProduct.editProductCategory);
            console.log(categoryId);
            console.log(typeof(this.editProduct.editProductCategory));
            console.log(this.editProduct.editProductCategory.includes(categoryId.toString()));
            console.log("end");
            return this.editProduct.editProductCategory.includes(categoryId.toString());
        }
    }
    
});
console.log("vuejs loaded");