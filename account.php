<?php 
include './php/check-session-inner.php';
include './php/clear-conversation.php';
include './php/get-account-info.php';
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Bootstrap 101 Template</title>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/custom.css">


        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    </head>

    <body>

        <!-- Static navbar -->
        <nav class="navbar navbar-default navbar-fixed-top nopadding">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Serendipity</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">

                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="./search-profiles.php">Search</a></li>
                        <li><a href="./matches.php">My Matches</a></li>
                        <li><a href="./messages.php">Messages <span class="badge" id="msgc"></span></a></li>
                        <li><a href="./profile.php">My Profile</a></li>
                        <li class="active"><a href="./account.php">Account</a></li>
                        <li><a href="./help.php">Help</a></li>
                        <li>
                            <form action="./php/logout.php">
                                <button type="submit" class="btn btn-primary logout">Logout</button>
                            </form>
                        </li>
                    </ul>
                </div>
                <!--/.nav-collapse -->
            </div>
        </nav>
        <div class="container content top-marg">
            <div class="row" style="margin-top:50px;">
                <h2 style="color:black;">Account Details</h2>
            </div>
            <div class="row" style="margin-top:50px;">
                <div class="col-md-4 col-md-offset-2">
                    <div class="row">
                        <div class="col-sm-4">
                            <h4>Username:</h4>
                        </div>
                        <div class="col-sm-8">
                            <h4><?php echo $username ?></h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <h4>Address:</h4>
                        </div>
                        <div class="col-sm-8">
                            <h4><?php echo $line1; ?></h4>
                            <h4><?php echo $line2; ?></h4>
                            <h4><?php echo $town; ?></h4>
                            <h4><?php echo $county; ?></h4> </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <h4>Email:</h4>
                        </div>
                        <div class="col-sm-8">
                            <h4><?php echo $email; ?></h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <h4>Password:</h4>
                        </div>
                        <div class="col-sm-8">
                            <h4>**********</h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h4><a href="edit-account.php">Edit Account Info</a></h4>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-md-offset-1">
                    <div class="row">
                        <div class="col-sm-4">
                            <h4>Last Payment:</h4>
                        </div>
                        <div class="col-sm-8">
                            <h4><?php echo $pay; ?></h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <h4>Amount:</h4>
                        </div>
                        <div class="col-sm-8">
                            <h4><?php echo $amount; ?></h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <h4>Payment Expires:</h4>
                        </div>
                        <div class="col-sm-8">
                            <h4><?php echo $expire; ?></h4>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <h4><a href="./pay-now.php">Pay Now</a></h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h4><a href="./change-password.php">Change Password</a></h4>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <h4><a href="./deactivate.php">Deactivate Account</a></h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <footer>
        </footer>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src=" https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js "></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js "></script>
        <script src="js/isonline.js"></script>
        <script src="js/checkmsgs.js"></script>

    </body>

    </html>