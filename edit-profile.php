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
        <meta http-equiv="cache-control" content="no-cache">
        <!-- tells browser not to cache -->
        <meta http-equiv="expires" content="0">
        <!-- says that the cache expires 'now' -->
        <meta http-equiv="pragma" content="no-cache">
        <!-- says not to use cached stuff, if there is any -->
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
        <div class="container content">
            <div class="row">
                <h3>Edit Profile</h3>
            </div>
            <?php if(isset($_GET['new'])){ 
                  echo
                "<div class=\" row newmember\" id=\"newMsg\">
                <h3>Thank You For Registering!</h3>
                <h3>Please tell us about yourself so we can improve your matches</h3>
                <button class=\"btn btn-success top-marg\" onclick=\"hideMessage();\">Got It</button>
                </div>"; }  
            ?>
                <div class="row">
                    <div class="col-md-5 col-md-push-7">
                        <div id='photo'></div>
                        <form method="post" enctype="multipart/form-data" action="./php/upload-image.php">
                            <input type="file" name="image" id="image">
                            <button type="submit" name="submit">Upload</button>
                        </form>
                    </div>
                    <div class="col-md-7 col-md-pull-5">
                        <h3 style="text-align:left;"><?php echo $_SESSION['username']; ?></h3>
                        <br/>
                        <form role="form" action="./php/update-profile.php" method="post" enctype="application/x-www-form-urlencoded">
                            <div class="form-group">
                                <label for="comment">Summary:</label>
                                <textarea class="form-control tagline" rows="5" name="tagline" id="tagline" required maxlength="500"></textarea>
                            </div>
                            <br/>
                            <h4>About You</h4>
                            <div class="form-group">
                                <p>Your Height:</p>
                                <select id="height" name="height" required>
                                    <option disabled="disabled" value="0">Height</option>
                                    <option value="48">4'00"</option>
                                    <option value="49">4'01"</option>
                                    <option value="50">4'02"</option>
                                    <option value="51">4'03"</option>
                                    <option value="52">4'04"</option>
                                    <option value="53">4'05"</option>
                                    <option value="54">4'06"</option>
                                    <option value="55">4'07"</option>
                                    <option value="56">4'08"</option>
                                    <option value="57">4'09"</option>
                                    <option value="58">4'10"</option>
                                    <option value="59">4'11"</option>
                                    <option value="60">5'00"</option>
                                    <option value="61">5'01"</option>
                                    <option value="62">5'02"</option>
                                    <option value="63">5'03"</option>
                                    <option value="64">5'04"</option>
                                    <option value="65">5'05"</option>
                                    <option value="66">5'06"</option>
                                    <option value="67">5'07"</option>
                                    <option value="68">5'08"</option>
                                    <option value="69">5'09"</option>
                                    <option value="70">5'10"</option>
                                    <option value="71">5'11"</option>
                                    <option value="72">6'00"</option>
                                    <option value="73">6'01"</option>
                                    <option value="74">6'02"</option>
                                    <option value="75">6'03"</option>
                                    <option value="76">6'04"</option>
                                    <option value="77">6'05"</option>
                                    <option value="78">6'06"</option>
                                    <option value="79">6'07"</option>
                                    <option value="80">6'08"</option>
                                    <option value="81">6'09"</option>
                                    <option value="82">6'10"</option>
                                    <option value="83">6'11"</option>
                                </select>
                            </div>
                            <br/>

                            <p>What colour eyes have you?:</p>
                            <div class="radio">
                                <label class="radio-inline">
                                    <input type="radio" name="2" value="Blue Eyes" id="Blue Eyes" required>Blue</label>
                                <label class="radio-inline">
                                    <input type="radio" name="2" value="Brown Eyes" id="Brown Eyes" required>Brown</label>
                                <label class="radio-inline">
                                    <input type="radio" name="2" value="Green Eyes" id="Green Eyes" required>Green</label>
                                <label class="radio-inline">
                                    <input type="radio" name="2" value="Grey Eyes" id="Grey Eyes" required>Grey</label>
                                <label class="radio-inline">
                                    <input type="radio" name="2" value="Other Eyes" id="Other Eyes" required>Other</label>
                            </div>
                            <br/>

                            <p>Do you smoke?</p>

                            <div class="radio">
                                <label class="radio-inline">
                                    <input type="radio" name="4" value="Non-Smoker" id="Non-Smoker" required>Never</label>
                                <label class="radio-inline">
                                    <input type="radio" name="4" value="Social-Smoker" id="Social-Smoker" required>Occasionally/Socially</label>
                                <label class="radio-inline">
                                    <input type="radio" name="4" value="Smoker" id="Smoker" required>Often</label>
                            </div>
                            <br />

                            <p>What is your Ethnicity?</p>

                            <div class="radio">
                                <label class="radio-inline">
                                    <input type="radio" name="7" value="White" id="White" required>Caucassian/White</label>
                                <label class="radio-inline">
                                    <input type="radio" name="7" value="Black" id="Black" required>Black</label>
                                <label class="radio-inline">
                                    <input type="radio" name="7" value="Asian" id="Asian" required>Asian</label>
                                <label class="radio-inline">
                                    <input type="radio" name="7" value="Hispanic" id="Hispanic" required>Hispanic</label>
                                <label class="radio-inline">
                                    <input type="radio" name="7" value="Middle Eastern" id="Middle Eastern" required>Middle Eastern</label>
                                <label class="radio-inline">
                                    <input type="radio" name="7" value="Other Race" id="Other Race" required>Other</label>
                            </div>
                            <br/>

                            <p>Do you have children?</p>

                            <div class="radio">
                                <label class="radio-inline">
                                    <input type="radio" name="10" value="Has Children" id="Has Children" required>Yes</label>
                                <label class="radio-inline">
                                    <input type="radio" name="10" value="No Children" id="No Children" required>No</label>
                            </div>
                            <br/>

                            <p>What's your hair color?</p>

                            <div class="radio">
                                <label class="radio-inline">
                                    <input type="radio" name="1" value="Blonde Hair" id="Blonde Hair" required>Blonde</label>
                                <label class="radio-inline">
                                    <input type="radio" name="1" value="Brown Hair" id="Brown Hair" required>Brown</label>
                                <label class="radio-inline">
                                    <input type="radio" name="1" value="Black Hair" id="Black Hair" required>Black</label>
                                <label class="radio-inline">
                                    <input type="radio" name="1" value="Red Hair" id="Red Hair" required>Red</label>
                                <label class="radio-inline">
                                    <input type="radio" name="1" value="Grey Hair" id="Grey Hair" required>Grey</label>
                                <label class="radio-inline">
                                    <input type="radio" name="1" value="Bald Hair" id="Bald Hair" required>Bald</label>
                                <label class="radio-inline">
                                    <input type="radio" name="1" value="Other Hair" id="Other Hair" required>Other</label>
                            </div>
                            <br/>

                            <p>Whats your body type?</p>

                            <div class="radio">
                                <label class="radio-inline">
                                    <input type="radio" name="3" value="Slim Body" id="Slim Body" required>Slim</label>
                                <label class="radio-inline">
                                    <input type="radio" name="3" value="Athletic Body" id="Athletic Body" required>Athletic</label>
                                <label class="radio-inline">
                                    <input type="radio" name="3" value="Average Body" id="Average Body" required>Average</label>
                                <label class="radio-inline">
                                    <input type="radio" name="3" value="Large Body" id="Large Body" required>Large</label>
                                <label class="radio-inline">
                                    <input type="radio" name="3" value="Other Body" id="Other Body" required>Other</label>
                            </div>
                            <br/>

                            <p>Whats your level of Education?</p>

                            <div class="radio">
                                <label class="radio-inline">
                                    <input type="radio" name="6" value="Leaving Cert" id="Leaving Cert" required>Leaving Cert</label>
                                <label class="radio-inline">
                                    <input type="radio" name="6" value="Some College" id="Some College" required>Some College</label>
                                <label class="radio-inline">
                                    <input type="radio" name="6" value="Bachelor Degree" id="Bachelor Degree" required>Bachelor Degree</label>
                                <label class="radio-inline">
                                    <input type="radio" name="6" value="Postgraduate Degree" id="Postgraduate Degree" required>Postgraduate Degree</label>
                            </div>
                            <br/>

                            <p>Whats your religion?</p>

                            <div class="radio">
                                <label class="radio-inline">
                                    <input type="radio" name="8" value="Atheist" id="Atheist" required>Atheist</label>
                                <label class="radio-inline">
                                    <input type="radio" name="8" value="Agnostic" id="Agnostic" required>Agnostic</label>
                                <label class="radio-inline">
                                    <input type="radio" name="8" value="Catholic" id="Catholic" required>Catholic</label>
                                <label class="radio-inline">
                                    <input type="radio" name="8" value="Christian" id="Christian" required>Christian</label>
                                <label class="radio-inline">
                                    <input type="radio" name="8" value="Muslim" id="Muslim" required>Muslim</label>
                                <label class="radio-inline">
                                    <input type="radio" name="8" value="Hindu" id="Hindu" required>Hindu</label>
                                <label class="radio-inline">
                                    <input type="radio" name="8" value="Buddist" id="Buddist" required>Buddist</label>
                                <label class="radio-inline">
                                    <input type="radio" name="8" value="Other Religion" id="Other Religion" required>Other Religion</label>
                            </div>
                            <br/>

                            <p>Whats your marital status?</p>

                            <div class="radio">
                                <label class="radio-inline">
                                    <input type="radio" name="9" value="Single" id="Single" required>Single</label>
                                <label class="radio-inline">
                                    <input type="radio" name="9" value="Divorced" id="Divorced" required>Divorced</label>
                                <label class="radio-inline">
                                    <input type="radio" name="9" value="Widowed" id="Widowed" required>Widowed</label>
                                <label class="radio-inline">
                                    <input type="radio" name="9" value="Open Relationship" id="Open Relationship" required>Open Relationship</label>
                            </div>
                            <br/>

                            <p>Occupation:</p>

                            <div class="radio">
                                <label class="radio-inline">
                                    <input type="radio" value='Academic' name="5" id="Academic" required>Academic</label>
                                <label class="radio-inline">
                                    <input type="radio" value='Administration' name="5" id="Administration" required>Administration</label>
                                <label class="radio-inline">
                                    <input type="radio" value='Advertising' name="5" id="Advertising" required>Advertising</label>
                                <label class="radio-inline">
                                    <input type="radio" value='Artistic' name="5" id="Artistic" required>Artistic</label>
                                <label class="radio-inline">
                                    <input type="radio" value='Chef' name="5" id="Chef" required>Chef</label>
                                <label class="radio-inline">
                                    <input type="radio" value='Construction' name="5" id="Construction" required>Construction</label>
                                <label class="radio-inline">
                                    <input type="radio" value='Engineering' name="5" id="Engineering" required>Engineering</label>
                                <label class="radio-inline">
                                    <input type="radio" value='Executive' name="5" id="Executive" required>Executive</label>
                                <label class="radio-inline">
                                    <input type="radio" value='Farming' name="5" id="Farming" required>Farming</label>
                                <label class="radio-inline">
                                    <input type="radio" value='Finance' name="5" id="Finance" required>Finance</label>
                                <label class="radio-inline">
                                    <input type="radio" value='Food & Beverage' name="5" id="Food & Beverage" required>Food & Bev</label>
                                <label class="radio-inline">
                                    <input type="radio" value='Healthcare' name="5" id="Healthcare" required>Healthcare</label>
                                <label class="radio-inline">
                                    <input type="radio" value='Hospitality' name="5" id="Hospitality" required>Hospitality</label>
                                <label class="radio-inline">
                                    <input type="radio" value='IT' name="5" id="IT" required>IT</label>
                                <label class="radio-inline">
                                    <input type="radio" value='Law' name="5" id="Law" required>Law</label>
                                <label class="radio-inline">
                                    <input type="radio" value='Management' name="5" id="Management" required>Management</label>
                                <label class="radio-inline">
                                    <input type="radio" value='Manufacturing' name="5" id="Manufacturing" required>Manufacturing</label>
                                <label class="radio-inline">
                                    <input type="radio" value='Public Services' name="5" id="Public Services" required>Public Services</label>
                                <label class="radio-inline">
                                    <input type="radio" value='Retail' name="5" id="Retail" required>Retail</label>
                                <label class="radio-inline">
                                    <input type="radio" value='Sales' name="5" id="Sales" required>Sales</label>
                                <label class="radio-inline">
                                    <input type="radio" value='Science' name="5" id="Science" required>Science</label>
                                <label class="radio-inline">
                                    <input type="radio" value='Self-Employed' name="5" id="Self-Employed" required>Self Employed</label>
                                <label class="radio-inline">
                                    <input type="radio" value='Student' name="5" id="Student" required>Student</label>
                                <label class="radio-inline">
                                    <input type="radio" value='Teacher' name="5" id="Teacher" required>Teacher</label>
                                <label class="radio-inline">
                                    <input type="radio" value='Trades' name="5" id="Trades" required>Trades</label>
                                <label class="radio-inline">
                                    <input type="radio" value='Transportation' name="5" id="Transportation" required>Transportation</label>
                                <label class="radio-inline">
                                    <input type="radio" value='Other Job' name="5" id="Other Job" required>Other Job</label>
                            </div>
                            <br/>


                            <h4>Your Hobbies:</h4>

                            <div class="checkbox">
                                <label class="checkbox-inline">
                                    <input type="checkbox" value="Cycling" name='hobbies[]' id="Cycling">Cycling</label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" value="Hiking" name='hobbies[]' id="Hiking">Hiking</label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" value="Swimming" name='hobbies[]' id="Swimming">Swimming</label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" value="Reading" name='hobbies[]' id="Reading">Reading</label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" value="Board Games" name='hobbies[]' id="Board Games">Board Games</label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" value="Meeting Friends" name='hobbies[]' id="Meeting Friends">Meeting Friends</label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" value="Tennis" name='hobbies[]' id="Tennis">Tennis</label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" value="Golf" name='hobbies[]' id="Golf">Golf</label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" value="Soccer" name='hobbies[]' id="Soccer">Soccer</label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" value="Video Games" name='hobbies[]' id="Video Games">Video Games</label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" value="Rugby" name='hobbies[]' id="Rugby">Rugby</label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" value="Clubbing" name='hobbies[]' id="Clubbing">Clubbing</label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" value="Dancing" name='hobbies[]' id="Dancing">Dancing</label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" value="Fitness" name='hobbies[]' id="Fitness">Fitness</label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" value="Shopping" name='hobbies[]' id="Shopping">Shopping</label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" value="Concerts" name='hobbies[]' id="Concerts">Concerts</label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" value="Comedy" name='hobbies[]' id="Comedy">Comedy</label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" value="Cinema" name='hobbies[]' id="Cinema">Cinema</label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" value="Music" name='hobbies[]' id="Music">Music</label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" value="Painting" name='hobbies[]' id="Painting">Painting</label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" value="Drawing" name='hobbies[]' id="Drawing">Drawing</label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" value="Drama" name='hobbies[]' id="Drama">Drama</label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" value="DIY" name='hobbies[]' id="DIY">DIY</label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" value="Knitting" name='hobbies[]' id="Knitting">Knitting</label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" value="Puzzles" name='hobbies[]' id="Puzzles">Puzzles</label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" value="Photography" name='hobbies[]' id="Photography">Photography</label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" value="Fishing" name='hobbies[]' id="Fishing">Fishing</label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" value="Surfing" name='hobbies[]' id="Surfing">Surfing</label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" value="Kayaking" name='hobbies[]' id="Kayaking">Kayaking</label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" value="Horseback Riding" name='hobbies[]' id="Horseback Riding">Horseback Riding</label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" value="Rock Climbing" name='hobbies[]' id="Rock Climbing">Rock Climbing</label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" value="Martial Arts" name='hobbies[]' id="Martial Arts">Martial Arts</label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" value="Camping" name='hobbies[]' id="Camping">Camping</label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" value="Body Building" name='hobbies[]' id="Body Building">Body Building</label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" value="Chess" name='hobbies[]' id="Chess">Chess</label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" value="Poker" name='hobbies[]' id="Poker">Poker</label>
                                <label class="checkbox-inline">
                                    <input type="checkbox" value="Stamp Collecting" name='hobbies[]' id="Stamp Collecting">Stamp Collecting</label>
                            </div>
                    </div>
                    <button type="submit" value="submit">Save</button>
                    </form>
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
        <script src="js/edit-profile.js"></script>

    </body>

    </html>