###################
## Getting Started
###################
    -  Run the project.
            -   start xampp
            -   Load this project folder in htdocs
            -   import my sql file in phpMyAdmin
            -   check Project specification(php version),if not, then setup
            -   run the url  - http://localhost/shopping/register  (in some system localost url maybe different)



###################
PROJECT SPECIFICATION
###################

PHP version 5.6 or newer is recommended.
Codeigniter version 3.1.13



###################
Built With
###################

Here is the Technology Stack of this Application. which I have used to Built this Application.

-  HTML
-  CSS
-  JS
-  Vuejs
-  PHP
-  codeigniter



###################
PROJECT
###################
    -   frontend and backend validations
    -   toast msg
    -   loader working in all forms by vuejs
    -   API submission
    -   codeigniter normal functions



###################
PROJECT WORKING
###################
    -first register
    -then verify using email, after success register, a verification email send to user email
    -click on "Verify Email Address" named button for verify
    -then login, after success login, it redirrect to homepage


#########################################
FUNCTIONALITY WISE SIMPLE PLANNING
#########################################


**signup page**
    validations
    user already exist or not
    user already verified or not, not verified then again send verifcationemail
    submission by API
**successUserVerify**
    validations
    user already exist or not
    user already verified or not
    checking otp expirytime
    submission

**HOME**
    Product listing
	    Pagination by API
        Add to cart button
        Add delete button
	Category listing
		Previous and next arrows , pagination
    

**create product**
    Allowing permission only if it is admin
        check user logged or not
        check user role
    category list by API and process by vuejs
    product submission
        one or more category allowed,miminum one category is must
        restrict productname redundancy and keep all productname in lowercase
**product detail page**
**edit product detail**
**cart page**
             List product
                   Increase and decrease quantity
**login page**
    validations
    submission by API
        check user exist or not
        invalid passwword
        success submission 
**logout functionality**


**change password**
    validations
    submission by API
        check user exist or not
        success password updation 
**forgot password page**
    validations
    submission by API
        check user exist or not
        redirect to change password page




### URLS
http://localhost:3000/              -- for products page
http://localhost:3000/cart          -- for cart
http://localhost:3000/create        -- for add products
http://localhost:3000/details/(id)  -- for products detail page
### INITIAL DATA BY THIS API URL
https://my-json-server.typicode.com/jincygit/react_ecommerce-_website/products
### Access the Application:
   http://localhost:3000/





*******************

*******************
Project Specification
*******************

PHP version 5.6 or newer is recommended.
Codeigniter version 3.1.13



