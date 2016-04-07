<?php 
include './php/check-session.php';
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
                <div class="col-md-12">
                    <button type="button" class="btn btn-success reg-button" id="regButton" onclick="changeForm()">Register</button>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <img src="./images/serendipity.png" class="logo" />
                </div>
            </div>
        </div>
        <div class="container">
            <div id="signForm" class="col-sm-4 col-sm-offset-4 fade-in">
                <form class="form-horizontal" action="./php/login.php" method="post" enctype="application/x-www-form-urlencoded">
                    <?php if(isset($error)){ echo "<div id=\"loginFail\" class=\"col-sm-12 logWarning\">
                        <p>Email and Password did not match. Please try again</p>
                    </div>";} ?>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Email</label>
                            <div class="col-sm-9">
                                <input type="email" class="form-control" name="loginEmail" id="loginEmail" placeholder="Email" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Password</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" name="loginPassword" id="loginPassword" placeholder="Password" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-offset-5 col-sm-9">
                                <div class="checkbox">
                                    <label>
                                        <input id="remember" type="checkbox" name="remember" value="on">Remember me
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-5 col-sm-9">
                                <button type="submit" value="submit" class="btn btn-info">Sign In</a>
                            </div>
                        </div>
                        <div class="col-sm-offset-5 col-sm-9">
                            <div class="checkbox">
                                <a href="forgot-password.php">Forgot Password</a>
                            </div>
                        </div>
                </form>
            </div>
            <div id="regForm" class="col-sm-6 col-sm-offset-3 fade-in" style="display: none">
                <form class="form-horizontal" action="./php/registration.php" method="post" enctype="application/x-www-form-urlencoded" onsubmit="return validateForm()">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Username</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="username" id="username" placeholder="Username" oninput="validateUsername();" required>
                        </div>
                        <div class="col-sm-1">
                            <img src="images/1457893505_tick-circle.png" class="validationLogo" id="userTick" />
                            <img src="images/1457893593_cross_circle.png" class="validationLogo" id="userCross" />
                        </div>
                    </div>
                    <div id="usernameExists" class="col-sm-10 regWarning">
                        This username is already taken
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-7">
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email" oninput="validateEmail();" required>
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
                        <label class="col-sm-3 control-label">D.O.B</label>
                        <div class="col-sm-7">

                            <select id="numYear" name="year" onchange="daysInMonth(); validateDate();" required>
                                <option disabled="disabled" value="0" name="year">Year</option>
                            </select>

                            <select onchange="daysInMonth(); validateDate();" id="numMonth" name="month" required>
                                <option disabled="disabled" value="0">Month</option>
                                <option value="01">Jan</option>
                                <option value="02">Feb</option>
                                <option value="03">Mar</option>
                                <option value="04">Apr</option>
                                <option value="05">May</option>
                                <option value="06">Jun</option>
                                <option value="07">Jul</option>
                                <option value="08">Aug</option>
                                <option value="09">Sep</option>
                                <option value="10">Oct</option>
                                <option value="11">Nov</option>
                                <option value="12">Dec</option>
                            </select>

                            <select id="numDay" name="day" onchange="validateDate();" required>
                                <option disabled="disabled" name="day" value="0">Day</option>
                            </select>
                        </div>
                        <div class="col-sm-1">
                            <img src="images/1457893505_tick-circle.png" class="validationLogo" id="dateTick" />
                            <img src="images/1457893593_cross_circle.png" class="validationLogo" id="dateCross" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">I am a:</label>
                        <div class="col-sm-9">
                            <select name="gender" required>
                                <option value="man">man</option>
                                <option value="woman">woman</option>
                            </select>
                            looking for
                            <select name="seeking" required>
                                <option value="woman">a woman</option>
                                <option value="man">a man</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Address</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="address1" id="address1" placeholder="Address Line 1" oninput="validateAddress(name);" required>
                        </div>
                        <div class="col-sm-1">
                            <img src="images/1457893505_tick-circle.png" class="validationLogo" id="address1Tick" />
                            <img src="images/1457893593_cross_circle.png" class="validationLogo" id="address1Cross" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label"></label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="address2" id="address2" placeholder="Address Line 2" oninput="validateAddress(name);">
                        </div>
                        <div class="col-sm-1">
                            <img src="images/1457893505_tick-circle.png" class="validationLogo" id="address2Tick" />
                            <img src="images/1457893593_cross_circle.png" class="validationLogo" id="address2Cross" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label">City</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control" name="city" id="city" placeholder="City" oninput="validateAddress(name);" required>
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
                                <option disabled="disabled" value="0">County</option>
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
                        <label class="col-sm-3 control-label">Password</label>
                        <div class="col-sm-7">
                            <input type="password" class="form-control" name="password" id="pwd1" placeholder="Password" oninput="validatePassword();" required>
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
                            <button type="submit" value="submit" class="btn btn-info">Register</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
        <script src="js/registration.js"></script>
    </body>

    </html>