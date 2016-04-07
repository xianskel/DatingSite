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
    <link rel="stylesheet" href="css/personality.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <div class="container-fluid background">
        <div class="row">
            <div class="col-xs-12 text-center fade-in" id="q0">
                <h1>We're going to ask you 10 quick questions</h1>
                <h2>Are You Ready?</h2>
                <button class="btn btn-info" onclick="nextQuestion()">Ready</button>
            </div>
            <div class="col-xs-12 text-center fade-in" id="q1" style="display: none">
                <h2>I'm looking for someone to start a relationship and settle down with</h2>
                <button class="btn btn-info" onclick="addAnswer('5')">Strongly Agree</button>
                <button class="btn btn-info" onclick="addAnswer('4')">Agree</button>
                <button class="btn btn-info" onclick="addAnswer('3')">Neither Agree or Disagree</button>
                <button class="btn btn-info" onclick="addAnswer('2')">Disagree</button>
                <button class="btn btn-info" onclick="addAnswer('1')">Strongly Disagree</button>
            </div>
            <div class="col-xs-12 text-center fade-in" id="q2" style="display: none">
                <h2>For a relationship to work, both people must share religious values</h2>
                <button class="btn btn-info" onclick="addAnswer('5')">Strongly Agree</button>
                <button class="btn btn-info" onclick="addAnswer('4')">Agree</button>
                <button class="btn btn-info" onclick="addAnswer('3')">Neither Agree or Disagree</button>
                <button class="btn btn-info" onclick="addAnswer('2')">Disagree</button>
                <button class="btn btn-info" onclick="addAnswer('1')">Strongly Disagree</button>
            </div>
            <div class="col-xs-12 text-center fade-in" id="q3" style="display: none">
                <h2>I am much more motivated by love than money</h2>
                <button class="btn btn-info" onclick="addAnswer('5')">Strongly Agree</button>
                <button class="btn btn-info" onclick="addAnswer('4')">Agree</button>
                <button class="btn btn-info" onclick="addAnswer('3')">Neither Agree or Disagree</button>
                <button class="btn btn-info" onclick="addAnswer('2')">Disagree</button>
                <button class="btn btn-info" onclick="addAnswer('1')">Strongly Disagree</button>
            </div>
            <div class="col-xs-12 text-center fade-in" id="q4" style="display: none">
                <h2>I would very much like to have kids in the future</h2>
                <button class="btn btn-info" onclick="addAnswer('5')">Strongly Agree</button>
                <button class="btn btn-info" onclick="addAnswer('4')">Agree</button>
                <button class="btn btn-info" onclick="addAnswer('3')">Neither Agree or Disagree</button>
                <button class="btn btn-info" onclick="addAnswer('2')">Disagree</button>
                <button class="btn btn-info" onclick="addAnswer('1')">Strongly Disagree</button>>
            </div>
            <div class="col-xs-12 text-center fade-in" id="q5" style="display: none">
                <h2>Im more comfortable staying in on a friday night than going out</h2>
                <button class="btn btn-info" onclick="addAnswer('5')">Strongly Agree</button>
                <button class="btn btn-info" onclick="addAnswer('4')">Agree</button>
                <button class="btn btn-info" onclick="addAnswer('3')">Neither Agree or Disagree</button>
                <button class="btn btn-info" onclick="addAnswer('2')">Disagree</button>
                <button class="btn btn-info" onclick="addAnswer('1')">Strongly Disagree</button>
            </div>
            <div class="col-xs-12 text-center fade-in" id="q6" style="display: none">
                <h2>On a first date, physical attraction is more important than conversation</h2>
                <button class="btn btn-info" onclick="addAnswer('5')">Strongly Agree</button>
                <button class="btn btn-info" onclick="addAnswer('4')">Agree</button>
                <button class="btn btn-info" onclick="addAnswer('3')">Neither Agree or Disagree</button>
                <button class="btn btn-info" onclick="addAnswer('2')">Disagree</button>
                <button class="btn btn-info" onclick="addAnswer('1')">Strongly Disagree</button>
            </div>
            <div class="col-xs-12 text-center fade-in" id="q7" style="display: none">
                <h2>I would rather live spontaneously than have a set routine</h2>
                <button class="btn btn-info" onclick="addAnswer('5')">Strongly Agree</button>
                <button class="btn btn-info" onclick="addAnswer('4')">Agree</button>
                <button class="btn btn-info" onclick="addAnswer('3')">Neither Agree or Disagree</button>
                <button class="btn btn-info" onclick="addAnswer('2')">Disagree</button>
                <button class="btn btn-info" onclick="addAnswer('1')">Strongly Disagree</button>
            </div>
            <div class="col-xs-12 text-center fade-in" id="q8" style="display: none">
                <h2>On a first date, I am more likely to discuss philosophy than pop culture</h2>
                <button class="btn btn-info" onclick="addAnswer('5')">Strongly Agree</button>
                <button class="btn btn-info" onclick="addAnswer('4')">Agree</button>
                <button class="btn btn-info" onclick="addAnswer('3')">Neither Agree or Disagree</button>
                <button class="btn btn-info" onclick="addAnswer('2')">Disagree</button>
                <button class="btn btn-info" onclick="addAnswer('1')">Strongly Disagree</button>
            </div>
            <div class="col-xs-12 text-center fade-in" id="q9" style="display: none">
                <h2>I am a neat freak and get irritated by messy people</h2>
                <button class="btn btn-info" onclick="addAnswer('5')">Strongly Agree</button>
                <button class="btn btn-info" onclick="addAnswer('4')">Agree</button>
                <button class="btn btn-info" onclick="addAnswer('3')">Neither Agree or Disagree</button>
                <button class="btn btn-info" onclick="addAnswer('2')">Disagree</button>
                <button class="btn btn-info" onclick="addAnswer('1')">Strongly Disagree</button>
            </div>
            <div class="col-xs-12 text-center fade-in" id="q10" style="display: none">
                <h2>Friends and family are the most important thing in my life</h2>
                <button class="btn btn-info" onclick="addAnswer('5')">Strongly Agree</button>
                <button class="btn btn-info" onclick="addAnswer('4')">Agree</button>
                <button class="btn btn-info" onclick="addAnswer('3')">Neither Agree or Disagree</button>
                <button class="btn btn-info" onclick="addAnswer('2')">Disagree</button>
                <button class="btn btn-info" onclick="addAnswer('1')">Strongly Disagree</button>
            </div>
            <div class="col-xs-12 text-center fade-in" id="q11" style="display: none">
            </div>
        </div>
    </div>
    <form id="test" action="./php/set-personality.php" method="post" enctype="application/x-www-form-urlencoded">
        <input type="hidden" id="1" name="question1" value="3" />
        <input type="hidden" id="2" name="question2" value="3" />
        <input type="hidden" id="3" name="question3" value="3" />
        <input type="hidden" id="4" name="question4" value="3" />
        <input type="hidden" id="5" name="question5" value="3" />
        <input type="hidden" id="6" name="question6" value="3" />
        <input type="hidden" id="7" name="question7" value="3" />
        <input type="hidden" id="8" name="question8" value="3" />
        <input type="hidden" id="9" name="question9" value="3" />
        <input type="hidden" id="10" name="question10" value="3" />
    </form>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script src="js/personality.js"></script>
</body>

</html>