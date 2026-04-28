<?php

$conn = new mysqli("localhost","root","","user");
if($conn){
    echo "connneciton successfully";
}else{
    echo "db not connected";
}
?>