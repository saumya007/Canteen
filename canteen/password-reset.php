<?php
//Start session
session_start();
    
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
        //get email
        $email = clean($_POST['email']);
        
        //selecting a specific record from the members table. Return an error if there are no records in the table
        $result=mysql_query("SELECT * FROM members WHERE login='$email'")
        or die("A problem has occured ... \n" . "Our team is working on it at the moment ... \n" . "Please check back after few hours."); 
    }
?>
<?php
    if(isset($_POST['Change'])){
        //Function to sanitize values received from the form. Prevents SQL injection
        function clean($str) {
            $str = @trim($str);
            if(get_magic_quotes_gpc()) {
                $str = stripslashes($str);
            }
            return mysql_real_escape_string($str);
        }
        if(trim($_SESSION['member_id']) != ''){
            $member_id=$_SESSION['member_id']; //gets member id from session
            //get answer and new password from form
            $answer = clean($_POST['answer']);
            $new_password = clean($_POST['new_password']);
            
         // update the entry
         $result = mysql_query("UPDATE members SET passwd='".md5($_POST['new_password'])."' WHERE member_id='$member_id' AND answer='".md5($_POST['answer'])."'")
         or die("A problem has occured ... \n" . "Our team is working on it at the moment ... \n" . "Please check back after few hours. \n");  
         
         if($result){
                unset($_SESSION['member_id']);
                header("Location: reset-success.php"); //redirect to reset success page         
         }
         else{
                unset($_SESSION['member_id']);
                header("Location: reset-failed.php"); //redirect to reset failed page
         }
            }
            else{
                unset($_SESSION['member_id']);
                header("Location: reset-failed.php"); //redirect to reset failed page
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

    <title>Online Canteen: Password Reset</title>

    <link href="css/css1.css" rel="stylesheet">

    <link href="css/css2.css" rel="stylesheet">

    <script language="JavaScript" src="validation/user.js"></script>
    <script language="JavaScript" src="js/jquery2.js"></script>
    <script language="JavaScript" src="js/jquery1.js"></script>
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
            <li><a href="index.php">Home</a></li>
            <li><a href="foodzone.php">Food Zone</a></li>
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
<div id="reset">
  <div>
  <form name="passwordResetForm" id="passwordResetForm" method="post" action="password-reset.php" onsubmit="return passwordResetValidate(this)">
     <table width="360" style="text-align:center;">
     <tr>
        <th>Account Email</th>
        <td width="168"><input name="email" type="text" class="textfield" id="email" /></td>
        <td><input type="submit" name="Submit" value="Check" /></td>
     </tr>
     </table>
 </form>
  <?php
    if(isset($_POST['Submit'])){
        $row=mysql_fetch_assoc($result);
        $_SESSION['member_id']=$row['member_id']; //creates a member id session
        session_write_close(); //closes session
        $question_id=$row['question_id'];
        
        //get question text based on question_id
        $question=mysql_query("SELECT * FROM questions WHERE question_id='$question_id'")
        or die("A problem has occured ... \n" . "Our team is working on it at the moment ... \n" . "Please check back after few hours.");
        
        $question_row=mysql_fetch_assoc($question);
        $question=$question_row['question_text'];
        if($question!=""){
            echo "<b>Your Member ID:</b> ".$_SESSION['member_id']."<br>";
            echo "<b>Your Security Question:</b> ".$question;
        }
        else{
            echo "<b>Your Security Question:</b> THIS ACCOUNT DOES NOT EXIST! PLEASE CHECK YOUR EMAIL AND TRY AGAIN.";
        }
    }
  ?>
  <hr>
  <form name="passwordResetForm" id="passwordResetForm" method="post" action="password-reset.php" onsubmit="return passwordResetValidate_2(this)">
     <table width="360" style="text-align:center;">
     <tr>
        <td colspan="2" style="text-align:center;"><font color="#FF0000">* </font>Required fields</td>
     </tr>
     <tr>
        <th>Your Security Answer</th>
        <td width="168"><font color="#FF0000">* </font><input name="answer" type="text" class="textfield" id="answer" /></td>
     </tr>
     <tr>
        <th>New Password</th>
        <td width="168"><font color="#FF0000">* </font><input name="new_password" type="password" class="textfield" id="new_password" /></td>
     </tr>
     <tr>
        <th>Confirm New Password</th>
        <td width="168"><font color="#FF0000">* </font><input name="confirm_new_password" type="password" class="textfield" id="confirm_new_password" /></td>
     </tr>
     <tr>
        <td colspan="2"><input type="reset" name="Reset" value="Clear Fields" /><input type="submit" name="Change" value="Change Password" /></td>
     </tr>
     </table>
 </form>
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
