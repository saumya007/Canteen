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
    
//define default values for flag_0
$flag_0 = 0;
    
//get member_id from session
$member_id = $_SESSION['SESS_MEMBER_ID'];

//selecting particular records from the food_details and cart_details tables. Return an error if there are no records in the tables
$result=mysql_query("SELECT food_name,food_description,food_price,food_photo,cart_id,quantity_value,total,flag,category_name FROM food_details,cart_details,categories,quantities WHERE cart_details.member_id='$member_id' AND cart_details.flag='$flag_0' AND cart_details.food_id=food_details.food_id AND food_details.food_category=categories.category_id AND cart_details.quantity_id=quantities.quantity_id")
or die("A problem has occured ... \n" . "Our team is working on it at the moment ... \n" . "Please check back after few hours."); 
?>
<?php
    if(isset($_POST['Submit'])){
        //Function to sanitize values received from the form. Prevents SQL injection
        function clean($str) {
            $str = @trim($str);
            if(get_magic_quotes_gpc()) {
                $str = stripslashes($str);
            }
            return mysql_real_escape_string($str);
        }
        //get category id
        $id = clean($_POST['category']);
        
        //selecting all records from the food_details table based on category id. Return an error if there are no records in the table
        $result=mysql_query("SELECT * FROM food_details WHERE food_category='$id'")
        or die("A problem has occured ... \n" . "Our team is working on it at the moment ... \n" . "Please check back after few hours."); 
    }
?>
<?php
    //retrieving quantities from the quantities table
    $quantities=mysql_query("SELECT * FROM quantities")
    or die("Something is wrong ... \n" . mysql_error()); 
?>
<?php
    //retrieving cart ids from the cart_details table
    //define a default value for flag_0
    $flag_0 = 0;
    $items=mysql_query("SELECT * FROM cart_details WHERE member_id='$member_id' AND flag='$flag_0'")
    or die("Something is wrong ... \n" . mysql_error()); 
?>
<?php
    //retrive a currency from the currencies table
    //define a default value for flag_1
    $flag_1 = 1;
    $currencies=mysql_query("SELECT * FROM currencies WHERE flag='$flag_1'")
    or die("A problem has occured ... \n" . "Our team is working on it at the moment ... \n" . "Please check back after few hours."); 
?>
<?php
    //retrieving all rows from the cart_details table based on flag=0
    $flag_0 = 0;
    @$items=mysql_query("SELECT * FROM cart_details WHERE member_id='$memberId' AND flag='$flag_0'")
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
<?php
    //retrieving all rows from the cart_details table based on flag=0
    $flag_0 = 0;
    @$items=mysql_query("SELECT * FROM cart_details WHERE member_id='$memberId' AND flag='$flag_0'")
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

    <title>Online Canteen: Cart</title>

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
<h1>MY SHOPPING CART</h1>
<p>&nbsp;</p>
        <h3><a href="login-foodzone.php">Continue Shopping!</a></h3>
        <p>&nbsp;</p>
            <form name="quantityForm" id="quantityForm" method="post" action="update-quantity.php" onsubmit="return updateQuantity(this)">
                 <table width="560" align="center">
                     <tr>
                        <td>Item ID</td>
                        <td><select name="item" id="item">
                            <option value="select">- select -
                            <?php 
                            //loop through cart_details table rows
                            while ($row=mysql_fetch_array($items)){
                            echo "<option value=$row[cart_id]>$row[cart_id]"; 
                            }
                            ?>
                            </select>
                        </td>
                        <td>Quantity</td>
                        <td><select name="quantity" id="quantity">
                            <option value="select">- select -
                            <?php
                            //loop through quantities table rows
                            while ($row=mysql_fetch_assoc($quantities)){
                            echo "<option value=$row[quantity_id]>$row[quantity_value]"; 
                            }
                            ?>
                            </select>
                        </td>
                        <td><input type="submit" name="Submit" value="Change Quantity" /></td>
                     </tr>
                     <tr>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                     </tr>
                 </table>
            </form>
            <p>&nbsp;</p>
            <div>
          <table width="910" height="auto" style="text-align:center;">
            <tr>
                <th>Item ID</th>
                <th>Food Photo</th>
                <th>Food Name</th>
                <th>Food Description</th>
                <th>Food Category</th>
                <th>Food Price</th>
                <th>Quantity</th>
                <th>Total Cost</th>
                <th>Action(s)</th>
                <th>Action(S)</th>
            </tr>

            <?php
                //loop through all table rows
                $symbol=mysql_fetch_assoc($currencies); //gets active currency
                while ($row=mysql_fetch_array($result)){
                    echo "<tr>";
                    echo "<td>" . $row['cart_id']."</td>";
                    echo '<td><a href=images/'. $row['food_photo']. ' alt="click to view full image" target="_blank"><img src=images/'. $row['food_photo']. ' width="80" height="70"></a></td>';
                    echo "<td>" . $row['food_name']."</td>";
                    echo "<td>" . $row['food_description']."</td>";
                    echo "<td>" . $row['category_name']."</td>";
                    echo "<td>" . $symbol['currency_symbol']. "" . $row['food_price']."</td>";
                    echo "<td>" . $row['quantity_value']."</td>";
                    echo "<td>" . $symbol['currency_symbol']. "" . $row['total']."</td>";
                    /*
                    echo "<form>";
                    echo '<td><select name="quantity" id="quantity" onchange="getQuantity(this.value)">
                    <option value="select">- select quantity -
                    <?php
                    while ($row=mysql_fetch_assoc($quantities)){
                    echo "<option value=$row[quantity_id]>$row[quantity_value]"; 
                    //$_SESSION[SESS_CART_ID] = $row[cart_id];
                }
                ?>
                </select></td>';
                echo "</form>";
                */
                /*
                echo "<form>";
                    echo "<td><select name='quantity' id='quantity' onclick='getQuantity(this.value)'>
                    <option value='1'>select
                    <option value='2'>1
                    <option value='3'>2
                    <option value='4'>3

                
          
                </select></td>";
                echo "</form>";
                */
                echo '<td><a href="order-exec.php?id=' . $row['cart_id'] . '">Place Order</a></td>';
                echo '<td><a href="remove-order.php?id=' . $row['cart_id'] . '">Remove From Cart</a></td>';
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
    $('.carousel').carousel({
    interval: 5000
    })
  </script>
  </body>
</html>
