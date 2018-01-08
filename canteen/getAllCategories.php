<?php
 
/*
 * Following code will list all the products
 */
 
// array for JSON response
$response = array();
 
// include db connect class
$user = 'root';
$password = 'root';
$dbs = 'canteen';
$host = 'localhost';
$port = 8889;
$link = mysqli_connect($host, $user, $password,$dbs);  
// get all products from products table
$result = mysqli_query($link, "SELECT *FROM categories") or die(mysqli_error());
 
// check for empty result
if (mysqli_num_rows($result) > 0) {
    // looping through all results
    // products node
    $response["categories"] = array();
 
    while ($row = mysqli_fetch_array($result,MYSQLI_BOTH)) {
        // temp user array
        $product = array();
        $product["category_id"] = $row["category_id"];
        $product["category_name"] = $row["category_name"];
        // push single product into final response array
        array_push($response["categories"], $product);
    }
    // success
    $response["success"] = 1;
 
    // echoing JSON response
    echo json_encode($response);
} else {
    // no products found
    $response["success"] = 0;
    $response["message"] = "No products found";
 
    // echo no users JSON
    echo json_encode($response);
}
?>