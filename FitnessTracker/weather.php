

<?php
    //ini_set("error_reporting", E_ALL);
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    $BASE_URL = "http://query.yahooapis.com/v1/public/yql";

    $yql_query = 'select * from weather.forecast where woeid= 2487796';
    $yql_query_url = $BASE_URL . "?q=" . urlencode($yql_query) . "&format=json";

    // Make call with cURL
    $session = curl_init($yql_query_url);
    curl_setopt($session, CURLOPT_RETURNTRANSFER,true);
    $json = curl_exec($session);
    // Convert JSON to PHP object
    $phpObj =  json_decode($json);

    /*
     //$temperature = $phpObj->query->results->item->condition;
     foreach ($phpObj->query->results->channel->item->condition as $key => $value) {
         echo "$key : $value <br>";
     }
    */

    $temperature = $phpObj->query->results->channel->item->condition->temp;
    
    $flag_condition = "";

    if ($temperature >= 90){

        global $flag_condition;
        $flag_condition = "black";

    } elseif($temperature >= 88 && $temperature < 90){

        global $flag_condition;
        $flag_condition = "red";

    } elseif($temperature >= 85 && $temperature < 88){

        global $flag_condition;
        $flag_condition = "yellow";

    } elseif($temperature >= 80 && $temperature < 85) {
        
        global $flag_condition;
        $flag_condition = "green";

    } else {

        global $flag_condition;
        $flag_condition = "white";
    }

    //echo "<br><br> $temperature <br><br>";

    //var_dump($phpObj);

?>

