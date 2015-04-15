<?php
require 'header.php';
?>

<html lang="en">
<head>
    <title>Mines Plaza</title>
    <script src="jquery/jquery-1.11.2.min.js"></script>
    <script src="js/disabled.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>
    <meta charset="utf-8">
</head>
<div class="container">
<div id="loginbox" style="width:450px;margin:auto;margin-top:50px;">                    
    <div class="panel panel-info" style="margin:auto;width:450px;">
        <div class="panel-heading">
            <div class="panel-title">Sign In</div>
            <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Forgot password?</a></div>
        </div>     
        <div style="padding-top:30px" class="panel-body" >
            <div style="display:none" id="login-alert" class="alert alert-danger col-sm-12"></div>    
            <form id="loginform" class="form-horizontal" role="form" method="post" action="login_processing.php">
                <div style="margin-bottom: 25px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input id="login-username" type="text" class="form-control" name="username" placeholder="username">        
                </div>           
                <div style="margin-bottom: 25px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input id="login-password" type="password" class="form-control" name="password" placeholder="password">
                </div>
                <div style="margin-bottom:25px">
                    <div class="g-recaptcha" style="margin-left:60px" data-sitekey="6LfEZgITAAAAAGIOotSLxMe_QEH4hZHp5T42IIH5"></div>
                </div>
                <div style="margin-top:25px" class="form-group">
                    <div class="col-sm-12 controls">
                        <button id="btn-signup" type="button submit" class="btn btn-info"><i class="icon-hand-right"></i> Login</button>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12 control">
                        <div style="border-top: 1px solid#888; padding-top:15px; font-size:85%" >
                            Don't have an account! 
                            <a href="register.php" onclick="disableAll()">
                                Sign Up Here
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