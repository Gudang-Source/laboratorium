<!DOCTYPE html>
<html>
<head>
<title>Login Form </title>
<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:400,700">
<link href="stylee.css" rel="stylesheet" type="text/css">
</head>
<body>
 <div class="container">
<div id="main">
<div id="login">

<form action="login.php" method="post">
<div class="imgcontainer">
    <img src="Slider01.png" alt="Avatar" class="avatar">
  </div>

  <div class="container">
    <label><b>Username</b></label>
    <input id="username" type="text" placeholder="Enter Username" name="username" required>

    <label><b>Password</b></label>
    <input id="password" type="password" placeholder="Enter Password" name="password" required>

    <button type="submit" name="submit">Login</button>
    <input type="checkbox" checked="checked"> Remember me
  </div>

  <div class="container">
    <button type="button" class="cancelbtn">Cancel</button>
    <span class="psw">Forgot <a href="#">password?</a></span>
  </div>
</form>
</div>
</div>
	</div>
</body>
</html>