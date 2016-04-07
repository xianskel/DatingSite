<?php 
include './php/check-session-inner.php';
include './php/clear-conversation.php';
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
                <h2 style="color:black;">Change Password</h2>
            </div>
            <div class="col-sm-6 col-sm-offset-3 fade-in">
                <form class="form-horizontal" action="./php/update-password.php" method="post" enctype="application/x-www-form-urlencoded" onsubmit="return validatePass()">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Old Password</label>
                        <div class="col-sm-7">
                            <input type="password" class="form-control" name="password" id="oldPassword" placeholder="Password" required>
                        </div>
                    </div>
                    <?php if(isset($_GET['error'])){ echo "<div id=\"wrongPass\" class=\"col-sm-10 regWarning\" style=\"display: block\">Invalid Password</div>"; } ?>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">New Password</label>
                            <div class="col-sm-7">
                                <input type="password" class="form-control" name="newpassword" id="pwd1" placeholder="Password" oninput="validatePass();" required>
                            </div>
                            <div class="col-sm-1">
                                <img src="images/1457893505_tick-circle.png" class="validationLogo" id="pwdTick" />
                                <img src="images/1457893593_cross_circle.png" class="validationLogo" id="pwdCross" />
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="inputPassword3" class="col-sm-3 control-label"></label>
                            <div class="col-sm-7">
                                <input type="password" class="form-control" id="pwd2" placeholder="Confirm Password" oninput="confirmPassword();" required>
                            </div>
                            <div class="col-sm-1">
                                <img src="images/1457893505_tick-circle.png" class="validationLogo" id="pwd2Tick" />
                                <img src="images/1457893593_cross_circle.png" class="validationLogo" id="pwd2Cross" />
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-5 col-sm-10">
                                <button type="submit" value="submit" class="btn btn-info">Update</a>
                            </div>
                        </div>
                </form>
            </div>
        </div>
        <footer>
        </footer>
        <!-- jQuery (necessary for Bootstrap 's JavaScript plugins) -->
        <script src=" https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js "></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js "></script>
        <script src="js/password.js"></script>
        <script src="js/isonline.js"></script>
        <script src="js/checkmsgs.js"></script>

    </body>

    </html>