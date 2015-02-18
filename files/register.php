<?php
require 'header.php';
?>

<html lang="en">
<head>
    <title>Mines Plaza</title>
    <script src="http:////cdnjs.cloudflare.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <script src="http://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/2.3.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <script src="js/required_form.js"></script>
    <script src="js/popover.js"></script>
    <meta charset="utf-8">
</head>
<div class="container">
<div id="signupbox" style="margin:auto;margin-top:50px;width:450px" >
    <div class="panel panel-info" style="margin:auto;width:450px;">
        <div class="panel-heading">
            <div class="panel-title">Sign Up</div>
            <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Forgot password?</a></div>

        </div>  
        <div class="panel-body" >
            <form id="signupform" class="form-horizontal" role="form" method="post" action="register_processing.php">
                <div style="margin-bottom:25px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                    <input type="text" class="form-control" data-placement="top" data-toggle="popover" data-reqs="em;4" data-content="Must be a valid email, min: 4 characters" name="email" placeholder="email">
                </div>
                <div style="margin-bottom: 25px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input type="text" class="form-control" name="username" data-placement="top" data-toggle="popover" data-reqs="an;3" data-content="Alpha numeric, min: 3 characters" placeholder="username">
                </div>
                <div style="margin-bottom: 25px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input type="password" class="form-control" name="password"  data-placement="top" data-toggle="popover" data-reqs="6" data-content="Minimum 6 characters" placeholder="password">
                </div>
                <div style="margin-bottom: 25px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input type="password" class="form-control" name="password_re"  data-placement="top" data-toggle="popover" data-reqs="6" data-content="Minimum 6 characters"  placeholder="password again">
                </div>
                <div class="form-group">
                    <div class="col-sm-12 controls">
                        <button id="btn-signup" type="button submit" class="btn btn-info"><i class="icon-hand-right"></i> Sign Up</button>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12 control">
                        <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                            Have an account? 
                            <a href="login.php">
                                Sign In Here
                            </a>
                        </div>
                    </div>
                </div> 
            </form>
        </div>
    </div>
</div> 
</div>
</html>