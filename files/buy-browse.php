<!--DOCTYPE HTML-->
<html>
	<head>
		<style>
			div.panel:hover #filterpanel{
				display:inline;
			}
			div#filterpanel{
				display:none;
				width:100%;
				margin:auto;
			}
			div.wrapper{
				display:inline-block;
				width:25%;
				margin-left: 5px;
				margin-top: 5px;
				border-width:3px;
			}
		</style>
	</head>
	<body>	
	  	<?php
	  		include 'header.php'
	  	?>
	  	<div class="panel panel-default" style="width:50%;margin:auto;margin-bottom:30px;text-align:center;">
	  		<button type="submit" style="width:100%" class="btn btn-default">Filter <span class="glyphicon glyphicon-menu-down"></span></button>
			<div class="panel panel-default" id="filterpanel">
			<!--<div class="wrapper">-->
				<div class="input-group">
	      			<span class="input-group-addon">
	        			<input type="checkbox" aria-label="...">
	      			</span>
	      			<div class="form-control">Show only Stephens?</div>
	    		</div>
	    	<!--</div>-->
				<div class="input-group" style="width:100%">
					<input type="checkbox">
					<div style="height:20px;line-height:20px">
						  show only faggots?
					</div>
					<br>
					<input type="checkbox">  show only faggots?
				</div>
			</div>
		</div>
	  	<div class="panel panel-default" style="width:50%;margin:auto;">
			<?php
			$numposts=rand(1,7);
			for($i=0;$i<$numposts;$i++){
				$random=rand(0,25);
				echo '<div class="panel-body">
		    		<ul class="list-group">
		    			<li class="list-group-item">
					    	<span class="badge">'.$random.'</span>
					    	<div class="media">
								<div class="media-left media-middle">
									<a href="#" class="thumbnail">
										<img class="media-object" src="../../resources/dildo.jpeg" alt="dildo">
									</a>
								</div>
								<div class="media-body">
									<h4 class="media-heading">Faggot</h4>
									<p>I am a faggot, and I want to buy this model of dildo</p>
									<p>brand-new to ravaged-by-your-horrendous-sexual-appetite quality please</p>
									<p>867-5309; f@gg.t hmu</p>
								</div>
							</div>
						</li>
					</ul>
				</div>';
			};
			?>
		</div>
	</body>
</html>