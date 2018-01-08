<?php
    require_once('auth.php');
?>
<?php
//checking connection and connecting to a database
require_once('connection/config.php');
//Connect to mysql server
    $link = mysql_connect(DB_HOST, DB_USER, DB_PASSWORD);
    if(!$link) {
        die('Failed to connect to server: ' . mysql_error());
    }
    
    //Select database
    $db = mysql_select_db(DB_DATABASE);
    if(!$db) {
        die("Unable to select database");
    }
//get member id from session
$memberId=$_SESSION['SESS_MEMBER_ID'];
?>
<?php
    //retrieving all rows from the cart_details table based on flag=0
    $flag_0 = 0;
    $items=mysql_query("SELECT * FROM cart_details WHERE member_id='$memberId' AND flag='$flag_0'")
    or die("Something is wrong ... \n" . mysql_error()); 
    //get the number of rows
    $num_items = mysql_num_rows($items);
?>
<?php
    //retrieving all rows from the messages table
    $messages=mysql_query("SELECT * FROM messages")
    or die("Something is wrong ... \n" . mysql_error()); 
    //get the number of rows
    $num_messages = mysql_num_rows($messages);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Online Canteen: Inbox</title>

    <link href="css/css1.css" rel="stylesheet">

    <link href="css/css2.css" rel="stylesheet">
  </head>

  <body>
  
    <div class="brand">Nirma University</div>
    <div class="address-bar">Institute of Technology, Nirma Univeristy</div>
    <nav class="navbar navbar-default" role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="">Online Canteen</a>
        </div>

        <div class="collapse navbar-collapse navbar-ex1-collapse">
          <ul class="nav navbar-nav">
             <li><a href="member-profile.php">My Profile</a></li>
             <li><a href="member-index.php">Home</a></li>
            <li><a href="cart.php">Cart[<?php echo $num_items;?>]</a></li>
            <li><a href="inbox.php">Inbox[<?php echo $num_messages;?>]</a></li>
            <li><a href="tables.php">Tables</a></li>
            <li><a href="partyhalls.php">Party-Halls</a></li>
          </ul>
          <hr>
          <ul class="nav navbar-nav">
            <li><a href="login-foodzone.php">Food Zone</a></li>
            <li><a href="login-specialdeals.php">Special Deals</a></li>           
            <li><a href="ratings.php">Rate Us</a></li> 
            <li><a href="logout.php">Logout</a></li> 
          </ul>
        </div>
      </div>
    </nav>

    <div class="container">

            <div class="row">
        <div class="box">
          <div class="col-lg-12 text-center">
            <div id="carousel-example-generic" class="carousel slide">
<div id="center">

  <div>
  
<h1>MESSAGES</h1>
<p>&nbsp;</p>
<p>Here you can ... For more information <a href="login-contactus.php">Click Here</a> to contact us.
<hr>
<table width="850" style="text-align:center;">
<CAPTION><h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;INBOX</h2></CAPTION>
<tr>
<th>From</th>
<th>Date Received</th>
<th>Time Received</th>
<th>Subject</th>
<th>Text</th>
</tr>
<?php
//loop through all table rows
while ($row=mysql_fetch_array($messages)){
echo "<tr>";
echo "<td>" . $row['message_from']."</td>";
echo "<td>" . $row['message_date']."</td>";
echo "<td>" . $row['message_time']."</td>";
echo "<td>" . $row['message_subject']."</td>";
echo "<td width='350' align='left'>" . $row['message_text']."</td>";
echo "</tr>";
}
mysql_free_result($messages);
mysql_close($link);
?>
</table>
</div>
</div>
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