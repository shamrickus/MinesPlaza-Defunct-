<html>
    <head>
        <title>Account Settings</title>
        <?php 
            include 'header.php';
            loggedIn(0);   
         ?>    
    </head>

    <body>

         <div class="container">
  <div class="row">
    <div class="col-md-4 col-sm-5">
      <div class="tabs-left">
        <ul class="nav nav-tabs">
          <li class="active"><a href="#a" data-toggle="tab"><span class="glyphicon glyphicon-envelope"></span></a></li>
          <li><a href="#b" data-toggle="tab"><span class="glyphicon glyphicon-piggy-bank"></span></a></li>
          <li><a href="#c" data-toggle="tab"><span class="glyphicon glyphicon-star"></span></a></li>
          <li><a href="#d" data-toggle="tab"><span class="glyphicon glyphicon-flag"></span></a></li>
          <li><a href="#e" data-toggle="tab"><span class="glyphicon glyphicon-cog"></span></a></li>
        </ul>

        <div class="tab-content">
          <div class="tab-pane active" id="a">
            <h3>Message Board</h3>
            <label for="text1">Name:
			<input type="text" name="text1" id="text1" /> </label>
          </div>

          <div class="tab-pane" id="b">
            <h3>Your Listings</h3>
          </div>

          <div class="tab-pane" id="c">
              <h3>Watched Listings</h3>
              <p>
              	IN HERE WE WILL POST ALL POSTS THAT HAVE BEEN FAVORITED
              	TO BE FOLLOWED UP ON!
              </p>
          </div>

          <div class="tab-pane" id="d">
              <h3>Preferences</h3>
          </div>

          <div class="tab-pane" id="e">
            <h3>Account Settings</h3> 
		
			<form action="accounts_post.php" method = "POST">
			<br>
			First name:&emsp;&emsp;&nbsp;&nbsp;&nbsp; <input type="text" name="firstname" value="<?php echo $FIRSTNAME; ?>">
			<br><br>
			Last name: &emsp;&emsp;&nbsp;&nbsp; <input type="text" name="lastname" value="<?php echo $LASTNAME; ?>">
			<br><br>
			E-Mail Address:&emsp;<input type="text" name="emailaddr" value="<?php echo $EMAIL; ?>">
			<br><br>  
			Username:&emsp;&emsp;&emsp;&nbsp;<input type="text" name="username" value ="<?php echo $USERNAME; ?>">
			<br><br>
			Password:&emsp;&emsp;&emsp;&nbsp;&nbsp;<input type ="password" name="passwd" placeholder = "password">
			<br><br>
      Password:&emsp;&emsp;&emsp;&nbsp;&nbsp;<input type="password" name="passwd_re" placeholder = "retype password">
      <br><br>
      Phone:&emsp;&emsp;&nbsp;&nbsp;<input type ="tel" name="phone" value = "<?php echo $PHONE; ?>">
      <br><br>
			  
				<input type="radio" name="sex" value="male" checked>Male
				<br>
				<input type="radio" name="sex" value="female">Female
				<br>
				<input type="radio" name="sex" value="other">Other

          <input style="display:none" type="text" name="csrf" value="<?php echo generateCSRF(pathinfo(__FILE__, PATHINFO_FILENAME), false); ?>">
          <input style="display:none" type="text" name="page" value="<?php echo pathinfo(__FILE__, PATHINFO_FILENAME); ?>">
			 
          <br>
			  	<input type="submit" value="Submit">
			</form>           
          </div>
        </div><!-- /tab-content -->
      </div><!-- /tabbable -->
    </div><!-- /col -->
  </div><!-- /row -->
</div><!-- /container -->
</html>




<style>
   h3{
    font-size: 3em;
    color:#fff;
   }

   body {background-color:lightblue}

    .glyphicon {
    color: #fff;
  }
  
  .active .glyphicon {
    color: #333;
  }

</style>
