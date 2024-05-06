<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Password Verification Email</title>
    <style>
        /* Add your custom CSS styles here */
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }
        h1 {
            color: #333;
        }
        p {
            margin-bottom: 20px;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 3px;
        }
        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container"><?php //print_r($data);?>
        <h1>Password Verification</h1>
        <p>Hello, <?php echo $username; ?></p>
        <p>We received a request to verify your account. Please click the button below to verify your email address.</p>
        <form action="<?php echo $verification_link; ?>" method="POST">
        <input type = "hidden" name = "userotp" value="<?php echo $userotp; ?>">
        <input type = "hidden" name = "useremail" value="<?php echo $useremail; ?>">
        <button class="btn">Verify Email Address</button>
        </form>
        
        <p>If you didn't request this, you can safely ignore this email. Your account won't be changed until you verify your email address.</p>
        <p>Thank you,</p>
        <p>SHOPNOW</p>
    </div>
</body>
</html>
