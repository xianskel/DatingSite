<?php 
include './php/check-session-inner.php';
include './php/clear-conversation.php';
include './php/get-profile-info.php';
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
                        <li class="active"><a href="./profile.php">My Profile</a></li>
                        <li><a href="./account.php">Account</a></li>
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
                <div class="col-md-6">
                    <img class="img-responsive profile-pic" src="<?php echo $userphoto; ?>" />
                    <?php echo $button ?>


                </div>
                <div class="col-md-6">
                    <h3 style="text-align:left;"> <?php if(isset($username)){ echo $username; }?></h3>
                    <h4 class="italic"><?php if(isset($age)){ echo $age; }?></h4>
                    <h4 class="italic"><?php if(isset($occupation)){ echo $occupation; }?></h4>
                    <h4 class="italic"><?php if(isset($county)){ echo $county; }?></h4>

                    <br/>
                </div>
            </div>
            <div class="row">
                <div class="col-md-5">
                    <p>
                        <?php if(isset($tagline)){ echo $tagline; }?>
                    </p>
                </div>
                <div class="col-md-6 col-md-offset-1">
                    <div class="col-md-6 nopadding">
                        <h4>About:</h4>
                        <p>
                            <?php if(isset($eye)){ echo $eye;}?>
                        </p>
                        <p>
                            <?php if(isset($body)){ echo $body;}?>
                        </p>
                        <p>
                            <?php if(isset($hair)){ echo $hair;}?>
                        </p>
                        <p>
                            <?php if(isset($mstatus)){ echo $mstatus;} ?>
                        </p>
                        <p>
                            <?php if(isset($pstatus)){ echo $pstatus; }?>
                        </p>
                        <p>
                            <?php if(isset($smoker)){ echo $smoker;} ?>
                        </p>
                        <p>
                            <?php if(isset($religion)){ echo $religion;} ?>
                        </p>
                    </div>
                    <div class="col-md-6">
                        <h4>Hobbies:</h4>
                        <?php if(isset($hobbies)){ echo $hobbies; }?>
                    </div>
                </div>
            </div>
        </div>
        <footer>
        </footer>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js"></script>
        <script src="js/isonline.js"></script>
        <script src="js/checkmsgs.js"></script>

    </body>

    </html>