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
        <input type="button" id="button" value="Browse" />
        <input type="button" id="button" value="Sell" />
        <input type="button" id="button" value="Reviews" />
        <input type="button" id="button" value="Account" />
        <br />
        <a href="#" data-role="button" id="hrefButton1">HREF Me 1</a>
        <a href="#" data-role="button" id="hrefButton2">HREF Me 2</a>
        <a href="#" data-role="button" id="hrefButton3">HREF Me 3</a>
        <a href="#" data-role="button" id="hrefButton4">HREF Me 4</a>
    </div>
</div>
  </body>

</html>



<style> 
#button {
	height: 350px;
	width: 750px; 
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