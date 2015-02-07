<html lang="en">
<head>
    <title>Mines Plaza</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/themes/smoothness/jquery-ui.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.2/jquery-ui.min.js"></script>
    <script src="js/jquery.flip.min.js"></script>
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
                <div style="margin-bottom: 10px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input id="login-password" type="password" class="form-control" name="password" placeholder="password">
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
                            <a href="#" onClick="$('#loginbox').flip({direction:'bt', speed:400, content:$('#signupbox')});">
                                Sign Up Here
                            </a>
                        </div>
                    </div>
                </div>    
            </form>     
        </div>                     
    </div>  
</div>
<div id="signupbox" style="display:none;margin:auto;margin-top:50px;width:450px" >
    <div class="panel panel-info" style="margin:auto;width:450px;">
        <div class="panel-heading">
            <div class="panel-title">Sign Up</div>
            <div style="float:right; font-size: 80%; position: relative; top:-10px"><a href="#">Forgot password?</a></div>

        </div>  
        <div class="panel-body" >
            <form id="signupform" class="form-horizontal" role="form" method="post" action="register_processing.php">
                <div id="signupalert" style="display:none" class="alert alert-danger">
                    <p>Error:</p>
                    <span></span>
                </div>
                <div style="margin-bottom: 25px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
                    <input type="text" class="form-control" name="email" placeholder="email">
                </div>
                <div style="margin-bottom: 25px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                    <input type="text" class="form-control" name="username" placeholder="username">
                </div>
                <div style="margin-bottom: 25px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input type="password" class="form-control" name="password" placeholder="password">
                </div>
                <div style="margin-bottom: 25px" class="input-group">
                    <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                    <input type="password" class="form-control" name="password_re" placeholder="password again">
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
                            <a href="#" onClick="$('#loginbox').revertFlip();">
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