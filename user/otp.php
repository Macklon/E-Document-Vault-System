<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>E-vault | Forgot password</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="passwordBox animated fadeInDown">
        <div class="row">

            <div class="col-md-12">
                <div class="ibox-content">

                    <h2 class="font-bold">OTP</h2>

                    <p style="font-weight: ;">
                        Enter OTP received on your mobile.
                    </p>

                    <div class="row">

                        <div class="col-lg-12">
                            <form class="m-t" role="form" method="post" action="otpprocess.php">
                                <div class="form-group">
                                    <input type="text" name="otpvalue" class="form-control" placeholder="Enter OTP" pattern="[0-9]{4}" title="Only numbers.Max 4" required="">
                                </div>

                                <button type="submit" name="" class="btn btn-primary block full-width m-b">Verify</button>

                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <hr/>
        <div class="row">
            <div class="col-md-6">
                Copyright E-vault 
            </div>
            <div class="col-md-6 text-right">
               <small>© 2017-2018</small>
            </div>
        </div>
    </div>

</body>



</html>
