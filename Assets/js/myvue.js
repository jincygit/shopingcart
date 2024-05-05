var app = new Vue({
    el: '#app',
    data: {
        //register
        signup: {
            userName: '',
            userEmail: '',
            userPassword: '',
            userConfirmPassword: '',
        },
        // //register
        // userName: '',
        // userEmail: '',
        // userPassword: '',
        // userConfirmPassword: '',
        //forgot password
        forgotPasswordEmail: '',
        //login
        loginEmail: '',
        loginPassword: '',
        //updatepassword
        updateCurrentPassword: '',
        updateNewPassword: '',
        updateNewConfirmPassword: '',
        //createProduct
        addProductName: '',
        addProductPrice: '',
        addProductCategory: [],
        addProductDescription: '',
        //editProduct
        //createCategory
        //editCategory
        errors: {
            //register
            signup: {             
                userNameError: '',
                userEmailError: '',
                userPasswordError: '',
                userConfirmPasswordError: '',
            },
            
            //forgot password
            forgotPasswordEmailError: '',
            //login
            loginEmailError: '',
            loginPasswordError: '',
            //updatepassword
            updateCurrentPasswordError: '',
            updateNewPasswordError: '',
            updateNewConfirmPasswordError: '',
            //createProduct
            addProductNameError: '',       
            addProductPriceError: '',
            addProductCategoryError: '',
            addProductDescriptionError: '',
            //editProduct
            //createCategory
            //editCategory
        }
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
        },
        loginInputFieldValidation(type) {
            // Validate userEmail
            if(type == "email"){
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                this.errors.loginEmailError = '';
                // Check if data is empty         
                if (!this.loginEmail.trim()) {
                    this.errors.loginEmailError = 'Useremail is required';
                }               
                // Check if email format is valid
                else if (!emailRegex.test(this.loginEmail)) {
                    this.errors.loginEmailError = 'Invalid email format';
                }              
            }

            // Validate userPassword
            if(type == "password"){
                this.errors.loginPasswordError = '';
                // Check if data is empty         
                if (!this.loginPassword.trim()) {
                    this.errors.loginPasswordError = 'UserPassword is required';
                }
                //Check if its length is within the specified range
                else if (this.loginPassword.length < 8 || this.loginPassword.length > 25) {
                    this.errors.loginPasswordError = 'UserPassword must be between 8 and 25 characters';
                }                             
            }                   
        },
        forgotPasswordInputFieldValidation(type) {
            // Validate userEmail
            if(type == "email"){
                const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                this.errors.forgotPasswordEmailError = '';
                // Check if data is empty         
                if (!this.forgotPasswordEmail.trim()) {
                    this.errors.forgotPasswordEmailError = 'Useremail is required';
                }               
                // Check if email format is valid
                else if (!emailRegex.test(this.forgotPasswordEmail)) {
                    this.errors.forgotPasswordEmailError = 'Invalid email format';
                }
                
            }                      
        },
        updatePasswordInputFieldValidation(type) {
            // Validate currentUserPassword
            if(type == "currentpassword"){
                this.errors.updateCurrentPasswordError = '';
                // Check if data is empty         
                if (!this.updateCurrentPassword.trim()) {
                    this.errors.updateCurrentPasswordError = 'UserPassword is required';
                }
                //Check if its length is within the specified range
                else if (this.updateCurrentPassword.length < 8 || this.updateCurrentPassword.length > 25) {
                    this.errors.updateCurrentPasswordError = 'UserPassword must be between 8 and 25 characters';
                }                             
            }
            // Validate userPassword
            if(type == "newpassword"){
                this.errors.updateNewPasswordError = '';
                // Check if data is empty         
                if (!this.updateNewPassword.trim()) {
                    this.errors.updateNewPasswordError = 'UserPassword is required';
                }
                //Check if its length is within the specified range
                else if (this.updateNewPassword.length < 8 || this.updateNewPassword.length > 25) {
                    this.errors.updateNewPasswordError = 'UserPassword must be between 8 and 25 characters';
                }                             
            }

            // Validate userConfirmPassword
            if(type == "confirmnewpassword"){
                this.errors.updateNewConfirmPasswordError = '';
                // Check if data is empty         
                if (!this.updateNewConfirmPassword.trim()) {
                    this.errors.updateNewConfirmPasswordError = 'UserPassword is required';
                }
                //Check if its length is within the specified range
                else if (this.updateNewConfirmPassword.length < 8 || this.updateNewConfirmPassword.length > 25) {
                    this.errors.updateNewConfirmPasswordError = 'UserPassword must be between 8 and 25 characters';
                }
                // Check if confirm password matches userPassword
                else if (this.updateNewConfirmPassword !== this.updateNewPassword) {
                    this.errors.updateNewConfirmPasswordError = 'Passwords do not match';
                }                           
            }
        },
        addProductInputFieldValidation(type) {
            //console.log(this.addProductCategory);
            // Validate productname
            if(type == "name"){
                const alphanumericRegex = /^[a-zA-Z0-9]+$/;
                this.errors.addProductNameError = '';
                // Check if data is empty         
                if (!this.addProductName.trim()) {
                    this.errors.addProductNameError = 'Username is required';
                }
                //Check if its length is within the specified range
                else if (this.addProductName.length < 2 || this.addProductName.length > 25) {
                    this.errors.addProductNameError = 'Username must be between 2 and 25 characters';
                }               
                // Check if it contains only alphanumeric characters
                else if (!alphanumericRegex.test(this.addProductName)) {
                    this.errors.addProductNameError = 'Username can only contain letters and numbers';
                }
                
            }

            if(type == "price"){
                const alphanumericRegex = /^[0-9]+$/;
                this.errors.addProductPriceError = '';
                // Check if data is empty         
                if (!this.addProductPrice.trim()) {
                    this.errors.addProductPriceError = 'Username is required';
                }
                
                // Check if it contains only alphanumeric characters
                else if (!alphanumericRegex.test(this.addProductPrice)) {
                    this.errors.addProductPriceError = 'Product price can contains only numbers';
                }
                
            }

            if(type == "category"){
                const alphanumericRegex = /^[a-zA-Z0-9]+$/;
                this.errors.addProductNameError = '';
                // Check if data is empty         
                if (!this.addProductName.trim()) {
                    this.errors.addProductNameError = 'Username is required';
                }
                //Check if its length is within the specified range
                else if (this.addProductName.length < 2 || this.addProductName.length > 25) {
                    this.errors.addProductNameError = 'Username must be between 2 and 25 characters';
                }               
                // Check if it contains only alphanumeric characters
                else if (!alphanumericRegex.test(this.addProductName)) {
                    this.errors.addProductNameError = 'Username can only contain letters and numbers';
                }
                
            }

            // Validate userConfirmPassword
            if(type == "description"){
                const alphanumericRegex = /^[a-zA-Z0-9]+$/;
                this.errors.addProductDescriptionError = '';
                // Check if data is empty         
                if (!this.addProductDescription.trim()) {
                    this.errors.addProductDescriptionError = 'Username is required';
                }           
                // Check if it contains only alphanumeric characters
                else if (!alphanumericRegex.test(this.addProductDescription)) {
                    this.errors.addProductDescriptionError = 'Username can only contain letters and numbers';
                }
                
            }
        },
        signupSubmitmission() {

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
                if (!response.ok) {
                    throw new Error('Network response was not ok');
                }
                // Handle successful submission
                console.log('Form submitted successfully');
            })
            .catch(error => {
                // Handle error
                console.error('There was a problem with form submission:', error);
            });
        },
        submitForm() {
            this.errors = {}; // Reset errors
            
            // Validate username
            if (!this.userName.trim()) {
                this.errors.userNameError = 'Username is required';
            }

            // Validate email
            if (!this.userEmail.trim()) {
                this.errors.userEmailError = 'Email is required';
            } else if (!this.isValidEmail(this.userEmail)) {
                this.errors.userEmailError = 'Invalid email format';
            }

            // Submit form if no errors
            if (Object.keys(this.errors).length === 0) {
                alert('Form submitted successfully');
                // Here you can make an AJAX request to submit the form data
            }
        },
        isValidEmail(email) {
            // Basic email validation regex
            const emailRegex = /\S+@\S+\.\S+/;
            return emailRegex.test(email);
        }
    }
});
console.log("qwww");