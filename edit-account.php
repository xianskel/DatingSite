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
        <title>Serendipity</title>

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
            <div class="col-sm-6 col-sm-offset-3 fade-in">
                <form class="form-horizontal" action="./php/update-account-info.php" method="post" enctype="application/x-www-form-urlencoded" onsubmit="return validateAccount()">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-7">
                            <input type="email" class="form-control" name="email" id="email" value="<?php echo $email ?>" oninput="validateEmail();" required>
                        </div>
                        <div class="col-sm-1">
                            <img src="images/1457893505_tick-circle.png" class="validationLogo" id="emailTick" />
                            <img src="images/1457893593_cross_circle.png" class="validationLogo" id="emailCross" />
                        </div>
                    </div>
                    <div id="emailExists" class="col-sm-10 regWarning">
                        This email is already taken
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">I am looking for:</label>
                        <div class="col-sm-9">
                            <select name="seeking" required>
                                <option selected value="<?php echo $seeking; ?>">
                                    <?php echo $seeking; ?>
                                </option>
                                <option value="<?php echo $notseeking;?>">
                                    <?php echo $notseeking; ?>
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Address</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="address1" id="address1" value="<?php echo $line1; ?>" oninput="validateAddress(name);" required>
                        </div>
                        <div class="col-sm-1">
                            <img src="images/1457893505_tick-circle.png" class="validationLogo" id="address1Tick" />
                            <img src="images/1457893593_cross_circle.png" class="validationLogo" id="address1Cross" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"></label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="address2" id="address2" value="<?php echo $line2; ?>" oninput="validateAddress(name);">
                        </div>
                        <div class="col-sm-1">
                            <img src="images/1457893505_tick-circle.png" class="validationLogo" id="address2Tick" />
                            <img src="images/1457893593_cross_circle.png" class="validationLogo" id="address2Cross" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">City</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="city" id="city" value="<?php echo $town; ?>" oninput="validateAddress(name);" required>
                        </div>
                        <div class="col-sm-1">
                            <img src="images/1457893505_tick-circle.png" class="validationLogo" id="cityTick" />
                            <img src="images/1457893593_cross_circle.png" class="validationLogo" id="cityCross" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">County</label>
                        <div class="col-sm-7">
                            <select class="form-control" name="county" required>
                                <option value="<?php echo $county; ?>">
                                    <?php echo $county; ?>
                                </option>
                                <option value="Co.Antrim">Co.Antrim</option>
                                <option value="Co.Armagh">Co.Armagh</option>
                                <option value="Co.Carlow">Co.Carlow</option>
                                <option value="Co.Cavan">Co.Cavan</option>
                                <option value="Co.Clare">Co.Clare</option>
                                <option value="Co.Cork">Co.Cork</option>
                                <option value="Co.Derry">Co.Derry</option>
                                <option value="Co.Donegal">Co.Donegal</option>
                                <option value="Co.Down">Co.Down</option>
                                <option value="Co.Dublin">Co.Dublin</option>
                                <option value="Co.Fermanagh">Co.Fermanagh</option>
                                <option value="Co.Galway">Co.Galway</option>
                                <option value="Co.Kerry">Co.Kerry</option>
                                <option value="Co.Kildare">Co.Kildare</option>
                                <option value="Co.Kilkenny">Co.Kilkenny</option>
                                <option value="Co.Laois">Co.Laois</option>
                                <option value="Co.Leitrim">Co.Leitrim</option>
                                <option value="Co.Limerick">Co.Limerick</option>
                                <option value="Co.Longford">Co.Longford</option>
                                <option value="Co.Louth">Co.Louth</option>
                                <option value="Co.Mayo">Co.Mayo</option>
                                <option value="Co.Meath">Co.Meath</option>
                                <option value="Co.Monaghan">Co.Monaghan</option>
                                <option value="Co.Offaly">Co.Offaly</option>
                                <option value="Co.Roscommon">Co.Roscommon</option>
                                <option value="Co.Sligo">Co.Sligo</option>
                                <option value="Co.Tipperary">Co.Tipperary</option>
                                <option value="Co.Tyrone">Co.Tyrone</option>
                                <option value="Co.Waterford">Co.Waterford</option>
                                <option value="Co.Westmeath">Co.Westmeath</option>
                                <option value="Co.Wexford">Co.Wexford</option>
                                <option value="Co.Wicklow">Co.Wicklow</option>
                            </select>
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
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src=" https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js "></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js "></script>
        <script src="js/isonline.js"></script>
        <script src="js/checkmsgs.js"></script>
        <script src="js/account.js"></script>

    </body>

    </html>