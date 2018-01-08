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
//selecting all records from almost all tables. Return an error if there are no records in the tables
$result=mysql_query("SELECT members.member_id, members.firstname, members.lastname, billing_details.Street_Address, billing_details.Mobile_No, orders_details.*, food_details.*, cart_details.*, quantities.* FROM members, billing_details, orders_details, quantities, food_details, cart_details WHERE members.member_id=orders_details.member_id AND billing_details.billing_id=orders_details.billing_id AND orders_details.cart_id=cart_details.cart_id AND cart_details.food_id=food_details.food_id AND cart_details.quantity_id=quantities.quantity_id")
or die("There are no records to display ... \n" . mysql_error()); 
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Admin|Order</title>

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
<table border="0" width="970" align="center">
<CAPTION><h3>ORDERS LIST</h3></CAPTION>
<tr>
<th>Order ID</th>
<th>Customer Names</th>
<th>Food Name</th>
<th>Food Price</th>
<th>Quantity</th>
<th>Total Cost</th>
<th>Delivery Date</th>
<th>Delivery Address</th>
<th>Mobile No</th>
<th>Actions(s)</th>
</tr>

<?php
//loop through all tables rows
while ($row=mysql_fetch_assoc($result)){
echo "<tr>";
echo "<td>" . $row['order_id']."</td>";
echo "<td>" . $row['firstname']."\t".$row['lastname']."</td>";
echo "<td>" . $row['food_name']."</td>";
echo "<td>" . $row['food_price']."</td>";
echo "<td>" . $row['quantity_value']."</td>";
echo "<td>" . $row['total']."</td>";
echo "<td>" . $row['delivery_date']."</td>";
echo "<td>" . $row['Street_Address']."</td>";
echo "<td>" . $row['Mobile_No']."</td>";
echo '<td><a href="delete-order.php?id=' . $row['order_id'] . '">Remove Order</a></td>';
echo "</tr>";
}
mysql_free_result($result);
mysql_close($link);
?>
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

