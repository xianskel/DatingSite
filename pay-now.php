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
        <div class="container top-marg content">
            <div class="row">
                <h2>Only Premium Members Can Use Messenger</h2>
                <h3>Please Pay Now</h3>
                <br/>
                <div id="signForm" class="col-sm-4 col-sm-offset-4 fade-in">
                    <form class="form-horizontal" action="http://amnesia.csisdmz.ul.ie/4014/cc.php" method="post" enctype="application/x-www-form-urlencoded" onsubmit="return validateForm(); updatePayment();">
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Full Name</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Name" oninput="validateName();" required>
                            </div>
                            <div class="col-sm-1">
                                <img src="images/1457893505_tick-circle.png" class="validationLogo" id="nameTick" />
                                <img src="images/1457893593_cross_circle.png" class="validationLogo" id="nameCross" />
                            </div>
                        </div>
                        <div id="nameError" class="col-sm-11 payWarning">
                            Cannot contain numbers or symbols
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Card No.</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="ccNumber" name="ccNumber" placeholder="Card Num" oninput="validateCard();" required>
                            </div>
                            <div class="col-sm-1">
                                <img src="images/1457893505_tick-circle.png" class="validationLogo" id="cardTick" />
                                <img src="images/1457893593_cross_circle.png" class="validationLogo" id="cardCross" />
                            </div>
                        </div>
                        <div id="cardError" class="col-sm-11 payWarning">
                            Must be 16 digits long. Numbers only
                        </div>
                        <div class="form-group" style="text-align:left;">
                            <label class="col-sm-3 control-label">Expiration</label>
                            <div class="col-sm-4">
                                <select class="form-control" id="month" name="month" onchange="validateExpiry();" required>
                                    <option value="0">Month</option>
                                    <option value="01">01</option>
                                    <option value="02">02</option>
                                    <option value="03">03</option>
                                    <option value="04">04</option>
                                    <option value="05">05</option>
                                    <option value="06">06</option>
                                    <option value="07">07</option>
                                    <option value="08">08</option>
                                    <option value="09">09</option>
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <option value="12">12</option>
                                </select>
                            </div>
                            <div class="col-sm-4">
                                <select class="form-control" id="year" name="year" onchange="validateExpiry();" required>
                                    <option value="0">Year</option>
                                    <option value="16">2016</option>
                                    <option value="17">2017</option>
                                    <option value="18">2018</option>
                                    <option value="19">2019</option>
                                    <option value="20">2020</option>
                                    <option value="21">2021</option>
                                    <option value="22">2022</option>
                                    <option value="23">2023</option>
                                    <option value="24">2024</option>
                                    <option value="25">2025</option>
                                    <option value="26">2026</option>
                                    <option value="27">2027</option>
                                </select>
                            </div>
                            <div class="col-sm-1">
                                <img src="images/1457893505_tick-circle.png" class="validationLogo" id="dateTick" />
                                <img src="images/1457893593_cross_circle.png" class="validationLogo" id="dateCross" />
                            </div>
                        </div>
                        <div id="dateError" class="col-sm-11 payWarning">
                            Expiration date must be in future
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Sec No.</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="security" name="security" placeholder="CVV" oninput="validateCvv();" required>
                            </div>
                            <div class="col-sm-1">
                                <img src="images/1457893505_tick-circle.png" class="validationLogo" id="cvvTick" />
                                <img src="images/1457893593_cross_circle.png" class="validationLogo" id="cvvCross" />
                            </div>
                        </div>
                        <div id="cvvError" class="col-sm-11 payWarning">
                            Must be 3 digits long. Numbers only
                        </div>
                        <div class="form-group" style="text-align:left;">
                            <label class="col-sm-3 control-label">Payment</label>
                            <div class="col-sm-8">
                                <select class="form-control" id="amount" name="amount" onchange="validateAmount();" required>
                                    <option value="0">Amount</option>
                                    <option value="05+7 days">€5.00 - One Week</option>
                                    <option value="07+14 days">€7.00 - Two Weeks</option>
                                    <option value="10+1 months">€10.00 - One Month</option>
                                    <option value="20+3 months">€20.00 - Three Months</option>
                                    <option value="30+6 months">€30.00 - Six Months</option>
                                    <option value="50+1 years">€50.00 - One Year</option>
                                </select>
                            </div>
                            <div class="col-sm-1">
                                <img src="images/1457893505_tick-circle.png" class="validationLogo" id="amountTick" />
                                <img src="images/1457893593_cross_circle.png" class="validationLogo" id="amountCross" />
                            </div>
                        </div>
                        <div id="amountError" class="col-sm-11 payWarning">
                            You must enter an amount
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-2 col-sm-9">
                                <button type="submit" value="submit" class="btn btn-info">Pay Now</a>
                            </div>
                        </div>
                    </form>
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
        <script src="js/payment.js"></script>

    </body>

    </html>