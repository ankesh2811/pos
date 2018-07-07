<?php
error_reporting(E_ALL);
if(!function_exists("getUserIP")) {
  function getUserIP(){
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }

    return $ip;
}
} else {
   // it already exists, do something else
}



$user_ip = getUserIP();
?>

<?php
date_default_timezone_set('Asia/Kolkata');

 
 //$connection = mysqli_connect("localhost","ankesh","ankesh2811");
 //mysqli_select_db($connection, "thelewala_pos");
 
 $connection = mysqli_connect("localhost","root","");
 mysqli_select_db($connection, "thelewala_pos");
 
 error_reporting(0);

?>

