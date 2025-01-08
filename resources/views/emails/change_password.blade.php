<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #ffffff;
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            border-radius: 8px;
            background-color: #ffffff;
            box-shadow: 0 0 10px #11250ae7;
        }

        .header {
            text-align: left;
            padding: 20px 0;
        }

        .header h1 {
            color: #333333;
            font-size: 25px;
        }
        #header-image{
            text-align: center;
            background-color: #eee;
            padding-top: 20px;
            padding-bottom: 30px;
            margin-bottom: 40px;
        }
        #header-image img{
            /* position: relative; */
            margin-bottom: -20px;
        }
        #header-image b{
            font-size: 20px;
            color: #080808;
        }

        .content {
            padding: 20px 20px;
            text-align: left;
            color: #555555;
            border-radius: 8px;
            background-color: #ffffff;
            box-shadow: 0 0 10px #11250a;
        }

        .content img {
            max-width: 100%;
            height: auto;
            border-radius: 8px;
        }

        .cta-button {
            display: inline-block;
            padding: 15px 30px; /* Adjust padding to increase button size */
            background-color: #000000;
            color: #ffffff;
            text-decoration: none;
            border-radius: 30px; /* Adjust border-radius to control button roundness */
        }

        .footer {
            margin-top: 20px;
            text-align: center;
            color: #777777;
        }

        .footer a {
            color: #4CAF50;
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="header">
            <h1>Password Reset!</h1>
        </div>

        <div class="content">
            {{-- <img src="https://marketplace.nigerianmining.com/user/images/nm-email-header.jpg" alt="Email header"> --}}
            <div id="header-image" class="my-auto me-auto ms-auto">
                <img src="https://marketplace.nigerianmining.com/user/images/logo.png" alt="Email header"><br>
                <b>MARKETPLACE</b>
            </div>
            <p>Hello {{ Auth::user()->name }},</p>
            <p>We received a request to reset the password for your account at <b>Nigerian Mining Marketplace</b>.</p>
            <br>
            <p>For your security, please click the link below to set a new password: <br>
                <b><a href="https://marketplace.nigerianmining.com/seller/change-password">Reset My Password</a></b></p>
            <br>

            <p>This link will expire in 24 hours. If you didn’t request this, no action is required, and your account remains secure.</p>
            <h4>Stay safe,</h4>
            <h4>The Nigerian Mining Marketplace Team</h4>

            <br><br>
            <h4>Legal Disclaimer:</h4>
            <p>If you believe your account has been compromised, please contact us at <a href="mailto:info@nigerianmining.com">info@nigerianmining.com</a> immediately.</p>

            <a href="https://www.nigerianmining.com" class="cta-button">Visit Site</a>
            <br>
            <br>
            <br>
            <img src="https://marketplace.nigerianmining.com/user/images/nm-email-footer.jpg" alt="Email footer">
        </div>


        {{-- <div class="footer">
            <p>Follow us on social media: <a href="https://www.facebook.com/nigerianmining">Facebook</a> | <a href="https://twitter.com/nigerianmining_">Twitter</a> | <a href="https://www.instagram.com/nigerianmining">Instagram</a></p>
        </div> --}}
    </div>
</body>

</html>
