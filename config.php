<?php 

$conn =  mysqli_connect("localhost", "root", "", "desystem_ion");

if (!$conn) {
    echo "Connection Failed";
}


function p($x, $b = false) {
    echo '<pre>';
    print_r($x);
    echo '</pre>';
    if (!$b) {
        die();
    }
}
