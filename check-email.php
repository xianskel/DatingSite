<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="css/custom.css">


    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>

    <h3>Thank you for registering!</h3>
    <h3>Please verify your email to continue.</h3>
    <br/>
    <br/>
    <br/>
    <h3>For testing purposes find verification link below</h3>
    <h4 id="link" style="text-align: center;">Click Link &gt&gt&gt <a href="verify.php?check=<?php if(isset($_GET['verify'])){echo $_GET['verify'];} ?>"> verify.php<?php if(isset($_GET['verify'])){echo $_GET['verify'];} ?>" </a> &lt&lt&lt Click Link</h4>



</body>

</html>