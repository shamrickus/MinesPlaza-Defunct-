<!DOCTYPE html>
<html>
  <head>
	  	<?php
	  		include 'header.php';
	  	?>
  		<title> Mines Plaza</title>
  </head>

  <body>
  	<h1 align="center">Share and find wealth at Mines Plaza</h1>
  <div data-role="page" id="home"> 
    <div data-role="content">
        <input type="button" id ="button" value="Browse" onclick="location.href='browse.php';"/>
        <input type="button" id ="button" value="Sell" onclick="location.href='sell.php';"/>
        <br>
        <input type="button" id ="button" value="Reviews" onclick="location.href='reviews.php';"/>
        <input type="button" id ="button" value="Account" onclick="location.href='accounts.php';"/>	
    </div>
</div>
  </body>

</html>



<style> 
#button {
	height: 25%;
	width: 48%; 
	background-color: #5C5C2E;
	-moz-border-radius: 5px;
	-webkit-border-radius: 5px;
	border-radius: 6px;
	color: #000;
	font-family: 'Times New Roman';
	font-size: 70px;
	vertical-align: text-bottom;

}

#button:hover {
	border: none;
	background:#636343;
}

body {background-color:#202010}

h1	{
	font-family: 'Times New Roman';
	font-size: 3.45em;
	display: block;
	font-weight: bold;
	color: #fff
}
</style>