<html>
    <head>
        <title>Account Settings</title>
    </head>

    <body>
        <?php 
            include 'header.php'
         ?>    
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
          </div>

          <div class="tab-pane" id="b">
            <h3>Your Listings</h3>
          </div>

          <div class="tab-pane" id="c">
              <h3>Watched Listings</h3>
          </div>

          <div class="tab-pane" id="d">
              <h3>Preferences</h3>
          </div>

          <div class="tab-pane" id="e">
            <h3>Account Settings</h3>              
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
