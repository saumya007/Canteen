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

//selecting all records from the orders_details table. Return an error if there are no records in the table
$result=mysql_query("SELECT * FROM orders_details,cart_details,food_details,categories,quantities,members WHERE members.member_id='$memberId' AND orders_details.member_id='$memberId' AND orders_details.cart_id=cart_details.cart_id AND cart_details.food_id=food_details.food_id AND food_details.food_category=categories.category_id AND cart_details.quantity_id=quantities.quantity_id")
or die("There are no records to display ... \n" . mysql_error()); 
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
<?php
    //retrive a currency from the currencies table
    //define a default value for flag_1
    $flag_1 = 1;
    $currencies=mysql_query("SELECT * FROM currencies WHERE flag='$flag_1'")
    or die("A problem has occured ... \n" . "Our team is working on it at the moment ... \n" . "Please check back after few hours."); 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Online Canteen: Order Page</title>

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

  <div id="centre">
    <h1>Welcome <?php echo $_SESSION['SESS_FIRST_NAME'];?></h1>
<p>&nbsp;</p>
<p>Here you can view order history and delete old orders from your account. Invoices can be viewed from the order history. You can also make table reservations in your account. For more information <a href="login-contactus.php">Click Here</a> to contact us.
<h3><a href="login-foodzone.php">Order More Food!</a></h3>
<hr>
<table border="0" width="910" style="text-align:center;">
  <div id="center">
<CAPTION><h2>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ORDER HISTORY</h2></CAPTION>
<tr>
<th>Order ID</th>
<th>Food Photo</th>
<th>Food Name</th>
<th>Food Category</th>
<th>Food Price</th>
<th>Quantity</th>
<th>Total Cost</th>
<th>Delivery Date</th>
<th>Action(s)</th>
</tr>

<?php
//loop through all table rows
$symbol=mysql_fetch_assoc($currencies); //gets active currency
while ($row=mysql_fetch_array($result)){
echo "<tr>";
echo "<td>" . $row['order_id']."</td>";
echo '<td><a href=images/'. $row['food_photo']. ' alt="click to view full image" target="_blank"><img src=images/'. $row['food_photo']. ' width="80" height="70"></a></td>';
echo "<td>" . $row['food_name']."</td>";
echo "<td>" . $row['category_name']."</td>";
echo "<td>" . $symbol['currency_symbol']. "" . $row['food_price']."</td>";
echo "<td>" . $row['quantity_value']."</td>";
echo "<td>" . $symbol['currency_symbol']. "" . $row['total']."</td>";
echo "<td>" . $row['delivery_date']."</td>";
echo '<td><a href="delete-order.php?id=' . $row['order_id'] . '">Cancel Order</a></td>';
echo "</tr>";
}
mysql_free_result($result);
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

