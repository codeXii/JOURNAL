<?php

require 'constants.php';

$connect = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);

if(mysqli_errno($connect)){
    die(mysqli_error($connect));
}

?>