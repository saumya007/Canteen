<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin|Login</title>

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

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav">
            <li><h1>Administrator Login </h1></li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div><!-- /.container -->
    </nav>

    <div class="container">

            <div class="row">
        <div class="box">
          <div class="col-lg-12 text-center">
            <div id="carousel-example-generic" class="carousel slide">
<p><a href="/canteen/index.php">Click Here</a> to login as User<p> 
<form id="loginForm" name="loginForm" method="post" action="login-exec.php" onsubmit="return loginValidate(this)">
  <table width="300" border="0" align="center" cellpadding="2" cellspacing="0">
    <tr>
      <td width="112"><b>Username</b></td>
      <td width="188"><input name="login" type="text" class="textfield" id="login" /></td>
    </tr>
    <tr>
      <td><b>Password</b></td>
      <td><input name="password" type="password" class="textfield" id="password" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value="Login" /></td>
    </tr>
  </table>
</form>
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


