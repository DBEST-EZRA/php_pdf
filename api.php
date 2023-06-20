<?php

header("Access-Control-Allow-Origin:*");
header("Content-Type: application/json");
header("Access-Control-Allow-Method: GET");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Request-With");

require "config.php";

$requestMethod = $_SERVER['REQUEST_METHOD'];

//Response array initialization
$Response = array(); 

if($requestMethod == 'GET'){

    $sql = "SELECT * FROM crud_table";
    $results = $conn->query($sql);

    if($results){

        //Iterating over the rows in the database and adding them to response array
        $i = 0;
        while($row = $results->fetch_assoc()){

            $Response[$i]['name'] = $row['crud_name'];
            $Response[$i]['email'] = $row['crud_email'];
            $Response[$i]['phone'] = $row['crud_phone'];
            $Response[$i]['Identity'] = $row['crud_id'];

            $i++;
        };

        $data = [
            'status' => 200,
            'message' => "Data fetched successfully",
            'data' => $Response
        ]; 
    
        header('HTTP/1.0 200 OK');

        //Json pretty print or json formatter for nice web view
        
        echo json_encode($data,JSON_PRETTY_PRINT);
        
    //When results are empty    
    }else{
        $data = [
            'status' => 500,
            'message' => "Internal Server Error"
        ]; 
    
        header('HTTP/1.0 500 Internal Server Error');
        echo json_encode($data);
    }
}

//When you use other methods for api calls, PUT,POST,DELETE,UPDATE
else{

    $data = [
        'status' => 405,
        'message' => $requestMethod . "Method not Allowed"
    ]; 

    header('HTTP/1.0 405 Method Not Allowed');
    echo json_encode($data);

}


?>