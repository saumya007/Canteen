<?php
//checking connection and connecting to a database
//Connect to mysql server
$user = 'root';
$password = 'root';
$dbs = 'canteen';
$host = 'localhost';
$port = 8889;
$link = mysqli_connect($host, $user, $password,$dbs);    
    //Select database
//    $db = mysql_select_db($dbs);
//    if(!$db) {
//        die("Unable to select database");
//    }
    
//retrieve questions from the questions table
$questions=$link->query("SELECT * FROM questions")
or die("Something is wrong ... \n");
?>
<?php
//setting-up a remember me cookie
    if (isset($_POST['Submit'])){
        //setting up a remember me cookie
        if($_POST['remember']) {
            $year = time() + 31536000;
            setcookie('remember_me', $_POST['login'], $year);
        }
        else if(!$_POST['remember']) {
            if(isset($_COOKIE['remember_me'])) {
                $past = time() - 100;
                setcookie(remember_me, gone, $past);
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Home</title>

    <link href="css/css1.css" rel="stylesheet">

    <link href="css/css2.css" rel="stylesheet">
    <script language="JavaScript" src="validation/user.js"></script>
    <script language="JavaScript" src="js/jquery2.js"></script>
    <script language="JavaScript" src="js/jquery1.js"></script>
  </head>

  <body>
  
    <div class="brand">Nirma University</div>
    <div class="address-bar">Institution of Technology, Nirma University</div>
    <nav class="navbar navbar-default" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="">Nirma University</a>
        </div>
          
        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav">
            <li><a href="index.php">Home</a></li>
            <li><a href="unlogin-foodzone.php">Food Zone</a></li>
            <li><a href="specialdeals.php">Special Deals</a></li>
            <li><a href="member-index.php">My Account</a></li>
            <li><a href="contactus.php">Contact Us</a></li>
          </ul>
        </div>
      </div>
    </nav>

    <div class="container">

            <div class="row">
        <div class="box">
          <div class="col-lg-12 text-center">
            <div id="carousel-example-generic" class="carousel slide">
              <!-- Indicators -->
              <ol class="carousel-indicators hidden-xs">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
              </ol>
            
              <!-- Wrapper for slides -->
              <div class="carousel-inner">
                <div class="item active">
                  <img class="img-responsive img-full" src="img/slide-1.jpg" >
                </div>
                <div class="item">
                  <img class="img-responsive img-full" src="img/slide-2.jpg" >
                </div>
                <div class="item">
                  <img class="img-responsive img-full" src="img/slide-3.jpg" >
                </div>
              </div>
            
              <!-- Controls -->
              <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                <span class="icon-prev"></span>
              </a>
              <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                <span class="icon-next"></span>
              </a>
            </div>
            <h1><small>Welcome to</small><br><span class="brand-name">Online canteen</span><hr class="tagline-divider"><small>By <strong>IdeaLab</strong></small></h1>
          </div>
        </div>
      </div>


      <div class="row">
        <div class="box">
          <div class="col-lg-12 text-center">
            <div id="carousel-example-generic" class="carousel slide">

<table align="center" width="100%">
    <tr align="center">
        <td width="42%" height="280" style="text-align:center;">
            <div >
            <form id="loginForm" name="loginForm" method="post" action="login-exec.php" onsubmit="return loginValidate(this)">
              <table width="290" border="0" align="center" cellpadding="2" cellspacing="0">
                <tr>
                    <td colspan="2" style="text-align:center;"><font color="#FF0000">* </font>Required fields</td>
                </tr>
                <tr>
                  <td width="112"><b>Email</b></td>
                  <td width="188"><font color="#FF0000">* </font><input name="login" type="text" class="textfield" id="login" /></td>
                </tr>
                <tr>
                  <td><b>Password</b></td>
                  <td><font color="#FF0000">* </font><input name="password" type="password" class="textfield" id="password" /></td>
                </tr>
                <tr>
                      <td><input name="remember" type="checkbox" class="" id="remember" value="1" onselect="cookie()" <?php if(isset($_COOKIE['remember_me'])) {
                        echo 'checked="checked"';
                    }
                    else {
                        echo '';
                    }
                    ?>/>Remember me</td>
                      <td><a href="JavaScript: resetPassword()">Forgot password?</a></td>
                </tr>
                <tr>
                    <td colspan="2"><input type="reset" value="Clear Fields"/>
                  <input type="submit" name="Submit" value="Login" /></td>
                </tr>
                <tr><td>&nbsp;</td></tr>
                <p><a href="admin/login-form.php">Click Here</a> to login as Administrator<p> 
              </table>
            </form>
            </div>
        </td>
        <hr>
        <td width="58%" style="text-align:center;">
            <div >
            <form id="loginForm" name="loginForm" method="post" action="register-exec.php" onsubmit="return registerValidate(this)">
              <table width="450" border="0" align="center" cellpadding="2" cellspacing="0">
                <tr>
                    <td colspan="2" style="text-align:center;"><font color="#FF0000">* </font>Required fields</td>
                </tr>
                <tr>
                  <th>First Name </th>
                  <td><font color="#FF0000">* </font><input name="fname" type="text" class="textfield" id="fname" /></td>
                </tr>
                <tr>
                  <th>Last Name </th>
                  <td><font color="#FF0000">* </font><input name="lname" type="text" class="textfield" id="lname" /></td>
                </tr>
                <tr>
                  <th width="124">Email</th>
                  <td width="168"><font color="#FF0000">* </font><input name="login" type="text" class="textfield" id="login" /></td>
                </tr>
                <tr>
                  <th>Password</th>
                  <td><font color="#FF0000">* </font><input name="password" type="password" class="textfield" id="password" /></td>
                </tr>
                <tr>
                  <th>Confirm Password </th>
                  <td><font color="#FF0000">* </font><input name="cpassword" type="password" class="textfield" id="cpassword" /></td>
                </tr>
                <tr>
                  <th>Security Question </th>
                    <td><font color="#FF0000">* </font><select name="question" id="question">
                    <option value="select">- select question -
                    <?php 
                    //loop through quantities table rows
                    while ($row=mysql_fetch_array($questions)){
                    echo "<option value=$row[question_id]>$row[question_text]"; 
                    }
                    ?>
                    </select></td>
                </tr>
                <tr>
                  <th>Security Answer</th>
                  <td><font color="#FF0000">* </font><input name="answer" type="text" class="textfield" id="answer" /></td>
                </tr>
                <tr>
                <td colspan="2"><input type="reset" value="Clear Fields"/>
                <input type="submit" name="Submit" value="Register" /></td>
                </tr>
                <tr><td>&nbsp;</td></tr>
              </table>
            </form>
            </div>
        </td>
    </tr>
</table>
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
            <p>Copyright &copy; IdeaLab-2017</p>
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
  
