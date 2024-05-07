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
    -validations
    -user already exist or not
    -user already verified or not, not verified then again send verifcationemail
    -submission by API

**successUserVerify**
    -validations
    -user already exist or not
    -user already verified or not
    -checking otp expirytime
    -submission

**login page**
    -validations
    -submission by API
        -check user exist or not
        -invalid passwword
        -success submission

**forgot password page**
    validations
    submission by API
        check user exist or not
        redirect to change password page

**change password**
    validations
    submission by API
        check user exist or not
        success password updation 

**logout functionality**
**HOME**
    restrict entry, without login
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
**addProductAPI**
    -validation
    -userValidate
    -check product already exist or not  
    -submission
**editProductAPI**
    -validation
    -userValidate
    -check product validity
    -update
**editProductAPI**
    -validation
    -userValidate
    -check product validity
    -delete

**product detail page**
**edit product detail**
**cart page**
             List product
                   Increase and decrease quantity
 



###########
URLS
############

http://localhost/shopping/home              -- home                 -
http://localhost/shopping/login             -- login
http://localhost/shopping/logout            -- logout
http://localhost/shopping/register          -- register
http://localhost/shopping/forgotPassword    -- forgotpassword
http://localhost/shopping/update_password   -- update password
http://localhost/shopping/createProduct     -- for create product   --only admin can
http://localhost/shopping/createCategory    -- for create category  --only admin can
http://localhost/shopping/editProduct       -- for edit product     --only admin can
http://localhost/shopping/editCategory      -- for edit category    --only admin can
delete product and delete category API also exist   --only admin can



###########
CREDENTIALS
############

*******************
Admin credentials
*******************
admin@gmail.com
12341234


*******************
Normal user credentials (sample)
*******************
jincysusanabraham@gmail.com
12341234


######################
PERMISSION RESTRICTION DETAILS
#######################
Admin
    -add, delete, edit product
    -add, delete, edit category
    -productlisting
    -categorylisting
    -login,register,forgot password, changepassword, homepage entry

customer
    -productlisting
    -categorylisting
    -login,register,forgot password, changepassword, homepage entry
