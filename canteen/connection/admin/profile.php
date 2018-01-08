<?php
	require_once('auth.php');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin|Profile</title>

    <link href="css/css1.css" rel="stylesheet">

    <link href="css/css2.css" rel="stylesheet">
  </head>

  <body>
  
    <div class="brand">Hotel Grand</div>
    <div class="address-bar">near bus stand |  Mandi , Himachal Pradesh(H.P) 175001 | 9805343650</div>
    <nav class="navbar navbar-default" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="">Hotel Grand</a>
        </div>

        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav">
            <li><a href="index.php">Home</a></li>
            <li><a href="profile.php">Profile</a></li>
            <li><a href="categories.php">Categories</a></li>
            <li><a href="foods.php">Foods</a></li>
            <li><a href="accounts.php">Accounts</a></li>
            <li><a href="orders.php">Orders</a></li>
        </ul>
        <hr>
          <ul class="nav navbar-nav">
            <li><a href="reservations.php">Reservations</a></li>
            <li><a href="specials.php">Specials</a></li>
            <li><a href="messages.php">Messages</a></li>
            <li><a href="options.php">Options</a></li>
            <li><a href="Logout.php">Logout</a></li>
          </ul>        </div>
      </div>
    </nav>

    <div class="container">

            <div class="row">
        <div class="box">
          <div class="col-lg-12 text-center">
            <div id="carousel-example-generic" class="carousel slide">
</div>
<div id="container">
<table align="center">
<tr>
<form id="updateForm" name="updateForm" method="post" action="update-exec.php?id=<?php echo $_SESSION['SESS_ADMIN_ID'];?>" onsubmit="return updateValidate(this)">
<td>
  <table width="350" border="0" cellpadding="2" cellspacing="0">
  <CAPTION><h3>CHANGE ADMIN PASSWORD</h3></CAPTION>
	<tr>
		<td colspan="2" style="text-align:center;"><font color="#FF0000">* </font>Required fields</td>
	</tr>
    <tr>
      <th width="124">Current Password</th>
      <td width="168"><font color="#FF0000">* </font><input name="opassword" type="password" class="textfield" id="opassword" /></td>
    </tr>
    <tr>
      <th>New Password</th>
      <td><font color="#FF0000">* </font><input name="npassword" type="password" class="textfield" id="npassword" /></td>
    </tr>
    <tr>
      <th>Confirm New Password </th>
      <td><font color="#FF0000">* </font><input name="cpassword" type="password" class="textfield" id="cpassword" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value="Change" /></td>
    </tr>
  </table>
</td>
</form>
<td>
</tr>
</table>
<p>&nbsp;</p>
<hr>
</div>
</div>
</div>
</div>
</div>
    <footer>
      <div class="container">
        <div class="row">
          <div class="col-lg-12 text-center">
            <p>Copyright &copy; Friends &  Company 2013</p>
          </div>
        </div>
      </div>
    </footer>

    <script src="js/jquery1.js"></script>
    <script src="js/jquery2.js"></script>
    <script>
    // Activates the Carousel
    $('.carousel').carousel({
    interval: 5000
    })
  </script>

</body>
</html>
