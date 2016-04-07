<?php 
include './php/check-session-inner.php';
include './php/clear-conversation.php';
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta id="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Serendipity</title>

        <!-- Bootstrap -->
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/custom.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">


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
                        <li class="active"><a href="./search-profiles.php">Search</a></li>
                        <li><a href="./matches.php">My Matches</a></li>
                        <li><a href="./messages.php">Messages <span class="badge" id="msgc"></span></a></li>
                        <li><a href="./profile.php">My Profile</a></li>
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
        <div class="container-fluid top-marg content">
            <div class="row">
                <div class="col-sm-12">
                    <h2>Search Profiles</h2>
                </div>
            </div>
            <form role="form">
                <div class="row">
                    <span class="col-sm-6 col-md-offset-3">
                        <label>Search by name:</label>
                        <input type="text" name="search" id="search" oninput="setSearch(this.value)" onkeydown="if (event.keyCode==13) return false;">
                        <label>Order by:</label>
                        <select name="order" id="order" onchange="setOrder(this.value)">
                            <option value="distanceLow">Distance - Low to High</option>
                            <option value="distanceHigh">Distance - High to Low</option>
                            <option value="matchLow">Match Rating - Low to High</option>
                            <option value="matchHigh">Match Rating - High to Low</option>
                            <option value="usernameA">Username - A to Z</option>
                            <option value="usernameZ">Username - Z to A</option>
                            <option value="ageLow">Age - Low to High</option>
                            <option value="ageHigh">Age - High to Low</option>
                        </select>
                    </span>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="search-menu">
                            <div class="search-element">Location
                                <div class="dropdown">
                                    <div id="distanceoutput">
                                    </div>
                                    <input type="range" id="distance" min="1" max="466">
                                    <p class="att-types">County:</p>
                                    <div class="checkbox check-columns">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Co.Antrim" onclick="sendAttribute(this.id);">Co.Antrim</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Co.Armagh" onclick="sendAttribute(this.id);">Co.Armagh</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Co.Carlow" onclick="sendAttribute(this.id);">Co.Carlow</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Co.Cavan" onclick="sendAttribute(this.id);">Co.Cavan</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Co.Clare" onclick="sendAttribute(this.id);">Co.Clare</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Co.Cork" onclick="sendAttribute(this.id);">Co.Cork</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Co.Derry" onclick="sendAttribute(this.id);">Co.Derry</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Co.Donegal" onclick="sendAttribute(this.id);">Co.Donegal</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Co.Down" onclick="sendAttribute(this.id);">Co.Down</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Co.Dublin" onclick="sendAttribute(this.id);">Co.Dublin</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Co.Fermanagh" onclick="sendAttribute(this.id);">Co.Fermanagh</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Co.Galway" onclick="sendAttribute(this.id);">Co.Galway</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Co.Kerry" onclick="sendAttribute(this.id);">Co.Kerry</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Co.Kildare" onclick="sendAttribute(this.id);">Co.Kildare</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Co.Kilkenny" onclick="sendAttribute(this.id);">Co.Kilkenny</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Co.Laois" onclick="sendAttribute(this.id);">Co.Laois</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Co.Leitrim" onclick="sendAttribute(this.id);">Co.Leitrim</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Co.Limerick" onclick="sendAttribute(this.id);">Co.Limerick</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Co.Longford" onclick="sendAttribute(this.id);">Co.Longford</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Co.Louth" onclick="sendAttribute(this.id);">Co.Louth</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Co.Mayo" onclick="sendAttribute(this.id);">Co.Mayo</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Co.Meath" onclick="sendAttribute(this.id);">Co.Meath</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Co.Monaghan" onclick="sendAttribute(this.id);">Co.Monaghan</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Co.Offaly" onclick="sendAttribute(this.id);">Co.Offaly</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Co.Roscommon" onclick="sendAttribute(this.id);">Co.Roscommon</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Co.Sligo" onclick="sendAttribute(this.id);">Co.Sligo</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Co.Tipperary" onclick="sendAttribute(this.id);">Co.Tipperary</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Co.Tyrone" onclick="sendAttribute(this.id);">Co.Tyrone</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Co.Waterford" onclick="sendAttribute(this.id);">Co.Waterford</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Co.Westmeath" onclick="sendAttribute(this.id);">Co.Westmeath</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Co.Wexford" onclick="sendAttribute(this.id);">Co.Wexford</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Co.Wicklow" onclick="sendAttribute(this.id);">Co.Wicklow</label>
                                    </div>
                                </div>
                            </div>
                            <div class="search-element">Physical
                                <div class="dropdown">
                                    <div> <span id="minageoutput"></span><span id="maxageoutput"></span></div>

                                    <span class="slider"><input type="range" id="minage" min="18" max="100" ></span><span class="slider"><input type="range" id="maxage" min="18" max="100"></span>


                                    <div> <span id="minheightoutput"></span><span id="maxheightoutput"></span></div>
                                    <span class="slider"> <input type="range" id="minheight" min="30" max="100"></span><span><input type="range" id="maxheight" min="30" max="100"></span>

                                    <p class="att-types">Eye Colour:</p>
                                    <div class="checkbox check-columns">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Blue Eyes" onclick="sendAttribute(this.id);">Blue</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Brown Eyes" onclick="sendAttribute(this.id);">Brown</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Green Eyes" onclick="sendAttribute(this.id);">Green</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Grey Eyes" onclick="sendAttribute(this.id);">Grey</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Other Eyes" onclick="sendAttribute(this.id);">Other</label>
                                    </div>

                                    <p class="att-types">Body type:</p>

                                    <div class="checkbox check-columns">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Slim Body" onclick="sendAttribute(this.id);">Slim</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Athletic Body" onclick="sendAttribute(this.id);">Athletic</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Average Body" onclick="sendAttribute(this.id);">Average</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Large Body" onclick="sendAttribute(this.id);">Large</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Other Body" onclick="sendAttribute(this.id);">Other</label>
                                    </div>

                                    <p class="att-types">Hair color:</p>
                                    <div class="checkbox check-columns-4">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Blonde Hair" onclick="sendAttribute(this.id);">Blonde</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Brown Hair" onclick="sendAttribute(this.id);">Brown</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Black Hair" onclick="sendAttribute(this.id);">Black</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Grey Hair" onclick="sendAttribute(this.id);">Grey</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Red Hair" onclick="sendAttribute(this.id);">Red</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Bald Hair" onclick="sendAttribute(this.id);">Bald</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Other Hair" onclick="sendAttribute(this.id);">Other Hair</label>
                                    </div>

                                    <p class="att-types">Ethnicity:</p>

                                    <div class="checkbox check-columns-4">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="White" onclick="sendAttribute(this.id);">White</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Black" onclick="sendAttribute(this.id);">Black</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Asian" onclick="sendAttribute(this.id);">Asian</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Hispanic" onclick="sendAttribute(this.id);">Hispanic</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Middle Eastern" onclick="sendAttribute(this.id);">Middel-East</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Other Race" onclick="sendAttribute(this.id);">Other</label>
                                    </div>
                                </div>
                            </div>
                            <div class="search-element">Lifestyle
                                <div class="dropdown">
                                    <p class="att-types">Smoker:</p>

                                    <div class="checkbox check-columns">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Non-Smoker" onclick="sendAttribute(this.id);">No</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Social-Smoker" onclick="sendAttribute(this.id);">Socially</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Smoker" onclick="sendAttribute(this.id);">Often</label>
                                    </div>


                                    <p class="att-types">Level of Education:</p>

                                    <div class="checkbox check-columns-4">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Leaving Cert" onclick="sendAttribute(this.id);">Leaving Cert</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Some College" onclick="sendAttribute(this.id);">Some College</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Bachelor Degree" onclick="sendAttribute(this.id);">Bachelor Degree</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Postgraduate Degree" onclick="sendAttribute(this.id);">Postgraduate Degree</label>
                                    </div>

                                    <p class="att-types">Religion:</p>

                                    <div class="checkbox check-columns-4">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Atheist" onclick="sendAttribute(this.id);">Atheist</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Agnostic" onclick="sendAttribute(this.id);">Agnostic</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Catholic" onclick="sendAttribute(this.id);">Catholic</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Christian" onclick="sendAttribute(this.id);">Other Christian</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Muslim" onclick="sendAttribute(this.id);">Musilm</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Hindu" onclick="sendAttribute(this.id);">Hindu</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Buddist" onclick="sendAttribute(this.id);">Buddist</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Other Religion" onclick="sendAttribute(this.id);">Other</label>
                                    </div>

                                    <p class="att-types">Marital status:</p>

                                    <div class="checkbox check-columns-4">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Single" onclick="sendAttribute(this.id);">Single</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Divorced" onclick="sendAttribute(this.id);">Divorced</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Widowed" onclick="sendAttribute(this.id);">Widowed</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Open Relationship" onclick="sendAttribute(this.id);">Open Relationship</label>
                                    </div>

                                    <p class="att-types">Would you date someone with children?</p>

                                    <div class="checkbox">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Has Children" onclick="sendAttribute(this.id);">Yes</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="No Children" onclick="sendAttribute(this.id);">No</label>
                                    </div>
                                </div>
                            </div>
                            <div class="search-element">Occupation
                                <div class="dropdown">
                                    <div class="checkbox check-columns-4">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Academic" onclick="sendAttribute(this.id);">Academic</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Administration" onclick="sendAttribute(this.id);">Administration</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Advertising" onclick="sendAttribute(this.id);">Advertising</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Artistic" onclick="sendAttribute(this.id);">Artistic</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Chef" onclick="sendAttribute(this.id);">Chef</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Construction" onclick="sendAttribute(this.id);">Construction</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Engineering" onclick="sendAttribute(this.id);">Engineering</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Executive" onclick="sendAttribute(this.id);">Executive</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Farming" onclick="sendAttribute(this.id);">Farming</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Finance" onclick="sendAttribute(this.id);">Finance</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Healthcare" onclick="sendAttribute(this.id);">Healthcare</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Hospitality" onclick="sendAttribute(this.id);">Hospitality</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="IT" onclick="sendAttribute(this.id);">IT</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Law" onclick="sendAttribute(this.id);">Law</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Management" onclick="sendAttribute(this.id);">Management</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Manufacturing" onclick="sendAttribute(this.id);">Manufacturing</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Public Services" onclick="sendAttribute(this.id);">Public Services</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Retail" onclick="sendAttribute(this.id);">Retail</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Sales" onclick="sendAttribute(this.id);">Sales</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Science" onclick="sendAttribute(this.id);">Science</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Self-Employed" onclick="sendAttribute(this.id);">Self-Employed</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Food & Beverage" onclick="sendAttribute(this.id);">Food & Beverage</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Student" onclick="sendAttribute(this.id);">Student</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Teacher" onclick="sendAttribute(this.id);">Teacher</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Trades" onclick="sendAttribute(this.id);">Trades</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Transportation" onclick="sendAttribute(this.id);">Transportation</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Other Job" onclick="sendAttribute(this.id);">Other</label>
                                    </div>
                                </div>
                            </div>
                            <div class="search-element">Hobbies
                                <div class="dropdown">
                                    <div class="checkbox check-columns-4">
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Cycling" onclick="sendHobby(this.id);">Cycling</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Hiking" onclick="sendHobby(this.id);">Hiking</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Swimming" onclick="sendHobby(this.id);">Swimming</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Reading" onclick="sendHobby(this.id);">Reading</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Board Games" onclick="sendHobby(this.id);">Board Games</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Meeting Friends" onclick="sendHobby(this.id);">Meeting Friends</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Soccer" onclick="sendHobby(this.id);">Soccer</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Video Games" onclick="sendHobby(this.id);">Video Games</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Rugby" onclick="sendHobby(this.id);">Rugby</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Clubbing" onclick="sendHobby(this.id);">Clubbing</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Dancing" onclick="sendHobby(this.id);">Dancing</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Fitness" onclick="sendHobby(this.id);">Fitness</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Shopping" onclick="sendHobby(this.id);">Shopping</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Concerts" onclick="sendHobby(this.id);">Concerts</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Comedy" onclick="sendHobby(this.id);">Comedy</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Cinema" onclick="sendHobby(this.id);">Cinema</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Music" onclick="sendHobby(this.id);">Music</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" id="Painting" onclick="sendHobby(this.id);">Painting</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" onclick="sendHobby(this.id);" id="Drawing">Drawing</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" onclick="sendHobby(this.id);" id="Drama">Drama</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" onclick="sendHobby(this.id);" id="DIY">DIY</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" onclick="sendHobby(this.id);" id="Knitting">Knitting</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" onclick="sendHobby(this.id);" id="Puzzles">Puzzles</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" onclick="sendHobby(this.id);" id="Photography">Photography</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" onclick="sendHobby(this.id);" id="Fishing">Fishing</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" onclick="sendHobby(this.id);" id="Surfing">Surfing</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" onclick="sendHobby(this.id);" id="Kayaking">Kayaking</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" onclick="sendHobby(this.id);" id="Horseback Riding">Horseback Riding</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" onclick="sendHobby(this.id);" id="Rock Climbing">Rock Climbing</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" onclick="sendHobby(this.id);" id="Martial Arts">Martial Arts</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" onclick="sendHobby(this.id);" id="Camping">Camping</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" onclick="sendHobby(this.id);" id="Body Building">Body Building</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" onclick="sendHobby(this.id);" id="Chess">Chess</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" onclick="sendHobby(this.id);" id="Poker">Poker</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" onclick="sendHobby(this.id);" id="Stamp Collecting">Stamp Collecting</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" onclick="sendHobby(this.id);" id="Tennis">Tennis</label>
                                        <label class="checkbox-inline">
                                            <input type="checkbox" onclick="sendHobby(this.id);" id="Golf">Golf</label>
                                    </div>
                                </div>
                            </div>
            </form>
            </div>
            </div>
            </div>
            <div class="row">
                <div class="col-md-12" id="match-area">
                    <img src="images/loading.gif" class="loading">
                </div>
            </div>
            <div class="row center">
                <button class="page-btn" id="prev-btn" onclick="prevPage();">Previous</button>
                <button class="page-btn" id="next-btn" onclick="nextPage();">Next</button>
            </div>
        </div>
        <footer>
        </footer>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js "></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="js/bootstrap.min.js "></script>
        <script src="js/search.js "></script>
        <script src="js/isonline.js "></script>
        <script src="js/checkmsgs.js"></script>
    </body>

    </html>