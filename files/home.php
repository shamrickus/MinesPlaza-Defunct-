<!DOCTYPE html>
<html>
  <head>
  		<title> Mines Plaza</title>
  </head>

  <body>
  	<?php
  		include 'header.php'
  	?>
  	<h1>Share and find wealth at Mines Plaza</h1>
  <div data-role="page" id="home"> 
    <div data-role="content">
        <input type="button" id ="button" value="Browse" onclick="location.href='browse.php';"/>
        <input type="button" id ="button" value="Sell" onclick="location.href='google.com';"/>
        <input type="button" id ="button" value="Reviews" onclick="location.href='google.com';"/>
        <input type="button" id ="button" value="Account" onclick="location.href='google.com';"/>	
    </div>
</div>
  </body>

</html>



<style> 
#button {
	height: 350px;
	width: 782px; 
	background-color: #ccc;
	-moz-border-radius: 5px;
	-webkit-border-radius: 5px;
	border-radius: 6px;
	color: #fff;
	font-family: 'Times New Roman';
	font-size: 100px;
	vertical-align: text-bottom;

}

#button:hover {
	border: none;
	background:red;
}
</style>