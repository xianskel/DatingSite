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
                        <li><a href="./account.php">Account</a></li>
                        <li class="active"><a href="./help.php">Help</a></li>
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
        <div class="container content top-marg center">
            <div class="row">
                <div class="col-sm-12 top-marg">
                    <img src="./images/serendipity.png" />
                </div>
            </div>
            <div class="row" style="margin-top:50px;">
                <h2>Help</h2>
            </div>
            <div class="row" style="margin-top:50px;">
                <h4>For people new to online dating you can find advice and safety guidelines from the UK-based Online Dating Association <a href="http://www.onlinedatingassociation.org.uk/consumers/date-safe-guidance.html">here</a></h4>
                <br>
                <h4>To report inappropriate or abusive behaviour by another user of this site please use this <a href="#contact_form">contact form</a> to let us know immediately</h4>
                <br>
                <h4>For help using Serendipity please check our list of Frequently Asked Questions. If this does not answer your question or if you would like to contact us about any other issue please use this <a href="#contact_form">contact form</a></h4>
                <br>
            </div>
            <div class="row" style="margin-top:50px;">
                <h2>Frequently Asked Questions</h2>
                <br>
                <h4><a href="#about_serendipity">About Serendipity</a>  </h4>
                <h4><a href="#privacy">Privacy</a></h4>
                <h4><a href="#how_to_search">How to Search</a></h4>
                <h4><a href="#contacting_users">Contacting others</a> </h4>
                <h4><a href="#my_subscription">My Subscription</a> </h4>
                <br>
                <a name="about_serendipity"></a>
                </p>
                <h3>About Soulmates</h3>
                <h4>Serendipity is an Irish website launched in 2016 that specialises in bringing couples together and helping people find their ideal partner<br></h4>
                <a name="privacy"></a>
                </p>
                <h3>Privacy</h3>
                <h4>Ensuring your personal privacy is our first most priority. The highest consideration has been given to ensuring that you remain in full control at all times of which personal information you choose to divulge while using this site<br></h4>
                <a name="how_to_search"></a>
                </p>
                <h3>How to Search</h3>
                <h4>An intuitive design will guide you with ease through the process of choosing your ideal partner<br></h4>
                <a name="contacting_users"></a>
                </p>
                <h3>Contacting others</h3>
                <h4>Serendipity has an easy-to-use messaging system that will ensure you can contact a potential partner while safeguarding the privacy of all<br></h4>
                <a name="my_subscription"></a>
                </p>
                <h3>My Subscription</h3>
                <h4>You will find information about your subscription... you will be informed when the expiration date of your current subscription period is approaching...etc...etc<br></h4>
            </div>

            <div id="regForm" class="col-sm-6 col-sm-offset-3 fade-in">
                <a name="contact_form"></a>
                <h2>Contact us</h2>
                <br>
                <form class="form-horizontal" action="./php/contact.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-9">
                            <input type="email" class="form-control" name="email" placeholder="Email">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Name</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="name" placeholder="name">
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-3 control-label">Type of Comment</label>
                        <div class="col-sm-9">
                            <select class="form-control" name="typeofcomment">
                                <option disabled="disabled" value="0">Type of Comment</option>
                                <option value="reportabuse">I want to report another user</option>
                                <option value="mydetails">I have a question about my details</option>
                                <option value="mysubscription">I have a question about my subscription</option>
                                <option value="suggestion">I have a suggestion to make about Serendipity</option>
                                <option value="complaint">I have a complaint to make about Serendipity</option>
                                <option value="other">I have a different question to ask</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Subject</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="subject" placeholder="subject">
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-3 control-label">Message</label>
                        <div class="col-sm-9">
                            <textarea class="form-control" name="message" col="50" rows="12" placeholder="type your message here">
                            </textarea>
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

    </body>

    </html>