<!--DOCTYPE HTML-->
<html>
	<head>

	</head>
	<body>	
	  	<?php
	  		include 'header.php'
	  	?>
	  	<div class="panel panel-default" style="width:50%;margin:auto;">
			<?php
			for($i=0;$i<5;$i++){
				$random=rand(0,25);
				echo '<div class="panel-body">
		    		<ul class="list-group">
		    			<li class="list-group-item">
					    	<span class="badge">'.$random.'</span>
					    	<div class="media">
								<div class="media-left media-middle">
									<a href="#" class="thumbnail">
										<img class="media-object" src="resources/dildo.jpeg" alt="dildo">
									</a>
								</div>
								<div class="media-body">
									<h4 class="media-heading">Faggot</h4>
									<p>I am a faggot, and I want to sell this gently used dildo</p>
									<p>867-5309; fag@got.gay hmu</p>
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