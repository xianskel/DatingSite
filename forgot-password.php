<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Serendipity</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/login.css">
    <link href='https://fonts.googleapis.com/css?family=Josefin+Sans:400,300,100|Quicksand:300|Dancing+Script' rel='stylesheet' type='text/css'>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <div class="container-fluid">

        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <img src="./images/serendipity.png" class="logo" />
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <h2>Forgotten your password?</h2>
                <p>Have you forgotten your password? Just enter your email below and we will send you instructions to reset your password</p>
            </div>
        </div>
    </div>
    <div class="container">
        <div id="signForm" class="col-sm-4 col-sm-offset-4 fade-in">
            <form class="form-horizontal" action="./php/forgotpass.php" method="post" enctype="multipart/form-data">
                <div class="form-group">
                    <label class="col-sm-3 control-label">Email</label>
                    <div class="col-sm-9">
                        <input type="email" class="form-control" name="resetPasswordEmail" placeholder="Email">
                    </div>
                </div>


                <div class="form-group">
                    <div class="col-sm-offset-5 col-sm-9">
                        <button type="submit" value="submit" class="btn btn-info">Reset Password</a>
                    </div>
                </div>

            </form>
        </div>

    </div>
    <footer>
    </footer>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/registration.js"></script>
</body>

</html>