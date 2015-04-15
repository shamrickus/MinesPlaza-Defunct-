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
		
			<form action="update_account_settings.php" method = "POST">
			<br>
			First name:&emsp;&emsp;&nbsp;&nbsp;&nbsp; <input type="text" name="firstname" value="<?php echo $FIRSTNAME; ?>">
			<br><br>
			Last name: &emsp;&emsp;&nbsp;&nbsp; <input type="text" name="lastname" value="<?php echo $LASTNAME; ?>">
			<br><br>
			E-Mail Address:&emsp;<input type="text" name="emailaddr" value="<?php echo $EMAIL; ?>">
			<br><br>  
			Username:&emsp;&emsp;&emsp;&nbsp;<input type="text" name="username" value ="<?php echo $USERNAME; ?>">
			<br><br>
			Password&emsp;&emsp;&emsp;&nbsp;&nbsp;<input type ="password" name="passwd" value = "asdf">
			<br><br>
			  
				<input type="radio" name="sex" value="male" checked>Male
				<br>
				<input type="radio" name="sex" value="female">Female
				<br>
				<input type="radio" name="sex" value="other">Other
			 

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

   body {background-color:#202010}

    .glyphicon {
    color: #fff;
  }
  
  .active .glyphicon {
    color: #333;
  }

</style>
