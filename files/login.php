<?php
if(isset($_GET['msg'])) echo '<strong>'.$_GET['msg'].'</strong>';
echo "\n";
echo '	<form name="login" action="/login_processing.php" method="post">
    		Username: <input type="text" name="username" />
    		Password: <input type="password" name="password" />
    		<input type="submit" value="Login" />
		</form>';

echo '<a href="register_form.php">Register</a>';
?>
